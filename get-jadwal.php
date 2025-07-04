<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_nugas";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$query = "SELECT * FROM jadwal WHERE kategori = 'jadwal' ORDER BY tanggal, waktu";
$result = $conn->query($query);

$jadwal = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $jadwal[] = $row;
  }
}

header('Content-Type: application/json');
echo json_encode($jadwal);
$conn->close();
?>
