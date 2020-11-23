<?php



    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_POST["accept"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    if(isset($_POST["accept"]))
    {
        require_once("../Controller/fileDataHandler.php");
        updateRentalAdvertisement("../rentalEquipmentAdvertisements.txt", $_POST["advertisementId"]);
        header("Location: ../View/rentEquipment.php");
        
    }






?>