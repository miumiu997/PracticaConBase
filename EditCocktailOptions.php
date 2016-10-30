<!DOCTYPE html>
<html lang="en">
    <?php
        // Start the session
        error_reporting(0);
        include_once("connection.php");
    
        session_start();

        $sql = "SELECT `ID`, `Name` FROM `roomsetup`";
        $result = mysqli_query($conn, $sql) or die(mysql_error());
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
            <li><H1 class="NavEventPlanner"> Edit Cocktail Options </H1></li> 

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

        <div class="container">   
            <div class="row">
                <!-- This is repeated by the amount of category options there are --> 

                    <div class="row" id="cocktailoption">
                                    <?php

                                            $sql = "SELECT `ID`, `Name`  FROM `categoryoptions` WHERE `IDMenuCategory` = 5"; // Cocktail id = 5
                                            $result = mysqli_query($conn, $sql) or die(mysql_error());

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                echo '<div class="form-group row EventRooms">';
                                                echo '  <label class="col-md-4 col-form-label PackageLabel">'. $row['Name'] .'</label>';
                                                echo '  <input class="col-md-2" id="radiobreakfast" type="checkbox" name="radiobreakfast" value="'. $row['ID'] .'"></input>';
                                                echo '</div>';

                                                $sql2 = "SELECT `Name` FROM `plates` WHERE `IDCategoryOptions` = ". $row['ID'];

                                                $result2 = mysqli_query($conn, $sql2) or die(mysql_error());

                                                $i = 0;

                                                echo '<div class="form-group row EventRooms">';
                                                while ($row2 = mysqli_fetch_assoc($result2)) {

                                                    echo '  <div class="col-md-4">';
                                                    echo '      <p>- '. $row2['Name'] .'</p>';
                                                    echo '  </div>';

                                                    $i = $i + 1;

                                                    if ($i % 3 == 0) {
                                                        echo "</div>";
                                                        echo '<div class="form-group row EventRooms">';
                                                    }
                                                }
                                                echo '</div>';
                                            }

                                        ?>
           

                    </div>
 

                    <div class="form-group row">
                        <label for="submit" class="col-md-1 col-form-label"></label> 
                        <div class="col-md-3">
                            <button id="deleteCocktailBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete Cocktail Option</button>
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label for="submit" class="col-md-1 col-form-label"></label> 
                        <div class="col-md-3">
                            <button id="addMenuOptionBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Add New Cocktail Option</button>
                        </div> 
                    </div> 


            </div>              
            

        </div>
    </div>
    
    <div id="modalAddCategoryOption" class="modal">
        <!-- Modal content -->
        <div class="modal-content ">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Add New Lunch Option</h2>
            </div>

            <div class="modal-body ">
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Name: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="text" value="" name="first-name" id="dishOptionName" required>
                    </div> 
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Price: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="text" value="" name="first-name" id="dishOptionPrice" required>
                    </div> 
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Dishes: </label> 
                </div>  

                <div class = "row">  
                     <div class="input_fields_wrap col-md-4 col-md-offset-3 ">
                        <button class="add_field_button AddBtn">Click here to add another dish </button>
                        <div>
                            <input type="text" name="mytext[]" class=" DishName CommentInput col-m form-control" /> 

                            <a href="#" class="remove_field RemoveBtn">Remove</a>
                        </div> 
                    </div>
                </div> 

                <input type="button" class="button" value="Create" id="CreateCocktailOption">
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
                var modalAddMenuCategoryOption = document.getElementById('modalAddCategoryOption');

                // Get the button that opens the modal
                var btnAddMenuOption = document.getElementById("addMenuOptionBtn");
 
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var functionModalAddMenuCategoryOption = function () {
                    modalAddMenuCategoryOption.style.display = "block";
                }
     
                    // When the user clicks the button, open the modal
                btnAddMenuOption.onclick = functionModalAddMenuCategoryOption; 

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                        modalAddMenuCategoryOption.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modalAddMenuCategoryOption) {
                        modalAddMenuCategoryOption.style.display = "none";
                    }
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
                    //alert(days);
                    if (days == 0) {
                        $("#form").attr('action', 'SleepingRooms.php');
                    } else {
                        $("#form").attr('action', 'EventInformation.php');
                    }
                });
            </script> 

    <script>
        $(document).ready(function () {
            var max_fields = 30; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append("<div><input type='text' name='mytext[]' class=' DishName CommentInput form-control'/><a href='#' class='remove_field RemoveBtn'>Remove</a></div>"); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

            $("#deleteCocktailBtn").click(function (){  
               // alert("entre");
                $('#cocktailoption :checked').each(function(){
                    //alert($(this).val()); 
                    $.ajax({
                        method: 'POST',
                        url: 'ajaxDeleteCategoryOption.php',
                        data: { 
                            CategoryOptionId: $(this).val()
                        },
                        success: function(data){ 
                            //alert(data);
                            if (data != "1"){   
                                alert("An error has occurred, please try again later");
                            }
                        }
                   }); 
                });   

                location.reload();
            }); 

            $("#CreateCocktailOption").click(function (){  
                //alert("entre"); 
                //alert($("#dishOptionName").val()); 
                //alert($("#dishOptionPrice").val());   

                //verifies that all the spaces are filled
                if($("#dishOptionName").val() != "" && $("#dishOptionPrice").val() != ""){   
                    //alert("All Filled"); 
                    //alert(!isNaN($("#dishOptionPrice").val()) );

                    //verifies that the price is a number
                    if( !isNaN($("#dishOptionPrice").val()) ){  

                        //creates the menu category   
                        $.ajax({
                            method: 'POST',
                            url: 'ajaxCreateBreakfastCategory.php',
                            data: { 
                                OptionName: $("#dishOptionName").val(),
                                OptionPrice: $("#dishOptionPrice").val(), 
                                Category: 5
                            },
                            success: function(data){ 
                                //alert(data);
                                if (data != -1){    
                                    //goes through all the dishes 
                                    $(".DishName").each(function(index) { 
                                        //alert($(this).val()); 
 
                                        //inserts dishes
                                        $.ajax({
                                            method: 'POST',
                                            url: 'ajaxInsertBreakfastDishes.php',
                                            data: { 
                                                CategoryOptionId: data, 
                                                DishName: $(this).val()
                                            },
                                            success: function(data){ 
                                                //alert(data);
                                                if (data == "-1"){   
                                                    alert("An error has occurred, please try again later."); 
                                                    location.reload();
                                                }
                                            }
                                       });  
                                    });   

                                    alert("Cocktail Option has been successfully created."); 
                                    location.reload();

                                }else{  
                                    alert("An error has occurred, please try again later");

                                }
                            }
                       });


                    }else{ 
                        alert("Please enter a number for the price.");
                    }

                }else{ 
                    alert("Please fill in the blanks!");
                } 
            });

        });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>