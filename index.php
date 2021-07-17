<html>
   <head>
      <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
      <style>
         body {font-family:tahoma, arial}
         table {border-collapse: collapse}
         th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
         th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
      </style>
   </head>
   <body>
      <h3>Tabel Pelanggan (mysqli_fetch_array)</h3>
      <table>
         <thead>
            <tr>
               <th>Kode Pelanggan</th>
               <th>Nama</th>
            </tr>
         </thead>
         <?php
            include 'koneksi.php';		
            $sql = 'SELECT * FROM `pelanggan`';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['ID_PELANGGAN'] ?></td>
               <td><?php echo $row['NAMA_PELANGGAN'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      <h3>Tabel Barang (mysqli_fetch_row)</h3>
      <table>
         <thead>
            <tr>
               <th>KODE BARANG</th>
               <th>Nama Barang</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT  * FROM BARANG';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_array($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row[0] ?></td>
               <td><?php echo $row[1] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      <h3>Inner Join (mysqli_fetch_assoc)</h3>
      <h4> (mampilkan semua data pelanggan dari tabel pelanggan yang melakukan Pesanan)</h4>
      <table>
         <thead>
            <tr>
               <th>NO_TRANSAKSI</th>
               <th>NAMA_PELANGGAN</th>
               <th>ID_PELANGGAN</th>
               <th>TOTAL</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT A.NO_TRANSAKSI ,B.NAMA_PELANGGAN ,A.ID_PELANGGAN ,SUM(A.TOTAL) AS TOTAL_BELANJA FROM transaksi A JOIN pelanggan B ON B.ID_PELANGGAN=a.ID_PELANGGAN';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['NO_TRANSAKSI'] ?></td>
               <td><?php echo $row['NAMA_PELANGGAN'] ?></td>
               <td><?php echo $row['ID_PELANGGAN'] ?></td>
               <td><?php echo $row['TOTAL_BELANJA'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
      </table>
      </table>
      <h3>left outer Join </h3>
      <h4> (MENAMPILKAN DATA TRANSAKSI SUPPLIER DENGAN NOMOR TRANSAKSI )</h4>
      <table>
         <thead>
            <tr>
               <th>ID_PELANGGAN</th>
               <th>NAMA_PELANGGAN</th>
               <th>TANGGAL</th>
               <th>NO_TRANSAKSI</th>
		<th>TOTAL</th>
            </tr>
         </thead>
         <?php
            $sql = 'SELECT A.ID_PELANGGAN ,A.NAMA_PELANGGAN ,B.TANGGAL ,B.NO_TRANSAKSI ,B.TOTAL FROM pelanggan A LEFT JOIN transaksi B ON B.ID_PELANGGAN=A.ID_PELANGGAN';
            $query = mysqli_query($koneksi, $sql);		
            while ($row = mysqli_fetch_assoc($query))
            {
            	?>
         <tbody>
            <tr>
               <td><?php echo $row['ID_PELANGGAN'] ?></td>
               <td><?php echo $row['NAMA_PELANGGAN'] ?></td>
               <td><?php echo $row['TANGGAL'] ?></td>
               <td><?php echo $row['NO_TRANSAKSI'] ?></td>
<td><?php echo $row['TOTAL'] ?></td>
            </tr>
         </tbody>
         <?php
            }
            ?>
      </table>
   </body>
</html>