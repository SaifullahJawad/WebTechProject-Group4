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
    $previousInput = ["cropName" => "", "cropQuantity" => "", "cropPrice" => ""];
    
    


    if(empty($_POST["cropName"]))
    {
        $errors["cropName"]= "*required";
    }
    else
    {
        $previousInput["cropName"] = $_POST["cropName"];
    }


    if(empty($_POST["cropQuantity"]))
    {
        $errors["cropQuantity"]= "*required";
    }
    else
    {
        $previousInput["cropQuantity"] = $_POST["cropQuantity"];   
    }



    if(empty($_POST["cropPrice"]))
    {
        $errors["cropPrice"] = "*required";
    }
    else
    {
        $previousInput["cropPrice"] = $_POST["cropPrice"];
    }



    if(!isset($_SESSION["cropPicture"]))
    {
        $_SESSION["cropPictureError"]= "*required";
    }

   

    

    if( $errors["cropName"] == "" && $errors["cropQuantity"] == "" && $errors["cropPrice"] == "" && !isset($_SESSION["cropPictureError"]) )
    {

        require_once("../Controller/fileDataHandler.php");

        $advertisementId = generateAdvertisementId();
        createData("../farmerAdvertisements.txt", $advertisementId."|".$_POST["cropName"]."|".$_POST["cropQuantity"]."|".$_POST["cropPrice"]."|".$_SESSION["cropPicture"]."|"."pending"."|".$_SESSION["userName"]."\r\n");

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
        $_SESSION["enteredpostAdvertisementValidation"]="true";
        header("Location: ../View/postAdvertisements.php");
    }









    

?>


