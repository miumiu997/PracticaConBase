<!DOCTYPE html>
<html lang="en">

<!--
    <?php
        // Start the session
        session_start();
        $_SESSION['comments'] = $_GET['mytext'];
    ?> 
    -->

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
                        <H1 class="NavEventPlanner"> Requests </H1>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="SignIn"><a href="SignIn.html">Sign In</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div class="row" id="SearchRequest">
            <div class="col-lg-2 col-lg-offset-8">
                <input class="form-control" type="text" placeholder="Request ID or Name" name="search_request_input" id="search_request_input">
            </div>
            <div class="col-lg-2">
                <button type="button" id="search" name="search" class="btn btn-default BlueButton">Search Request</button>
            </div>
        </div>
        <div>
            <table id="table">
                <tr>
                    <th> </th>
                    <th>Client Name</th>
                    <th>Request ID</th>
                    <th>Requested Date</th>
                </tr>
                <?php
                    include_once("connection.php");
                    //$search = $_GET['search'];
                    //$search = $_GET['search'];

                    $sql = "SELECT `RequestNumber`, `Name`, `LastName`, `Date`, `Seen` FROM `request`";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo de los resultados   
                        
                        
                        echo '<tr class="clickable-row" data-href="adminSummary.php?request='. $row['RequestNumber'] .'">';
                        echo '  <td>';

                        if($row['Seen'] == 0){
                            echo 'o';   
                        }
                        echo '  </td>';
                        echo '  <td>'. $row['Name'] . ' '. $row['LastName']. '</td>';
                        echo '  <td>' . $row['RequestNumber'] .'</td>';
                        echo '  <td>'. $row['Date'] .'</td>';
                        echo '</tr>';
                        
                    }
                ?>
            </table>
        </div>
    </div>

    <footer>
        <img class="marriottLogoFooter" height="40px" width="60px" src="logos/WhiteLogo.png" />
        <H1 id="footerID">©1996 - 2016 Marriott International, Inc. All rights reserved. Marriott proprietary information.</H1>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#search").click(function () {
                //alert($('#search_request_input').val());
                $.ajax({
                    method: 'GET',
                    url: 'ajaxSearch.php?search=' + $('#search_request_input').val(),
                    data: {},
                    success: function (data) {
                        //alert(data);
                        $('#table').empty();
                        $('#table').append(data);
                    }
                });
            });
            
            $(".clickable-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>