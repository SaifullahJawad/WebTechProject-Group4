<?php


    session_start();

    if(!isset($_POST["accept"]) && !isset($_POST["searchedEquipment"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    require_once("../Model/advertisementService.php");


    if(isset($_POST["accept"]))
    {
        
        if(updateAcceptedEquipmentAdvertisement($_POST["advertisementID"], $_SESSION["userName"]))
        {
            header("Location: ../View/rentEquipment.php?accepted=true");
        }
        else
        {
            header("Location: ../View/rentEquipment.php?failed=true");
        }
        
    }



    
    if(isset($_POST["searchedEquipment"]))
    {
        if($_POST["searchedEquipment"] == "empty")
        {
            $allAdvertisements = retrieveEquipmentRentAdvertisement();

            if(!is_null($allAdvertisements))
            {
                $allAdvertisementsData = json_encode($allAdvertisements);
                echo $allAdvertisementsData;
            }
            else
            {
                echo 0;
            }

        }
        else
        {

            $searchedAdvertisements = searchedEquipmentRentAdvertisements($_POST["searchedEquipment"]);

            if(!is_null($searchedAdvertisements))
            {
                $searchedAdvertisementsData = json_encode($searchedAdvertisements);
                echo $searchedAdvertisementsData;
            }
            else
            {
                echo 0;
            }

        }
        
    }






?>