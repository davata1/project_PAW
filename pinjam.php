<?php
include "index.php";
if(isset($_POST['simpan'])){
  mysqli_query($conn,"INSERT INTO sewa() VALUES(NULL, '$_POST[id_pelanggan]', '$_POST[id_mobil]', '$_POST[tgl_sewa]', '$_POST[tgl_kembali]','$_POST[status]')");
  header("location:sewa.php");
}
?>
<?php
if(isset($_POST['simpan'])){
  mysqli_query($conn,"UPDATE mobil set status='disewa' WHERE id_mobil=$id");
  
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id_mobil'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM sewa WHERE id_sewa=$id");

while($user_data = mysqli_fetch_array($result))
{
  $id_pelanggan = $user_data['id_pelanggan'];
  $id_mobil = $user_data['id_mobil'];
  $tgl_sewa = $user_data['tgl_sewa'];
  $tgl_kembali = $user_data['tgl_kembali'];
  $status = $user_data['status'];
}
?>
<html>
<head>	
  <title>Sewa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <h2>Pinjam</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
        <label>Id Pelanggan</label>
        <input required type="text" class="form-control" name="id_pelanggan" value=<?php echo $id_pelanggan;?>>
      </div>
      <div class="mb-3 mt-3">
        <label>Id Mobil</label>
        <input required type="text" class="form-control" name="id_mobil" value=<?php echo $id_mobil;?>>
      </div>
      <div class="mb-3 mt-3">
        <label>Tanggal Sewa</label>
        <input required type="date" class="form-control" name="tgl_sewa" >
      </div>
      <div class="mb-3 mt-3">
        <label>Tanggal Kembali</label>
        <input required type="date" class="form-control" name="tgl_kembali" >
      </div>
      <div class="mb-3 mt-3">
        <label for="harga">Status</label>
        <input required type="text" class="form-control" name="status">
        <?php  
        $sql = "SELECT status FROM sewa";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        // output data of each row
          $no=1;
          while($row = $result->fetch_assoc()) {
            if ($row["status"]==$status)
            {
              echo '
              <option value="'.$row["status"].'"></option>';
            }}}

            ?>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </body>
      </html>