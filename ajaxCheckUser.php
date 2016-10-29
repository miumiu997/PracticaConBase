<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $username = $_POST['username'];  


    $sql =  "SELECT COUNT(*) FROM `user/admin` WHERE User = '". $username ."' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    $row = mysqli_fetch_assoc($result);
    echo $row['COUNT(*)'];
    

?>
