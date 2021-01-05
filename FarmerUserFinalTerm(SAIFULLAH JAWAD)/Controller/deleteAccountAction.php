<?php


    if(!isset($_POST["delete"]))
    {

        header("HTTP/1.0 404 Not Found");
        exit(); 

    }



    session_start();


    require_once("../Model/farmerUserService.php");

    if(deleteFarmerUser($_SESSION["userName"]))
    {
        session_destroy();
        setcookie("loggedInUserName", "", time()- 3600, "/");
        header("Location: ../View/publicHome.php");

    }
    else
    {
        die("An error has occured while deleting the user");
    }


    



    

?>


