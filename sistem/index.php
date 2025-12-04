<!DOCTYPE html>
<html>
    <head>
        <title>Kedai Runcit Fayae</title>
    </head>
    <body>
        <h1 align="center">Rekod Inventori Kedai Runcit Fayae</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="add.php">Tambah</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
        
        </ul>
        <table border=1 cellpadding = 5 cellspacing = 0 bgcolor=whitesmoke align=center>
        <tr>
		<th>ID BARANG</th>
		<th>NAMA BARANG</th>
		<th>BILANGAN STOK</th>
		<th>JENIS BARANG</th>
		<th>HARGA</th>
        <th>CATATAN</th>
        <th colspan="2">TINDAKAN</th>
		
		</tr>
        <?php
        include('config.php');

        $display = mysqli_query($conn, "SELECT * FROM kedai_runcit");
        while ($row = mysqli_fetch_assoc($display)) {

            echo "
            <tr>
            <td>
            ".$row['idbarang']."
            </td>
            <td>
            ".$row['namabarang']."
            </td>
            <td>
            ".$row['bilstok']."
            </td>
            <td>
            ".$row['jenisbarang']."
            </td>
            ";
            echo "<td> RM ".number_format($row['harga'],2)."
            </td>
            <td>
            ".$row['catatan']."
            </td> ";
            echo "<td> <a href='update.php?id=".$row['idbarang']."'>Kemaskini Rekod</a></td>";
            echo "<td> <a href='delete.php?id=".$row['idbarang']."'>Padam Rekod</a></td>";
            echo "</tr>";
            
            
        }
        ?>

        </table>
    </body>
</html>