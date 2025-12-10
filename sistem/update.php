<?php
include('config.php');

if (isset($_GET['idbarang'])) {

    $id = $_GET['idbarang'];
    $id_ = $id;

} else {

    echo "No data available";
    $id = "";
}

$display = mysqli_query($conn, "SELECT * FROM kedai_runcit WHERE idbarang= '".$id."' ");

if (mysqli_num_rows($display) > 0) {
    while($row = mysqli_fetch_assoc($display)) {

        $id = $row['idbarang'];
        $nb = $row['namabarang'];
        $bs = $row['bilstok'];
        $jb = $row['jenisbarang'];
        $hg = $row['harga'];
        $ct = $row['catatan'];
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kedai Runcit Fayae</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="logo.png">
    </head>
    <body>
        <h1 align="center">KEMASKINI MAKLUMAT</h1>
          <div class = "form1">
        <center> <!--  css untuk form1 iaitu .form1 {} -->
    <form action ="" method = "post">
        <fieldset>
        <label>ID Barang</label> <br>
        <input type="text" name="idbarang" value="<?php echo $id ?>"> <br>
        <label>Nama Barang</label> <br>
        <input type="text" name="namabarang"  value="<?php echo $nb ?>"> <br>
        <label>Bilangan Stok</label> <br>
        <input type="text" name="bilstok"  value="<?php echo $bs ?>"> <br>
        <label>Jenis Barang</label> <br>
          <select type="text" name="jenisbarang" required>
        <option value="<?php echo $jb ?>"><?php echo $jb ?></option>
         <option value="Makanan">Makanan</option>
          <option value="Minuman">Minuman</option>
           <option value="Bahan Mentah/Dapur">Bahan Mentah/Dapur</option>
            <option value="Bahan Basah/Segar">Bahan Basah/Segar</option>
             <option value="Barangan Kebersihan">Bahan Mentah/Dapur</option>
             <option value="Barangan Kesihatan">Barangan Kesihatan</option>
              <option value="Produk Kebersihan">Produk Kebersihan</option>
             <option value="Barangan Lain">Barangan Lain</option>
           
        </select> <br>
        <label>Harga Barang</label> <br>
        <input type="text" name="harga"  value="<?php echo $hg ?>"> <br>
        <label>Catatan</label> <br>
        <textarea name="catatan"><?php echo $ct ?></textarea> <br>
        <button type="submit" name="hantar">Hantar</button>
        </fieldset>
    </form>
    <br>
    <a href="index.php"><button>Kembali Ke Halaman Utama</button></a>
</center>
</div>
    </body>
</html>
<?php

if(isset($_POST['hantar'])) {
     $id = $_POST['idbarang'];
     $nb = $_POST['namabarang'];
     $bs = $_POST['bilstok'];
     $jb = $_POST['jenisbarang'];
     $hg = $_POST['harga'];
     $ct = $_POST['catatan'];

     $query = mysqli_query($conn, "UPDATE kedai_runcit SET
     idbarang = '".$id."',
     namabarang = '".$nb."',
     bilstok = '".$bs."',
     jenisbarang = '".$jb."',
     harga = '".$hg."',
     catatan = '".$ct."'
     WHERE idbarang = '".$id_."' ");

     header("location:index.php");
}


?>

