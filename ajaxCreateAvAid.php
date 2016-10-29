<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $name = $_POST['name'];
    $price = $_POST['price'];
    $sql = "INSERT INTO `avaids` (`Name`, `Price`) VALUES ('". $name ."', '". $price ."')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>