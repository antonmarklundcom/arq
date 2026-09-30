// Shared helpers for the QA tools of arq.com.py (PHP site, no build step).
// Local runs start `php -S 127.0.0.1:<port> router.php` and fetch pages from
// it, so every check sees the same HTML the server renders. Live runs fetch
// the public site; they honour HTTPS_PROXY when Node is started with
// NODE_USE_ENV_PROXY=1 (Node 22+).
import fs from 'node:fs';
import path from 'node:path';
import net from 'node:net';
import { spawn } from 'node:child_process';
import { fileURLToPath } from 'node:url';
import * as cheerio from 'cheerio';

export const ORIGIN = 'https://arq.com.py';
export const HOST = 'arq.com.py';
// Default WhatsApp number (includes/config.php fallback). See docs/owner-todo.md.
export const NUMBER = '595992279599';
export const TEL = '+595992279599';
export const DISPLAY = '+595 992 279 599';

export const TOOLS_DIR = path.dirname(fileURLToPath(import.meta.url));
export const REPO_ROOT = path.resolve(TOOLS_DIR, '..');

export const isLive = (src) => /^https?:\/\//.test(src) && !/^https?:\/\/(127\.0\.0\.1|localhost)/.test(src);

export const args = (argv = process.argv.slice(2)) => Object.fromEntries(argv.filter((a) => a.startsWith('--')).map((a) => { const [k, ...v] = a.replace(/^--/, '').split('='); return [k, v.length ? v.join('=') : true]; }));

export async function fetchText(url, opts = {}) {
  const res = await fetch(url, { method: opts.method || (opts.head ? 'HEAD' : 'GET'), body: opts.body, headers: { 'user-agent': 'arq-qa/1.0', ...(opts.headers || {}) }, redirect: opts.redirect || 'follow' });
  const text = opts.head ? (await res.arrayBuffer(), '') : await res.text();
  return { status: res.status, url: res.url, headers: Object.fromEntries(res.headers), text };
}

const portFree = (port) => new Promise((res) => { const s = net.createServer().once('error', () => res(false)).once('listening', () => s.close(() => res(true))).listen(port, '127.0.0.1'); });

// Start the PHP dev server on a free port. Returns { base, stop }.
// If ARQ_BASE is set (e.g. an already running server) it is used as is.
export async function startServer(port = Number(process.env.ARQ_PORT || 8790)) {
  if (process.env.ARQ_BASE) return { base: process.env.ARQ_BASE.replace(/\/$/, ''), stop: () => {} };
  while (!(await portFree(port))) port++;
  const proc = spawn('php', ['-S', `127.0.0.1:${port}`, 'router.php'], { cwd: REPO_ROOT, stdio: 'ignore' });
  const base = `http://127.0.0.1:${port}`;
  for (let i = 0; i < 60; i++) {
    await new Promise((r) => setTimeout(r, 150));
    try { const r = await fetch(`${base}/robots.txt`); if (r.ok) break; } catch { /* not up yet */ }
  }
  return { base, stop: () => proc.kill() };
}

// Sitemap paths, in sitemap order, from a base URL (local server or live).
export async function sitemapPaths(base) {
  const xml = (await fetchText(`${base.replace(/\/$/, '')}/sitemap.xml`)).text;
  return [...xml.matchAll(/<loc>([^<]+)<\/loc>/g)].map((m) => new URL(m[1]).pathname);
}

export async function loadPage(base, p) {
  const r = await fetchText(`${base.replace(/\/$/, '')}${p}`);
  return { status: r.status, html: r.text, headers: r.headers, finalUrl: r.url };
}

export const load = (html) => cheerio.load(html);

export const words = (text) => (text || '').replace(/\s+/g, ' ').trim().split(' ').filter(Boolean).length;

// Internal path for an href, or null when it is external / not a page link.
export function normInternal(href, base = ORIGIN) {
  if (!href) return null;
  if (/^(mailto:|tel:|javascript:|#|data:)/i.test(href)) return null;
  let u;
  try { u = new URL(href, `${base}/`); } catch { return null; }
  const host = u.hostname.replace(/^www\./, '');
  if (host !== HOST && !(u.hostname === '127.0.0.1' || u.hostname === 'localhost')) return null;
  return u.pathname;
}

export function jsonLdBlocks($) {
  const out = [];
  $('script[type="application/ld+json"]').each((_, el) => {
    const raw = $(el).contents().text();
    try { out.push({ ok: true, data: JSON.parse(raw) }); } catch (e) { out.push({ ok: false, error: e.message }); }
  });
  return out;
}

export function collectSchema(node, types = new Set(), phones = []) {
  if (Array.isArray(node)) { node.forEach((n) => collectSchema(n, types, phones)); return { types, phones }; }
  if (node && typeof node === 'object') {
    const t = node['@type'];
    if (t) (Array.isArray(t) ? t : [t]).forEach((x) => types.add(x));
    if (typeof node.telephone === 'string') phones.push(node.telephone);
    Object.values(node).forEach((v) => collectSchema(v, types, phones));
  }
  return { types, phones };
}

// wa.me / api.whatsapp.com links → { number, text }
export function parseWa(href) {
  let u;
  try { u = new URL(href); } catch { return null; }
  if (u.hostname === 'wa.me') return { number: u.pathname.replace(/\//g, ''), text: u.searchParams.get('text') };
  if (/whatsapp\.com$/.test(u.hostname)) return { number: u.searchParams.get('phone') || '', text: u.searchParams.get('text') };
  return null;
}

export function walk(dir, skip = new Set(['.git', 'node_modules', 'audit-shots', 'storage'])) {
  const out = [];
  for (const e of fs.readdirSync(dir, { withFileTypes: true })) {
    if (skip.has(e.name)) continue;
    const p = path.join(dir, e.name);
    if (e.isDirectory()) out.push(...walk(p, skip));
    else out.push(p);
  }
  return out;
}

export const PHONE_DISPLAY_RE = /\+?595[\s\d]{9,14}\d/g;
// Paraguayan mobile numbers: 595 9xx xxx xxx or 09xx xxx xxx
export const PY_MOBILE_RE = /(?<![\d/=])(?:\+?595[\s-]?9\d{2}|09\d{2})[\s-]?\d{3}[\s-]?\d{3}(?!\d)/g;
