<?php
    session_start();
    //$user = $_SESSION["username"];

    $file = "check.txt";
    $text = file_get_contents($file);
    $values = preg_split('/[\n,]+/', $text);

    foreach($values as $value){
        //echo $value;
    }
    
    if($value == "No"){
        header('location:database-setup.php');
    }else{
?>
<!DOCTYPE html>

<html lang="en">

    <head>
        <title> Entry Portal | Air Pollution </title>
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

    <body>
    <div id="wholepage-portal">
    
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-12">

                    <header id="welcome">

                        <div class="welcome-box">

                            

                            

                            <div id="pre-logo">
                                <h1 class="heading-text"> <div class="main-head"><a id="comp-name"><img class="logo-img" src="images/AirPollution Logo.png" alt="Air Pollution Logo"/><span id="main-head-txt">Air Pollution</span></a></div> </h1>
                            </div>

                        

                            <h1 class="heading-text"> <span class="sub-head">Show You Care and Save the Air!</span> </h1>

                        

                            <button class="heading-btn"><a id="get-started" href="index1.php?page=home">Get Started</a></button>

                        </div>
                    </header>
                </div>
            </div>
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
    <?php } ?>