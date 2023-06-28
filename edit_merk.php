<?php
include "koneksi.php";

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['id_merk']))
{ 
  $id=$_POST['id_merk'];
  
  mysqli_query($conn,"UPDATE `merk` SET `id_merk`='$_POST[id_merk]',`merk`='$_POST[merk]' WHERE id_merk=$id");
  header("location:merk.php");

}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_mobil'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM merk WHERE id_merk=$id");

while($user_data = mysqli_fetch_array($result))
{
  $id_merk = $user_data['id_merk'];
  $merk = $user_data['merk'];

}
?>
<html>
<head>  
  <title>Edit mobil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <h2>Edit Merk</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label for="harga">Id merk</label>
        <input required type="text" class="form-control" name="id_merk" value=<?php echo $id_merk;?>><br>
        <label for="harga">Merk</label>
        <input required type="text" class="form-control" name="merk" value=<?php echo $merk;?>>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      <a href="mobil.php" class="btn btn-Secondary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
      </svg>Kembali</a>
    </div>
  </body>
  </html>