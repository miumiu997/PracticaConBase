<!DOCTYPE html>
<html lang="en">

    <?php
        // Start the session
        session_start();
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
                                <H1 class="NavEventPlanner"> Edit Event Rooms </H1>
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

                        <!-- Esto se repite por la cantidad de salones -->

                        <form method="post" action="EventInformation.php">

                            <input type="hidden" id="days" name="days" value="<?php echo $diff->d + 1; ?>" />
                            <input type="hidden" id="days2" name="days2" value="0" />

                            <?php
                        
                        include_once("connection.php");
                        
                        // SELECT `roomsetup`.`name`, `roomsetup`.`image` FROM `roomsetup`, `eventroom`, `setupxroom` WHERE `setupxroom`.`EventSetupID` = `eventroom`.`ID` AND `setupxroom`.`RoomSetupID` = `roomsetup`.`ID` AND `eventroom`.`ID` = 1  
                        
                        $sql = "SELECT `ID`, `Name`, `Description`, `Surface`, `Height`, `Image`, `Price` FROM `eventroom`";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            echo '<div class="form-group row EventRooms">';
                            echo '  <label for="single" class="col-md-4 col-form-label EventRoomLabel">'. $row['Name'] .'</label>';
                            echo '</div>';
                            
                            echo '<div class="row">';
                            echo '  <div class="col-md-4">';
                            echo '      <img alt="cedral" class="marriottEventRooms" height="40px" width="60px" src="data:image/jpeg;base64,'. base64_encode($row['Image']). '"/>';
                            echo '  </div>'; 
                            
                            echo '  <div class="col-md-4">';
                            echo '      <p class="EventinformationTxt">'. $row['Description'] .'</p>';
                            echo '      <p> Measurements: Surface: '. $row['Surface'] .' Height: '. $row['Height'] .'</p>';
                            echo '  </div>';
                            
                            $sql2 = "SELECT `roomsetup`.`name`, `roomsetup`.`image` FROM `roomsetup`, `eventroom`, `setupxroom` WHERE `setupxroom`.`EventSetupID` = `eventroom`.`ID` AND `setupxroom`.`RoomSetupID` = `roomsetup`.`ID` AND `eventroom`.`ID` = ". $row['ID'];
                            $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                            
                            
                            $names = "";
                            $images = "";
                            
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            
                                $names = $names. '<label class="col-md-3 col-form-label EventSetupLabel">'. $row2['name'] .'</label>';
                                
                                $images = $images. '<div class="col-md-3">';
                                $images = $images. '    <img alt="Room setup classroom" class="ModalRoomSetupImage" height="1px" width="1px" src="data:image/jpeg;base64,'. base64_encode($row2['image']). '"/>';
                                $images = $images. '</div>';
                            
                            }
                            
                            echo '<div class="col-md-4">';
                            echo '<div class="form-group row EventRooms">';
                            echo $names;
                            echo '</div>';
                            
                            echo '<div class="form-group row ">';
                            echo $images;
                            echo '</div>';
                            
                            echo '</div>';
                            
                            echo '</div>';
                        
                        }
                    ?>
                                <!-- Esto se repite por la cantidad de salones -->

                                <div class="form-group row">
                                    <label for="submit" class="col-md-2 col-form-label"> </label>
                                    <div class="col-md-3">
                                    </div>
                                    <label for="submit" class="col-md-2 col-form-label"></label>
                                    <div class="col-md-3">
                                        <input type="submit" class="button " value="Next">
                                    </div>
                                </div>

                        </form>
                    </div>

                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">

                            <div class="modal-header">
                                <span class="close">×</span>
                                <h2>Cedral</h2>
                            </div>

                            <div class="modal-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="modalTitle">General Information</h2>
                                        <p>Tapezco is the most spacious and iluminated event room in the hotel.
                                            <br> It has 2 access doors and 3 sliding doors that have access to the terrace.
                                            <br> The dimensions allow a more participants and more elaborated room setups.</p>
                                        <h2 class="modalTitle">Measurements</h2>
                                        <p>Surface: 108.8 M2 Height: 2.8 M</p>
                                        <h2 class="modalTitle">Available Setups</h2>
                                        <div class="form-group row EventRooms">
                                            <label class="col-md-3 col-form-label EventSetupLabel">Classroom</label>
                                            <label class="col-md-3 col-form-label EventSetupLabel">U</label>
                                            <label class="col-md-3 col-form-label EventSetupLabel">Ovals</label>
                                        </div>
                                        <div class="form-group row ">
                                            <div class="col-md-3">
                                                <img alt="Room setup classroom" class="ModalRoomSetupImage" src="photos/classroom.jpg" />
                                            </div>
                                            <div class="col-md-3">
                                                <img alt="Room setup U shape" class="ModalRoomSetupImage" height="40px" width="60px" src="photos/u.jpg" />
                                            </div>
                                            <div class="col-md-3">
                                                <img alt="Room Setup Oval shape" class="ModalRoomSetupImage" height="40px" width="60px" src="photos/ovals.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="ModalImage">
                                            <img alt="cedral" class="marriottEventRooms" height="40px" width="60px" src="photos/cedral.jpg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
                <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>

            </footer>


            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function () {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>

            <script src="cookie.js"></script>

            <script>
                $(document).ready(function () {

                    //$.cookie("days", <?php //echo $diff->d ?>);
                    //$.cookie("remainDays", <?php //echo $diff->d ?>);

                    //alert($.cookie("days"));

                });
            </script>

        </body>

</html>