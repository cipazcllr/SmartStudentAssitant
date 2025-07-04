<?php
$koneksi = new mysqli("localhost", "root", "", "db_nugas");
$id = $_POST['id'];
$status = $_POST['status'];

$query = "UPDATE jadwal SET status=? WHERE id=?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("si", $status, $id);
if ($stmt->execute()) echo "success";
else echo "error";
?>
