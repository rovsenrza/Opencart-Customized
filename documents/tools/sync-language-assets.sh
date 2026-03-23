#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

MYSQL_BIN="${MYSQL_BIN:-/Applications/MAMP/Library/bin/mysql80/bin/mysql}"
DB_HOST="${DB_HOST:-localhost}"
DB_PORT="${DB_PORT:-8889}"
DB_USER="${DB_USER:-root}"
DB_PASS="${DB_PASS:-root}"
DB_NAME="${DB_NAME:-opencart}"

CATALOG_LANG_DIR="$ROOT_DIR/catalog/language"
ADMIN_LANG_DIR="$ROOT_DIR/admin/language"
SOURCE_CODE="${SOURCE_CODE:-en-gb}"
TMP_LIST="/tmp/oc_languages.tsv"

if ! command -v curl >/dev/null 2>&1; then
  echo "curl is required"
  exit 1
fi

if ! command -v jq >/dev/null 2>&1; then
  echo "jq is required"
  exit 1
fi

if [ ! -x "$MYSQL_BIN" ]; then
  echo "mysql binary not found: $MYSQL_BIN"
  exit 1
fi

"$MYSQL_BIN" -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USER" -p"$DB_PASS" -D "$DB_NAME" -N \
  -e "SELECT code, locale, extension FROM oc_language WHERE status = 1 ORDER BY sort_order, name;" > "$TMP_LIST"

while IFS=$'\t' read -r code locale extension; do
  [ -z "$code" ] && continue

  if [ -n "${extension:-}" ] && [ "$extension" != "NULL" ]; then
    continue
  fi

  if [ ! -d "$CATALOG_LANG_DIR/$code" ]; then
    cp -R "$CATALOG_LANG_DIR/$SOURCE_CODE" "$CATALOG_LANG_DIR/$code"
  fi

  if [ ! -d "$ADMIN_LANG_DIR/$code" ]; then
    cp -R "$ADMIN_LANG_DIR/$SOURCE_CODE" "$ADMIN_LANG_DIR/$code"
  fi

  cc="${code##*-}"

  if [ "$cc" = "$code" ] && [ -n "${locale:-}" ]; then
    primary_locale="${locale%%,*}"

    if [ "${primary_locale#*_}" != "$primary_locale" ]; then
      cc="${primary_locale##*_}"
    fi
  fi

  cc="$(printf '%s' "$cc" | tr '[:upper:]' '[:lower:]')"

  if ! printf '%s' "$cc" | grep -Eq '^[a-z]{2}$'; then
    continue
  fi

  tmp_flag="/tmp/oc-flag-${code}.png"
  api_url="https://restcountries.com/v3.1/alpha/${cc}?fields=flags"
  flag_url="$(curl -L -s --fail "$api_url" | jq -r '(if type=="array" then .[0].flags.png else .flags.png end) // empty' || true)"

  if [ -n "$flag_url" ]; then
    curl -L -s --fail "$flag_url" -o "$tmp_flag" || true
  fi

  if [ ! -s "$tmp_flag" ]; then
    curl -L -s --fail "https://flagcdn.com/w40/${cc}.png" -o "$tmp_flag" || true
  fi

  if [ -s "$tmp_flag" ]; then
    sips -z 10 20 "$tmp_flag" >/dev/null 2>&1 || true
    cp "$tmp_flag" "$CATALOG_LANG_DIR/$code/$code.png"
    cp "$tmp_flag" "$ADMIN_LANG_DIR/$code/$code.png"
  fi
done < "$TMP_LIST"

while IFS=$'\t' read -r code locale extension; do
  [ -z "$code" ] && continue

  if [ -n "${extension:-}" ] && [ "$extension" != "NULL" ]; then
    continue
  fi

  cdim="$(sips -g pixelWidth -g pixelHeight "$CATALOG_LANG_DIR/$code/$code.png" 2>/dev/null | awk '/pixelWidth/{w=$2}/pixelHeight/{h=$2} END{if(w&&h) print w"x"h; else print "missing"}')"
  adim="$(sips -g pixelWidth -g pixelHeight "$ADMIN_LANG_DIR/$code/$code.png" 2>/dev/null | awk '/pixelWidth/{w=$2}/pixelHeight/{h=$2} END{if(w&&h) print w"x"h; else print "missing"}')"

  echo "$code catalog:$cdim admin:$adim"
done < "$TMP_LIST"

