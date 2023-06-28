<?php
include "index.php";
?>

<div class="container mt-3">
<h1 class="text-center">Merk Mobil</h1>
  <!-- <h2>Striped Rows</h2> -->
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
  <a href="tambah_merk.php" class="btn btn-primary mb-3">Tambah Merk Mobil</a>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-center" width="30">No</th>
        <th>Id merek</th>
        <th>Merk</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT id_merk, merk FROM merk";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $no=1;
        while($row = $result->fetch_assoc()) {
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
          echo "<tr>
          <td>".$no."</td>
          <td>".$row["id_merk"]."</td>
          <td>".$row["merk"]."</td>
          <td><div class='mt-5 text-center'><a href='edit_merk.php?id_mobil=".$row["id_merk"]."'><i class='fa fa-edit' style='font-size:24px'></i></a>
          <a href='hapus.merk.php?id_merk=".$row["id_merk"]."'><i class='fa fa-trash-alt' style='font-size:24px;color:red'></i></a></div></td>
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