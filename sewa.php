<?php
include "index.php";
?>

<div class="container mt-3">
<h1 class="text-center">Riwayat</h1>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="text-center" width="30">No</th>
        <th>Id Sewa</th>
        <th>Id pelanggan</th>
        <th>Id Mobil</th>
        <th>Tanggal Sewa</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
         <th class="text-center">Aksi</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM sewa";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row
        $no=1;
        while($row = $result->fetch_assoc()) {
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
          echo "<tr>
          <td>".$no."</td>
          <td>".$row["id_sewa"]."</td>
          <td>".$row["id_pelanggan"]."</td>
          <td>".$row["id_mobil"]."</td>
          <td>".$row["tgl_sewa"]."</td>
          <td>".$row["tgl_kembali"]."</td>
          <td>".$row["status"]."</td>
           <td><div class='mt-5 text-center'><a href='hapus_riwayat.php?id_sewa=".$row["id_sewa"]."'><i class='fa fa-trash-alt' style='font-size:24px;color:red'></i></a></div></td>
          
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