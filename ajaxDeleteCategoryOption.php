<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $CategoryOptionId = $_POST['CategoryOptionId'];  

    $sqlConstraints = "SET foreign_key_checks = 0"; 
    $result = mysqli_query($conn, $sqlConstraints) or die(mysqli_error($conn));
   

    $sqlDeletePlates = "DELETE FROM `plates` WHERE `plates`.`IDCategoryOptions` = '". $CategoryOptionId ."' "; 
    $result = mysqli_query($conn, $sqlDeletePlates) or die(mysqli_error($conn));
   

    $sqlDeleteOption =  "DELETE FROM `categoryoptions` WHERE `categoryoptions`.`ID` = '". $CategoryOptionId ."' "; 
    $Finalresult = mysqli_query($conn, $sqlDeleteOption) or die(mysqli_error($conn));

    $sqlConstraints = "SET foreign_key_checks = 1"; 
    $result = mysqli_query($conn, $sqlConstraints) or die(mysqli_error($conn));
    
    if ($Finalresult){
        echo "1";
    } else {
        echo "0";
    }
?>
