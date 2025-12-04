<?php
include('config.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $id_ = $id;

} else {

    echo "No data available";
    $id = "";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kedai Runcit Fayae</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="logo.png">
    </head>
</html>