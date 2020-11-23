<?php


    if(!isset($_POST["delete"]))
    {

        header("HTTP/1.0 404 Not Found");
        exit(); 

    }


    if(!isset($_SESSION))
    {
        session_start();
    }


    require_once("../Controller/fileDataHandler.php");
    updateData("", "../farmerProfileData.txt", $_SESSION["userName"]);


    session_destroy();
    setcookie("loggedInUserName", "", time()- 3600, "/");


    header("Location: ../View/publicHome.php");



    

?>


