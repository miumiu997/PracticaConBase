<?php 

    include_once("connection.php");
    session_start();

    $CategoryOptionId = $_POST['CategoryOptionId'];
    $DishName = $_POST['DishName']; 

    $sql = "INSERT INTO `plates` (`IDCategoryOptions`, `Name`) VALUES ('". $CategoryOptionId ."', '". $DishName ."')";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if($result) {
        echo 1;
    }else{ 
    	echo -1;
    }

?>