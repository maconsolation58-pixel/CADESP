#!/data/data/com.termux/files/usr/bin/bash

# Nom du fichier final
OUTPUT="fusion_projet.txt"

# Vider ou créer le fichier final
> "$OUTPUT"

# Parcourir récursivement tous les fichiers (sauf le fichier de sortie lui-même)
find . -type f ! -name "$(basename "$OUTPUT")" | while read -r file; do
    echo -e "\n\n=====================================" >> "$OUTPUT"
    echo ">>> $file" >> "$OUTPUT"
    echo "=====================================" >> "$OUTPUT"
    echo "" >> "$OUTPUT"

    # Ajouter le contenu brut du fichier (même si c’est binaire)
    cat "$file" >> "$OUTPUT"

    # Sauts de lignes après le contenu
    echo -e "\n\n\n" >> "$OUTPUT"
done

echo "✅ Fusion terminée ! Résultat : $OUTPUT"
