<?php
include "index.php";
?>

<div class="container mt-3">
<h1 class="text-center">Daftar Mobil Pinjaman</h1>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-center" width="30">No</th>
        <th>Plat Nomer</th>
        <th>Kapasitas</th>
        <th>Harga</th>
        <th>Status</th>

        <th class="text-center" width="250">Foto</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM mobil WHERE status='disewa' 
      " ;
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $no=1;
        while($row = $result->fetch_assoc()) {
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
          echo "<tr>
          <td>".$no."</td>
          <td>".$row["nopol"]."</td>
          <td>".$row["kapasitas"]."</td>
          <td>".$row["harga_sewa"]."</td>
          <td>".$row["status"]."</td>
          <td align='center'><img src='file/".$row['foto']."' class='rounded' alt width='200'></td>
          <td><div class='mt-5 text-center'><a href='edit_pinjaman.php?id_mobil=".$row["id_mobil"]."'><i class='fas fa-paper-plane' style='font-size:24px'></i></a>
          <td>
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