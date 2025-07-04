<?php
$koneksi = new mysqli("localhost", "root", "", "db_nugas");
if ($koneksi->connect_error) {
  echo json_encode([]);
  exit();
}

$sql = "SELECT * FROM jadwal";
$result = $koneksi->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

echo json_encode($data);
?>
