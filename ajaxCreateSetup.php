<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $name = $_POST['name'];
    $sql = "INSERT INTO `roomsetup` (`Name`, `Image`) VALUES ('". $name ."', NULL)";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>