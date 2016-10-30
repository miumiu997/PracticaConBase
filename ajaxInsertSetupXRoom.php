<?php 

    include_once("connection.php");
    session_start();

    $setupId = $_POST['setupId'];
    $eventRoomId = $_POST['eventRoomId']; 



    $sqlConstraints = "SET foreign_key_checks = 0"; 
    $result = mysqli_query($conn, $sqlConstraints) or die(mysqli_error($conn));
    
    $sql = "INSERT INTO `setupxroom` (`EventSetupID`, `RoomSetupID`) VALUES ('". $setupId ."', '". $eventRoomId ."')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($result) { 
        echo 1;
    }else{ 
        echo -1;
    } 
 
    $sqlConstraints = "SET foreign_key_checks = 1"; 
    $result = mysqli_query($conn, $sqlConstraints) or die(mysqli_error($conn)); 
    

?>