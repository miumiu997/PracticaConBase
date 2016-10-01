<?php
    if(count($_FILES) > 0) {
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            
            $conn = mysqli_connect('localhost', 'root', '',  'event_planner');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $imgData =addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "INSERT INTO `menucategory`(`name`, `image`) VALUES (". $_POST['category'] .", '{$imgData}')";
            
            echo "<script> alert('". $sql ."') </script>";
            
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
        }
   }
?>