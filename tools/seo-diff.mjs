#!/usr/bin/env node
// Usage: node tools/seo-diff.mjs <before.json> <after.json> [--approved-titles file] [--redirects file]
// Redirects file (tab separated "/old<TAB>/new", # comments): a baseline URL
// that left the sitemap is compared with its 301 target, and its canonical may
// become the target URL. Approved-changes file ("/old<TAB>field<TAB>after
// value", # comments) turns a specific failing row into an approved one.
// Defaults: docs/audit/approved-titles.tsv, docs/audit/redirects.tsv and
// docs/audit/approved-changes.tsv when they exist.
// Fails on: status not 200, canonical changed / not self, noindex added,
// H1 count not 1, title or description empty, unapproved title change,
// word_count_main down >10 %, lost in-links, lost schema type, URL left the
// sitemap. Prints a table of every difference (expected ones included).
// Approved-titles file: one line per URL, "/path/<TAB>New title".
import fs from 'node:fs';
import path from 'node:path';
import { REPO_ROOT, ORIGIN } from './lib.mjs';

const argv = process.argv.slice(2);
const flagged = new Set(['--approved-titles', '--redirects', '--approved-changes']);
const [beforeF, afterF] = argv.filter((a, i) => !a.startsWith('--') && !flagged.has(argv[i - 1]));
const opt = (k, d) => { const i = argv.indexOf(k); const f = i >= 0 ? argv[i + 1] : path.join(REPO_ROOT, d); return fs.existsSync(f) ? f : null; };
const tsv = (f) => (f ? fs.readFileSync(f, 'utf8').split('\n').filter((l) => l.trim() && !l.startsWith('#')).map((l) => l.split('\t').map((x) => x.trim())) : []);
const approved = new Map(tsv(opt('--approved-titles', 'docs/audit/approved-titles.tsv')));
const redirects = new Map(tsv(opt('--redirects', 'docs/audit/redirects.tsv')));
const approvedChanges = new Set(tsv(opt('--approved-changes', 'docs/audit/approved-changes.tsv')).map((r) => r.join('\t')));
const follow = (p) => { let q = p; for (let i = 0; i < 5 && redirects.has(q); i++) q = redirects.get(q); return q; };

const B = JSON.parse(fs.readFileSync(path.resolve(REPO_ROOT, beforeF), 'utf8')).pages;
const A = JSON.parse(fs.readFileSync(path.resolve(REPO_ROOT, afterF), 'utf8')).pages;
const rows = []; const fails = [];
const row = (p, field, before, after, bad) => {
  const ok = bad && approvedChanges.has(`${p}\t${field}\t${after}`);
  rows.push({ p, field, before, after, bad: bad && !ok, approved: ok });
  if (bad && !ok) fails.push(`${p} ${field}`);
};
const s = (v) => (Array.isArray(v) ? v.join(', ') : String(v ?? ''));

const mapped = new Set();
for (const [p, b] of Object.entries(B)) {
  const q = A[p] ? p : follow(p);
  const a = A[q];
  if (!a) { row(p, 'sitemap', 'present', q !== p ? `MISSING (301 → ${q} not in sitemap)` : 'MISSING', true); continue; }
  if (q !== p) { row(p, 'moved (301)', p, q, false); mapped.add(q); }
  if (a.status !== 200) row(p, 'status', b.status ?? 200, a.status, true);
  if (a.status !== 200) continue;
  if (a.canonical !== b.canonical || !a.canonical_self) row(p, 'canonical', b.canonical, a.canonical, !(a.canonical_self && a.canonical === `${ORIGIN}${q}` && q !== p));
  if (/noindex/i.test(a.robots || '') && !/noindex/i.test(b.robots || '')) row(p, 'robots', b.robots, a.robots, true);
  if (a.h1.length !== 1) row(p, 'h1 count', b.h1.length, a.h1.length, true);
  if (s(a.h1) !== s(b.h1)) row(p, 'h1', s(b.h1), s(a.h1), false);
  if (!a.title || !a.meta_description) row(p, 'title/description', 'set', 'EMPTY', true);
  if (a.title !== b.title) row(p, 'title', b.title, a.title, approved.get(q) !== a.title);
  if (a.meta_description !== b.meta_description) row(p, 'description', b.meta_description, a.meta_description, false);
  if (a.word_count_main < b.word_count_main * 0.9) row(p, 'word_count_main', b.word_count_main, a.word_count_main, true);
  else if (a.word_count_main !== b.word_count_main) row(p, 'word_count_main', b.word_count_main, a.word_count_main, false);
  const lostIn = (b.internal_links_in || []).map(follow).filter((x) => !(a.internal_links_in || []).includes(x));
  if (lostIn.length) row(p, 'in-links lost', '', lostIn.join(' '), true);
  const lostInMain = (b.internal_links_in_from_main || []).map(follow).filter((x) => !(a.internal_links_in_from_main || []).includes(x));
  if (lostInMain.length) row(p, 'in-body in-links lost', '', lostInMain.join(' '), false);
  const lostSchema = (b.schema_types || []).filter((x) => !(a.schema_types || []).includes(x));
  if (lostSchema.length) row(p, 'schema lost', lostSchema.join(' '), '', true);
  for (const k of ['phone_display', 'tel_links', 'whatsapp_texts_distinct', 'cross_domain_links', 'whatsapp_ctas', 'external_media']) {
    const bv = JSON.stringify(b[k] ?? null); const av = JSON.stringify(a[k] ?? null);
    if (bv !== av) row(p, k, s(Array.isArray(b[k]) ? b[k].map((x) => x.href || x).map((x) => String(x).slice(0, 60)) : b[k]), s(Array.isArray(a[k]) ? a[k].map((x) => x.href || x).map((x) => String(x).slice(0, 60)) : a[k]), false);
  }
}
for (const [p, a] of Object.entries(A)) {
  if (B[p] || mapped.has(p)) continue;
  row(p, 'new URL', '', 'added', false);
  if (a.status !== 200 || a.h1?.length !== 1 || !a.title || !a.meta_description || !a.canonical_self || /noindex/i.test(a.robots || '')) row(p, 'new URL basics', '', `status ${a.status}, h1 ${a.h1?.length}, canonical_self ${a.canonical_self}, robots ${a.robots}`, true);
  if (a.title && approved.has(p) && approved.get(p) !== a.title) row(p, 'title (new)', approved.get(p), a.title, true);
}
const titles = Object.entries(A).filter(([, a]) => a.title).map(([p, a]) => [a.title, p]);
const dupT = titles.filter(([t], i) => titles.findIndex(([x]) => x === t) !== i);
dupT.forEach(([t, p]) => row(p, 'duplicate title', '', t, true));

const cut = (x, n = 70) => (String(x).length > n ? `${String(x).slice(0, n - 1)}…` : String(x));
console.log('| URL | field | before | after | gate |\n|---|---|---|---|---|');
rows.forEach((r) => console.log(`| ${r.p} | ${r.field} | ${cut(r.before).replace(/\|/g, '/')} | ${cut(r.after).replace(/\|/g, '/')} | ${r.bad ? 'FAIL' : r.approved ? 'approved' : 'ok'} |`));
console.log(`\nseo-diff: ${Object.keys(B).length} URLs, ${rows.length} differences, ${fails.length} failing`);
if (fails.length) { console.log(`  ${fails.join('\n  ')}`); process.exit(1); }
