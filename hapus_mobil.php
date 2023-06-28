<?php
include "koneksi.php";


// menangkap data id yang di kirim dari url
$id = $_GET['id_mobil'];
// menghapus data dari database
$sql = "DELETE from mobil where id_mobil='$id'";
$result = $conn->query($sql);
// mysqli_query($konek,"delete from menu where idmenu='$id'");
// mengalihkan halaman kembali ke index.php
header("location:mobil.php");
?>