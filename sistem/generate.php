<?php
include("config.php");


// Set timezone first
date_default_timezone_set('Asia/Kuala_Lumpur');

// Then get date and time
$date = date("d/m/Y"); 
$time = date("g:i A"); 
$year = date("Y"); 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <link rel="icon" href="logo.png">
    <style>
@media print {
    .no-print { display: none !important; }
     footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
    }
}
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    display: flex;
    flex-direction: column;
}

.report-content {
    flex: 1; /* take remaining space */
}

footer {
    text-align: center;
    padding: 10px;
    background: #f1f1f1;
}


</style>

</head>
<body>
   <h1 style="text-align:center; margin-bottom:5px;">Laporan Semasa Inventori Kedai Runcit Fayae</h1>
<h2 style="text-align:center; margin-top:0; margin-bottom:20px;">
    Tarikh: <?php echo $date ?> | Masa: <?php echo $time ?>
</h2>

    <br>
    <table border=1 cellpadding = 5 cellspacing = 0 align=center>
        <tr>
        <th>ID BARANG</th>
		<th>NAMA BARANG</th>
		<th>BILANGAN STOK</th>
		<th>JENIS BARANG</th>
		<th>HARGA BARANG</th>
        <th>CATATAN</th>
        </tr>
        
        <?php
          // isytihar variable sebelum loop (while)
          $stok = 0;
          $harga = 0;
          $jumharga = 0;
          $barang = 0;

         $query = mysqli_query($conn, "SELECT * FROM kedai_runcit");
         $barang = mysqli_num_rows($query); // kira jumlah barang
        while ($row = mysqli_fetch_assoc($query)) {

    // Variable stok
    $stok += $row['bilstok'];
    $harga += $row['harga'];
    $jumharga += $row['bilstok'] * $row['harga'];
  

        echo "
        <tr>
        <td> ".$row['idbarang']." </td>
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
         echo "<td> RM ".number_format($row['harga'],2)."</td>
        <td>
        ".$row['catatan']."
        </td> ";
        }
    
        ?>
    </table>
    <h3 align="center">Jumlah Barang: <?php echo $barang; ?> &nbsp;| &nbsp; Jumlah Stok: <?php echo $stok;  ?> &nbsp; | &nbsp;  Jumlah Nilai Stok: RM <?php echo number_format($jumharga, 2); ?></h3>

    <br>
   <center>  <button class="no-print" onclick="window.print()">Print Rekod</button>
   <br>
   <footer>
    <font> Kedai Runcit Fayae &copy; <?php echo $year ?></font>
   </footer>
 </center>


    
</body>
</html>