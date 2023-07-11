<?php
    session_start();
    if (!isset($_SESSION["user"])) { 
        header("Location: login.html"); //redirects to login page if not logged in 
    }
    else{
        header("Location: index.html");
    }
?>