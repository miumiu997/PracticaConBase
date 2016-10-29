<?php 

    include_once("connection.php");
    session_start();

    $OptionName = $_POST['OptionName'];
    $OptionPrice = $_POST['OptionPrice']; 

    $sql = "INSERT INTO `categoryoptions` (`IDMenuCategory`, `Name`, `Price`) VALUES ( '1', '". $OptionName ."', '". $OptionPrice ."')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $sql = "SELECT `ID`, `IDMenuCategory`, `Name`, `Price` FROM `categoryoptions` WHERE Name = '". $OptionName ."' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 

    $row = mysqli_fetch_assoc($result);

    if($result) {
        echo $row['ID'];
    }else{ 
        echo -1;
    }

?>