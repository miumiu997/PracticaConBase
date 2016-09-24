<!DOCTYPE html>
<html lang="en">

<?php 
        include_once("connection.php");
    ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Event Information</title>

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
                            <H1 class="NavEventPlanner"> Event Planner </H1>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <!--
        Ammenities
        AvAids
        Menú
        -->

            <div>
                <div class="row questionDiv">
                    <h1 class="question">What are you planning for your first day?</h1>
                </div>
                <div class="row">
                    <form method="get" id="form" name="form">

                        <input type="hidden" id="days" name="days" value="<?php echo $_GET['days'] - 1; ?>" />

                        <div id="Breakfast" class="col-md-2">
                            <div id="eventInformation">
                                <div class="form-group row EventInfo">
                                    <h1 class="ColumnTitle">Breakfast</h1>
                                </div>
                                <div class="form-group row EventInfo">
                                    <label for="single" class="col-md-4 col-form-label">#Guests: </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" value="" name="NoGuests[]" id="NoGuests">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <label for="single" class="col-md-4 col-form-label">Setup: </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" value="" name="RoomSetup" id="RoomSetup">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <label for="single" class="col-md-4 col-form-label">Time: </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="time" value="" name="startTime" id="startTime">
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnMenu" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Menu</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAvAids" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Av Aids</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAmenities" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Additional needs</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="Breakfast" class="col-md-2">
                            <div id="eventInformation">
                                <div class="form-group row EventInfo">
                                    <h1 class="ColumnTitle">Morning Coffee Break</h1>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="NoGuests[]" id="NoGuests">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="RoomSetup[]" id="RoomSetup">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="time" value="" name="startTime[]" id="startTime">
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnMenu2" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Menu</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAvAids2" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Av Aids</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAmenities2" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Additional needs</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="Breakfast" class="col-md-2">
                            <div id="eventInformation">
                                <div class="form-group row EventInfo">
                                    <h1 class="ColumnTitle">Lunch</h1>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="NoGuests[]" id="NoGuests">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="RoomSetup[]" id="RoomSetup">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="time" value="" name="startTime[]" id="startTime">
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnMenu3" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Menu</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAvAids3" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Av Aids</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAmenities3" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Additional needs</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="Breakfast" class="col-md-2">
                            <div id="eventInformation">
                                <div class="form-group row EventInfo">
                                    <h1 class="ColumnTitle">Afternoon Coffee Break</h1>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="NoGuests[]" id="NoGuests">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="RoomSetup[]" id="RoomSetup">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="time" value="" name="startTime[]" id="startTime">
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnMenu4" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Menu</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAvAids4" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Av Aids</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAmenities4" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Additional needs</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="Breakfast" class="col-md-2">
                            <div id="eventInformation">
                                <div class="form-group row EventInfo">
                                    <h1 class="ColumnTitle">Dinner</h1>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="NoGuests[]" id="NoGuests">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="RoomSetup[]" id="RoomSetup">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="time" value="" name="startTime[]" id="startTime">
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnMenu5" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Menu</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAvAids5" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Av Aids</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAmenities5" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Additional needs</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div id="Breakfast" class="col-md-2">
                            <div id="eventInformation">
                                <div class="form-group row EventInfo">
                                    <h1 class="ColumnTitle">Other</h1>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="NoGuests[]" id="NoGuests">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="number" value="" name="RoomSetup[]" id="RoomSetup">
                                    </div>
                                </div>
                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <input class="form-control" type="time" value="" name="startTime[]" id="startTime">
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnMenu6" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Menu</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAvAids6" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Av Aids</button>
                                    </div>
                                </div>

                                <div class="form-group row EventInfo">
                                    <div class="col-md-12">
                                        <button id="myBtnAmenities6" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Additional needs</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="submit" class="col-md-2 col-form-label"> </label>
                            <div class="col-md-3">
                            </div>
                            <label for="submit" class="col-md-2 col-form-label"></label>
                            <div class="col-md-3">
                                <input type="submit" class="button" value="Next Day">
                            </div>
                        </div>

                    </form>

                </div>

            </div>

            <div id="MenuModal" class="modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">◊</span>
                        <h2>Menu</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row" id="menu">
                            <form method="get" action="AvAids.html">
                                <div class="row">
                                    <div class="row questionDiv">
                                        <h1 class="question">We are proud to offer you the following Food and Beverage options </h1>
                                    </div>
                                </div>

                                <!-- This is repeated by the amount of amenities there are -->

                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label for="single" class="col-md-4 col-form-label MenuLabel">Breakfast</label>
                                        <label for="single" class="col-md-4 col-form-label MenuLabel">Coffee Break</label>
                                        <label for="single" class="col-md-4 col-form-label MenuLabel">Lunch</label>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <a id="apackage1">
                                                <img alt="package1" class="menuPhotos" src="photos/Menu/Breakfast.jpg" />
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <img alt="package2" class="menuPhotos" src="photos/Menu/CoffeeBreak.jpg" />
                                        </div>
                                        <div class="col-md-4">
                                            <img alt="package3" class="menuPhotos" src="photos/Menu/Lunch.jpg" />
                                        </div>
                                    </div>


                                    <div class="form-group row EventRooms">
                                        <label for="single" class="col-md-4 col-form-label MenuLabel">Dinner</label>
                                        <label for="single" class="col-md-4 col-form-label MenuLabel">Cocktail</label>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <img alt="package1" class="menuPhotos" height="10px" width="60px" src="photos/Menu/Dinner.jpg" />
                                        </div>
                                        <div class="col-md-4">
                                            <img alt="package2" class="menuPhotos" height="40px" width="60px" src="photos/Menu/Cocktail.jpg" />
                                        </div>
                                    </div>

                                    <!-- This is repeated by the amount of amenities there are  -->

                                </div>


                            </form>
                        </div>
                        <!--- -->

                        <div class="row" id="categoryOptions" hidden="hidden">
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="AvAids.html">
                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Courtyard Breakfast</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>

                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Variety of fruit</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Your choice of eggs</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Variety of cheese and meats </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Bacon or Ham </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Gallo Pinto </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Plantain or Cheese </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Toast, butter or jam </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Corn Tortillas</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- 3 choices of beverages</p>
                                        </div>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Working Breakfast</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>Your choice of bread</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Fresh Fruit Parfait</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Yogurt</p>
                                        </div>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>Honey, butter or Jam</p>
                                        </div>
                                    </div>
                                    <!-- This is repeated by the amount of amenities there are  -->

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label PackageLabel">Other</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea rows="5" cols="50" placeholder="Our kitchen staff will gladly help you with any special menu you desire"></textarea>
                                        </div>

                                    </div>

                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="BreakfastModal" class="modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">◊</span>
                        <h2>Breakfast Options</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row" id="categoryOptions" >
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="AvAids.html">
                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Courtyard Breakfast</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>

                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Variety of fruit</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Your choice of eggs</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Variety of cheese and meats </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Bacon or Ham </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Gallo Pinto </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Plantain or Cheese </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Toast, butter or jam </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Corn Tortillas</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- 3 choices of beverages</p>
                                        </div>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Working Breakfast</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>Your choice of bread</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Fresh Fruit Parfait</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Yogurt</p>
                                        </div>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>Honey, butter or Jam</p>
                                        </div>
                                    </div>
                                    <!-- This is repeated by the amount of amenities there are  -->

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label PackageLabel">Other</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea rows="5" cols="50" placeholder="Our kitchen staff will gladly help you with any special menu you desire"></textarea>
                                        </div>

                                    </div>

                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="MorningCoffeeModal" class="modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">◊</span>
                        <h2>Morning Coffee Break Options</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row" id="categoryOptions" >
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="AvAids.html">
                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Courtyard Coffee</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>

                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Variety of fruit</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Your choice of eggs</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Variety of cheese and meats </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Bacon or Ham </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Gallo Pinto </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Plantain or Cheese </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Toast, butter or jam </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Corn Tortillas</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- 3 choices of beverages</p>
                                        </div>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Working Breakfast</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>Your choice of bread</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Fresh Fruit Parfait</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>Yogurt</p>
                                        </div>
                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>Honey, butter or Jam</p>
                                        </div>
                                    </div>
                                    <!-- This is repeated by the amount of amenities there are  -->

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label PackageLabel">Other</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea rows="5" cols="50" placeholder="Our kitchen staff will gladly help you with any special menu you desire"></textarea>
                                        </div>

                                    </div>

                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="LunchModal" class="modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">◊</span>
                        <h2>Lunch Options</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row" id="categoryOptions" >
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="AvAids.html">
                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Courtyard Lunch</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>

                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Variety of fruit</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Your choice of eggs</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Variety of cheese and meats </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Bacon or Ham </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Gallo Pinto </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Plantain or Cheese </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Toast, butter or jam </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Corn Tortillas</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- 3 choices of beverages</p>
                                        </div>
                                    </div>


                                    <!-- This is repeated by the amount of amenities there are  -->

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label PackageLabel">Other</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea rows="5" cols="50" placeholder="Our kitchen staff will gladly help you with any special menu you desire"></textarea>
                                        </div>

                                    </div>

                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="AfternoonCoffeeModal" class="modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">◊</span>
                        <h2>Afternoon Coffee Options</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row" id="categoryOptions" >
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="AvAids.html">
                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Courtyard Afternoon Coffee</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>

                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Variety of fruit</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Your choice of eggs</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Variety of cheese and meats </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Bacon or Ham </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Gallo Pinto </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Plantain or Cheese </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Toast, butter or jam </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Corn Tortillas</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- 3 choices of beverages</p>
                                        </div>
                                    </div>


                                    <!-- This is repeated by the amount of amenities there are  -->

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label PackageLabel">Other</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea rows="5" cols="50" placeholder="Our kitchen staff will gladly help you with any special menu you desire"></textarea>
                                        </div>

                                    </div>

                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="DinnerModal" class="modal">
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">◊</span>
                        <h2>Dinner Options</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row" id="categoryOptions" >
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="AvAids.html">
                                <div class="row" id="tableClothPackages">
                                    <div class="form-group row EventRooms">
                                        <label class="col-md-4 col-form-label PackageLabel">Dinner Coffee</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>

                                    </div>

                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Variety of fruit</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Your choice of eggs</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Variety of cheese and meats </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Bacon or Ham </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Gallo Pinto </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Plantain or Cheese </p>
                                        </div>
                                    </div>
                                    <div class="form-group row EventRooms">
                                        <div class="col-md-4">
                                            <p>- Toast, butter or jam </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- Corn Tortillas</p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>- 3 choices of beverages</p>
                                        </div>
                                    </div>


                                    <!-- This is repeated by the amount of amenities there are  -->

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label PackageLabel">Other</label>
                                        <input class="col-md-2" type="radio" name="vehicle2" value="EventRoomID"></input>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea rows="5" cols="50" placeholder="Our kitchen staff will gladly help you with any special menu you desire"></textarea>
                                        </div>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="AvAidsModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>AvAids</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h2 class="question">We are always prepared to fulfill your needs to assure the success of your event </h2>
                                </div>
                            </div>
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="SleepingRooms.html">
                                <div class="row" id="tableClothPackages">

                                    <?php
                                    echo '<div class="form-group row EventRooms">';
                                    $sql = "SELECT `ID`, `Name` FROM `avaids`";
                                    $i = 0;
                                    $result = mysqli_query($conn, $sql) or die('no se puedo');
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                        echo '<div class="col-md-4 AvAidOptions">';
                                        echo '  <p>'. $row['Name'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-1">';
                                        echo '  <input type="checkbox" name="avAid" value="'. $row['ID'] .'"></input>';
                                        echo '</div>';
                                        
                                        $i = $i + 1;
                                        if ($i % 2 == 0){
                                            echo "</div>";
                                            echo '<div class="form-group row EventRooms">';
                                        }
                                    
                                    }
                                
                                    echo "</div>";
                                
                                ?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label PackageLabel">Other</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea rows="5" cols="50" placeholder="Describe the menu needed...."></textarea>
                                            </div>
                                        </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="AvAidsModal2" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>AvAids</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h2 class="question">We are always prepared to fulfill your needs to assure the success of your event </h2>
                                </div>
                            </div>
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="SleepingRooms.html">
                                <div class="row" id="tableClothPackages">

                                    <?php
                                    echo '<div class="form-group row EventRooms">';
                                    $sql = "SELECT `ID`, `Name` FROM `avaids`";
                                    $i = 0;
                                    $result = mysqli_query($conn, $sql) or die('no se puedo');
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                        echo '<div class="col-md-4 AvAidOptions">';
                                        echo '  <p>'. $row['Name'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-1">';
                                        echo '  <input type="checkbox" name="avAid" value="'. $row['ID'] .'"></input>';
                                        echo '</div>';
                                        
                                        $i = $i + 1;
                                        if ($i % 2 == 0){
                                            echo "</div>";
                                            echo '<div class="form-group row EventRooms">';
                                        }
                                    
                                    }
                                
                                    echo "</div>";
                                
                                ?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label PackageLabel">Other</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea rows="5" cols="50" placeholder="Describe the menu needed...."></textarea>
                                            </div>
                                        </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="AvAidsModal3" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>AvAids</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h2 class="question">We are always prepared to fulfill your needs to assure the success of your event </h2>
                                </div>
                            </div>
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="SleepingRooms.html">
                                <div class="row" id="tableClothPackages">

                                    <?php
                                    echo '<div class="form-group row EventRooms">';
                                    $sql = "SELECT `ID`, `Name` FROM `avaids`";
                                    $i = 0;
                                    $result = mysqli_query($conn, $sql) or die('no se puedo');
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                        echo '<div class="col-md-4 AvAidOptions">';
                                        echo '  <p>'. $row['Name'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-1">';
                                        echo '  <input type="checkbox" name="avAid" value="'. $row['ID'] .'"></input>';
                                        echo '</div>';
                                        
                                        $i = $i + 1;
                                        if ($i % 2 == 0){
                                            echo "</div>";
                                            echo '<div class="form-group row EventRooms">';
                                        }
                                    
                                    }
                                
                                    echo "</div>";
                                
                                ?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label PackageLabel">Other</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea rows="5" cols="50" placeholder="Describe the menu needed...."></textarea>
                                            </div>
                                        </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="AvAidsModal4" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>AvAids</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h2 class="question">We are always prepared to fulfill your needs to assure the success of your event </h2>
                                </div>
                            </div>
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="SleepingRooms.html">
                                <div class="row" id="tableClothPackages">

                                    <?php
                                    echo '<div class="form-group row EventRooms">';
                                    $sql = "SELECT `ID`, `Name` FROM `avaids`";
                                    $i = 0;
                                    $result = mysqli_query($conn, $sql) or die('no se puedo');
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                        echo '<div class="col-md-4 AvAidOptions">';
                                        echo '  <p>'. $row['Name'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-1">';
                                        echo '  <input type="checkbox" name="avAid" value="'. $row['ID'] .'"></input>';
                                        echo '</div>';
                                        
                                        $i = $i + 1;
                                        if ($i % 2 == 0){
                                            echo "</div>";
                                            echo '<div class="form-group row EventRooms">';
                                        }
                                    
                                    }
                                
                                    echo "</div>";
                                
                                ?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label PackageLabel">Other</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea rows="5" cols="50" placeholder="Describe the menu needed...."></textarea>
                                            </div>
                                        </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="AvAidsModal5" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>AvAids</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h2 class="question">We are always prepared to fulfill your needs to assure the success of your event </h2>
                                </div>
                            </div>
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="SleepingRooms.html">
                                <div class="row" id="tableClothPackages">

                                    <?php
                                    echo '<div class="form-group row EventRooms">';
                                    $sql = "SELECT `ID`, `Name` FROM `avaids`";
                                    $i = 0;
                                    $result = mysqli_query($conn, $sql) or die('no se puedo');
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                        echo '<div class="col-md-4 AvAidOptions">';
                                        echo '  <p>'. $row['Name'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-1">';
                                        echo '  <input type="checkbox" name="avAid" value="'. $row['ID'] .'"></input>';
                                        echo '</div>';
                                        
                                        $i = $i + 1;
                                        if ($i % 2 == 0){
                                            echo "</div>";
                                            echo '<div class="form-group row EventRooms">';
                                        }
                                    
                                    }
                                
                                    echo "</div>";
                                
                                ?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label PackageLabel">Other</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea rows="5" cols="50" placeholder="Describe the menu needed...."></textarea>
                                            </div>
                                        </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 


            <div id="AvAidsModal6" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>AvAids</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h2 class="question">We are always prepared to fulfill your needs to assure the success of your event </h2>
                                </div>
                            </div>
                            <!-- This is repeated by the amount of category options there are -->

                            <form method="get" action="SleepingRooms.html">
                                <div class="row" id="tableClothPackages">

                                    <?php
                                    echo '<div class="form-group row EventRooms">';
                                    $sql = "SELECT `ID`, `Name` FROM `avaids`";
                                    $i = 0;
                                    $result = mysqli_query($conn, $sql) or die('no se puedo');
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                        echo '<div class="col-md-4 AvAidOptions">';
                                        echo '  <p>'. $row['Name'] .'</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-1">';
                                        echo '  <input type="checkbox" name="avAid" value="'. $row['ID'] .'"></input>';
                                        echo '</div>';
                                        
                                        $i = $i + 1;
                                        if ($i % 2 == 0){
                                            echo "</div>";
                                            echo '<div class="form-group row EventRooms">';
                                        }
                                    
                                    }
                                
                                    echo "</div>";
                                
                                ?>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label PackageLabel">Other</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <textarea rows="5" cols="50" placeholder="Describe the menu needed...."></textarea>
                                            </div>
                                        </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="AmenitiesModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Amenities</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h1 class="question">Additional Needs</h1>
                                </div>
                            </div>

                            <!-- This is repeated by the amount of amenities there are -->

                            <form method="get" action="Menus.html">
                                <textarea rows="10" cols="60" placeholder="Tell us more about your needs i.e. specific tablecloths, candles, flowers, face painters etc. We will do our best to find out and suggest the best options in the market for you"></textarea>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="AmenitiesModal2" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Amenities</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h1 class="question">Additional Needs</h1>
                                </div>
                            </div>

                            <!-- This is repeated by the amount of amenities there are -->

                            <form method="get" action="Menus.html">
                                <textarea rows="10" cols="60" placeholder="Tell us more about your needs i.e. specific tablecloths, candles, flowers, face painters etc. We will do our best to find out and suggest the best options in the market for you"></textarea>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="AmenitiesModal3" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Amenities</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h1 class="question">Additional Needs</h1>
                                </div>
                            </div>

                            <!-- This is repeated by the amount of amenities there are -->

                            <form method="get" action="Menus.html">
                                <textarea rows="10" cols="60" placeholder="Tell us more about your needs i.e. specific tablecloths, candles, flowers, face painters etc. We will do our best to find out and suggest the best options in the market for you"></textarea>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
                
            <div id="AmenitiesModal4" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Amenities</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h1 class="question">Additional Needs</h1>
                                </div>
                            </div>

                            <!-- This is repeated by the amount of amenities there are -->

                            <form method="get" action="Menus.html">
                                <textarea rows="10" cols="60" placeholder="Tell us more about your needs i.e. specific tablecloths, candles, flowers, face painters etc. We will do our best to find out and suggest the best options in the market for you"></textarea>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="AmenitiesModal5" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Amenities</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h1 class="question">Additional Needs</h1>
                                </div>
                            </div>

                            <!-- This is repeated by the amount of amenities there are -->

                            <form method="get" action="Menus.html">
                                <textarea rows="10" cols="60" placeholder="Tell us more about your needs i.e. specific tablecloths, candles, flowers, face painters etc. We will do our best to find out and suggest the best options in the market for you"></textarea>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 

            <div id="AmenitiesModal6" class="modal">
                <!-- Modal content -->
                <div class="modal-content">

                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Amenities</h2>
                    </div>

                    <div class="modal-body ">
                        <div class="row">
                            <div class="row">
                                <div class="row questionDiv">
                                    <h1 class="question">Additional Needs</h1>
                                </div>
                            </div>

                            <!-- This is repeated by the amount of amenities there are -->

                            <form method="get" action="Menus.html">
                                <textarea rows="10" cols="60" placeholder="Tell us more about your needs i.e. specific tablecloths, candles, flowers, face painters etc. We will do our best to find out and suggest the best options in the market for you"></textarea>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
                <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>
            </footer>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script>
                    // Get the modal
                    var modalMenu = document.getElementById('MenuModal');
                    var modalBreakfast = document.getElementById('BreakfastModal');
                    var modalMorningCoffee = document.getElementById('MorningCoffeeModal'); 
                    var modalLunch = document.getElementById('LunchModal'); 
                    var modalAfternoonCoffee = document.getElementById('AfternoonCoffeeModal'); 
                    var modalDinner = document.getElementById('DinnerModal'); 

                    var modalAvAids = document.getElementById('AvAidsModal'); 
                    var modalAvAids2 = document.getElementById('AvAidsModal2'); 
                    var modalAvAids3 = document.getElementById('AvAidsModal3'); 
                    var modalAvAids4 = document.getElementById('AvAidsModal4'); 
                    var modalAvAids5 = document.getElementById('AvAidsModal5'); 
                    var modalAvAids6 = document.getElementById('AvAidsModal6'); 

                    var modalAmenities = document.getElementById('AmenitiesModal');
                    var modalAmenities2 = document.getElementById('AmenitiesModal2');
                    var modalAmenities3 = document.getElementById('AmenitiesModal3');
                    var modalAmenities4 = document.getElementById('AmenitiesModal4');
                    var modalAmenities5 = document.getElementById('AmenitiesModal5');
                    var modalAmenities6 = document.getElementById('AmenitiesModal6');


                    // Get the button that opens the modal
                    var btnMenu = document.getElementById("myBtnMenu");
                    var btnMenu2 = document.getElementById("myBtnMenu2");
                    var btnMenu3 = document.getElementById("myBtnMenu3");
                    var btnMenu4 = document.getElementById("myBtnMenu4");
                    var btnMenu5 = document.getElementById("myBtnMenu5");
                    var btnMenu6 = document.getElementById("myBtnMenu6");

                    var btnAvAids = document.getElementById("myBtnAvAids");
                    var btnAvAids2 = document.getElementById("myBtnAvAids2");
                    var btnAvAids3 = document.getElementById("myBtnAvAids3");
                    var btnAvAids4 = document.getElementById("myBtnAvAids4");
                    var btnAvAids5 = document.getElementById("myBtnAvAids5");
                    var btnAvAids6 = document.getElementById("myBtnAvAids6");

                    var btnAmenities = document.getElementById("myBtnAmenities");
                    var btnAmenities2 = document.getElementById("myBtnAmenities2");
                    var btnAmenities3 = document.getElementById("myBtnAmenities3");
                    var btnAmenities4 = document.getElementById("myBtnAmenities4");
                    var btnAmenities5 = document.getElementById("myBtnAmenities5");
                    var btnAmenities6 = document.getElementById("myBtnAmenities6");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    
                    var functionModalMenu = function () {
                        modalMenu.style.display = "block";
                    }

                    var functionModalBreakfast = function () {
                        modalBreakfast.style.display = "block";
                    }  

                    var functionMorningCoffee = function () {
                        modalMorningCoffee.style.display = "block";
                    } 

                    var functionLunch = function () {
                        modalLunch.style.display = "block";
                    } 

                    var functionAfternoonCoffee = function () { 
                        modalAfternoonCoffee.style.display = "block";
                    }

                    var functionDinner = function (){ 
                        modalDinner.style.display = "block";
                    }


                    var functionModalAvAids = function () {
                        modalAvAids.style.display = "block";
                    } 

                    var functionModalAvAids2 = function () {
                        modalAvAids2.style.display = "block";
                    } 

                    var functionModalAvAids3 = function () {
                        modalAvAids3.style.display = "block";
                    }

                    var functionModalAvAids4 = function () {
                        modalAvAids4.style.display = "block";
                    } 

                    var functionModalAvAids5 = function () {
                        modalAvAids5.style.display = "block";
                    }  

                    var functionModalAvAids6 = function () {
                        modalAvAids6.style.display = "block";
                    }

                    var functionModalAmmenities = function () {
                        modalAmenities.style.display = "block";
                    }   

                    var functionModalAmmenities2 = function () {
                        modalAmenities2.style.display = "block";
                    }   

                    var functionModalAmmenities3 = function () {
                        modalAmenities3.style.display = "block";
                    }   

                    var functionModalAmmenities4 = function () {
                        modalAmenities4.style.display = "block";
                    }  

                    var functionModalAmmenities5 = function () {
                        modalAmenities5.style.display = "block";
                    }  

                    var functionModalAmmenities6 = function () {
                        modalAmenities6.style.display = "block";
                    }  
                    // When the user clicks the button, open the modal
                    btnMenu.onclick = functionModalBreakfast;
                    btnMenu2.onclick = functionMorningCoffee;
                    btnMenu3.onclick = functionLunch;
                    btnMenu4.onclick = functionAfternoonCoffee;
                    btnMenu5.onclick = functionDinner;
                    btnMenu6.onclick = functionModalMenu;

                    btnAvAids.onclick = functionModalAvAids;
                    btnAvAids2.onclick = functionModalAvAids2;
                    btnAvAids3.onclick = functionModalAvAids3;
                    btnAvAids4.onclick = functionModalAvAids4;
                    btnAvAids5.onclick = functionModalAvAids5;
                    btnAvAids6.onclick = functionModalAvAids6;

                    btnAmenities.onclick = functionModalAmmenities;
                    btnAmenities2.onclick = functionModalAmmenities2;
                    btnAmenities3.onclick = functionModalAmmenities3;
                    btnAmenities4.onclick = functionModalAmmenities4;
                    btnAmenities5.onclick = functionModalAmmenities5;
                    btnAmenities6.onclick = functionModalAmmenities6;  

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function () {
                        modalMenu.style.display = "none";
                        divMenu.style.display = "block";
                        divCategoryOptions.style.display = "none";

                        modalBreakfast.style.display = "none"; 
                        modalMorningCoffee.style.display = "none"; 
                        modalLunch.style.display = "none"; 
                        modalAfternoonCoffee.style.display = "none"; 
                        modalDinner.style.display = "none"; 

                        modalAvAids.style.display = "none"; 
                        modalAvAids2.style.display = "none";
                        modalAvAids3.style.display = "none";
                        modalAvAids4.style.display = "none";
                        modalAvAids5.style.display = "none";
                        modalAvAids6.style.display = "none";

                        modalAmenities.style.display = "none"; 
                        modalAmenities2.style.display = "none"; 
                        modalAmenities3.style.display = "none"; 
                        modalAmenities4.style.display = "none"; 
                        modalAmenities5.style.display = "none"; 
                        modalAmenities6.style.display = "none"; 

                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {   
                        if (event.target == modalAmenities) {
                            modalAmenities.style.display = "none";
                        }    

                        if (event.target == modalAmenities2) {
                            modalAmenities2.style.display = "none";
                        }   

                        if (event.target == modalAmenities3) {
                            modalAmenities3.style.display = "none";
                        }   

                        if (event.target == modalAmenities4) {
                            modalAmenities4.style.display = "none";
                        }    

                        if (event.target == modalAmenities5) {
                            modalAmenities5.style.display = "none";
                        }  

                        if (event.target == modalAmenities6) {
                            modalAmenities6.style.display = "none";
                        }  

                        if (event.target == modalAvAids) {
                            modalAvAids.style.display = "none";
                        }   

                        if (event.target == modalAvAids2) {
                            modalAvAids2.style.display = "none";
                        }  

                        if (event.target == modalAvAids3) {
                            modalAvAids3.style.display = "none";
                        }   

                        if (event.target == modalAvAids4) {
                            modalAvAids4.style.display = "none";
                        }  

                        if (event.target == modalAvAids5) {
                            modalAvAids5.style.display = "none";
                        }   

                        if (event.target == modalAvAids6) {
                            modalAvAids6.style.display = "none";
                        }  

                        if (event.target == modalDinner) {
                            modalDinner.style.display = "none";
                        }     

                        if (event.target == modalAfternoonCoffee) {
                            modalAfternoonCoffee.style.display = "none";
                        }    

                        if (event.target == modalMorningCoffee) {
                            modalMorningCoffee.style.display = "none";
                        }   

                        if (event.target == modalLunch) {
                            modalLunch.style.display = "none";

                        } 

                        if (event.target == modalBreakfast) {
                            modalBreakfast.style.display = "none";

                        } 

                        if (event.target == modalMenu) {
                            modalMenu.style.display = "none";
                            divMenu.style.display = "block";
                            divCategoryOptions.style.display = "none";
                        }
                    }

                    var apackage1 = document.getElementById("apackage1");
                    var divMenu = document.getElementById("menu");
                    var divCategoryOptions = document.getElementById("categoryOptions");

                    apackage1.onclick = function () {
                        divMenu.style.display = "none";
                        divCategoryOptions.style.display = "block";
                    }
                </script>

                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>


                <script>
                    $(document).ready(function () {

                        //$(location).attr('href', 'www.google.co.in');
                        var days = $("#days").val();
                        if (days == 0) {
                            $("#form").attr('action', 'SleepingRooms.php');
                        } else {
                            $("#form").attr('action', 'EventInformation.php');
                        }


                    });
                </script>

    </body>

</html>