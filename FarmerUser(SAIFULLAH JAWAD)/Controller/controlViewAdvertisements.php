<?php



    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_POST["edit"]) && !isset($_POST["delete"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    if(isset($_POST["delete"]))
    {
        require_once("../Controller/fileDataHandler.php");
        updateAdvertisementData("", "../farmerAdvertisements.txt", $_POST["advertisementId"]);
        header("Location: ../View/viewAdvertisements.php");
        
    }

    if(isset($_POST["edit"]))
    {
        $_SESSION["advertisementId"] = $_POST["advertisementId"];

        require_once("../Controller/fileDataHandler.php");
        retrieveAdvertisementData();
        
        header("Location: ../View/editAdvertisements.php");
    }




?>