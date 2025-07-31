#!/bin/bash

# === Input User ===
read -p "GitHub Username: " GITHUB_USERNAME
read -sp "GitHub Token: " GITHUB_TOKEN
echo

REPO_NAME="izinvps"
REPO_URL="https://$GITHUB_TOKEN@github.com/$GITHUB_USERNAME/$REPO_NAME.git"

ZIP_URL="https://github.com/kcepu877/ben/releases/download/ppob/mio_update_070625.zip"
ZIP_FILE="mio_update.zip"
EXTRACT_DIR="mio_update"

# === Cek dependencies ===
for cmd in git curl unzip; do
  if ! command -v $cmd &> /dev/null; then
    echo "Perintah '$cmd' belum terinstal. Install dengan: sudo apt install $cmd -y"
    exit 1
  fi
done

echo "Mengunduh ZIP..."
curl -L "$ZIP_URL" -o "$ZIP_FILE"

if [ -d "$EXTRACT_DIR" ]; then
  echo "Menghapus direktori lama $EXTRACT_DIR..."
  rm -rf "$EXTRACT_DIR"
fi

echo "Mengekstrak ZIP..."
unzip "$ZIP_FILE" -d "$EXTRACT_DIR"

cd "$EXTRACT_DIR" || exit 1
git init
git config user.name "$GITHUB_USERNAME"
git config user.email "$GITHUB_USERNAME@example.com"
git remote add origin "$REPO_URL"
git add .
git commit -m "Initial commit from ZIP"
git branch -M main
git push -u origin main

echo "Selesai! File berhasil di-push ke repo $REPO_NAME."
