<!DOCTYPE html>
<html lang="en">

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
                        <H1 class="NavEventPlanner"> Edit Users </H1>
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
                    <button id="createNewUserbtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">New User</button>
                </div>   

                <div class="col-md-2">
                    <button id="deleteUserBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete User</button>
                 </div>  

        </div>
        <div>
            <table id="table">
                <tr>
                    <th class="col-md-2">Username</th>
                    <th class="col-md-2">Type</th> 
                    <th class="col-md-1">Update</th>
                    <th class="col-md-1">Delete</th>
                </tr>
                <?php
                    include_once("connection.php");

                    $sql = "SELECT `User`, `Password`, `Type`, `ID` FROM `user/admin`";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo de los resultados   
                        echo '<tr>'; 
                        echo '  <td class="col-md-2">'. $row['User'] . '</td>';
                        echo '  <td class="col-md-2">';
                        if($row['Type'] == 1){
                            echo 'Administrator';   
                        }else{ 
                            echo 'Event Planner';
                        }
                        echo '  </td>';
                        echo '  <td class="col-md-1 "><input class="radioUpdate" name="radioUpdate" type="radio"  onclick="radioButton()" value='. $row['ID'] . '></td>';
                        echo '  <td class="col-md-1"><input class="checkboxDelete" type="checkbox"  value='. $row['ID'] . '></td>';
                        echo '</tr>';
                    }
                ?>
                  
            </table>
        </div>  
        <div class="col-md-2" id="updateUserBtn"></div>
        


    </div>

    <div id="modalCreateUser" class="modal">
        <!-- Modal content -->
        <div class="modal-content ">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Create New User</h2>
            </div>

            <div class="modal-body ">
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Username: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="email" value="" name="username" id="username" required>
                    </div>
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Password: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="password" value="" name="password" id="password" required>
                    </div>
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Verify Password: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="password" value="" name="verify-password" id="verify-password" required>
                    </div>
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Type of User: </label>
                    <select class="col-md-3" id="type">
                      <option value="1">Admin</option>
                      <option value="0">EventPlanner</option>
                    </select> 
                </div>

                <input id="CreateUserBtn" type="submit" class="button" value="Create">
            </div>
        </div>
    </div> 


    <div id="modalUpdateUser" class="modal">
        <!-- Modal content -->
        <div class="modal-content ">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Update User</h2>
            </div>

            <div class="modal-body ">
 
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Password: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="password" value="" name="updatePassword" id="updatePassword" required>
                    </div>
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Verify Password: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="password" value="" name="updateVerify-password" id="updateVerify-password" required>
                    </div>
                </div>  
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Type of User: </label>
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
    <footer>
        <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
        <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>
    </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>
                // Get the modal
                var modalCreateUser = document.getElementById('modalCreateUser');
                var modalUpdateUser = document.getElementById('modalUpdateUser');

                // Get the button that opens the modal
                var btnCreateUser = document.getElementById("createNewUserbtn");
                var btnUpdateUser = document.getElementById("updateUserBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var functionModalCreateUser = function () {
                    modalCreateUser.style.display = "block";
                }

                var functionModalUpdateUser = function () { 
                    modalUpdateUser.style.display = "block";
                }
     
                    // When the user clicks the button, open the modal
                btnCreateUser.onclick = functionModalCreateUser; 
                btnUpdateUser.onclick = functionModalUpdateUser; 

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {

                        modalCreateUser.style.display = "none";
                        modalUpdateUser.style.display = "none";

                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modalCreateUser) {
                        modalCreateUser.style.display = "none";

                    }
                    if (event.target == modalUpdateUser) {
                        modalUpdateUser.style.display = "none";
                    }
                }  


                function validateEmail(email) {
                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
                }  

                function radioButton(){ 
                        modalUpdateUser.style.display = "block";
                }

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

                    $("#deleteUserBtn").click(function (){  
                        //alert("entre");
                        $('input:checkbox:checked').each(function(){
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
                        });   

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

</body>

</html>