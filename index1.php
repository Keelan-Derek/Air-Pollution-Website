<?php
//require ('database-config.php');


@$page = $_GET["page"];

include_once ('includes/header.php');
switch (@$page){
    case "home":
        include ("home.php");
        break;
    case "about":
        include ("about-us.html");
        break;
    case "contact-us":
        include ("contact-us.php"); 
        break;
    case "shop":
        include ("shop.php");
        break;
    case "checkout":
        include ("checkout.php");
        break;
    case "myaccount":
        include ("myaccount.php"); 
        break; 
    case "signup":
        include ("signup.php"); 
        break; 
    case "login":
        include ("login.php"); 
        break;
    case "donate":
        include ("donate.php"); 
        break;    
}   
include_once ('includes/footer.php');
?>