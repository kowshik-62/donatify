<?php
//session_destroy();
session_start();    
unset($_SESSION["email"]);
header("Location: home.html");
exit;
?>