<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $setupId = $_POST['setupId'];  

    $sqlConstraints = "SET foreign_key_checks = 0"; 
    $result = mysqli_query($conn, $sqlConstraints) or die(mysqli_error($conn));
    
    $sql = "DELETE FROM `roomsetup` WHERE `roomsetup`.`ID` = '". $setupId ."'"; 
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    $sqlConstraints = "SET foreign_key_checks = 1"; 
    $result = mysqli_query($conn, $sqlConstraints) or die(mysqli_error($conn)); 
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>
