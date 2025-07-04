<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_nugas";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$waktu = $_POST['waktu'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$stmt = $conn->prepare("INSERT INTO jadwal (judul, tanggal, waktu, kategori, deskripsi) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $judul, $tanggal, $waktu, $kategori, $deskripsi);

echo $stmt->execute() ? "success" : "Gagal: " . $stmt->error;

$stmt->close();
$conn->close();
?>
