<?php
    // Start the session
    session_start();
    include_once("connection.php");

    // Guarda en la tabla de Request la información relacionada con el nuevo evento.
    $sql = "INSERT INTO `request`(`Name`, `LastName`, `Cellphone`, `Email`, `StartDate`, `EndDate`, `Company`, `TypeOfEvent`, `Posted`, `Logo`, `EventName`, `Reason`, `Seen`) VALUES ('". $_SESSION['first-name'] . "', '".  $_SESSION['last-name'] ."', '". $_SESSION['telephone'] ."', '". $_SESSION['email'] ."' , '". $_SESSION['start-date'] ."', '". $_SESSION['end-date'] ."', '". $_SESSION['company'] ."', ". $_SESSION['typeOfEvent'] .", ". $_SESSION['publish']. ", '{$_SESSION['imgData']}', '". $_SESSION['event-name'] ."', '". $_SESSION['reason'] ."', 0)";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $requestNumber = mysqli_insert_id($conn);
    
    foreach ($_SESSION['comments'] as $comment){
        $sql2 = "INSERT INTO `comment` (`requestnumber`, `comment`) VALUES (".$requestNumber .", '". $comment ."')";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));  
    }

?>
