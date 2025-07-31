#!/bin/bash

# === KONFIGURASI ===
ZIP_URL="https://github.com/kcepu877/ben/releases/download/ppob/mio_update_070625.zip"
ZIP_FILE="mio_update.zip"
EXTRACT_DIR="izinvps"
GITHUB_USERNAME="kcepu877"
GITHUB_TOKEN="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"  # Ganti dengan token kamu
REPO_NAME="izinvps"
REPO_URL="https://$GITHUB_USERNAME:$GITHUB_TOKEN@github.com/$GITHUB_USERNAME/$REPO_NAME.git"

# === CEK DEPENDENSI ===
command -v git >/dev/null 2>&1 || { echo >&2 "Git belum terinstal. Jalankan: sudo apt install git -y"; exit 1; }
command -v curl >/dev/null 2>&1 || { echo >&2 "curl belum terinstal. Jalankan: sudo apt install curl -y"; exit 1; }
command -v unzip >/dev/null 2>&1 || { echo >&2 "unzip belum terinstal. Jalankan: sudo apt install unzip -y"; exit 1; }

# === UNDUH ZIP ===
echo "📦 Mengunduh file ZIP..."
curl -L "$ZIP_URL" -o "$ZIP_FILE"

# === EKSTRAK ZIP ===
if [ -d "$EXTRACT_DIR" ]; then
    echo "🧹 Menghapus direktori lama '$EXTRACT_DIR'..."
    rm -rf "$EXTRACT_DIR"
fi

echo "🗃 Mengekstrak file ZIP..."
unzip "$ZIP_FILE" -d "$EXTRACT_DIR"

# === GIT INIT & PUSH ===
cd "$EXTRACT_DIR" || exit
echo "🔧 Inisialisasi Git dan push ke GitHub..."

git init
git remote add origin "$REPO_URL"
git add .
git commit -m "Initial commit dari ZIP"
git branch -M main
git push -u origin main

cd "$EXTRACT_DIR" || exit
echo "🔧 Inisialisasi Git dan push ke GitHub..."

git init

# Set nama dan email Git
git config user.name "kcepu877"
git config user.email "kcepu877@gmail.com"

git remote add origin "$REPO_URL"
git add .
git commit -m "Initial commit dari ZIP"
git branch -M main
git push -u origin main

echo "✅ Selesai! Semua file telah di-push ke GitHub."

