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
                    <div class="col-md-offset-0" >
                            <div class="col-md-2">
                                <button id="createNewRoombtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">New Event Room</button>
                            </div>   

                            <div class="col-md-2">
                                <button id="deleteRoomBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete User</button>
                             </div>  

                    </div>
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
                            echo '  <img alt="cedral" class="marriottEventRooms" height="40px" width="60px" src="data:image/jpeg;base64,'. base64_encode($row['Image']). '"/>';
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
                            
                                $names = $names. '<div class="row"><label class="col-md-2 col-form-label EventSetupLabel">'. $row2['name'] .'</label></div>';
                            
                            }
                            
                            echo '<div class="col-md-2">';
                            echo '<div class="form-group row EventRooms">';
                            echo $names;
                            echo '</div>';
                            echo '</div>'; 

                            echo '<div class="col-md-1">';
                            echo '  <input type="checkbox" name="avAid&[]" value="'. $row['ID'] .'"></input>';
                            echo '</div>'; 

                            echo '<div class="col-md-1">';
                            echo '  <input type="radio" onclick="radioButton()"  name="avAid&[]" value="'. $row['ID'] .'"></input>';
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

            <div id="modalCreateEventRoom" class="modal">
                <!-- Modal content -->
                <div class="modal-content ">
                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Create New Event Room</h2>
                    </div>

                    <div class="modal-body ">
         
                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Event Room Name: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" value="" name="RoomNAME" id="RoomName" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Event Image: </label>
                                <div class="col-md-3">
                                    <input type="file" id="logo" name="logo" accept="image/jpeg" value="Please provide jpg format">
                                </div>
                        </div>   

                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Surface: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateVerify-password" id="updateVerify-password" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Height: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateVerify-password" id="updateVerify-password" required>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-5">
                                <textarea name="amenities[]" rows="10" cols="60" placeholder="A brief event room description..."></textarea>                            
                            </div>
                            <label for="first-name" class="col-md-2 ">*Setups: </label>
                            <select class="col-md-3" id="updateType">
                              <option value="1">Admin</option>
                              <option value="0">EventPlanner</option>
                            </select> 
                        </div>
                        <div class="row" >
                            <input id="UpdateUserModalBtn" type="submit" class="button" value="Create"> 
                        </div>

                    </div>
                </div>
            </div>  

            <div id="modalUpdateEventRoom" class="modal">
                <!-- Modal content -->
                <div class="modal-content ">
                    <div class="modal-header">
                        <span class="close">×</span>
                        <h2>Update Event Room</h2>
                    </div>

                    <div class="modal-body ">
         
                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Event Room Name: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" value="" name="RoomNAME" id="RoomName" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Event Image: </label>
                                <div class="col-md-3">
                                    <input type="file" id="logo" name="logo" accept="image/jpeg" value="Please provide jpg format">
                                </div>
                        </div>   

                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Surface: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateVerify-password" id="updateVerify-password" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Height: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateVerify-password" id="updateVerify-password" required>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-5">
                                <textarea name="amenities[]" rows="10" cols="60" placeholder="A brief event room description..."></textarea>                            
                            </div>
                            <label for="first-name" class="col-md-2 ">*Setups: </label>
                            <select class="col-md-3" id="updateType">
                              <option value="1">Admin</option>
                              <option value="0">EventPlanner</option>
                            </select> 
                        </div>
                        <div class="row" >
                            <input id="UpdateUserModalBtn" type="submit" class="button" value="Update"> 
                        </div>

                    </div>
                </div>
            </div>  

            <div id = "UpdateEventBtn"></div>

            <footer>
                <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
                <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>

            </footer>


            <script>
                // Get the modal
                var UpdateEventRoomModal = document.getElementById('modalUpdateEventRoom'); 
                var createEventRoomModal = document.getElementById('modalCreateEventRoom');

                // Get the button that opens the modal
                var btn = document.getElementById("UpdateEventBtn"); 
                var createBtn = document.getElementById("createNewRoombtn");


                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal
                btn.onclick = function () {
                    UpdateEventRoomModal.style.display = "block"; 
                } 

                createBtn.onclick = function () {
                    createEventRoomModal.style.display = "block"; 
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    UpdateEventRoomModal.style.display = "none"; 
                    createEventRoomModal.style.display = "none"; 

                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == UpdateEventRoomModal) {
                        UpdateEventRoomModal.style.display = "none";
                    } 
                    if (event.target == createEventRoomModal) {
                        createEventRoomModal.style.display = "none";
                    }
                } 


                function radioButton(){ 
                    UpdateEventRoomModal.style.display = "block";
                } 

            </script> 

            <script>
                
                $(document).ready(function(){ 

                    $('#cancelUserModalBtn').click(function(){  
                        modalUpdateUser.style.display = "none";

                    });

                    //when the CreateUserBtn is clicked
                    $("#CreateUserBtn").click(function (){
                        /*alert("entre");  
                        alert($("#password").val() != ""); 
                        alert($("#username").val() != ""); 
                        alert($("#verify-password").val() != ""); 
                        alert($("#password").val() != "" &&  $("#username").val() != "" && $("#verify-password").val() != ""); */

                        //verifies that all the spaces are filed in 
                        if( $("#password").val() != "" &&  $("#username").val() != "" && $("#verify-password").val() != ""){   

                            //verifies that the username is an email 
                            if( validateEmail($("#username").val()) ) { 

                                //verifies that the passwords match
                                if($("#password").val() == $("#verify-password").val()){
                                    //alert($("#type").find("option:selected").val()); 
 
                                    $.ajax({
                                        method: 'POST',
                                        url: 'ajaxCheckUser.php',
                                        data: { 
                                            username: $("#username").val(), 
                                        },
                                        success: function(data){ 
                                            //alert(data); 
                                            //The username doesn't exist 
                                            if (data == "0"){    
                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'ajaxCreateUser.php',
                                                    data: { 
                                                        username: $("#username").val(), 
                                                        password: $("#password").val(), 
                                                        type: $("#type").find("option:selected").val()
                                                    },
                                                    success: function(data){ 
                                                        //alert(data);
                                                        if (data != "1"){   
                                                            alert("An error has occurred, please try again later");
                                                        }else{
                                                            location.reload();

                                                        }
                                                    } 
                                                }); 

                                            }
                                            else{
                                                alert("The username already exists, please try again.");
                                            }
                                        } 
                                    }); 

                                } 
                                else{ 
                                    alert("The passwords don't match. Please try again.");
                                }
                            } 
                            else{ 
                                alert("Its not an email");
                            }

                        }
                        else{ 
                            alert("Please fill in all the blanks");
                        }
 
                    }); 

                    $("#deleteRoomBtn").click(function (){  
                        alert("entre");
                        /*$('input:checkbox:checked').each(function(){
                            //alert($(this).val());  
                            $.ajax({
                                method: 'POST',
                                url: 'ajaxDeleteUser.php',
                                data: { 
                                    userId: $(this).val()
                                },
                                success: function(data){
                                    if (data != "1"){   
                                        alert("An error has occurred, please try again later");
                                    } 
                                    else{
                                        location.reload();
                                    }
                                }
                           });
                        });   */

                    }); 

                    // when the updateUserModalBtn is clicked
                    $("#UpdateUserModalBtn").click(function (){   
                        //for each checked radio button 
                        $('input:radio:checked').each(function(){
                            //alert($(this).val());  
                            //alert($("#updatePassword").val()); 
                            //alert($("#updateType").val());

                            // verifies that all the blanks are filled in
                            if( $("#updatePassword").val() != ""  && $("#updateVerify-password").val() != ""){  
                                //verifies that the passwords match 

                                if($("#updatePassword").val() == $("#updateVerify-password").val()){
                                    $.ajax({
                                        method: 'POST',
                                        url: 'ajaxUpdateUsername.php',
                                        data: { 
                                            userId: $(this).val(),  
                                            password: $("#updatePassword").val(),
                                            type: $("#updateType").val()
                                        },
                                        success: function(data){
                                            if (data != "1"){   
                                                alert("An error has occurred, please try again later");
                                            }else{ 
                                                location.reload(); 
                                                alert("User successfully updated!");
                                            }
                                        }
                                   });
                                }else{ 
                                    alert("Passwords don't match, please try again.")
                                }
                            }else{
                                alert("Please fill in all the blanks");
                            }

                        });   

                    }); 
                    
                });
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