<!DOCTYPE html>
<html lang="en">

<?php
    // Start the session
    session_start();
?>

    <?php
    include_once("connection.php");
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
                                <H1 class="NavEventPlanner"> Event Rooms </H1>
                            </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>

                <div class="GeneralInfo">
                    <div class="row alignLeft">
                        <form id="form" name="form" method="post" action="EventRooms.php" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label for="first-name" class="col-md-2 col-form-label">*First Name: </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="" name="first-name" id="first-name" required>
                                </div>
                                <label for="last-name" class="col-md-2 col-form-label">*Last Name: </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="" id="last-name" name="last-name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label">*Email: </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="email" value="" name="email" id="email" required>
                                </div>
                                <label for="last-name" class="col-md-2 col-form-label">*Telephone: </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="number" value="" id="telephone" name="telephone" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="row">
                                    <label for="date" class="col-md-2 col-form-label">*Event Start Date: </label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="date" value="" name="start-date" id="start-date" required>
                                    </div>
                                    <label for="date" class="col-md-2 col-form-label">*Event End Date:</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="date" value="" id="end-date" name="end-date" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company" class="col-md-2 col-form-label">*Company: </label>
                                <div class="col-md-3">
                                    <input class="form-control" type="text" value="" name="company" id="company" required>
                                </div>
                                <label for="typeOfEvent" class="col-md-2 col-form-label">*Type of Event: </label>
                                <div class="col-md-3">
                                    <select id="typeOfEvent" name="typeOfEvent">
                                        <?php
                                            $sql = "SELECT `ID`, `TypeName` FROM `typeofevent`";
                                            $result = mysqli_query($conn, $sql) or die(mysql_error());

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo('<option value="'.$row['ID'].'">'.$row['TypeName'].'</option>');
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reason" class="col-md-2 col-form-label">Reason: </label>
                                <div class="col-md-3">
                                    <textarea id="reason" name="reason" rows="2" cols="29"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reason" class="col-md-4 col-form-label">Do you want your event to be posted in our internal event board? </label>
                                <div class="col-md-1">
                                    <input type="radio" name="publish" id="yes" value="1"> Yes </input>
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="publish" id="no" value="0" checked="checked"> No </input>
                                </div>
                            </div>

                            <div id="postedDiv" hidden="hidden">
                                <div class="form-group row">
                                    <label for="setupOption" class="col-md-6 col-form-label">Please provide your logo in a JPG file if you would like your logo to be included</label>
                                    <div class="col-md-3">
                                        <input type="file" id="logo" name="logo" accept="image/jpeg" value="Please provide jpg format">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="setupOption" class="col-md-2 col-form-label">Name of your event: </label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" value="" name="event-name" id="event-name">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="submit" class="col-md-2 col-form-label"> </label>
                                <div class="col-md-3">
                                </div>
                                <label for="submit" class="col-md-2 col-form-label"></label>
                                <div class="col-md-3">
                                    <input id="submit" name="submit" type="submit" class="button btnNext" value="Next">
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

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
            <script src="cookie.js"></script>

            <script>
                $(document).ready(function () {

                    $("#yes").click(function () {
                        //alert("hola");
                        $("#postedDiv").show();
                    });

                    $("#no").click(function () {
                        //alert("hola");
                        $("#postedDiv").hide();
                    });

                });
            </script>
        </body>

</html>