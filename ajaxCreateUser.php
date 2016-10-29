<?php 

    include_once("connection.php");
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password']; 
    $type = $_POST['type']; 


    $sql = "INSERT INTO `user/admin` (`User`, `Password`, `Type`) VALUES ('". $username ."', '". $password ."', '". $type ."')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if($result) {
        echo 1;
    }

?>