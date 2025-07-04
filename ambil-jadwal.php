<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_nugas";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM jadwal ORDER BY tanggal, waktu");
$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
