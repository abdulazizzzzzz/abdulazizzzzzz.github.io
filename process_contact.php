<?php
// Mulai session
session_start();

// Koneksi ke database
$host = 'localhost'; // Ganti dengan host Anda jika berbeda
$dbname = 'kelompok1'; // Ubah nama database di sini
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pesan = htmlspecialchars(trim($_POST['pesan']));

    // Siapkan dan eksekusi query
    $stmt = $pdo->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (:nama, :email, :pesan)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pesan', $pesan);

    if ($stmt->execute()) {
        // Set session untuk sukses
        $_SESSION['message'] = "Pesan berhasil dikirim!";
    } else {
        $_SESSION['message'] = "Terjadi kesalahan saat mengirim pesan.";
    }

    // Redirect kembali ke halaman kontak
    header("Location: index.php"); // Ganti dengan nama file halaman utama Anda
    exit();
}
?>