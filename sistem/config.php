<!-- Connection to Database -->
 <?php

 $server = "localhost";
 $user = "root";
 $pass = "";
 $db = "fayae";

$conn = mysqli_connect($server,$user,$pass,$db);

if (!$conn) {
    die(mysqli_connect_error());
}

 ?>