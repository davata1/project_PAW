<?php
include "index.php";
if(isset($_POST['tambah'])){
     mysqli_query($conn,"INSERT INTO merk() VALUES(NULL, '$_POST[merk]')");
     header("location:merk.php");
}
?>

<div class="container mt-3">
<h1 class="text-center">Tambah</h1>
<!-- <h2>Striped Rows</h2> -->
<!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
<a href="merk.php" class="btn btn-primary mb-3"><i class="fa fa-chevron-left"></i>  Kembali</a>
<div class="container mt-3">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label>merk</label>
      <input required type="text" class="form-control" id="np" name="merk">
    </div>
    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>

  </form>
</div>
</div>