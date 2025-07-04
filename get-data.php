<?php
header('Content-Type: application/json');

$host = 'localhost'; // atau sesuaikan
$user = 'root';      // ganti jika perlu
$pass = '';          // ganti jika perlu
$db   = 'db_nugas';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo json_encode([]);
    exit();
}

$query = "SELECT id, judul, deskripsi, tanggal, waktu, kategori FROM jadwal";
$result = $conn->query($query);

$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'judul' => $row['judul'],
            'deskripsi' => $row['deskripsi'],
            'tanggal' => $row['tanggal'],
            'waktu' => $row['waktu'],
            'kategori' => strtolower($row['kategori']) // pastikan lowercase agar cocok dengan JS
        ];
    }
}

echo json_encode($data);
$conn->close();
?>
