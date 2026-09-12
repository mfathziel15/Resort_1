<?php
$host = '127.0.0.1';
$user = 'root';      // Sesuaikan username database Anda (biasanya root)
$pass = 'root';          // Sesuaikan password database Anda (kosongkan jika default)
$db   = 'aura_db';   // Nama database sesuai skrip setup.sql

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
