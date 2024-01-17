<?php
    //logout.php
    session_start();
    unset($_SESSION["loggedin"]);
    unset($_SESSION["username"]);
    unset($_SESSION["userid"]);
    header('location:index1.php?page=home');
?>