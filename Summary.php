<!DOCTYPE html>
<html lang="en">

<?php
    // Start the session
    session_start();
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

                <form method="get" action="SleepingRooms.html">
                    <div class="row" id="tableClothPackages">

                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>First Name: </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Second Name: </p>
                            </div>
                            <div class="col-md-1">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>E-mail: </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Telephone: </p>
                            </div>
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Event Date: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>Company: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Reason: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>Publish: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>Logo: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>

                        <!-- This is repeated by the amount of amenities there are  -->

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label PackageLabel">Day 1</label>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Type of service: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                            <div class="col-md-3 AvAidOptions">
                                <p>#Guests: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div> 
                            <div class="col-md-3 AvAidOptions">
                                <p>Setup: </p>
                            </div>
                            <div class="col-md-1 AvAidOptions">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Time: </p>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-3 AvAidOptions">
                                <p>Menu</p>
                            </div>
                        </div> 
        
                    </div>


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
                $("#tableClothPackages").show();
            });
            $("#no").click(function () {
                $("#tableClothPackages").hide();
            });

        });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>