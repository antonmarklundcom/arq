#!/usr/bin/env bash
# All merge gates for arq.com.py, in order. Exit 1 if any fails.
# Usage: tools/gates.sh [--no-pw]
set -u
cd "$(dirname "$0")/.."
[ -d tools/node_modules ] || (cd tools && npm ci --silent)
fail=0
run() { echo; echo "=== $1"; shift; "$@" || { echo ">>> GATE FAILED: $*"; fail=1; }; }
run "verify.sh (php -l, rutas, SEO básico, anti-spam)" ./verify.sh
run "php -l" bash -c 'r=0; while IFS= read -r f; do php -l "$f" >/dev/null || { php -l "$f"; r=1; }; done < <(find . -name "*.php" -not -path "./.git/*" -not -path "./tools/node_modules/*"); [ $r = 0 ] && echo "php -l OK"; exit $r'
run "linkcheck" node tools/linkcheck.mjs
run "overlap" node tools/overlap.mjs
run "check-wa" node tools/check-wa.mjs
[ "${1:-}" = "--no-pw" ] || run "pw-check 1366 + 390" node tools/pw-check.mjs --strict
run "audit" node tools/audit.mjs local docs/audit/audit-after.json
run "seo-diff vs baseline" node tools/seo-diff.mjs docs/audit/audit-before.json docs/audit/audit-after.json
echo
[ "$fail" = 0 ] && echo "ALL GATES GREEN" || { echo "GATES FAILED"; exit 1; }
