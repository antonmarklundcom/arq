#!/usr/bin/env node
// Link check against the PHP dev server. Internal: every <a href>, src,
// srcset and <link href> on every sitemap page (plus /404-probe/ and the
// noindex example profiles) must answer 200 without a redirect — internal
// links point at canonical URLs. External (with --external): every
// cross-domain *.com.py link returns 200 (redirects followed).
// Usage: node tools/linkcheck.mjs [--external]
import { ORIGIN, HOST, startServer, sitemapPaths, load, fetchText, args } from './lib.mjs';

const opts = args();
const { base, stop } = await startServer();
const pages = [...await sitemapPaths(base), '/404-probe/'];
const broken = []; const moved = []; const ext = new Map(); const seen = new Map(); let checked = 0;
const queue = [...pages];
const visited = new Set();
while (queue.length) {
  const p = queue.shift();
  if (visited.has(p)) continue;
  visited.add(p);
  const r = await fetchText(`${base}${p}`);
  if (r.status !== 200 && p !== '/404-probe/') { broken.push(`${p}: page answers ${r.status}`); continue; }
  const $ = load(r.text);
  const refs = [];
  $('a[href],link[href]:not([rel=canonical]):not([rel=alternate])').each((_, e) => refs.push($(e).attr('href')));
  $('[src],[data-src],[poster]').each((_, e) => ['src', 'data-src', 'poster'].forEach((k) => $(e).attr(k) && refs.push($(e).attr(k))));
  $('[srcset]').each((_, e) => $(e).attr('srcset').split(',').forEach((s) => refs.push(s.trim().split(/\s+/)[0])));
  $('form[action]').each((_, e) => { const a = $(e).attr('action'); if (a && $(e).attr('method')?.toLowerCase() !== 'post') refs.push(a); });
  for (const href of refs) {
    if (!href || /^(#|mailto:|tel:|javascript:|data:)/.test(href)) continue;
    let u; try { u = new URL(href, `${ORIGIN}${p}`); } catch { broken.push(`${p}: bad URL ${href}`); continue; }
    if (u.hostname === HOST) {
      checked++;
      const t = u.pathname + u.search;
      if (!seen.has(t)) seen.set(t, await fetchText(`${base}${t}`, { redirect: 'manual', head: /\.(png|jpe?g|webp|avif|woff2?|svg|ico)$/i.test(u.pathname) }));
      const res = seen.get(t);
      if (res.status >= 300 && res.status < 400) moved.push(`${p}: ${href} → ${res.status} ${res.headers.location || ''}`);
      else if (res.status !== 200) broken.push(`${p}: ${href} (${res.status})`);
      // crawl noindex pages linked from the site too (example profiles, /gracias/)
      else if (!/\.[a-z0-9]+$/i.test(u.pathname) && !u.search && !visited.has(u.pathname)) queue.push(u.pathname);
    } else if (/\.com\.py$/.test(u.hostname)) {
      if (!ext.has(u.href)) ext.set(u.href, []);
      ext.get(u.href).push(p);
    }
  }
}
stop();
console.log(`linkcheck: ${checked} internal refs in ${visited.size} pages, ${broken.length} broken, ${moved.length} redirected`);
broken.forEach((b) => console.log(`  BROKEN ${b}`));
moved.forEach((b) => console.log(`  REDIRECT ${b}`));
let extBad = 0;
if (ext.size) {
  console.log(`cross-domain links: ${ext.size}`);
  for (const [u, from] of ext) {
    if (!opts.external) { console.log(`  (not fetched) ${u} ← ${[...new Set(from)].join(' ')}`); continue; }
    let st = 'ERR';
    try { st = (await fetchText(u)).status; } catch (e) { st = `ERR ${e.cause?.code || e.message}`; }
    if (st !== 200) extBad++;
    console.log(`  ${st} ${u} ← ${[...new Set(from)].join(' ')}`);
  }
}
if (broken.length || moved.length || extBad) process.exit(1);
