<?php
include "index.php";
?>

<div class="container mt-3">
<h1 class="text-center">Daftar Mobil</h1>
  <!-- <h2>Striped Rows</h2> -->
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
  <a href="tambah_mobil.php" class="btn btn-primary mb-3">Tambah Mobil</a>
  <a href="kembalikan.php" class="btn btn-primary mb-3">Kembalikan Mobil</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-center" width="30">No</th>
        <th>Plat Nomer</th>
        <th>Merk</th>
        <th>Kapasitas</th>
        <th>Harga</th>
        <th>Status</th>

        <th class="text-center" width="250">Foto</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT id_mobil, merk, nopol, kapasitas, harga_sewa, foto, status FROM mobil
      left join merk on merk.id_merk=mobil.id_merk";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $no=1;
        while($row = $result->fetch_assoc()) {
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
          echo "<tr>
          <td>".$no."</td>
          <td>".$row["nopol"]."</td>
          <td>".$row["merk"]."</td>
          <td>".$row["kapasitas"]."</td>
          <td>".$row["harga_sewa"]."</td>
          <td>".$row["status"]."</td>
          <td align='center'><img src='file/".$row['foto']."' class='rounded' alt width='200'></td>
          <td><div class='mt-5 text-center'>
          <a href='edit_mobil.php?id_mobil=".$row["id_mobil"]."'>edit</a>   |
           <a href='pinjam.php?id_mobil=".$row["id_mobil"]."'></i>Pinjam</a>
          <a href='hapus_mobil.php?id_mobil=".$row["id_mobil"]."'>hapus</a></div></td>
        </tr>";
        $no++;
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</div>