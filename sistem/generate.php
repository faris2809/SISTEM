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
    <title>Laporan Inventori Fayae</title>
    <link rel="icon" href="logo.png">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

body {
    background: #f8f3ff;
    padding: 20px;
    color: #4b2f78;
}

h1 {
    text-align: center;
    margin-bottom: 5px;
    color: #4b2f78;
    font-size: 30px;
    letter-spacing: 0.5px;
    font-weight: 700;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

h2 {
    text-align: center;
    margin-top: 0;
    color: #6d4ca5;
    font-size: 16px;
}

h3 {
    text-align: center;
    margin-top: 25px;
    font-size: 18px;
    color: #4b2f78;
}

table {
    margin: auto;
    width: 75%;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.08);
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid #d4c4e8;
    font-size: 16px;
}

th {
    background: #6d4ca5;
    color: white;
    font-size: 14px;
    letter-spacing: 0.5px;
    font-weight: 600;
}

tr:nth-child(even) {
    background: #f4edff;
}

tr:hover {
    background: #ded8ec;
}

button {
    padding: 12px 22px;
    background: #b8a3d1;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    margin-top: 20px;
}

button:hover {
    background: #6d4ca5;
}

footer {
    text-align: center;
    padding: 12px;
    margin-top: 30px;
    background: #e8dff6;
    border-radius: 10px;
    color: #4b2f78;
    font-weight: 600;
}

@media print {

    body {
        background: white;
        padding: 0;
    }

    .no-print {
        display: none !important;
    }

    table {
        width: 100%;
        box-shadow: none;
        border-radius: 0;
    }

    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
    }
}

</style>

</head>
<body>

<h1 style="text-align:center; margin-bottom:5px;">Laporan Semasa Inventori Kedai Runcit Fayae</h1>
<h2 style="text-align:center; margin-top:0; margin-bottom:20px;">
    Tarikh: <?php echo $date ?> | Masa: <?php echo $time ?>
</h2>

<br>

<table border="1" cellpadding="5" cellspacing="0" align="center">
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
            <td>".$row['idbarang']."</td>
            <td>".$row['namabarang']."</td>
            <td>".$row['bilstok']."</td>
            <td>".$row['jenisbarang']."</td>
            <td>RM ".number_format($row['harga'],2)."</td>
            <td>".$row['catatan']."</td>
        </tr>
        ";
    }
    ?>
</table>

<h3 align="center">
    Jumlah Barang: <?php echo $barang; ?> 
    &nbsp;|&nbsp; 
    Jumlah Stok: <?php echo $stok; ?>
    &nbsp;|&nbsp;
    Jumlah Nilai Stok: RM <?php echo number_format($jumharga, 2); ?>
</h3>

<center>
    <button class="no-print" onclick="window.print()">Print Rekod</button>
</center>

<footer>
    Kedai Runcit Fayae &copy; <?php echo $year ?>
</footer>

</body>
</html>
