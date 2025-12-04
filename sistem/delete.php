<?php
include('config.php');

if (isset($_GET['idbarang'])) {
     $id = $_GET['idbarang'];

} else {

    $id = "";
}
mysqli_query($conn, "DELETE FROM kedai_runcit WHERE idbarang = '".$id."' ");

header("location:index.php");

?>