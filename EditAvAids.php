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
            $selectSetup = $selectSetup. '<option value="'.$row['ID'].'">'.$row['Name'].'</option>';
        }
    
        
        $avAidsOptions = '<div class="form-group row EventRooms">';
        $sql = "SELECT `ID`, `Name`, `Price` FROM `avaids`";
        $i = 0;
        $result = mysqli_query($conn, $sql) or die(mysql_error());

        while ($row = mysqli_fetch_assoc($result)) {

            $avAidsOptions = $avAidsOptions. '<div class="col-md-5 AvAidOptions">';
            $avAidsOptions = $avAidsOptions. '  <div align="left">'. $row['Name'] .' <div align="right"> $'. $row['Price'] .'</div></div> ';
            $avAidsOptions = $avAidsOptions. '</div>';
            $avAidsOptions = $avAidsOptions. '<div class="col-md-1">';
            $avAidsOptions = $avAidsOptions. '  <input type="checkbox" name="avAid&[]" value="'. $row['ID'] .'"></input>';
            $avAidsOptions = $avAidsOptions. '</div>';

            $i = $i + 1;
            if ($i % 2 == 0){
                $avAidsOptions = $avAidsOptions. "</div>";
                $avAidsOptions = $avAidsOptions. '<div class="form-group row EventRooms">';
            }

        }

        $avAidsOptions = $avAidsOptions. "</div>";
    
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
                        <H1 class="NavEventPlanner"> Edit AV Aids </H1>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="row">
                </div>
                <!-- This is repeated by the amount of category options there are -->

                    <div class="row" id="AllAvAids">

                        <?php
                            $options = str_replace("&", "1", $avAidsOptions);
                            echo $options;
                        ?>

                        <!-- This is repeated by the amount of amenities there are  -->

                    </div>


                    <div class="form-group row">
                        <label for="submit" class="col-md-1 col-form-label"></label> 
                        <div class="col-md-3">
                            <button id="deleteAvAidsBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Delete AvAid</button>
                        </div> 
                    </div> 
                    <div class="form-group row">
                        <label for="submit" class="col-md-1 col-form-label"></label> 
                        <div class="col-md-3">
                            <button id="addAvAidsBtn" type="button" class="btn viewinfo2" data-toggle="modal" data-target="#myModal">Add AvAid</button>
                        </div> 
                    </div>

            </div>
        </div>
    </div> 
    
    <div id="modalAddAvAid" class="modal">
        <!-- Modal content -->
        <div class="modal-content ">
            <div class="modal-header">
                <span class="close">×</span>
                <h2>Add AvAid</h2>
            </div>
            
            <div id="CreateAvAidForm" >  
                <div class="modal-body">
                    <div class="row">
                        <label for="first-name" class="col-md-2 col-form-label">*AV Aid name: </label>
                        <div class="col-md-3">
                            <input class="form-control" type="text" value="" name="first-name" id="AvAidName" required>
                        </div>
                    </div>  
                    <div class="row">
                        <label for="first-name" class="col-md-2 col-form-label">*Price: </label>
                        <div class="col-md-3">
                            <input class="form-control" type="number" value="" name="first-name" id="AvAidPrice" required>
                        </div>
                    </div> 
                        <input type="button" class="button" value="Add" id="CreateAvAidBtn">
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
                var modalAddAvAid = document.getElementById('modalAddAvAid');

                // Get the button that opens the modal
                var btnAddAvAid = document.getElementById("addAvAidsBtn");
 
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                var functionModalAddAvAid = function () {
                    modalAddAvAid .style.display = "block";
                }
     
                    // When the user clicks the button, open the modal
                btnAddAvAid.onclick = functionModalAddAvAid; 

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                        modalAddAvAid.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function (event) {
                    if (event.target == modalAddAvAid) {
                        modalAddAvAid.style.display = "none";
                    }
                } 

        $(document).ready(function(){
           
            $("#CreateAvAidBtn").click(function (){
                $.ajax({
                    method: 'POST',
                    url: 'ajaxCreateAvAid.php',
                    data: { 
                        name: $('#AvAidName').val(),
                        price: $('#AvAidPrice').val()
                    },
                    success: function(data){
                        if (data == "1"){   
                            location.reload();
                            alert("Success");
                        } else{
                            alert("An error has occurred, please try again later");
                        }
                    }
               });
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