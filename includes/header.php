<?php
session_start();
 @$page = $_GET["page"];
 switch(@$page){
     case "":
         $home = "class='active'";
         $ourcampaigns = ""; 
         $about = "";  
         $contact = ""; 
         $shop = "";
         $checkout = ""; 
         $myaccount = "";
         $signup = "";
         $login = "";
         $donate = ""; 
         break;
     case "index":
        $home = "class='active'";
        $ourcampaigns = ""; 
        $about = "";  
        $contact = ""; 
        $shop = ""; 
        $checkout = "";
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = ""; 
        break;
     case "our-campaigns":
        $home = "";
        $ourcampaigns = "class='active'"; 
        $about = "";  
        $contact = ""; 
        $shop = "";
        $checkout = ""; 
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = ""; 
        break;
     case "about":
        $home = "";
        $ourcampaigns = ""; 
        $about = "class='active'";  
        $contact = ""; 
        $shop = ""; 
        $checkout = "";
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = "";
        break;
     case "contact-us":
        $home = "";
        $ourcampaigns = "";
        $about = ""; 
        $contact = "class='active'"; 
        $shop = ""; 
        $checkout = "";
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = "";
        break;
     case "shop":
        $home = "";
        $ourcampaigns = "";
        $about = ""; 
        $contact = ""; 
        $shop = "class='active'";
        $checkout = "";
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = ""; 
        break;
    case "checkout":
        $home = "";
        $ourcampaigns = "";
        $about = ""; 
        $contact = ""; 
        $shop = "";
        $checkout = "class='active'";
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = ""; 
        break;
     case "myaccount":
        $home = "";
        $ourcampaigns = ""; 
        $about = ""; 
        $contact = ""; 
        $shop = "";
        $checkout = ""; 
        $myaccount = "class='active'";
        $signup = "";
        $login = "";
        $donate = ""; 
        break;
     case "signup":
        $home = "";
        $ourcampaigns = ""; 
        $about = "";  
        $contact = ""; 
        $shop = ""; 
        $checkout = "";
        $myaccount = "";
        $signup = "class='active'";
        $login = "";
        $donate = ""; 
        break;
    case "login":
        $home = "";
        $ourcampaigns = ""; 
        $about = ""; 
        $contact = "";
        $shop = ""; 
        $checkout = "";
        $myaccount = "";
        $signup = "";
        $login = "class='active'";
        $donate = ""; 
        break;
    case "donate":
        $home = "";
        $ourcampaigns = "";
        $about = "";  
        $contact = "";
        $shop = ""; 
        $checkout = "";
        $myaccount = "";
        $signup = "";
        $login = "";
        $donate = "class='active'"; 
        break;
 }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
            <meta charset="UTF-8">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

            var ipinfo;

            $.getJSON("http://ipinfo.io", function (data) {

                $("#info").html(data.city + ",  " + data.country)

            })

        </script>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!--Search Engine Optimization -->
            <meta name="description" content="Air pollution is a seroius issue that must be addressed for the well-being of the earth and its inhabitants. 
            This website aims to inform visitors on air pollution, its causes and effects, as well as the possible solutions.">
            <meta name="keywords" content="pollution, air pollution, china, air pollution in china, causes of air pollution, effects of air pollution, solutions to air pollution, donation">   
        <!-- SEO -->

            <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
            <link href="fontawesome-free-5.12.0-web/css/all.css" rel="stylesheet" type="text/css">
            <link href="aos/dist/aos.css" rel="stylesheet" type="text/css">
            <link href="animate.css-master/animate.min.css" rel="stylesheet" type="text/css">

            <link href="style.css" rel="stylesheet" type="text/css">
             
        <script>
            function openSearch() {
                document.getElementById("searchOverlay").style.display="block";
            }

            function closeSearch(){
                document.getElementById("searchOverlay").style.display="none";
            }
        </script>

    </head>

    <body>

        <!-- Header Section -->

        <div class="container-fluid">

            <div class="row align-items-center" id="header">

                        
                <div class="col-sm-2 text-center" id="city">
                    <img class="location_icon" src="images/location icon.png" alt="location icon"/>
                    
                    <span id="info"></span>
                </div>

                <div class="col-sm-8 mx-auto">


                    <div class="mx-auto" id="logo-items">
                        <br/><br/>

                        <h1 class="heading-text" class=""><a class="main-logo" href="index1.php?page=home"><img class="logo-img" src="images/AirPollution Logo.png" alt="Air Pollution Logo"/><span class="logo-text">Air Pollution<h6>China</h6></span></a></h1>
                        
                    </div> 

                </div> 

                <div class="col-sm-2">

                    <div id="buttons" >

                        <ul class="icons">
                            <li class="icon-item">
                                <div id="searchOverlay" class="overlay">
                                    <span class="closebtn" onClick="closeSearch()" title="Close Search Window"><i class="fas fa-times"></i></span>
                                    <div class="overlay-content">
                                        <form action="https://www.google.com/search" method="GET" id="search">
                                            <input type="text" name="q" placeholder="Google Search" class="input">
                                            <button type="sumbit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                
                                <button class="search-btn" onclick="openSearch()">
                                    <i class="fa fa-search" id="icon1"></i>
                                </button>                                      
                            </li>

                            <li class="icon-item">
                                <button id="user-btn" onClick="myFunction()" class="dropbtn">
                                    <i class="far fa-user" id="icon2"></i>
                                </button>
                                <ul class="dropdwn-items">
                                        <?php
                                        if(isset($_SESSION["loggedin"])){
                                            if ($_SESSION["loggedin"] == true){
                                                echo '<li><a class="user-acc" href="./logout.php">Log Out</a></li>';
                                            }
                                        } else {
                                            echo '<li><a class="user-acc" href="index1.php?page=signup">Sign Up</a></li>';
                                            echo '<li><a class="user-acc" href="index1.php?page=login">Log In</a></li>';
                                        }
                                        ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <?php 
                            if (isset($_SESSION["loggedin"])){ 
                                if ($_SESSION["loggedin"] == true){
                                    if(isset($_SESSION["username"])){
                                        echo '<div class="text-center" style="font-weight:bold;">Hello there, <span class="font-italic text-capitalize">' .$_SESSION["username"]. '</span>! Welcome!</div>';
                                    }
                                }
                            }                 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Header Section-->
        

            <!--Navigation Bar-->

            <nav class="navbar navbar-expand-xl navbar-dark bg-dark sticky-top" id="navbar">
                
                <div class="container-fluid">

                <!-- Logo/Brand -->
                    
                    <a class="navbar-brand" href="index1.php?page=home">
                        <img src="images/AirPollution Logo.png" width="60px" height="60px" alt="Air Polluton Logo">&nbsp;
                        <span class="h4" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; letter-spacing:3px; text-transform:uppercase;">Air Pollution</span>
                    </a>
                    
                    <!-- Toggler/Collapsibe Button -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- NavBar Links -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav m-auto">
                            <li class="nav-item active dropdown mt-1">
                                <a class="nav-link dropdown-toggle link" href="index1.php?page=home" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle navigation">Home</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item mb-2" href="index1.php?page=home#What is Air Pollution">What is Air Pollution?</a>
                                    <a class="dropdown-item mb-2" href="index1.php?page=home#Causes of Air Pollution">Causes of Air Pollution</a>
                                    <a class="dropdown-item mb-2" href="index1.php?page=home#Effects of Air Pollution">Effects of Air Pollution</a>
                                    <a class="dropdown-item mb-2" href="index1.php?page=home#Prevention of Air Pollution">Prevention of Air Pollution</a>
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item dropright" href="index1.php?page=home#AirPollutioninChina"><i class="fas fa-flag"></i>&nbsp; Air Pollution in China</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index1.php?page=home#What You Can Do"> What You Can Do</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown mt-1">
                                <a class="nav-link dropdown-toggle link" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle navigation">Our Campaigns</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index1.php?page=home#campaign1"><i class="fas fa-leaf"></i>&nbsp; Green Building</a>
                                        <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index1.php?page=home#campaign2"><i class="fas fa-car"></i>&nbsp; Eco-Friendly Transportation </a>
                                        <div class="dropdown-divider"></div> 
                                    <a class="dropdown-item" href="index1.php?page=home#campaign3"><i class="far fa-lightbulb"></i>&nbsp; Energy Conservation and Efficiency</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown mt-1">
                                <a class="nav-link" href="index1.php?page=about">About Us</a>
                            </li>
                            <li class="nav-item dropdown mt-1">
                            <a class="nav-link" href="index1.php?page=contact-us">Contact Us</a>
                            </li>
                            <li class="nav-item dropdown mt-1">
                                <a class="nav-link dropdown-toggle link" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle navigation">Store</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index1.php?page=shop"><i class="fas fa-shopping-basket"></i>&nbsp; Shop</a>
                                        <div class="dropdown-divider"></div> 
                                    <a class="dropdown-item" href="index1.php?page=checkout"><i class="fas fa-cash-register"></i>&nbsp; Checkout</a>
                                </div>
                            </li>
                            <?php
                                if(isset($_SESSION["loggedin"])) {
                                    if($_SESSION["loggedin"] == true) {
                                        echo '                            
                                        <li class="nav-item dropdown mt-1">
                                        <a class="nav-link dropdown-toggle link" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle navigation">Account Details</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="index1.php?page=myaccount"><i class="fas fa-user-cog"></i>&nbsp; My Account</a>
                                        </div>
                                        </li>';
                                    }
                                }
                            ?>
                            <li class="nav-item">
                            <button class="btn btn-outline-success my-sm-0 rounded-lg"><a class="nav-link" id="call-to-action-donate" href="index1.php?page=donate">Donate Now</a></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation Bar-->
    