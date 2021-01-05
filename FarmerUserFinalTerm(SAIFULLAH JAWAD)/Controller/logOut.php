<?php


    session_start();
    session_destroy();
    setcookie("loggedInUserName", "", time()- 3600, "/");
    header("Location: ../View/logIn.php");




?>