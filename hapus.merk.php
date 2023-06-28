<?php
include "koneksi.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// menangkap data id yang di kirim dari url
$id = $_GET['id_merk'];
// menghapus data dari database
$sql = "DELETE from merk where id_merk='$id'";
$result = $conn->query($sql);
// mysqli_query($konek,"delete from menu where idmenu='$id'");
// mengalihkan halaman kembali ke index.php
header("location:merk.php");
?>