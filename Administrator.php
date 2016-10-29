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
        <div class="col-md-offset-0">
                <div class="col-md-2">
                    <button id="createNewUserbtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">New User</button>
                </div> 
                <div class="col-md-2">
                    <button id="createNewUserbtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Update User</button>
                </div>  

                <div class="col-md-2">
                    <button id="createNewUserbtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete User</button>
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
                        echo '  <td class="col-md-1 radioUpdate"><input type="radio"  value='. $row['ID'] . '></td>';
                        echo '  <td class="col-md-1"><input type="checkbox"  value='. $row['ID'] . '></td>';
                        echo '</tr>';
                    }
                ?>
                  
            </table>
        </div> 
        


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
    <footer>
        <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
        <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>
    </footer>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>
                // Get the modal
                var modalCreateUser = document.getElementById('modalCreateUser');

                // Get the button that opens the modal
                var btnCreateUser = document.getElementById("createNewUserbtn");
 
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var functionModalAddAvAid = function () {
                    modalCreateUser.style.display = "block";
                }
     
                    // When the user clicks the button, open the modal
                btnCreateUser.onclick = functionModalAddAvAid; 

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                        modalCreateUser.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modalCreateUser) {
                        modalCreateUser.style.display = "none";
                    }
                }  

                $(document).ready(function(){
                   
                    $("#CreateUserBtn").click(function (){
                       // alert("entre"); 
                        if($("#password").val() == $("#verify-password").val()){
                           // alert("son iguales"); 
                            //alert($("#type").find("option:selected").val());
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
                    }); 

                    $("#deleteAvAidsBtn").click(function (){  
                        alert("entre");
                        $('#AllAvAids :checked').each(function(){
                            alert($(this).val()); 
                            $.ajax({
                                method: 'POST',
                                url: 'ajaxDeleteAvAid.php',
                                data: { 
                                    avAidId: $(this).val()
                                },
                                success: function(data){
                                    if (data != "1"){   
                                        alert("An error has occurred, please try again later");
                                    }
                                }
                           }); 
                        });   

                        location.reload();
                    });
                });

            </script>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>

</body>

</html>