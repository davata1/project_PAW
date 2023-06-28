<?php
include "koneksi.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// menangkap data id yang di kirim dari url
$id = $_GET['id_mobil'];
// menghapus data dari database
$sql = "UPDATE mobil set status='tersedia' WHERE id_mobil=$id";
$result = $conn->query($sql);
// mysqli_query($konek,"delete from menu where idmenu='$id'");
// mengalihkan halaman kembali ke index.php
header("location:mobil.php");
?>