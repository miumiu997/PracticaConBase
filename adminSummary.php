<!DOCTYPE html>
<html lang="en">

    <?php
        // Start the session
        session_start();
        include_once("connection.php");
    
        $requestNumber = $_GET['request'];
    
        $sql = "SELECT `Name`, `LastName`, `Cellphone`, `Email`, `Date`, `StartDate`, `EndDate`, `Company`, `TypeOfEvent`, `Posted`, `Logo`, `EventName`, `Reason`, `Seen` FROM `Request` WHERE `RequestNumber` = ". $requestNumber;

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $row = mysqli_fetch_assoc($result); // Request found
    
        if($row['Seen'] == "0"){
            $sqlUpdate = "UPDATE `request` SET `Seen`= 1 WHERE `RequestNumber` = ". $requestNumber;
            $resultUpdate = mysqli_query($conn, $sqlUpdate) or die(mysqli_error($conn));
        }
    
    ?>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Planner</title>

    <link rel="stylesheet" href="css/main.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="row">

        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="home.html"><img class="marriottLogoNav" height="40px" width="60px" src="logos/Marriot%20Logo%20NavBar.png" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- This title has to be changed according to the menu category selected-->
                    <li>
                        <H1 class="NavEventPlanner"> Summary </H1>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div>
            <div class="row">
                <!-- This is repeated by the amount of category options there are -->

                <form method="get" action="home.html">
                    <div class="row" id="tableClothPackages">

                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>First Name: <?php echo $row['Name']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Last Name: <?php echo $row['LastName']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>E-mail: <?php echo $row['Email']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Telephone: <?php echo $row['Cellphone']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Event Date: <?php echo $row['StartDate']; //." - ". $_SESSION['end-date']; ?> </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>Company:  <?php echo $row['Company']; ?> </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Reason: <?php echo $row['Reason']; ?></p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Publish: 
                                    <?php 
                                        if ($row['Posted']) {
                                            echo "Yes"; 
                                        } else {
                                            echo "No";
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <div class="col-md-4">
                                    <p>Logo:</p>
                                </div>
                                <div class="col-md-4">
                                
                                    <?php
                                        if ($row['Logo'] != ""){
                                            echo '<img height="100px" width="100px" src="data:image/jpeg;base64,'.base64_encode( $row['Logo'] ).'"/>';
                                        }
                                    ?>
                                
                                </div>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>

                        <?php 
                        
                            $totalPrice = 0;
                        
                             // Event dates
                            $date =  new Datetime($row['StartDate']);
                            $date1 = new DateTime($row['StartDate']);
                            $date2 = new DateTime($row['EndDate']);

                            $diff = date_diff($date1, $date2);
                            
                            // Comments // When updating, delete the comments to insert the new ones
                            $sqlComments = "SELECT `ID`, `Comment` FROM `Comment` WHERE `RequestNumber` = " . $requestNumber; 
                            $resultComments = mysqli_query($conn, $sqlComments) or die(mysqli_error($conn));

                            $commentsArray = array();
                            while($commentRow = mysqli_fetch_assoc($resultComments)) {
                                array_push($commentsArray, $commentRow['Comment']);
                            }
                        
                            // Rooms // Delete from database and insert as new ones
                            $sqlRooms = "SELECT `SingleRoom`, `DoubleRoom`, `Suite` FROM `roomsxdate` WHERE `RequestNumber` = ". $requestNumber;
                            $resultRooms = mysqli_query($conn, $sqlRooms) or die(mysqli_error($conn));               

                            $singlesArray = array();
                            $doublesArray = array();
                            $suitesArray = array();

                            while($roomRow = mysqli_fetch_assoc($resultRooms)) {
                                array_push($singlesArray, $roomRow['SingleRoom']);
                                array_push($doublesArray, $roomRow['DoubleRoom']);
                                array_push($suitesArray, $roomRow['Suite']);
                            }
                        
                        
                            $sqlmenu = "SELECT `name`, `price` FROM `categoryoptions` WHERE `ID` = ";
                            $sqlAvAid = "SELECT `name`, `price` FROM `avaids` WHERE `ID` = ";
                            $sqlAvAidsEvent = "SELECT `AvAidID` FROM `avaidsxevent` WHERE `EventID` = ";
                            $sqlsetup = "SELECT `name` FROM `roomsetup` WHERE `ID` = ";
                            
                            $i = 1;
                            $daysArray = array();
                            for ($i = 1; $i <= $diff->d + 1; $i += 1) { // por cada día
                                
                                $dayPrice = 0;
                                
                                // Day Title
                                echo '<div class="form-group row text-left">';
                                echo    '<label class="col-md-2 col-form-label PackageLabel">Day '. $i . '</label>';
                                echo '</div>';
                                
                                
                                // Rooms needed
                                echo '<div class="MealSummary">'; 
                                echo '  <div class="form-group row">';
                                echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Rooms</h1>';
                                echo '  </div>'; 
                                
                                $singles = "0";
                                if($singlesArray[$i - 1] != NULL){
                                    $singles = $singlesArray[$i - 1];
                                    
                                }
                                $doubles = "0";
                                if($doublesArray[$i - 1] != NULL){
                                    $doubles = $doublesArray[$i - 1];
                                }
                                $suites = "0";
                                if($suitesArray[$i - 1] != NULL){
                                    $suites = $suitesArray[$i - 1];
                                }
                                
                                echo '  <div class="form-group row">';
                                echo '      <div class="col-md-3 AvAidOptions text-left">';
                                echo '           <p>Singles: '. $singles .'</p>';
                                echo '      </div>';
                                echo '      <div class="col-md-1 AvAidOptions">';
                                echo '      </div>'; 
                                echo '      <div class="col-md-3 AvAidOptions text-left">';
                                echo '          <p>Doubles: '. $doubles .'</p>';
                                echo '      </div>';
                                echo '      <div class="col-md-1 AvAidOptions">';
                                echo '      </div>'; 
                                echo '      <div class="col-md-3 AvAidOptions text-left">';
                                echo '          <p>Suites: '. $suites .'</p>';
                                echo '      </div>';
                                echo '      <div class="col-md-1 AvAidOptions ">';
                                echo '      </div>';
                                echo '  </div>';
                                echo '</div>';
                                
                                // Events of the day
                                if ($i > 1) {
                                    $date->modify('+1 day');  
                                }

                                $sqlEvent = "SELECT `ID`, `Name`, `Date`, `StartTime`, `NumberOfGuests`, `setup`, `OtherAmenities`, `CategoryOptions`, `othercategoryoption`, `OtherAvAids` FROM `event` WHERE `RequestNumber` = ". $requestNumber . " AND `Date` = '". $date->format('Y-m-d') ."'";

                                $resultEvent = mysqli_query($conn, $sqlEvent) or die(mysqli_error($conn));
                                
                                while($eventRow = mysqli_fetch_assoc($resultEvent)) {
                                    $eventPrice = 0;
                                    
                                    echo '<div class="MealSummary">'; 
                                    echo '  <div class="form-group row">';
                                    echo '      <h1 class="col-md-3 col-form-label SummaryTitle text-left">'. $eventRow['Name'].'</h1>';
                                    echo '  </div>'; 
                                    
                                    $result2 = mysqli_query($conn, $sqlsetup.$eventRow['setup']) or die(mysqli_error($conn));
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $setup = $row2['name'];    
                                    
                                    $menu = "";
                                    $menuPrice = 0;
                                    if ($eventRow['CategoryOptions'] != NULL) {
                                        $result2 = mysqli_query($conn, $sqlmenu.$eventRow['CategoryOptions']) or die(mysqli_error($conn));
                                        $row2 = mysqli_fetch_assoc($result2);
                                        $menu = $row2['name'];
                                        $menuPrice = $row2['price'] * $eventRow['NumberOfGuests'];
                                    }
                                    
                                    $eventPrice += $menuPrice;
                                    
                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '           <p>#Guests: '. $eventRow['NumberOfGuests'] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Setup: '. $setup .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Time: '. $eventRow['StartTime'] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions ">';
                                    echo '      </div>';
                                    echo '  </div>';

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-6 AvAidOptions text-left">';
                                    echo '          <p>Menu: '. $menu . ' - $'. $menuPrice .'</p>';
                                    echo '      </div>';
                                    echo '  </div>';
                                    
                                    if ($eventRow['othercategoryoption'] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="3" cols="60">'. $eventRow['othercategoryoption'] .'</textarea>';
                                        echo '</div>';
                                    }
                                    
                                    // AvAids
                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids:</p>';
                                    echo '      </div>';   
                                    echo '  </div>';  
                                    
                                    
                                    echo '<div class="form-group row">';
                                    $result2 = mysqli_query($conn, $sqlAvAidsEvent.$eventRow['ID']) or die(mysqli_error($conn));
                                    $avAidsPrice = 0;
                                    $j = 0;
                                    while ($row2 = mysqli_fetch_assoc($result2)) {

                                        $result3 = mysqli_query($conn, $sqlAvAid.$row2['AvAidID']) or die(mysqli_error($conn));
                                        $row3 = mysqli_fetch_assoc($result3);
                                        
                                        $avAidsPrice += $row3['price'];
                                        
                                        echo '  <div class="col-md-4">';
                                        echo '      <p>- '. $row3['name'] . ' - $' . $row3['price'] .'</p>';
                                        echo '  </div>';

                                        $j = $j + 1;

                                        if ($j % 3 == 0) {
                                            echo "</div>";
                                            echo '<div class="form-group row">';
                                        }

                                    }
                                    echo '</div>';
                                    
                                    $eventPrice += $avAidsPrice;
                                    
                                    if ($eventRow['OtherAvAids'] != ""){

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Other Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="3" cols="60">'. $eventRow['OtherAvAids'] .'</textarea>';
                                        echo '</div>';
                                    }

                                         
                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids Total: $'. $avAidsPrice .'</p>';
                                    echo '      </div>';   
                                    echo '  </div>';
                                    
                                    echo '<div class="form-group row">';
                                    echo '  <div class="col-md-3 AvAidOptions text-left">';
                                    echo '      <p>Additional Needs: </p>';
                                    echo '  </div>';
                                    echo '</div>'; 


                                    // amenities
                                    if($eventRow['OtherAmenities'] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="3" cols="60">'. $eventRow['OtherAmenities'] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                    
                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Event Total: $'. $eventPrice .'</p>';
                                    echo '      </div>';   
                                    echo '  </div>';
                                    
                                    $dayPrice += $eventPrice;
                                }
                                
                                $totalPrice += $dayPrice;
                                
                                // Day Total
                                echo '<div class="form-group row text-left">';
                                echo    '<label class="col-md-5 col-form-label PackageLabel">Day '. $i . ' total: $'. $dayPrice.'</label>';
                                echo '</div>';

                            }
                            
                            echo '<div class="row">';
                            echo '  <div class="form-group row text-left">';
                            echo '      <label class="col-md-5 col-form-label PackageLabel" Total: $'. $totalPrice.'</label>';
                            echo '  </div>';
                            echo '</div>';
                        ?>
                    </div>

                    <div class="form-group row">
                        <label for="submit" class="col-md-2 col-form-label"> </label>
                        <div class="col-md-3">
                        </div>
                        <label for="submit" class="col-md-2 col-form-label"></label>
                        <div class="col-md-3">
                            <input type="button" id="submit" class="button" value="Next">
                        </div>
                    </div>
                   
                    
                </form>
            </div>
            <form id="form" name="form" method="get" action="home.html">
            </form>
        </div>
    </div>

    <footer>
        <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
        <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>

    </footer>
    
    <div id="modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">

            <div class="modal-header">
                <h2>Thank You</h2>
            </div>

            <div class="modal-body ">
                <div id="modalInfo" name="modalInfo" class="row">
                </div>
                <div class="form-group row">
                    <label for="submit" class="col-md-2 col-form-label"> </label>
                    <div class="col-md-3">
                    </div>
                    <label for="submit" class="col-md-2 col-form-label"></label>
                    <div class="col-md-3">
                        <input type="button" name="confirm" id="confirm" class="button" value="Next">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
           
        });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>