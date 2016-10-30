<?php 

    include_once("connection.php");
    session_start();

    $name = $_POST['name'];
    $surface = $_POST['surface']; 
    $height = $_POST['height']; 
    $description = $_POST['description'];  
    $price = $_POST['price']; 



    $sql = "INSERT INTO `eventroom` (`Name`, `Description`, `Surface`, `Height`, `Image`, `Price`) VALUES ('". $name ."', '". $description ."', '". $surface ."', '". $height ."', NULL, '". $price ."')"; 
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
 


    if($result) {  
        $sql = "SELECT `ID` FROM `eventroom` WHERE Name = '". $name ."'";; 
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        if($result){  
            $row = mysqli_fetch_assoc($result);
            echo $row['ID']; 
        }else{ 
            echo -1;
        }


    }else{ 
        echo -1;
    }

?>