#!/usr/bin/env bash
# Verifica sintaxis PHP, arranca el servidor y revisa cada URL del sitemap.
set -u
cd "$(dirname "$0")"
fail=0
PORT=${PORT:-8765}

echo "== php -l"
while IFS= read -r f; do
  out=$(php -l "$f" 2>&1) || { echo "$out"; fail=1; }
done < <(find . -name '*.php' -not -path './.git/*' -not -path './tools/node_modules/*')

echo "== servidor"
LOG=$(mktemp)
php -S "127.0.0.1:$PORT" router.php >"$LOG" 2>&1 &
PID=$!
trap 'kill $PID 2>/dev/null; rm -f "$LOG"' EXIT
for i in $(seq 1 30); do curl -s -o /dev/null "http://127.0.0.1:$PORT/robots.txt" && break; sleep 0.2; done

BASE="http://127.0.0.1:$PORT"
urls=$(curl -s "$BASE/sitemap.xml" | grep -o '<loc>[^<]*</loc>' | sed 's/<[^>]*>//g' | sed "s#^https\?://[^/]*##" | sed 's#^$#/#')
[ -n "$urls" ] || { echo "sitemap vacío"; fail=1; }

check() { # $1 path  $2 expected code
  local body code
  body=$(curl -s -w '\n%{http_code}' "$BASE$1"); code=${body##*$'\n'}; body=${body%$'\n'*}
  if [ "$code" != "$2" ]; then echo "FAIL $1 -> $code (esperado $2)"; fail=1; return; fi
  if echo "$body" | grep -qiE '(Notice|Warning|Deprecated|Fatal error|Parse error)</b>|^(Notice|Warning|Deprecated|Fatal error):'; then echo "FAIL $1 avisos PHP"; fail=1; return; fi
  case "$1" in /robots.txt) echo "ok  $1"; return;; esac
  if [[ "$body" == *"<title>"* ]]; then
    local t d
    t=$(echo "$body" | grep -o '<title>[^<]*' | head -1 | sed 's/<title>//' | python3 -c 'import sys,html;print(len(html.unescape(sys.stdin.read().strip())))')
    d=$(echo "$body" | grep -o 'name="description" content="[^"]*' | head -1 | sed 's/.*content="//' | python3 -c 'import sys,html;print(len(html.unescape(sys.stdin.read().strip())))')
    [ "$t" -le 60 ] || { echo "FAIL $1 título $t > 60"; fail=1; }
    { [ "$d" -ge 120 ] && [ "$d" -le 155 ]; } || { echo "FAIL $1 descripción $d fuera de 120-155"; fail=1; }
    echo "$body" | grep -q 'rel="canonical"' || { echo "FAIL $1 sin canonical"; fail=1; }
    echo "$body" | grep -q 'application/ld+json' || { echo "FAIL $1 sin JSON-LD"; fail=1; }
    [ "$(echo "$body" | grep -c '<h1')" = 1 ] || { echo "FAIL $1 h1 != 1"; fail=1; }
  fi
  echo "ok  $1 ($code)"
}

for u in $urls; do
  case "$u" in */) ;; *) echo "FAIL sitemap sin barra final: $u"; fail=1;; esac
  check "$u" 200
done
check /404-inexistente/ 404
check /obras/estudio-x/ 404
for u in /gracias/ /arquitectos/estudio-ejemplo-uno/ /obras/casa-ejemplo-ladrillo/ "/obras/?ciudad=Asunci%C3%B3n" /robots.txt; do check "$u" 200; done

echo "== 301"
redir() { # $1 desde  $2 hacia
  local out; out=$(curl -s -o /dev/null -w '%{http_code} %{redirect_url}' "$BASE$1")
  [ "$out" = "301 $BASE$2" ] && echo "ok  301 $1 -> $2" || { echo "FAIL $1 -> $out (esperado 301 $2)"; fail=1; }
}
while IFS=$'\t' read -r from to; do redir "$from" "$to"; redir "${from%/}" "$to"; done < <(php -r 'require "includes/routes.php"; foreach (redirects() as $f => $t) echo "$f\t$t\n";')
redir /obras /obras/
redir /arquitectos /arquitectos/
redir /servicios/calculo-estructural /servicios/calculo-estructural/
echo "== .htaccess y routes.php tienen las mismas 301"
while IFS=$'\t' read -r from to; do
  f=${from#/}; f=${f%/}
  grep -qF "RewriteRule ^$f/?\$ $to [R=301,L]" .htaccess || { echo "FAIL falta en .htaccess: $from -> $to"; fail=1; }
done < <(php -r 'require "includes/routes.php"; foreach (redirects() as $f => $t) echo "$f\t$t\n";')
[ "$(grep -cE '^RewriteRule \^[a-z0-9-]+/\?\$ ' .htaccess)" = "$(php -r 'require "includes/routes.php"; echo count(redirects());')" ] || { echo "FAIL .htaccess tiene 301 que no están en routes.php"; fail=1; }

echo "== archivos privados -> 403"
for u in /pages/home.php /includes/config.php /includes/data/whatsapp.json /tools/package.json /docs/owner-todo.md /PLAN.md /app.php; do
  code=$(curl -s -o /dev/null -w '%{http_code}' "$BASE$u")
  [ "$code" = 403 ] || [ "$code" = 404 ] || { echo "FAIL $u -> $code"; fail=1; }
done

echo "== POST (servidor de desarrollo, sin escribir: X-Arq-Dry-Run)"
T=$(( $(date +%s) - 10 ))
post() { curl -s -o /dev/null -w '%{http_code} %{redirect_url}' -H 'X-Arq-Dry-Run: 1' -d "$1" "$BASE/enviar.php"; }
out=$(post 'website=x&t=1&nombre=a&telefono=1'); [ "${out%% *}" = 303 ] || { echo "FAIL honeypot $out"; fail=1; }
out=$(post "t=$T&source=proyecto&terreno=si"); [ "${out%% *}" = 422 ] || { echo "FAIL selector sin tipo $out"; fail=1; }
out=$(post "t=$T&source=proyecto&tipo=casa-nueva&terreno=si&zona=gran-asuncion")
case "$out" in "303 https://wa.me/595992279599?text="*) echo "ok  selector -> WhatsApp";; *) echo "FAIL selector $out"; fail=1;; esac
out=$(post "t=$T&source=contacto&tipo=otro"); case "$out" in "303 https://wa.me/"*) echo "ok  source=contacto viejo -> selector";; *) echo "FAIL contacto viejo $out"; fail=1;; esac
out=$(post "t=$T&source=postulate&nombre=&telefono=1"); [ "${out%% *}" = 422 ] || { echo "FAIL postulate sin nombre $out"; fail=1; }
out=$(post "t=$T&source=postulate&nombre=Ana&telefono=021000000&estudio=Estudio"); [ "$out" = "303 $BASE/gracias/" ] || { echo "FAIL postulate $out"; fail=1; }

grep -qiE 'Notice|Warning|Deprecated|Fatal' "$LOG" && { echo "FAIL avisos en log del servidor:"; grep -iE 'Notice|Warning|Deprecated|Fatal' "$LOG"; fail=1; }

[ "$fail" = 0 ] && echo "VERIFY OK" || { echo "VERIFY FALLÓ"; exit 1; }
