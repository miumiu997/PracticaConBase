<!DOCTYPE html>
<html lang="en">


    <?php
        // Start the session
        error_reporting(0);
        include_once("connection.php");
    
        session_start();

        
        $sql = "SELECT `ID`, `Name` FROM `roomsetup`";
        $result = mysqli_query($conn, $sql) or die(mysql_error());

        while ($row = mysqli_fetch_assoc($result)) {

            $setupOptions = $setupOptions. '<div class="col-md-2">';
            $setupOptions = $setupOptions.      '<input type="checkbox" name="avAid&[]" value="'.$row['ID'].'">'.$row['Name'].'</input>';
            $setupOptions = $setupOptions. '</div>';

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
                        <H1 class="NavEventPlanner"> Edit Event Rooms </H1>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div class="col-md-offset-0" >
                <div class="col-md-2">
                    <button id="createNewUserbtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">New Event Room</button>
                </div>   

                <div class="col-md-2">
                    <button id="deleteUserBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete Event Room</button>
                 </div>  

        </div>
        <div>
            <table id="EventRoomTable" cellpadding="0" cellspacing="0" border="none">
                <tr>
                    <th class="col-md-2">Image</th>
                    <th class="col-md-2">Description</th> 
                    <!--<th class="col-md-1">Update</th>-->
                    <th class="col-md-1">Delete</th>
                </tr>
                <?php
                    include_once("connection.php");

                    $sql = "SELECT `ID`, `Name`, `Description`, `Surface`, `Height`, `Image`, `Price` FROM `eventroom`";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo de los resultados   
                        echo '<tr>'; 
                        echo '  <td class="col-md-1" text-align:"center"> '; 
                        echo '      <h2 class="EventinformationTxt">'. $row['Name'] .'</h2>';

                        echo '      <div class="row">'; 
                        echo '          <img alt="cedral" class="marriottEventRooms" height="40px" width="80px" src="data:image/jpeg;base64,'. base64_encode($row['Image']). '"/>';
                        echo '      </div>'; 
                        echo '  </td>';
                        echo '  <td class="col-md-2">'; 
                            echo '  <div class="row">';
                            echo '      <p class="EventinformationTxt">'. $row['Description'] .'</p>';
                            echo '      <p> Measurements: Surface: '. $row['Surface'] .' Height: '. $row['Height'] .'</p>';  
                            echo '      <p> Price: '. $row['Price'] .'</p>'; 
                            echo '      <p> Available Setups: </p>'; 

                            $sql2 = "SELECT `roomsetup`.`Name`, `roomsetup`.`image` FROM `roomsetup`, `eventroom`, `setupxroom` WHERE `setupxroom`.`EventSetupID` = `eventroom`.`ID` AND `setupxroom`.`RoomSetupID` = `roomsetup`.`ID` AND `eventroom`.`ID` = ". $row['ID'];
                            $result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 

                            
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo '<p> '. $row[`roomsetup`.`Name`] .'</p>'; 
                            
                            }


                            echo '  </div>';
                        echo '  </td>';
                        /*echo '  <td class="col-md-1 "><input class="radioUpdate" name="radioUpdate" type="radio"  onclick="radioButton()" value='. $row['ID'] . '></td>';*/
                        echo '  <td class="col-md-1"><input class="checkboxDelete" type="checkbox"  value='. $row['ID'] . '></td>';
                        echo '</tr>';
                    }
                ?>
                  
            </table>
        </div>  
        <div class="col-md-2" id="updateUserBtn"></div>
        


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
                                <input class="form-control" type="text" value="" name="createRoomNAME" id="createRoomName" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Event Image: </label>
                                <div class="col-md-3">
                                    <input type="file" id="logo" name="event-roomImage" accept="image/jpeg" value="Please provide jpg format">
                                </div>
                        </div>   

                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Surface: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="createRoomSurface" id="createRoomSurface" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Height: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="createRoomHeight" id="createRoomHeight" required>
                            </div>
                        </div>  

                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Price: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="createRoomPrice" id="createRoomPrice" required>
                            </div> 
                        </div>   

                        <div class="row">
                            <div class="col-md-5">
                                <textarea name="amenities[]" rows="10" cols="60" id="createDescription" placeholder="A brief event room description..."></textarea>                            
                            </div>   

                            <label for="first-name" class="col-md-2 col-form-label">*Available Setups: </label>

                            <div class="col-md-6" id="SetupOptionsCreateModalId"> 
                                <?php
                                    $options = str_replace("&", "1", $setupOptions);
                                    echo $options;
                                ?>
                            </div>
                        </div> 
                        <div class="row" >
                            <input id="createNewUserModalBtn" type="submit" class="button" value="Create"> 
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
                            <label for="updateEventRoomName" class="col-md-2 col-form-label">*Event Room Name: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" value="" name="updateRoomName" id="updateRoomName" required>
                            </div> 
                            <label for="Event-image" class="col-md-2 col-form-label">*Event Image: </label>
                                <div class="col-md-3">
                                    <input type="file" id="logo" name="logo" accept="image/jpeg" value="Please provide jpg format">
                                </div>
                        </div>   

                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Surface: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateRoomSurface" id="updateRoomSurface" required>
                            </div> 
                            <label for="first-name" class="col-md-2 col-form-label">*Height: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateRoomHeight" id="updateRoomHeight" required>
                            </div>
                        </div>   

                        <div class="row">
                            <label for="first-name" class="col-md-2 col-form-label">*Price: </label>
                            <div class="col-md-3">
                                <input class="form-control" type="number" value="" name="updateRoomPrice" id="updateRoomPrice" required>
                            </div> 
                        </div>  

                        <div class="row">
                            <div class="col-md-5">
                                <textarea name="amenities[]" rows="10" cols="60" placeholder="A brief event room description..."></textarea>                            
                            </div>
                            <label for="first-name" class="col-md-2 col-form-label">*Available Setups: </label>
                            <div class="col-md-6"> 
                                <?php
                                    $options = str_replace("&", "1", $setupOptions);
                                    echo $options;
                                ?>
                            </div>
                        </div>
                        <div class="row" >
                            <input id="updateUserModalBtn" type="submit" class="button" value="Update"> 
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
                var modalCreateEventRoom = document.getElementById('modalCreateEventRoom');
                var modalUpdateEventRoom = document.getElementById('modalUpdateEventRoom');

                // Get the button that opens the modal
                var btnCreateUser = document.getElementById("createNewUserbtn");
                var btnUpdateUser = document.getElementById("updateUserBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var functionmodalCreateEventRoom = function () {
                    modalCreateEventRoom.style.display = "block";
                }

                var functionmodalUpdateEventRoom = function () { 
                    modalUpdateEventRoom.style.display = "block";
                }
     
                    // When the user clicks the button, open the modal
                btnCreateUser.onclick = functionmodalCreateEventRoom; 
                btnUpdateUser.onclick = functionmodalUpdateEventRoom; 

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {

                        modalCreateEventRoom.style.display = "none";
                        modalUpdateEventRoom.style.display = "none";

                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modalCreateEventRoom) {
                        modalCreateEventRoom.style.display = "none";

                    }
                    if (event.target == modalUpdateEventRoom) {
                        modalUpdateEventRoom.style.display = "none";
                    }
                }  


                function validateEmail(email) {
                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
                }  

                function radioButton(){ 
                        modalUpdateEventRoom.style.display = "block";
                }

                $(document).ready(function(){ 

                    //when the CreateUserBtn is clicked
                    $("#createNewUserModalBtn").click(function (){
                        //alert("entre");  
                        //alert($("#createRoomName").val()); 
                        //alert($("#createRoomSurface").val()); 
                        //alert($("#createRoomHeight").val() );  
                        //alert($("#createDescription").val()); 
                        //alert($("#createRoomPrice").val()); 

                        //verifies that the name is filled in 
                        if( $("#createRoomName").val() != ""){   
                            //alert("name is filled in"); 
 
                            var data = new FormData();
                            $.each($('#logo')[0].files, function(i, file) {
                                data.append("image", file);
                            });
                            
                            data.append("name", $("#createRoomName").val());
                            data.append("surface", $("#createRoomSurface").val());
                            data.append("height", $("#createRoomHeight").val());
                            data.append("description", $("#createDescription").val());
                            data.append("price", $("#createRoomPrice").val());
                            
                            
                            //creates event 
                             $.ajax({
                                method: 'POST',
                                url: 'ajaxCreateEventRoom.php',
                                data: data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(data){   

                                    if (data != "-1"){    
                                        //enters setups to setupsxroom  
                                        $('#SetupOptionsCreateModalId :checked').each(function(){  
                                            alert(data);  
                                            alert($(this).val()); 
                                            alert("-----");  
  

                                            $.ajax({
                                                method: 'POST',
                                                url: 'ajaxInsertSetupXRoom.php',
                                                data: {  
                                                    setupId: $(this).val(), 
                                                    eventRoomId: data

                                                },
                                                success: function(data){ 
                                                    alert(data);
                                                    if (data != "1"){   
                                                        alert("An error has occurred, please try again later");
                                                    } 
                                                    else{
                                                        location.reload();
                                                    }
                                                }
                                           });
                                        
                                        });  
                                    }
                                    else{
                                        alert("The username already exists, please try again."); 
                                    }
                                } 
                            });

                        }
                        else{ 
                            alert("Please fill in the event name.");
                        }
 
                    }); 

                    $("#deleteUserBtn").click(function (){  
                        //alert("entre");
                        $('input:checkbox:checked').each(function(){
                            //alert($(this).val());  
                            $.ajax({
                                method: 'POST',
                                url: 'ajaxDeleteEventRoom.php',
                                data: { 
                                    EventRoomId: $(this).val()
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
                        });   

                    }); 

                    // when the updateEventRoomModalBtn is clicked
                    $("#updateUserModalBtn").click(function (){  

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

</body>

</html>