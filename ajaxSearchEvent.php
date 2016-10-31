<?php

    session_start();
    include_once("connection.php");
    
    $_SESSION = array();
    
    $request = $_GET['request'];

    $sql = "SELECT `Name`, `LastName`, `Cellphone`, `Email`, `Date`, `StartDate`, `EndDate`, `Company`, `TypeOfEvent`, `Posted`, `Logo`, `EventName`, `Reason` FROM `Request` WHERE `RequestNumber` = ". $request;

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($row = mysqli_fetch_assoc($result)){ // Request found
        
        $_SESSION['modify'] = "1";
        $_SESSION['request'] = $request;
        
        $arrayRequest = array();
        $arrayRequest['Name'] = $row['Name'];
        $arrayRequest['LastName'] = $row['LastName'];
        $arrayRequest['Cellphone'] = $row['Cellphone'];
        $arrayRequest['Email'] = $row['Email'];
        $arrayRequest['Date'] = $row['Date'];
        $arrayRequest['StartDate'] = $row['StartDate'];
        $arrayRequest['EndDate'] = $row['EndDate'];
        $arrayRequest['Company'] = $row['Company'];
        $arrayRequest['TypeOfEvent'] = $row['TypeOfEvent'];
        $arrayRequest['Posted'] = $row['Posted'];
        $arrayRequest['Logo'] = $row['Logo'];
        $arrayRequest['EventName'] = $row['EventName'];
        $arrayRequest['Reason'] = $row['Reason'];

        $_SESSION['requestInfo'] = $arrayRequest;
        
        // Event dates
        $date =  new Datetime($row['StartDate']);
        $date1 = new DateTime($row['StartDate']);
        $date2 = new DateTime($row['EndDate']);

        $diff = date_diff($date1, $date2);
        $_SESSION['days'] = $diff->d + 1; 
        
        // Comments // When updating, delete the comments to insert the new ones
        $sqlComments = "SELECT `ID`, `Comment` FROM `Comment` WHERE `RequestNumber` = " . $request; 
        $resultComments = mysqli_query($conn, $sqlComments) or die(mysqli_error($conn));
        
        $commentsArray = array();
        while($commentRow = mysqli_fetch_assoc($resultComments)) {
            array_push($commentsArray, $commentRow['Comment']);
        }
        
        $_SESSION['comments'] = $commentsArray;
            
        //var_dump($commentsArray);
        
        // Rooms // Delete from database and insert as new ones
        $sqlRooms = "SELECT `SingleRoom`, `DoubleRoom`, `Suite` FROM `roomsxdate` WHERE `RequestNumber` = ". $request;
        $resultRooms = mysqli_query($conn, $sqlRooms) or die(mysqli_error($conn));               
        
        $singlesArray = array();
        $doublesArray = array();
        $suitesArray = array();
        
        while($roomRow = mysqli_fetch_assoc($resultRooms)) {
            array_push($singlesArray, $roomRow['SingleRoom']);
            array_push($doublesArray, $roomRow['DoubleRoom']);
            array_push($suitesArray, $roomRow['Suite']);
        }
        
        $_SESSION['singles'] = $singlesArray; 
        $_SESSION['doubles'] = $doublesArray; 
        $_SESSION['suites'] = $suitesArray; 
        
        //var_dump($singlesArray);
        //var_dump($doublesArray);
        //var_dump($suitesArray); 
        
        // events
        $i = 1;
        $daysArray = array();
        for ($i = 1; $i <= $_SESSION['days']; $i += 1) {
            
            $dayArray = array();
            
            if ($i > 1) {
                $date->modify('+1 day');  
            }
                
            $sqlEvent = "SELECT `ID`, `Name`, `Date`, `StartTime`, `NumberOfGuests`, `setup`, `OtherAmenities`, `CategoryOptions`, `othercategoryoption`, `OtherAvAids` FROM `event` WHERE `RequestNumber` = ". $request . " AND `Date` = '". $date->format('Y-m-d') ."'";
            
            $resultEvent = mysqli_query($conn, $sqlEvent) or die(mysqli_error($conn));
            
            while($eventRow = mysqli_fetch_assoc($resultEvent)) {
                
                $eventArray = array();
                
                $eventArray['ID'] = $eventRow['ID']; 
                $eventArray['Name'] = $eventRow['Name']; 
                $eventArray['Date'] = $eventRow['Date']; 
                $eventArray['StartTime'] = $eventRow['StartTime']; 
                $eventArray['NumberOfGuests'] = $eventRow['NumberOfGuests']; 
                $eventArray['setup'] = $eventRow['setup']; 
                $eventArray['OtherAmenities'] = $eventRow['OtherAmenities']; 
                $eventArray['CategoryOptions'] = $eventRow['CategoryOptions']; 
                $eventArray['othercategoryoption'] = $eventRow['othercategoryoption'];
                $eventArray['OtherAvAids'] = $eventRow['OtherAvAids'];
                
                //avAids
                $avAidsArray = array();
                $sqlAvAids = "SELECT `AvAidID` FROM `avaidsxevent` WHERE `EventID` = ". $eventRow['ID'] . " ORDER BY `AvAidID`";
                $resultAvAids = mysqli_query($conn, $sqlAvAids) or die(mysqli_error($conn));
                
                while($avAidsRow = mysqli_fetch_assoc($resultAvAids)) {
                    array_push($avAidsArray, $avAidsRow['AvAidID']);
                }
                
                $eventArray['AvAids'] = $avAidsArray;                
                //
                
                $dayArray[$eventRow['Name']] = $eventArray;
                
            }
            
            $daysArray['day' . $i] = $dayArray;
            
            //$arrayname[indexname] = $value;
        }
        
        $_SESSION['events'] = $daysArray;
        
        //var_dump($daysArray);
        
        echo '1';
        
        //$_SESSION = array();
        
    } else {
        echo '0';
    }

?>