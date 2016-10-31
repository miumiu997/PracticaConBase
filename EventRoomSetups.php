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
                        <H1 class="NavEventPlanner"> Edit Event Room Setups </H1>
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
                    <button id="createNewSetupbtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">New Setup</button>
                </div>   

                <div class="col-md-2">
                    <button id="deleteSetupBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete Setup</button>
                 </div>  

        </div>
        <div>
            <table id="table col-md-4">
                <tr>
                    <th class="col-md-1">Logo</th> 
                    <th class="col-md-2">Setup Name</th>
                    <th class="col-md-1">Delete</th>
                </tr>
                <?php
                    include_once("connection.php");

                    $sql = "SELECT `ID`, `Name`, `Image` FROM `roomsetup` ";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo de los resultados   
                        echo '<tr>'; 
                        echo '  <td class="col-md-1">';
                        echo '          <img alt="cedral" height="150px" width="150px" src="data:image/jpeg;base64,'. base64_encode($row['Image']). '"/>'; 
                        echo '  <td class="col-md-2">'. $row['Name'] . '</td>';

                        echo '  </td>';
                        echo '  <td class="col-md-1"><input class="checkboxDelete" type="checkbox"  value='. $row['ID'] . '></td>';
                        echo '</tr>';
                    }
                ?>
                  
            </table>
        </div>  
        


    </div>

    <div id="modalCreateSetup" class="modal">
        <!-- Modal content -->
        <div class="modal-content ">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Create New Setup</h2>
            </div>

            <div class="modal-body ">
                <div class="row">
                    <label for="first-name" class="col-md-2 col-form-label">*Setup Name: </label>
                    <div class="col-md-3">
                        <input class="form-control" type="text" value="" name="setupName" id="setupName" required>
                    </div>
                </div>  
                <div class="row">
                    <label for="Event-image" class="col-md-2 col-form-label">*Setup Logo: </label>
                    <div class="col-md-3">
                        <input type="file" id="logo" name="logo" accept="image/jpeg" value="Please provide jpg format">
                    </div>
                </div>  
                <input id="CreateModalSetupBtn" type="submit" class="button" value="Create">
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
                var modalCreateSetup = document.getElementById('modalCreateSetup');

                // Get the button that opens the modal
                var btnCreateUser = document.getElementById("createNewSetupbtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var functionModalCreateSetup = function () {
                    modalCreateSetup.style.display = "block";
                }

                    // When the user clicks the button, open the modal
                btnCreateUser.onclick = functionModalCreateSetup; 

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {

                        modalCreateSetup.style.display = "none";

                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modalCreateSetup) {
                        modalCreateSetup.style.display = "none";

                    }
                }  

                $(document).ready(function(){ 


                    //when the CreateUserBtn is clicked
                    $("#CreateModalSetupBtn").click(function (){
                        //alert("entre");  
                        //alert($("#setupName").val() != ""); 

                        //verifies that the name is filed in 
                        if( $("#setupName").val() != "" ){   
                            //alert("entre2");  
                            
                            var data = new FormData();
                            $.each($('#logo')[0].files, function(i, file) {
                                data.append("image", file);
                            });
                            
                            data.append("name", $("#setupName").val());
                            
                            //alert(data);
                            
                            $.ajax({
                                method: 'POST',
                                url: 'ajaxCreateSetup.php',
                                data: data,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(data){ 
                                    //alert(data);
                                    if (data != "1"){   
                                        alert("An error has occurred, please try again later");
                                    }else{ 
                                        alert("Setup successfully created!");
                                        location.reload();

                                    }
                                } 
                            }); 

                        }
                        else{ 
                            alert("Please fill in all the blanks");
                        }
 
                    }); 

                    $("#deleteSetupBtn").click(function (){  
                        //alert("entre");
                        $('input:checkbox:checked').each(function(){
                            //alert($(this).val());  
                            $.ajax({
                                method: 'POST',
                                url: 'ajaxDeleteSetup.php',
                                data: { 
                                    setupId: $(this).val()
                                },
                                success: function(data){ 
                                    //alert(data);
                                    if (data != "1"){   
                                        alert("An error has occurred, please try again later");
                                    } 
                                    else{ 
                                        alert("Setup successfully deleted");
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
            
            <!-- Include all compiled plugins (below), or include individual files as needed -->

</body>

</html>