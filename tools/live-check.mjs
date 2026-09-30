#!/usr/bin/env node
// Live check after every merge/deploy.
// - every sitemap URL (from the local repo) returns 200 live, title equals the
//   locally rendered title, canonical is self, HTML carries the WhatsApp number
// - /no-existe/ returns 404; each 301 in docs/audit/redirects.tsv answers 301
// - non-public files return 403 or 404
// Usage: NODE_USE_ENV_PROXY=1 node tools/live-check.mjs [https://arq.com.py]
import fs from 'node:fs';
import path from 'node:path';
import { REPO_ROOT, ORIGIN, NUMBER, startServer, sitemapPaths, load, fetchText } from './lib.mjs';

const base = (process.argv[2] || ORIGIN).replace(/\/$/, '');
const fails = []; const lines = [];
const ok = (cond, msg) => { lines.push(`${cond ? 'OK  ' : 'FAIL'} ${msg}`); if (!cond) fails.push(msg); };

let probe;
try { probe = await fetchText(`${base}/`); } catch (e) {
  console.log(`live-check: NOT RUN — ${base} unreachable (${e.cause?.code || e.message}). Allow the host in the environment network settings.`);
  process.exit(2);
}
if (probe.status === 403 && !/<html/i.test(probe.text)) {
  console.log(`live-check: NOT RUN — egress proxy answered 403 for ${base}`);
  process.exit(2);
}

const local = await startServer();
const paths = await sitemapPaths(local.base);
for (const p of paths) {
  let r;
  try { r = await fetchText(`${base}${p}`); } catch (e) { ok(false, `${p} fetch error ${e.message}`); continue; }
  const $ = load(r.text);
  const repoTitle = load((await fetchText(`${local.base}${p}`)).text)('head title').text().trim();
  const liveTitle = $('head title').text().trim();
  const canon = $('link[rel="canonical"]').attr('href');
  const probs = [];
  if (r.status !== 200) probs.push(`status ${r.status}`);
  if (liveTitle !== repoTitle) probs.push(`title "${liveTitle}" ≠ repo "${repoTitle}"`);
  if (canon !== `${ORIGIN}${p}`) probs.push(`canonical ${canon}`);
  if (!r.text.includes(NUMBER)) probs.push('WhatsApp number missing (is WHATSAPP_NUMBER set to another number in .env?)');
  ok(!probs.length, `${p} ${probs.join('; ') || '200, title, canonical, number'}`);
}
local.stop();
const nf = await fetchText(`${base}/no-existe/`);
ok(nf.status === 404, `/no-existe/ → ${nf.status}`);
const redirFile = path.join(REPO_ROOT, 'docs/audit/redirects.tsv');
if (fs.existsSync(redirFile)) {
  for (const l of fs.readFileSync(redirFile, 'utf8').split('\n').filter((x) => x.trim() && !x.startsWith('#'))) {
    const [from, to] = l.split('\t').map((x) => x.trim());
    const r = await fetchText(`${base}${from}`, { redirect: 'manual' });
    const loc = (r.headers.location || '').replace(base, '').replace(ORIGIN, '');
    ok(r.status === 301 && loc === to, `301 ${from} → ${r.status} ${loc}`);
  }
}
for (const p of ['/docs/owner-todo.md', '/includes/config.php', '/includes/data/whatsapp.json', '/storage/leads.csv', '/tools/package.json', '/PLAN.md', '/.git/HEAD', '/.env', '/router.php', '/verify.sh', '/pages/como-funciona.php']) {
  const r = await fetchText(`${base}${p}`, { redirect: 'manual' });
  ok([403, 404].includes(r.status), `${p} → ${r.status}`);
}
try {
  const www = await fetchText(base.replace('://', '://www.') + '/', { redirect: 'manual' });
  lines.push(`info www → ${www.status} ${www.headers.location || ''}`);
} catch (e) { lines.push(`info www → error ${e.cause?.code || e.message}`); }
lines.push(`info headers /: ${['server', 'content-type', 'cache-control', 'x-content-type-options', 'x-frame-options', 'referrer-policy', 'strict-transport-security'].map((h) => `${h}=${probe.headers[h] ?? '-'}`).join(' ')}`);

console.log(lines.join('\n'));
console.log(`\nlive-check: ${fails.length ? `FAIL (${fails.length})` : 'OK'}`);
process.exit(fails.length ? 1 : 0);
