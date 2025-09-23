#!/data/data/com.termux/files/usr/bin/bash
set -euo pipefail

# Vérifie que l'URL est fournie en argument
if [ $# -lt 1 ]; then
  echo "Usage: $0 <URL> [dossier-sortie]"
  exit 1
fi

URL="$1"

# Dossier racine de sortie (stockage partagé Android)
OUT_ROOT="${2:-"$HOME/storage/shared/htdocs"}"

# Activer stockage partagé si nécessaire
if [ ! -d "$HOME/storage/shared" ]; then
  echo "Activation du stockage partagé Android..."
  termux-setup-storage
fi

# Extraire domaine depuis URL
DOMAIN="$(printf "%s" "$URL" | sed -E 's#https?://([^/]+)/?.*#\1#')"

# Construire chemin complet du dossier de sortie
OUT_DIR="$OUT_ROOT/$DOMAIN"

# Créer dossier s'il n'existe pas
if [ ! -d "$OUT_DIR" ]; then
  echo "Création du dossier : $OUT_DIR"
  mkdir -p "$OUT_DIR"
else
  echo "Le dossier existe déjà : $OUT_DIR"
fi

cd "$OUT_DIR"

echo "Début aspiration du site : $URL"
wget \
  --mirror \
  --page-requisites \
  --convert-links \
  --adjust-extension \
  --no-parent \
  "$URL"

echo "Aspiration terminée. Les fichiers sont dans : $OUT_DIR"
