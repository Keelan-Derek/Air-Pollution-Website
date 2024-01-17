<!DOCTYPE html>
<html lang="en">
<head>
    <title> Database Set-Up | Air Pollution </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--Search Engine Optimization -->
        <meta name="description" content="Air pollution is a seroius issue that must be addressed for the well-being of the earth and its inhabitants. 
        This website aims to inform visitors on air pollution, its causes and effects, as well as the possible solutions.">
        <meta name="keywords" content="pollution, air pollution, china, air pollution in china, causes of air pollution, effects of air pollution, solutions to air pollution, donation">   
    <!-- SEO -->
        
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet" type="text/css">
        <link href="aos/dist/aos.css" rel="stylesheet" type="text/css">
        <link href="animate.css-master/animate.min.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body id="db-config-page">

    <div class="container-fluid">
        <br><br><br><br><br><br><br><br><br>
        <div class="row mt-3 mb-3">

            <div class="col-sm-2"></div>

            <div class="col-sm-8">

                <h5 class="display-4" style="font-size: 40px !important; font-weight: 500;">Configuration Page</h5>
                <p> First, please create an empty database in <span style="font-style: italic;">phpmyadmin</span>. The created database should be named air_pollution, and this should be name inserted down below. <br>
                Then enter the details of your <span style="font-style: italic;">phpmyadmin</span> to configure the site database and import the tables.</p>
                
                <form id="configuration" method="POST" action="database-config.php">
                    <h5 class="display-4 ml-3" style="font-size: 40px !important; font-weight: 500;">Database Configuration</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="localhost" style="font-weight: bold;">Database Host:</label>
                            <input class="form-control" type="text" name="localhost"/> <br>
                            
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="database" style="font-weight: bold;">Database Name:</label>
                            <input class="form-control" type="text" name="database" /><br>
                            
                        </div>       
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="user" style="font-weight: bold;">DB Username:</label>
                            <input class="form-control" type="text" name="dbuser" /><br>
                            
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label for="pass" style="font-weight: bold;">DB Password:</label>
                            <input class="form-control" type="password" name="dbpass"/><br>
                            
                        </div>         
                    </div>
                    <div class="form-group text-center">
                        <input class="btn btn-success" type="submit" value="Configure" id="configure-db">
                    </div>
                </form>
                <small class="text-muted font-weight-bold">Values set in "config/config.ini" need to be cleared (e.g."host = " where host = localhost) after a session with the website. 
            And "check.txt" needs to be set back to "No" where the value is equal to "Yes".</small>
            </div>


            <div class="col-sm-2"></div>

        </div>
        
    </div>



    <!-- Script Source Files -->
        <script src="js/jquery-3.4.1.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="aos/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    <!-- End of Script Source Files -->
</body>
</html>
