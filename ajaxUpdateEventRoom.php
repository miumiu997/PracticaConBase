
<?php 
    error_reporting(0);
    include_once("connection.php");
    session_start();

    $userId = $_POST['userId'];  
    $password = $_POST['password']; 
    $type =  $_POST['type']; 

"UPDATE `eventroom` SET `Name` = 'Pico Blanco 3', `Description` = 'Tapezco is the most spacious and iluminated event room in the hotel 2. It has 2 access doors and 3 sliding doors that have access to the terrace. The dimensions allow a more participants and more elaborated room setups.', `Surface` = '108.9 M2', `Height` = '2.7 M', `Price` = '200' WHERE `eventroom`.`ID` = 3";

    $sql =  "UPDATE `user/admin` SET `Password` = '". $password ."', `Type` = '". $type ."' WHERE `user/admin`.`ID` =  '". $userId ."' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result){
        echo "1";
    } else {
        echo "0";
    }
?>
