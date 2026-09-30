#!/usr/bin/env node
// WhatsApp rule (HARD RULE 3) for arq.com.py. Exit 1 on any failure.
// 1. Repo scan: no Paraguayan mobile number other than the configured one in
//    any served or source file; every wa.me link uses it; config.php falls
//    back to it when .env has no WHATSAPP_NUMBER.
// 2. Message map includes/data/whatsapp.json: every message is non-empty,
//    unique, voseo, and has no prices, "gratis" or guarantees.
// 3. Rendered pages (sitemap + linked noindex pages): every WhatsApp link
//    uses the number, carries a message from the map, one page message per
//    page, no two pages share a page message, every indexable page has a CTA.
// 4. The project selector POST answers 303 to wa.me with a composed message.
// Usage: node tools/check-wa.mjs
import fs from 'node:fs';
import path from 'node:path';
import { REPO_ROOT, NUMBER, startServer, sitemapPaths, fetchText, load, parseWa, walk, PY_MOBILE_RE } from './lib.mjs';

const fails = [];
const fail = (where, msg) => fails.push(`${where}: ${msg}`);
const rel = (f) => path.relative(REPO_ROOT, f);

const BAD_MSG = [/\bGs\.?\s?\d/i, /\$/, /\bUSD\b/i, /\bguaran[ií]es\b/i, /\bprecio(s)?\b/i, /\bgratis\b/i, /\bgratuit[oa]s?\b/i, /\bgarantiz/i, /\b(tú|tienes|puedes|quieres|necesitas|cuéntanos|escríbenos)\b/i];
const checkMessage = (where, text) => {
  if (!text || !text.trim()) { fail(where, 'WhatsApp message is empty'); return; }
  for (const re of BAD_MSG) if (re.test(text)) fail(where, `message breaks the rules (${re}): "${text.slice(0, 80)}…"`);
};

// ---------- 1. repo scan ----------
const TEXT_EXT = /\.(php|html|js|mjs|css|xml|json|txt|svg|md|example|sh)$|\.htaccess$/;
const skipDirs = new Set(['.git', 'node_modules', 'audit-shots', 'storage', 'audit']);
for (const f of walk(REPO_ROOT, skipDirs).filter((x) => TEXT_EXT.test(x))) {
  const r = rel(f);
  if (r.startsWith('tools/')) continue; // the tools name the number on purpose
  const txt = fs.readFileSync(f, 'utf8');
  for (const m of txt.matchAll(/wa\.me\/(\+?\d+)/g)) if (m[1] !== NUMBER) fail(r, `wa.me number ${m[1]}`);
  for (const m of txt.matchAll(/api\.whatsapp\.com\/send\?phone=(\+?\d+)/g)) if (m[1] !== NUMBER) fail(r, `api.whatsapp number ${m[1]}`);
  txt.split('\n').forEach((line, i) => {
    for (const m of line.matchAll(PY_MOBILE_RE)) {
      if (m[0].replace(/\D/g, '').replace(/^0/, '595') !== NUMBER) fail(`${r}:${i + 1}`, `other Paraguayan mobile number "${m[0]}"`);
    }
  });
}
const cfg = fs.readFileSync(path.join(REPO_ROOT, 'includes/config.php'), 'utf8');
if (!new RegExp(`env\\('WHATSAPP_NUMBER',\\s*'${NUMBER}'\\)`).test(cfg)) fail('includes/config.php', `WHATSAPP_NUMBER must fall back to ${NUMBER}`);

// ---------- 2. message map ----------
const mapFile = path.join(REPO_ROOT, 'includes/data/whatsapp.json');
let map = { pages: {}, templates: {}, selector: {} };
try { map = JSON.parse(fs.readFileSync(mapFile, 'utf8')); } catch (e) { fail('includes/data/whatsapp.json', `missing or invalid JSON (${e.message})`); }
const seen = new Map();
for (const [k, t] of Object.entries(map.pages || {})) {
  checkMessage(`whatsapp.json pages ${k}`, t);
  if (seen.has(t)) fail('whatsapp.json', `pages ${k} duplicates ${seen.get(t)}`);
  seen.set(t, k);
}
const walkStrings = (o, pre) => { if (typeof o === 'string') checkMessage(`whatsapp.json ${pre}`, o.replace(/\{[a-z]+\}/g, 'x')); else if (o && typeof o === 'object') Object.entries(o).forEach(([k, v]) => walkStrings(v, `${pre}.${k}`)); };
walkStrings(map.templates, 'templates');
walkStrings(map.selector, 'selector');
// template messages are matched with {placeholders} as wildcards
const templateRes = Object.values(map.templates || {}).map((t) => new RegExp(`^${t.replace(/[.*+?^$()|[\]\\]/g, '\\$&').replace(/\\?\{[a-z]+\\?\}/g, '.+')}$`));

// ---------- 3. rendered pages ----------
const { base, stop } = await startServer();
const sitemap = await sitemapPaths(base);
const queue = [...sitemap, '/404-probe/'];
const visited = new Set();
const pageMsg = new Map();
while (queue.length) {
  const p = queue.shift();
  if (visited.has(p)) continue;
  visited.add(p);
  const r = await fetchText(`${base}${p}`);
  if (r.status !== 200 && p !== '/404-probe/') { fail(p, `status ${r.status}`); continue; }
  const $ = load(r.text);
  const texts = new Set(); let ctas = 0;
  $('a[href]').each((_, a) => {
    const href = $(a).attr('href');
    if (/^\/[a-z0-9-/]*$/.test(href) && !visited.has(href) && !queue.includes(href)) queue.push(href);
    if (!/wa\.me|whatsapp\.com/.test(href)) return;
    ctas++;
    const wa = parseWa(href);
    if (!wa) { fail(p, `unparseable WhatsApp link ${href}`); return; }
    if (wa.number !== NUMBER) fail(p, `WhatsApp number ${wa.number}`);
    checkMessage(p, wa.text);
    const known = seen.has(wa.text) || templateRes.some((re) => re.test(wa.text || ''));
    if (!known) fail(p, `WhatsApp message not in the map: "${(wa.text || '').slice(0, 80)}"`);
    texts.add(wa.text);
  });
  const indexable = sitemap.includes(p);
  if (indexable && !ctas) fail(p, 'no WhatsApp CTA');
  if (indexable && !(p in (map.pages || {})) && ![...texts].some((t) => templateRes.some((re) => re.test(t)))) fail(p, 'page has no entry in whatsapp.json');
  if (texts.size > 1) fail(p, `${texts.size} different WhatsApp messages on one page`);
  for (const t of texts) {
    if (pageMsg.has(t) && pageMsg.get(t) !== p) fail(p, `WhatsApp message shared with ${pageMsg.get(t)}`);
    pageMsg.set(t, p);
  }
  const $t = load(r.text); $t('script,style').remove();
  for (const m of $t('body').text().matchAll(PY_MOBILE_RE)) if (m[0].replace(/\D/g, '').replace(/^0/, '595') !== NUMBER) fail(p, `visible number "${m[0]}"`);
}

// ---------- 4. project selector hand-off ----------
if (map.selector && Object.keys(map.selector).length) {
  const t = Math.floor(Date.now() / 1000) - 10;
  const body = new URLSearchParams({ source: 'proyecto', t: String(t), tipo: Object.keys(map.selector.tipo || {})[0] || '', terreno: Object.keys(map.selector.terreno || {})[0] || '', zona: Object.keys(map.selector.zona || {})[0] || '', _dry: '1' });
  const r = await fetchText(`${base}/enviar.php`, { method: 'POST', body, redirect: 'manual', headers: { 'content-type': 'application/x-www-form-urlencoded', 'x-arq-dry-run': '1' } });
  const wa = r.headers.location ? parseWa(r.headers.location) : null;
  if (r.status !== 303 || !wa) fail('selector', `POST enviar.php → ${r.status} ${r.headers.location || ''} (expected 303 to wa.me)`);
  else {
    if (wa.number !== NUMBER) fail('selector', `hand-off number ${wa.number}`);
    checkMessage('selector hand-off', wa.text);
  }
}
stop();

const uniq = [...new Set(fails)];
if (uniq.length) { console.log(`check-wa: FAIL (${uniq.length})\n  ${uniq.join('\n  ')}`); process.exit(1); }
console.log(`check-wa: OK — ${visited.size} pages, ${pageMsg.size} distinct messages, number ${NUMBER}`);
