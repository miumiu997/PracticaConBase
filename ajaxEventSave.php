<?php
    
// alter table `event` add foreign key (setup) REFERENCES `roomsetup`(ID) 

    // Start the session
    session_start();
    include_once("connection.php");

    $img = addslashes($_SESSION['imgData']);

    // Guarda en la tabla de Request la información relacionada con el nuevo evento.
    $sql = "INSERT INTO `request`(`Name`, `LastName`, `Cellphone`, `Email`, `StartDate`, `EndDate`, `Company`, `TypeOfEvent`, `Posted`, `Logo`, `EventName`, `Reason`, `Seen`, `Date`) VALUES ('". $_SESSION['first-name'] . "', '".  $_SESSION['last-name'] ."', '". $_SESSION['telephone'] ."', '". $_SESSION['email'] ."' , '". $_SESSION['start-date'] ."', '". $_SESSION['end-date'] ."', '". $_SESSION['company'] ."', ". $_SESSION['typeOfEvent'] .", ". $_SESSION['publish']. ", '{$img}', '". $_SESSION['event-name'] ."', '". $_SESSION['reason'] ."', 0, NOW())";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $requestNumber = mysqli_insert_id($conn);
    
    foreach ($_SESSION['comments'] as $comment){
        $sql2 = "INSERT INTO `comment` (`requestnumber`, `comment`) VALUES (".$requestNumber .", '". $comment ."')";
        $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));  
    }
                        
    $i = 1;

    for ($i = 1; $i <= $_SESSION['days']; $i += 1) {
        $array =  $_SESSION['day'. $i];
        //var_dump($array);
        $date = new Datetime($_SESSION['start-date']);
        if($i > 1){
          $date->modify('+1 day');  
        }
        
        //var_dump($_SESSION['singles']);
        //var_dump($_SESSION['doubles']);
        //var_dump($_SESSION['suites']);
        
        // cuartos por cada fecha
        $singles = "NULL";
        if($_SESSION['singles'][$i - 1] != ""){
            $singles = $_SESSION['singles'][$i - 1];
        }
        $doubles = "NULL";
        if($_SESSION['doubles'][$i - 1] != ""){
            $doubles = $_SESSION['doubles'][$i - 1];
        }
        $suites = "NULL";
        if($_SESSION['suites'][$i - 1] != ""){
            $suites = $_SESSION['suites'][$i - 1];
        }
        
        if ($singles != "NULL" || $doubles != "NULL" || $suites != "NULL"){
            $sqlrooms = "INSERT INTO `roomsxdate`(`RequestNumber`, `Date`, `SingleRoom`, `DoubleRoom`, `Suite`) VALUES (". $requestNumber .", '". $date->format('Y-m-d') ."', ". $singles .", ". $doubles .", ". $suites .")";  
            //echo $sqlrooms;
            $resultrooms = mysqli_query($conn, $sqlrooms) or die(mysqli_error($conn));
        }
        
        //echo $date->format('Y-m-d H:i:s');
        
        $sqlevent = "INSERT INTO `event`(`RequestNumber`, `Date`, `StartTime`, `NumberOfGuests`, `OtherAmenities`, `CategoryOptions`, `OtherAvAids`, `setup`, `othercategoryoption`, `name`) VALUES "; 
        $sqlavaid = "INSERT INTO `avaidsxevent`(`EventID`, `AvAidID`) VALUES ";
        
        // =======================================
        // Breakfast
        if ($array["startTime"][0] != "" && $array["NoGuests"][0] != "") {
            
            // Por si no se elige se inserta NULL
            $category = "NULL";
            if ($array["radiobreakfast"] != "0" && $array["radiobreakfast"] != "") {
                $category = $array["radiobreakfast"];
            }
            
            // values del string del insert
            $breakfastvalues = "(". $requestNumber .", '". $date->format('Y-m-d') . "', '". $array["startTime"][0] .":00', ". $array["NoGuests"][0] .", '". $array["amenities"][0] . "', ". $category .", '". $array["otheravaids"][0] ."', ". $array['RoomSetup'][0] .", '". $array["otherBreakfast"] ."', 'Breakfast')";
            
            $resultbreakfast = mysqli_query($conn, $sqlevent.$breakfastvalues) or die(mysqli_error($conn));
            $eventid = mysqli_insert_id($conn);
            
            $j = 0;
            // insertar avaids
            while ($j < count($array["avAid1"])) {

                $values = "(". $eventid .", ". $array["avAid1"][$j] .")";
                //echo "</br>". $sqlavaid.$values ."</br>";
                $resultAvaid = mysqli_query($conn, $sqlavaid.$values) or die(mysqli_error($conn));

                $j = $j + 1;
            }
        }
        
        // =======================================
        // Coffee
        if ($array["startTime"][1] != "" && $array["NoGuests"][1] != "") {
            
            // Por si no se elige se inserta NULL
            $category = "NULL";
            if ($array["radiocoffee"] != "0" && $array["radiocoffee"] != "") {
                $category = $array["radiocoffee"];
            }
            
            // values del string del insert
            $breakfastvalues = "(". $requestNumber .", '". $date->format('Y-m-d') . "', '". $array["startTime"][1] .":00', ". $array["NoGuests"][1] .", '". $array["amenities"][1] . "', ". $category .", '". $array["otheravaids"][1] ."', ". $array['RoomSetup'][1] .", '". $array["othercoffee"] ."', 'Morning Coffee Break')";
            
            $resultbreakfast = mysqli_query($conn, $sqlevent.$breakfastvalues) or die(mysqli_error($conn));
            $eventid = mysqli_insert_id($conn);
            
            $j = 0;
            // insertar avaids
            while ($j < count($array["avAid2"])) {

                $values = "(". $eventid .", ". $array["avAid2"][$j] .")";
                //echo "</br>". $sqlavaid.$values ."</br>";
                $resultAvaid = mysqli_query($conn, $sqlavaid.$values) or die(mysqli_error($conn));

                $j = $j + 1;
            }
        }
        
        //==============================================
        // lunch
        
        if ($array["startTime"][2] != "" && $array["NoGuests"][2] != "") {
            
            // Por si no se elige se inserta NULL
            $category = "NULL";
            if ($array["radiolunch"] != "0" && $array["radiolunch"] != "") {
                $category = $array["radiolunch"];
            }
            
            // values del string del insert
            $breakfastvalues = "(". $requestNumber .", '". $date->format('Y-m-d') . "', '". $array["startTime"][2] .":00', ". $array["NoGuests"][2] .", '". $array["amenities"][2] . "', ". $category .", '". $array["otheravaids"][2] ."', ". $array['RoomSetup'][2] .", '". $array["otherlunch"] ."', 'Lunch')";
            
            $resultbreakfast = mysqli_query($conn, $sqlevent.$breakfastvalues) or die(mysqli_error($conn));
            $eventid = mysqli_insert_id($conn);
            
            $j = 0;
            // insertar avaids
            while ($j < count($array["avAid3"])) {

                $values = "(". $eventid .", ". $array["avAid3"][$j] .")";
                //echo "</br>". $sqlavaid.$values ."</br>";
                $resultAvaid = mysqli_query($conn, $sqlavaid.$values) or die(mysqli_error($conn));

                $j = $j + 1;
            }
        }
        
        //==========================================================
        // afternoon coffee
        
        if ($array["startTime"][3] != "" && $array["NoGuests"][3] != "") {
            
            // Por si no se elige se inserta NULL
            $category = "NULL";
            if ($array["radioafternooncoffee"] != "0" && $array["radioafternooncoffee"] != "") {
                $category = $array["radioafternooncoffee"];
            }
            
            // values del string del insert
            $breakfastvalues = "(". $requestNumber .", '". $date->format('Y-m-d') . "', '". $array["startTime"][3] .":00', ". $array["NoGuests"][3] .", '". $array["amenities"][3] . "', ". $category .", '". $array["otheravaids"][1] ."', ". $array['RoomSetup'][1] .", '". $array["otherafternooncoffee"] ."', 'Afternoon Coffee Break')";
            
            $resultbreakfast = mysqli_query($conn, $sqlevent.$breakfastvalues) or die(mysqli_error($conn));
            $eventid = mysqli_insert_id($conn);
            
            $j = 0;
            // insertar avaids
            while ($j < count($array["avAid4"])) {

                $values = "(". $eventid .", ". $array["avAid4"][$j] .")";
                //echo "</br>". $sqlavaid.$values ."</br>";
                $resultAvaid = mysqli_query($conn, $sqlavaid.$values) or die(mysqli_error($conn));

                $j = $j + 1;
            }
        }
        
        //============================================================================
        // dinner
        
        if ($array["startTime"][4] != "" && $array["NoGuests"][4] != "") {
            
            // Por si no se elige se inserta NULL
            $category = "NULL";
            if ($array["radiodinner"] != "0" && $array["radiodinner"] != "") {
                $category = $array["radiodinner"];
            }
            
            // values del string del insert
            $breakfastvalues = "(". $requestNumber .", '". $date->format('Y-m-d') . "', '". $array["startTime"][4] .":00', ". $array["NoGuests"][4] .", '". $array["amenities"][4] . "', ". $category .", '". $array["otheravaids"][4] ."', ". $array['RoomSetup'][4] .", '". $array["otherdinner"] ."', 'Dinner')";
            
            $resultbreakfast = mysqli_query($conn, $sqlevent.$breakfastvalues) or die(mysqli_error($conn));
            $eventid = mysqli_insert_id($conn);
            
            $j = 0;
            // insertar avaids
            while ($j < count($array["avAid5"])) {

                $values = "(". $eventid .", ". $array["avAid5"][$j] .")";
                //echo "</br>". $sqlavaid.$values ."</br>";
                $resultAvaid = mysqli_query($conn, $sqlavaid.$values) or die(mysqli_error($conn));

                $j = $j + 1;
            }
            
            //============================================================================
            // Other

            if ($array["startTime"][5] != "" && $array["NoGuests"][5] != "") {

                // Por si no se elige se inserta NULL
                $category = "NULL";

                // values del string del insert
                $breakfastvalues = "(". $requestNumber .", '". $date->format('Y-m-d') . "', '". $array["startTime"][5] .":00', ". $array["NoGuests"][5] .", '". $array["amenities"][5] . "', ". $category .", '". $array["otheravaids"][5] ."', ". $array['RoomSetup'][5] .", '". $array["othermenu"] ."', 'Other')";

                $resultbreakfast = mysqli_query($conn, $sqlevent.$breakfastvalues) or die(mysqli_error($conn));
                $eventid = mysqli_insert_id($conn);

                $j = 0;
                // insertar avaids
                while ($j < count($array["avAid6"])) {

                    $values = "(". $eventid .", ". $array["avAid5"][$j] .")";
                    //echo "</br>". $sqlavaid.$values ."</br>";
                    $resultAvaid = mysqli_query($conn, $sqlavaid.$values) or die(mysqli_error($conn));

                    $j = $j + 1;
                }
            }
        }
    }  
    
    if($_SESSION['imgName'] != "") {
        unlink($_SESSION['imgName']);
    }

    echo $requestNumber;
?>
