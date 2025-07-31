#!/bin/bash

# === Input Username & Token ===
read -p "GitHub Username: " GITHUB_USERNAME
read -sp "GitHub Token: " GITHUB_TOKEN
echo

REPO_NAME="izinvps"
REPO_URL="https://$GITHUB_TOKEN@github.com/$GITHUB_USERNAME/$REPO_NAME.git"
ZIP_URL="https://github.com/kcepu877/ben/releases/download/ppob/mio_update_070625.zip"
ZIP_FILE="mio_update.zip"
EXTRACT_DIR="mio_update"

# === Cek tools ===
for cmd in git curl unzip; do
    if ! command -v $cmd >/dev/null 2>&1; then
        echo "Perintah '$cmd' belum tersedia. Install dulu: sudo apt install $cmd -y"
        exit 1
    fi
done

# === Unduh ZIP ===
echo "📦 Mengunduh ZIP..."
curl -L "$ZIP_URL" -o "$ZIP_FILE"

# === Ekstrak ZIP ===
[ -d "$EXTRACT_DIR" ] && rm -rf "$EXTRACT_DIR"
unzip "$ZIP_FILE" -d "$EXTRACT_DIR"

# === Git setup & push ===
cd "$EXTRACT_DIR" || exit 1
git init
git config user.name "$GITHUB_USERNAME"
git config user.email "$GITHUB_USERNAME@gmail.com"
git remote add origin "$REPO_URL"
git add .
git commit -m "Initial commit from ZIP"
git branch -M main

# === Push ===
if git push -u origin main; then
    echo "✅ Berhasil push ke GitHub repo '$REPO_NAME'"
else
    echo "❌ Gagal push. Cek token atau permission kamu."
fi
