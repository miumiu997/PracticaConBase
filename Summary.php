<!DOCTYPE html>
<html lang="en">

    <?php
        // Start the session
        session_start();
        include_once("connection.php");
        $_SESSION['comments'] = $_GET['mytext'];
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
                                <p>First Name: <?php echo $_SESSION['first-name']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Last Name: <?php echo $_SESSION['last-name']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>E-mail: <?php echo $_SESSION['email']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Telephone: <?php echo $_SESSION['telephone']; ?> </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Event Date: <?php echo $_SESSION['start-date']; //." - ". $_SESSION['end-date']; ?> </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>Company:  <?php echo $_SESSION['company']; ?> </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Reason: <?php echo $_SESSION['reason']; ?></p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Publish: 
                                    <?php 
                                        if ($_SESSION['publish']) {
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
                                        //move_uploaded_file($_SESSION['imgData'], $_SESSION['imgName']);
                                        if ($_SESSION['imgName'] != ""){
                                            $file = fopen($_SESSION['imgName'], "w");
                                            fwrite($file, $_SESSION['imgData']);
                                            echo '<img alt="cedral" height="100px" width="100px" src="'.$_SESSION['imgName'].'"/>';
                                            fclose($file);
                                        }
                                        
                                        //unlink($_SESSION['imgName']);
                                        //echo '<img alt="cedral" height="20px" width="20px" src="data:image/jpeg;base64,"'. base64_encode($_SESSION['imgData'])  .'"></img>'; 

                                    ?>
                                
                                </div>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>

                        <?php 
                        
                            $i = 1;

                            for ($i = 1; $i <= $_SESSION['days']; $i += 1) {

                                $array =  $_SESSION['day'. $i];
                                //var_dump($array);

                                $sqlmenu = "SELECT `name` FROM `categoryoptions` WHERE `ID` = ";
                                $sqlavaid = "SELECT `name` FROM `avaids` WHERE `ID` = ";
                                $sqlsetup = "SELECT `name` FROM `roomsetup` WHERE `ID` = ";
                                
                                echo '<div class="form-group row text-left">';
                                echo    '<label class="col-md-2 col-form-label PackageLabel">Day '. $i . '</label>';
                                echo '</div>';
                                
                                $singles = "0";
                                if($_SESSION['singles'][$i - 1] != ""){
                                    $singles = $_SESSION['singles'][$i - 1];
                                }
                                $doubles = "0";
                                if($_SESSION['doubles'][$i - 1] != ""){
                                    $doubles = $_SESSION['doubles'][$i - 1];
                                }
                                $suites = "0";
                                if($_SESSION['suites'][$i - 1] != ""){
                                    $suites = $_SESSION['suites'][$i - 1];
                                }
                                
                                echo '<div class="MealSummary">'; 
                                echo '  <div class="form-group row">';
                                echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Rooms</h1>';
                                echo '  </div>'; 
                                
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

                                if($array['NoGuests'][0] != ""){
                                    // Breakfast
                                    $setup = "";
                                    if ($array['RoomSetup'][0] != "" && $array['NoGuests'][0] != "" ){
                                        $result = mysqli_query($conn, $sqlsetup.$array['RoomSetup'][0]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $setup = $row['name'];
                                    }

                                    $menu = "";
                                    if ($array['radiobreakfast'] != ""){
                                        $result = mysqli_query($conn, $sqlmenu.$array['radiobreakfast']) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $menu = $row['name'];
                                    }

                                    echo '<div class="MealSummary">'; 
                                    echo '  <div class="form-group row">';
                                    echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Breakfast</h1>';
                                    echo '  </div>'; 

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '           <p>#Guests: '. $array['NoGuests'][0] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Setup: '. $setup .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Time: '. $array['startTime'][0] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions ">';
                                    echo '      </div>';
                                    echo '  </div>';

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Menu: '. $menu .'</p>';
                                    echo '      </div>';
                                    echo '  </div>';

                                    if ($array['radiobreakfast'] == "0"){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otherBreakfast"] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids:</p>';
                                    echo '      </div>';   
                                    echo '  </div>';  

                                    // AvAids
                                    echo '<div class="form-group row">';
                                    $j = 0;
                                    while ($j < count($array["avAid1"])) {

                                        $result = mysqli_query($conn, $sqlavaid.$array["avAid1"][$j]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);

                                        echo '  <div class="col-md-4">';
                                        echo '      <p>- '. $row['name'] .'</p>';
                                        echo '  </div>';

                                        $j = $j + 1;

                                        if ($j % 3 == 0) {
                                            echo "</div>";
                                            echo '<div class="form-group row">';
                                        }

                                    }
                                    echo '</div>';

                                    if ($array["otheravaids"][0] != ""){

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Other Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otheravaids"][0] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '<div class="form-group row">';
                                    echo '  <div class="col-md-3 AvAidOptions text-left">';
                                    echo '      <p>Additional Needs: </p>';
                                    echo '  </div>';
                                    echo '</div>'; 


                                    // amenities
                                    if($array["amenities"][0] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["amenities"][0] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                }

                                // =========================================================================================================================
                                // Coffee
                                if($array['NoGuests'][1] != ""){
                                    $setup = "";
                                    if ($array['RoomSetup'][1] != "" && $array['NoGuests'][1] != "" ){
                                        $result = mysqli_query($conn, $sqlsetup.$array['RoomSetup'][1]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $setup = $row['name'];
                                    }

                                    $menu = "";
                                    if ($array['radiocoffee'] != ""){
                                        $result = mysqli_query($conn, $sqlmenu.$array['radiocoffee']) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $menu = $row['name'];
                                    }

                                    echo '<div class="MealSummary">'; 
                                    echo '  <div class="form-group row">';
                                    echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Morning Coffee Break</h1>';
                                    echo '  </div>'; 

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '           <p>#Guests: '. $array['NoGuests'][1] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Setup: '. $setup .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Time: '. $array['startTime'][1] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions ">';
                                    echo '      </div>';
                                    echo '  </div>';

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Menu: '. $menu .'</p>';
                                    echo '      </div>';
                                    echo '  </div>';

                                    if ($array['radiocoffee'] == "0"){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["othercoffee"] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids:</p>';
                                    echo '      </div>';   
                                    echo '  </div>';  

                                    // AvAids
                                    echo '<div class="form-group row">';
                                    $j = 0;
                                    $k = 0;
                                    while ($j < count($array["avAid2"])) {

                                        $result = mysqli_query($conn, $sqlavaid.$array["avAid2"][$j]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);

                                        echo '  <div class="col-md-4">';
                                        echo '      <p>- '. $row['name'] .'</p>';
                                        echo '  </div>';

                                        $j = $j + 1;

                                        if ($j % 3 == 0) {
                                            echo "</div>";
                                            echo '<div class="form-group row">';
                                        }

                                    }
                                    echo '</div>';

                                    if ($array["otheravaids"][1] != ""){

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Other Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otheravaids"][1] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '<div class="form-group row">';
                                    echo '  <div class="col-md-3 AvAidOptions text-left">';
                                    echo '      <p>Additional Needs: </p>';
                                    echo '  </div>';
                                    echo '</div>'; 


                                    // amenities
                                    if($array["amenities"][1] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["amenities"][1] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                }
                                
                                
                                // ==============================================================================
                                // Lunch
                                if($array['NoGuests'][2] != ""){
                                    $setup = "";
                                    if ($array['RoomSetup'][2] != "" && $array['NoGuests'][2] != "" ){
                                        $result = mysqli_query($conn, $sqlsetup.$array['RoomSetup'][2]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $setup = $row['name'];
                                    }

                                    $menu = "";
                                    if ($array['radiolunch'] != ""){
                                        $result = mysqli_query($conn, $sqlmenu.$array['radiolunch']) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $menu = $row['name'];
                                    }

                                    echo '<div class="MealSummary">'; 
                                    echo '  <div class="form-group row">';
                                    echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Lunch</h1>';
                                    echo '  </div>'; 

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '           <p>#Guests: '. $array['NoGuests'][2] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Setup: '. $setup .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Time: '. $array['startTime'][2] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions ">';
                                    echo '      </div>';
                                    echo '  </div>';

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Menu: '. $menu .'</p>';
                                    echo '      </div>';
                                    echo '  </div>';

                                    if ($array['radiolunch'] == "0"){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otherlunch"] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids:</p>';
                                    echo '      </div>';   
                                    echo '  </div>';  

                                    // AvAids
                                    echo '<div class="form-group row">';
                                    $j = 0;
                                    $k = 0;
                                    while ($j < count($array["avAid3"])) {

                                        $result = mysqli_query($conn, $sqlavaid.$array["avAid3"][$j]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);

                                        echo '  <div class="col-md-4">';
                                        echo '      <p>- '. $row['name'] .'</p>';
                                        echo '  </div>';

                                        $j = $j + 1;

                                        if ($j % 3 == 0) {
                                            echo "</div>";
                                            echo '<div class="form-group row">';
                                        }

                                    }
                                    echo '</div>';

                                    if ($array["otheravaids"][2] != ""){

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Other Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otheravaids"][2] .'</textarea>';
                                        echo '</div>';
                                    }


                                    echo '<div class="form-group row">';
                                    echo '  <div class="col-md-3 AvAidOptions text-left">';
                                    echo '      <p>Additional Needs: </p>';
                                    echo '  </div>';
                                    echo '</div>'; 


                                    // amenities
                                    if($array["amenities"][2] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["amenities"][2] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                }
                                
                                
                                // =================================================================================================================================================================
                                // Afternoon coffee break
                                if($array['NoGuests'][3] != ""){
                                    $setup = "";
                                    if ($array['RoomSetup'][3] != "" && $array['NoGuests'][3] != "" ){
                                        $result = mysqli_query($conn, $sqlsetup.$array['RoomSetup'][3]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $setup = $row['name'];
                                    }

                                    $menu = "";
                                    if ($array["radioafternooncoffee"] != ""){
                                        $result = mysqli_query($conn, $sqlmenu.$array["radioafternooncoffee"]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $menu = $row['name'];
                                    }

                                    echo '<div class="MealSummary">'; 
                                    echo '  <div class="form-group row">';
                                    echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Afternoon Coffee Break</h1>';
                                    echo '  </div>'; 

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '           <p>#Guests: '. $array['NoGuests'][3] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Setup: '. $setup .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Time: '. $array['startTime'][3] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions ">';
                                    echo '      </div>';
                                    echo '  </div>';

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Menu: '. $menu .'</p>';
                                    echo '      </div>';
                                    echo '  </div>';

                                    if ($array["radioafternooncoffee"] == "0"){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otherafternooncoffee"] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids:</p>';
                                    echo '      </div>';   
                                    echo '  </div>';  

                                    // AvAids
                                    echo '<div class="form-group row">';
                                    $j = 0;
                                    $k = 0;
                                    while ($j < count($array["avAid4"])) {

                                        $result = mysqli_query($conn, $sqlavaid.$array["avAid4"][$j]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);

                                        echo '  <div class="col-md-4">';
                                        echo '      <p>- '. $row['name'] .'</p>';
                                        echo '  </div>';

                                        $j = $j + 1;

                                        if ($j % 3 == 0) {
                                            echo "</div>";
                                            echo '<div class="form-group row">';
                                        }

                                    }
                                    echo '</div>';

                                    if ($array["otheravaids"][3] != ""){

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Other Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otheravaids"][3] .'</textarea>';
                                        echo '</div>';
                                    }


                                    echo '<div class="form-group row">';
                                    echo '  <div class="col-md-3 AvAidOptions text-left">';
                                    echo '      <p>Additional Needs: </p>';
                                    echo '  </div>';
                                    echo '</div>'; 


                                    // amenities
                                    if($array["amenities"][3] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["amenities"][3] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                }
                                    // ==================================================================================================
                                    // Dinner
                                    if($array['NoGuests'][4] != ""){
                                        
                                        $setup = "";
                                        if ($array['RoomSetup'][4] != "" && $array['NoGuests'][4] != "" ){
                                            $result = mysqli_query($conn, $sqlsetup.$array['RoomSetup'][4]) or die(mysqli_error($conn));
                                            $row = mysqli_fetch_assoc($result);
                                            $setup = $row['name'];
                                        }

                                        $menu = "";
                                        if ($array['radiodinner'] != ""){
                                            $result = mysqli_query($conn, $sqlmenu.$array["radiodinner"]) or die(mysqli_error($conn));
                                            $row = mysqli_fetch_assoc($result);
                                            $menu = $row['name'];
                                        }

                                        echo '<div class="MealSummary">'; 
                                        echo '  <div class="form-group row">';
                                        echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Dinner</h1>';
                                        echo '  </div>'; 

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '           <p>#Guests: '. $array['NoGuests'][4] .'</p>';
                                        echo '      </div>';
                                        echo '      <div class="col-md-1 AvAidOptions">';
                                        echo '      </div>'; 
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Setup: '. $setup .'</p>';
                                        echo '      </div>';
                                        echo '      <div class="col-md-1 AvAidOptions">';
                                        echo '      </div>'; 
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Time: '. $array['startTime'][4] .'</p>';
                                        echo '      </div>';
                                        echo '      <div class="col-md-1 AvAidOptions ">';
                                        echo '      </div>';
                                        echo '  </div>';

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Menu: '. $menu .'</p>';
                                        echo '      </div>';
                                        echo '  </div>';

                                        if ($array['radiodinner'] == "0"){
                                            echo '<div class="form-group row EventRooms text-left">';
                                            echo '  <textarea rows="10" cols="60">'. $array["otherdinner"] .'</textarea>';
                                            echo '</div>';
                                        }

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        // AvAids
                                        echo '<div class="form-group row">';
                                        $j = 0;
                                        $k = 0;
                                        while ($j < count($array["avAid5"])) {

                                            $result = mysqli_query($conn, $sqlavaid.$array["avAid5"][$j]) or die(mysqli_error($conn));
                                            $row = mysqli_fetch_assoc($result);

                                            echo '  <div class="col-md-4">';
                                            echo '      <p>- '. $row['name'] .'</p>';
                                            echo '  </div>';

                                            $j = $j + 1;

                                            if ($j % 3 == 0) {
                                                echo "</div>";
                                                echo '<div class="form-group row">';
                                            }

                                        }
                                        echo '</div>';

                                        if ($array["otheravaids"][4] != ""){

                                            echo '  <div class="form-group row">';
                                            echo '      <div class="col-md-3 AvAidOptions text-left">';
                                            echo '          <p>Other Av Aids:</p>';
                                            echo '      </div>';   
                                            echo '  </div>';  

                                            echo '<div class="form-group row EventRooms text-left">';
                                            echo '  <textarea rows="10" cols="60">'. $array["otheravaids"][4] .'</textarea>';
                                            echo '</div>';
                                        }


                                        echo '<div class="form-group row">';
                                        echo '  <div class="col-md-3 AvAidOptions text-left">';
                                        echo '      <p>Additional Needs: </p>';
                                        echo '  </div>';
                                        echo '</div>'; 


                                        // amenities
                                        if($array["amenities"][4] != ""){
                                            echo '<div class="form-group row EventRooms text-left">';
                                            echo '  <textarea rows="10" cols="60">'. $array["amenities"][4] .'</textarea>';
                                            echo '</div>';
                                        }

                                        echo '</div>';
                                    }
                                // ========================================================================================
                                // Other
                                if($array['NoGuests'][5] != ""){
                                    $setup = "";
                                    if ($array['RoomSetup'][5] != "" && $array['NoGuests'][5] != "" ){
                                        $result = mysqli_query($conn, $sqlsetup.$array['RoomSetup'][5]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);
                                        $setup = $row['name'];
                                    }

                                    echo '<div class="MealSummary">'; 
                                    echo '  <div class="form-group row">';
                                    echo '      <h1 class="col-md-2 col-form-label SummaryTitle text-left">Other</h1>';
                                    echo '  </div>'; 

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '           <p>#Guests: '. $array['NoGuests'][5] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Setup: '. $setup .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions">';
                                    echo '      </div>'; 
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Time: '. $array['startTime'][5] .'</p>';
                                    echo '      </div>';
                                    echo '      <div class="col-md-1 AvAidOptions ">';
                                    echo '      </div>';
                                    echo '  </div>';

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Menu: </p>';
                                    echo '      </div>';
                                    echo '  </div>';

                                    if ($array["othermenu"] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["othermenu"] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '  <div class="form-group row">';
                                    echo '      <div class="col-md-3 AvAidOptions text-left">';
                                    echo '          <p>Av Aids:</p>';
                                    echo '      </div>';   
                                    echo '  </div>';  

                                    // AvAids
                                    echo '<div class="form-group row">';
                                    $j = 0;
                                    $k = 0;
                                    while ($j < count($array["avAid6"])) {

                                        $result = mysqli_query($conn, $sqlavaid.$array["avAid6"][$j]) or die(mysqli_error($conn));
                                        $row = mysqli_fetch_assoc($result);

                                        echo '  <div class="col-md-4">';
                                        echo '      <p>- '. $row['name'] .'</p>';
                                        echo '  </div>';

                                        $j = $j + 1;

                                        if ($j % 3 == 0) {
                                            echo "</div>";
                                            echo '<div class="form-group row">';
                                        }

                                    }
                                    echo '</div>';

                                    if ($array["otheravaids"][5] != ""){

                                        echo '  <div class="form-group row">';
                                        echo '      <div class="col-md-3 AvAidOptions text-left">';
                                        echo '          <p>Other Av Aids:</p>';
                                        echo '      </div>';   
                                        echo '  </div>';  

                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["otheravaids"][5] .'</textarea>';
                                        echo '</div>';
                                    }


                                    echo '<div class="form-group row">';
                                    echo '  <div class="col-md-3 AvAidOptions text-left">';
                                    echo '      <p>Additional Needs: </p>';
                                    echo '  </div>';
                                    echo '</div>'; 


                                    // amenities
                                    if($array["amenities"][5] != ""){
                                        echo '<div class="form-group row EventRooms text-left">';
                                        echo '  <textarea rows="10" cols="60">'. $array["amenities"][5] .'</textarea>';
                                        echo '</div>';
                                    }

                                    echo '</div>';

                                }
                            }
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
           
            $("#submit").click(function (){
               //alert($('#commentText').val());  
                $("#submit").disabled = true;
                $.ajax({
                    method: 'POST',
                    url: 'ajaxEventSave.php',
                    data: {},
                    success: function(data){
                        //alert('data');
                        //$('#form').submit();
                        $('#modalInfo').append('<h1 class="col-md-12 col-form-label SummaryTitle text-left">Your request was successful, your request number is: ' + data + '</h1>'); 
                        $("#modal").css("display", "block");
                    }
               });
            });
            
            $('#confirm').click(function(){
                $('#form').submit();
            });
        });
        
        
        
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>