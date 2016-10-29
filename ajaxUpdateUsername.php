<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $userId = $_POST['userId'];  
    $password = $_POST['password']; 
    $type =  $_POST['type']; 


    $sql =  "UPDATE `user/admin` SET `Password` = '". $password ."', `Type` = '". $type ."' WHERE `user/admin`.`ID` =  '". $userId ."' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>
