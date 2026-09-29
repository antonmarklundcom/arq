#!/usr/bin/env bash
# Verifica sintaxis PHP, arranca el servidor y revisa cada URL del sitemap.
set -u
cd "$(dirname "$0")"
fail=0
PORT=${PORT:-8765}

echo "== php -l"
while IFS= read -r f; do
  out=$(php -l "$f" 2>&1) || { echo "$out"; fail=1; }
done < <(find . -name '*.php' -not -path './.git/*')

echo "== servidor"
LOG=$(mktemp)
php -S "127.0.0.1:$PORT" router.php >"$LOG" 2>&1 &
PID=$!
trap 'kill $PID 2>/dev/null; rm -f "$LOG"' EXIT
for i in $(seq 1 30); do curl -s -o /dev/null "http://127.0.0.1:$PORT/robots.txt" && break; sleep 0.2; done

BASE="http://127.0.0.1:$PORT"
urls=$(curl -s "$BASE/sitemap.xml" | grep -o '<loc>[^<]*</loc>' | sed 's/<[^>]*>//g' | sed "s#^https\?://[^/]*##" | sed 's#^$#/#')
[ -n "$urls" ] || { echo "sitemap vacío"; fail=1; }
extra="/gracias /404-inexistente /obras/estudio-x /arquitectos/estudio-ejemplo-uno /obras/casa-ejemplo-ladrillo /obras?ciudad=Asunci%C3%B3n /robots.txt"

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

for u in $urls; do check "$u" 200; done
check /404-inexistente 404
check /obras/estudio-x 404
for u in /gracias /arquitectos/estudio-ejemplo-uno /obras/casa-ejemplo-ladrillo "/obras?ciudad=Asunci%C3%B3n" /robots.txt; do check "$u" 200; done

echo "== POST anti-spam (honeypot -> /gracias, sin escribir)"
code=$(curl -s -o /dev/null -w '%{http_code}' -d 'website=x&t=1&nombre=a&telefono=1' "$BASE/enviar.php")
[ "$code" = 303 ] || { echo "FAIL honeypot $code"; fail=1; }
code=$(curl -s -o /dev/null -w '%{http_code}' -d "t=$(( $(date +%s) - 10 ))&nombre=&telefono=1&source=contacto" "$BASE/enviar.php")
[ "$code" = 422 ] || { echo "FAIL validación $code"; fail=1; }

grep -qiE 'Notice|Warning|Deprecated|Fatal' "$LOG" && { echo "FAIL avisos en log del servidor:"; grep -iE 'Notice|Warning|Deprecated|Fatal' "$LOG"; fail=1; }

[ "$fail" = 0 ] && echo "VERIFY OK" || { echo "VERIFY FALLÓ"; exit 1; }
