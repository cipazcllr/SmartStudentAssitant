<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_nugas";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari POST
$nama = $_POST['nama'] ?? '';
$nim = $_POST['nim'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi input kosong
if (empty($nama) || empty($nim) || empty($email) || empty($password)) {
  echo "Semua kolom wajib diisi.";
  exit;
}

// Cek apakah email sudah terdaftar
$cek = $conn->prepare("SELECT id FROM login WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
  echo "Email sudah terdaftar.";
  $cek->close();
  $conn->close();
  exit;
}
$cek->close();

// Enkripsi password
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Insert ke database
$stmt = $conn->prepare("INSERT INTO login (nama, nim, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $nim, $email, $password_hashed);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "Gagal menyimpan ke database.";
}

$stmt->close();
$conn->close();
?>
