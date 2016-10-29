<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $avAidId = $_POST['avAidId'];
    $sql = "DELETE FROM `avaids` WHERE `avaids`.`ID` = '". $avAidId ."'"; 

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>
