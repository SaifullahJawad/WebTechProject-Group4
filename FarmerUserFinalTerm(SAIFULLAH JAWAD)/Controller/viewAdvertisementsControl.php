<?php


    session_start();

    if(!isset($_POST["edit"]) && !isset($_POST["delete"]) && !isset($_POST["searchedOtherFarmerCropName"]) )
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    require_once("../Model/advertisementService.php");


    if(isset($_POST["delete"]))
    {
        if(deleteAdvertisement($_POST["advertisementID"]))
        {
            header("Location: ../View/viewOwnAdvertisements.php?deleted=true");
        }
        
        
    }

    if(isset($_POST["edit"]))
    {
        $_SESSION["advertisementID"] = $_POST["advertisementID"];
        header("Location: ../View/editAdvertisements.php");
    }







    if(isset($_POST["searchedOtherFarmerCropName"]))
    {
        if($_POST["searchedOtherFarmerCropName"] == "empty")
        {
            $allOtherFarmerAdvertisements = retrieveOtherFarmerAdvertisements($_SESSION["userID"]);

            if(!is_null($allOtherFarmerAdvertisements))
            {
                $allOtherFarmerAdvertisementsData = json_encode($allOtherFarmerAdvertisements);
                echo $allOtherFarmerAdvertisementsData;
            }
            else
            {
                echo 0;
            }

        }
        else
        {

            $searchedOtherFarmerAdvertisements = searchOtherFarmerAdvertisements($_POST["searchedOtherFarmerCropName"], $_SESSION["userID"]);

            if(!is_null($searchedOtherFarmerAdvertisements))
            {
                $searchedOtherFarmerAdvertisementsData = json_encode($searchedOtherFarmerAdvertisements);
                echo $searchedOtherFarmerAdvertisementsData;
            }
            else
            {
                echo 0;
            }

        }
        
    }




?>