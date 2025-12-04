<!DOCTYPE html>
<html>
<head>
    <title>Kedai Runcit Fayae</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="logo.png">
</head>
<body>
    <h1 align = "center">TAMBAH REKOD</h1>
    <div class = "form1">
        <center> <!--  css untuk form1 iaitu .form1 {} -->
    <form action ="" method = "post">
        <fieldset>
        <label>ID Barang</label> <br>
        <input type="text" name="idbarang" required> <br>
        <label>Nama Barang</label> <br>
        <input type="text" name="namabarang" required> <br>
        <label>Bilangan Stok</label> <br>
        <input type="text" name="bilstok" required> <br>
        <label>Jenis Barang</label> <br>
        <input type="text" name="jenisbarang" required> <br>
        <label>Harga Barang</label> <br>
        <input type="text" name="harga" required> <br>
        <label>Catatan</label> <br>
        <textarea name="catatan" required></textarea> <br>
        <button type="submit" name="hantar">Hantar</button>
        </fieldset>
    </form>
</center>
</div>
</body>
</html>

<?php
include('config.php');

if(isset($_POST['hantar'])){
 $id = $_POST['idbarang'];
 $nb = $_POST['namabarang'];
 $bs = $_POST['bilstok'];
 $jb = $_POST['jenisbarang'];
 $hg = $_POST['harga'];
 $ct = $_POST['catatan'];

    $query = mysqli_query($conn,
    "INSERT INTO kedai_runcit SET idbarang='".$id."',
    namabarang ='".$nb."',
    bilstok ='".$bs."',
    jenisbarang ='".$jb."',
	harga ='".$hg."',
    catatan = '".$ct."' ");

 header("location:index.php");

}


?>