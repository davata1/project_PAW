<?php
include "koneksi.php";

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['id_mobil']))
{	
  $id=$_POST['id_mobil'];
  $ekstensi_diperbolehkan	= array('png','jpg');
  $nama = $_FILES['file']['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $ukuran	= $_FILES['file']['size'];
  $file_tmp = $_FILES['file']['tmp_name'];	

  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1044070){			
     move_uploaded_file($file_tmp, 'file/'.$nama);
     mysqli_query($conn,"UPDATE `mobil` SET `id_merk`='$_POST[id_merk]',`nopol`='$_POST[nopol]',`kapasitas`='$_POST[kapasitas]',`harga_sewa`='$_POST[harga_sewa]',`foto`='$nama' WHERE id_mobil=$id");
     header("location:mobil.php");
   }else{
     echo 'UKURAN FILE TERLALU BESAR';
   }
 }else{
  echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}

}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_mobil'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM mobil WHERE id_mobil=$id");

while($user_data = mysqli_fetch_array($result))
{
  $nopol = $user_data['nopol'];
  $merk = $user_data['id_merk'];
  $kapasitas = $user_data['kapasitas'];
  $harga = $user_data['harga_sewa'];
  $foto = $user_data['foto'];
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
    <h2>Edit mobil</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label for="menu">Plat Nomor</label>
        <input required type="text" class="form-control" name="nopol" value=<?php echo $nopol;?>>
      </div>
      <div class="mb-3 mt-3">
        <label for="harga">Merk</label>
        <select name="id_merk" id="cars">
          <?php  
          $sql = "SELECT id_merk, merk FROM merk";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {

        // output data of each row
            $no=1;
            while($row = $result->fetch_assoc()) {
              if ($row["id_merk"]==$merk)
              {
                echo '
              <option value="'.$row["id_merk"].'" selected>'.$row["merk"].'</option>';

              }else
              echo '
              <option value="'.$row["id_merk"].'">'.$row["merk"].'</option>';
            }}
            ?>
          </select>
        </div>
        <div class="mb-3 mt-3">
          <label for="harga">Kapasitas</label>
          <input required type="text" class="form-control" name="kapasitas" value=<?php echo $kapasitas;?>>
        </div>
        <div class="mb-3 mt-3">
          <label for="harga">Harga Sewa</label>
          <input required type="text" class="form-control" name="harga_sewa" value=<?php echo $harga;?>>
        </div>
        <div class="mb-3 mt-3">
          <label for="harga">Foto</label>
          file foto:
          <?php 
          echo 
          $foto;

           ?>
          <input type="file" class="form-control" name="file" value="file/<?php echo $foto;?>.txt">
        </div>
        <input type="hidden" name="id_mobil" value=<?php echo $_GET['id_mobil'];?>>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
      <a href="mobil.php" class="btn btn-Secondary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
      </svg>Kembali</a>
    </div>
  </body>
  </html>