#!/data/data/com.termux/files/usr/bin/bash
set -euo pipefail

# Vérifie que l'URL est donnée en paramètre
if [ $# -lt 1 ]; then
  echo "Usage: $0 <URL> [dossier-sortie]"
  exit 1
fi

URL="$1"

# Dossier racine de sortie dans le stockage partagé
OUT_ROOT="${2:-"$HOME/storage/shared/htdocs"}"

# Active l'accès au stockage partagé si pas déjà fait
if [ ! -d "$HOME/storage/shared" ]; then
  echo "Activation du stockage partagé Android..."
  termux-setup-storage
fi

# Extrait le nom de domaine de l'URL (ex: monexemple.org)
DOMAIN="$(printf "%s" "$URL" | sed -E 's#https?://([^/]+)/?.*#\1#')"

# Chemin complet du dossier où les fichiers seront sauvegardés
OUT_DIR="$OUT_ROOT/$DOMAIN"
mkdir -p "$OUT_DIR"
cd "$OUT_DIR"

echo "Démarrage du miroir pour : $URL"
echo "Les fichiers seront sauvegardés dans : $OUT_DIR"

# Lance wget avec options miroir
wget \
  --mirror \               # mode miroir (récursif avec timestamps)
  --page-requisites \      # télécharge CSS, images, JS nécessaires
  --convert-links \        # convertit les liens pour lecture hors‑ligne
  --adjust-extension \     # ajoute l’extension .html aux pages
  --no-parent \            # restreint à la hiérarchie de base du site
  "$URL"

echo "Miroir terminé. Consultez les fichiers dans : $OUT_DIR"
