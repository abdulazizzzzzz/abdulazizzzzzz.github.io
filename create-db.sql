-- Buat database
CREATE DATABASE kelompok1;

-- Gunakan database yang baru dibuat
USE kelompok1;

-- Buat tabel untuk menyimpan data kontak
CREATE TABLE kontak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pesan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);