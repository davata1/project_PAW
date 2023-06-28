<?php
include "koneksi.php";

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['id_supir']))
{ 
  $id=$_POST['id_supir'];
  
  mysqli_query($conn,"UPDATE `supir` SET `id_supir`='$_POST[id_supir]',`nama`='$_POST[nama]' WHERE id_supir=$id");
  header("location:supir.php");

}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_supir'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM supir WHERE id_supir=$id");

while($user_data = mysqli_fetch_array($result))
{
  $id_supir = $user_data['id_supir'];
  $nama = $user_data['nama'];
  
}
?>
<html>
<head>  
  <title>Edit Supir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <h2>Edit Supir</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label for="harga">Id Supir</label>
        <input required type="text" class="form-control" name="id_supir" value=<?php echo $id_supir;?>><br>
        <label for="harga">Nama</label>
        <input required type="text" class="form-control" name="nama" value=<?php echo $nama;?>>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      <a href="mobil.php" class="btn btn-Secondary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
      </svg>Kembali</a>
    </div>
  </body>
  </html>