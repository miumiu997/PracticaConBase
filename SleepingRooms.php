<!DOCTYPE html>
<html lang="en">

<?php
    error_reporting(0);
    include_once("connection.php");
?>

    <?php
    // Start the session
    session_start();
    
    $array = array(
                
                "RoomSetup" => $_POST['RoomSetup'],
                "NoGuests" => $_POST['NoGuests'],
                "startTime" => $_POST['startTime'],
                
                "radiobreakfast" => $_POST['radiobreakfast'],
                "otherBreakfast" => $_POST['otherbreakfast'],
                
                "radiocoffee" => $_POST['radiocoffee'],
                "othercoffee" => $_POST['othercoffee'],
                
                "radiolunch" => $_POST['radiolunch'],
                "otherlunch" => $_POST['otherlunch'],
                
                "radioafternooncoffee" => $_POST['radioafternooncoffee'],
                "otherafternooncoffee" => $_POST['otherafternooncoffee'],
                
                "radiodinner" => $_POST['radiodinner'],
                "otherdinner" => $_POST['otherdinner'],
                
                "avAid1" => $_POST['avAid1'],
                "avAid2" => $_POST['avAid2'],
                "avAid3" => $_POST['avAid3'],
                "avAid4" => $_POST['avAid4'],
                "avAid5" => $_POST['avAid5'],
                "avAid6" => $_POST['avAid6'],
                
                "otheravaids" => $_POST['otheravaids'],
        
                "amenities" => $_POST['amenities'],
                "othermenu" => $_POST['othermenu']
                
            );
            
    $_SESSION['day'. $_POST['days2']] = $array;
    //echo "<h1>" . $_POST['days2'] . "</h1>";
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
                            <li>
                                <H1 class="NavEventPlanner"> Guest Rooms </H1>
                            </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>

                <div class="container">

                    <div class="row">
                        <div class="row questionDiv">
                            <h1 class="question">We would be pleased to welcome your guests. Let’s book sleeping rooms for them: </h1>
                        </div>
                    </div>

                    <div class="row">
                        <form method="post" action="Comments.php">
                            <div class="row" id="sleepingRooms">
                                <div class="form-group row Beds">
                                    <div class="col-md-4">
                                        <img alt="single" class="marriottBeds" height="40px" width="60px" src="photos/single.jpg" />
                                    </div>
                                    <div class="col-md-4">
                                        <img alt="single" class="marriottBeds" height="40px" width="60px" src="photos/double.jpg" />
                                    </div>
                                    <div class="col-md-4">
                                        <img alt="single" class="marriottBeds" height="40px" width="60px" src="photos/suite.jpg" />
                                    </div>
                                </div>

                                <!-- Este ciclo se repite la cantidad de días del evento -->
                                <?php
                        
                                    $date1 = new DateTime($_SESSION['start-date']);
                                    $date2 = new DateTime($_SESSION['end-date']);


                                    $diff = date_diff($date1, $date2);

                                    for ($i = 1; $i <= $diff->d + 1; $i++){

                                        echo "<div class='form-group row inputRooms'>
                                                <h1 class='RoomDates'>Day ". $i . "</h1>
                                            </div>";
                                        echo "<div class='form-group row inputRooms'>
                                                <label for='single' class='col-md-1 col-form-label'>Single: </label>
                                                <div class='col-md-3'>
                                                    <input class='form-control' type='number' value='' id='single' name='single[]'>
                                                </div>
                                                <label for='double' class='col-md-1 col-form-label'>Double: </label>
                                                <div class='col-md-3'>
                                                    <input class='form-control' type='number' value='' id='double' name='double[]'>
                                                </div>
                                                <label for='suite' class='col-md-1 col-form-label'>Suite: </label>
                                                <div class='col-md-3'>
                                                    <input class='form-control' type='number' value='' id='suite' name='suite[]'>
                                                </div>
                                            </div>";

                                    }
                                ?>

                                <div class="form-group row">
                                    <label for="submit" class="col-md-2 col-form-label"> </label>
                                    <div class="col-md-3">
                                    </div>
                                    <label for="submit" class="col-md-2 col-form-label"></label>
                                    <div class="col-md-3">
                                        <input type="submit" class="button" value="Next">
                                    </div>
                                </div>

                        </form>
                        </div>
                    </div>
                </div>

                <footer>
                    <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
                    <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>
                </footer>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("#yes").click(function () {
                            $("#sleepingRooms").show();
                        });
                        $("#no").click(function () {
                            $("#sleepingRooms").hide();
                        });

                    });
                </script>
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
        </body>

</html>