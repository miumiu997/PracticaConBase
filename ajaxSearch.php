<?php 
    
    include_once("connection.php");
    $search = $_GET['search'];

    $sql = "SELECT `Name`, `LastName`, `Date`, `Seen` FROM `request` WHERE `RequestNumber` = ". $search;
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    echo '<tr>';
    echo '  <th> </th>';
    echo '  <th>Client Name</th>';
    echo '  <th>Request ID</th>';
    echo '  <th>Requested Date</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        // echo de los resultados   
        echo '<tr>';
        echo '  <td>';
        
        if($row['Seen'] == 0){
            echo 'o';   
        }
        echo '  </td>';
        echo '  <td>'. $row['Name'] . ' '. $row['LastName']. '</td>';
        echo '  <td>' . $search .'</td>';
        echo '  <td>'. $row['Date'] .'</td>';
        echo '</tr>';
    }
?>