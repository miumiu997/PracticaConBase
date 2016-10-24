<?php 

    include_once("connection.php");
    session_start();

    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT `Type` FROM `user/admin` WHERE `USER` = '". $user ."' and `Password` = '". $password ."'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($row = mysqli_fetch_assoc($result)){
        echo $row['Type'];
        $_SESSION['user'] = $user;
        $_SESSION['type'] = $row['Type'];
    } else {
        echo "-1";
    }

?>