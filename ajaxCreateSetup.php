<?php 
    error_reporting(0);
    include_once("connection.php");
    //session_start();

    $imgData='';
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgData =addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }

    $name = $_POST['name'];
    $sql = "INSERT INTO `roomsetup` (`Name`, `Image`) VALUES ('". $name ."', '{$imgData}')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>