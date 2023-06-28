<?php
include "index.php";
?>

<div class="container mt-3">
  <?php 
		// include 'koneksi.php';
  if(isset($_POST['tambah'])){
   $ekstensi_diperbolehkan	= array('png','jpg');
   $nama = $_FILES['file']['name'];
   $x = explode('.', $nama);
   $ekstensi = strtolower(end($x));
   $ukuran	= $_FILES['file']['size'];
   $file_tmp = $_FILES['file']['tmp_name'];	

   if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    if($ukuran < 1044070){			
     move_uploaded_file($file_tmp, 'file/'.$nama);
     mysqli_query($conn,"INSERT INTO mobil() VALUES(NULL, '$_POST[id_merk]', '$_POST[nopol]', '$_POST[kapasitas]', '$_POST[harga_sewa]', '$nama')");
     header("location:mobil.php");
   }else{
     echo 'UKURAN FILE TERLALU BESAR';
   }
 }else{
  echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}
}
?>
<h1 class="text-center">Tambah Mobil</h1>
<!-- <h2>Striped Rows</h2> -->
<!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
<a href="mobil.php" class="btn btn-primary mb-3"><i class="fa fa-chevron-left"></i>  Kembali</a>
<div class="container mt-3">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label>Plat Nomer</label>
      <input required type="number" class="form-control" id="np" name="nopol">
    </div>
    <div class="mb-3 mt-3">
      <label>Merk</label>
      <select name="id_merk" id="cars">
        <?php  
        $sql = "SELECT id_merk, merk FROM merk";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        // output data of each row
        $no=1;
        while($row = $result->fetch_assoc()) {
          echo '
           <option value="'.$row["id_merk"].'">'.$row["merk"].'</option>';
        }}
          ?>
      </select>
    </div>
    <div class="mb-3 mt-3">
      <label>Kapasitas</label>
      <input required type="number" class="form-control" id="kps" name="kapasitas">
    </div>
    <div class="mb-3 mt-3">
      <label>Harga</label>
      <input required type="number" class="form-control" id="hs" name="harga_sewa">
    </div>
    <div class="mb-3 mt-3">
      <label>Foto</label>
      <input required type="file" class="form-control" id="ft" name="file">
    </div>
    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
  </form>
</div>
</div>