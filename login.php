<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_nugas";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$email = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $user = $result->fetch_assoc();

  if (password_verify($password, $user['password'])) {
    echo "success";
  } else {
    echo "error";
  }
} else {
  echo "error";
}

$stmt->close();
$conn->close();
?>
