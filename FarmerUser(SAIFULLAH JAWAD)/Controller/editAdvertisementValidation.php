<?php


    

    if(!isset($_POST["postAd"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    if(!isset($_SESSION))
    {
        session_start();
    }

    

    $errors = ["cropName" => "", "cropQuantity" => "", "cropPrice" => ""];
    
    


    if(empty($_POST["cropName"]))
    {
        $errors["cropName"]= "*required";
    }


    if(empty($_POST["cropQuantity"]))
    {
        $errors["cropQuantity"]= "*required";
    }




    if(empty($_POST["cropPrice"]))
    {
        $errors["cropPrice"] = "*required";
    }




    if(!isset($_SESSION["cropPicture"]))
    {
        $_SESSION["cropPictureError"]= "*required";
    }

   

    

    if( $errors["cropName"] == "" && $errors["cropQuantity"] == "" && $errors["cropPrice"] == "" && !isset($_SESSION["cropPictureError"]) )
    {


        require_once("../Controller/fileDataHandler.php");
        updateAdvertisementData($_SESSION["advertisementId"]."|".$_POST["cropName"]."|".$_POST["cropQuantity"]."|".$_POST["cropPrice"]."|".$_SESSION["cropPicture"]."|"."pending"."|".$_SESSION["userName"]."\r\n", "../farmerAdvertisements.txt", $_SESSION["advertisementId"]);
        unset($_SESSION["previousInput"]);
        unset($_SESSION["cropPicture"]);
        unset($_SESSION["errors"]);
        unset($_SESSION["cropPictureError"]);


        header("Location: ../View/viewAdvertisements.php");
    }
    else
    {
        $_SESSION["previousInput"] = $previousInput;
        $_SESSION["errors"] = $errors;
        $_SESSION["enteredEditAdvertisementValidation"]="true";
        header("Location: ../View/editAdvertisements.php");
    }









    

?>


