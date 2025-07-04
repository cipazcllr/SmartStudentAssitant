<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_nugas";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_POST['id'];
$stmt = $conn->prepare("DELETE FROM jadwal WHERE id = ?");
$stmt->bind_param("i", $id);

echo $stmt->execute() ? "success" : "Gagal: " . $stmt->error;

$stmt->close();
$conn->close();
?>
