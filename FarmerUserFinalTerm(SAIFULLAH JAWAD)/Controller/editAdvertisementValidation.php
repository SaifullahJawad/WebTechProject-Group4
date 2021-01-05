<?php


    if(!isset($_POST["editAd"]) && empty($_FILES["cropPicture"]["name"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    session_start();

    require_once("../Model/advertisementService.php");


    if(isset($_POST["editAd"]))
    {

        $errors = ["cropName" => "", "cropQuantity" => "", "cropPrice" => "", "cropPictureError" => ""];
        
        

        if(empty($_POST["cropName"]))
        {
            $errors["cropName"]= "*required";
        }
        else
        {

            if(!validateCropName($_POST["cropName"]))
            {
                $errors["cropName"]= "*invalid";
            }

        }


        if(empty($_POST["cropQuantity"]))
        {
            $errors["cropQuantity"]= "*required";
        }
        else
        {

            if(!ctype_digit($_POST["cropQuantity"]))
            {
                $errors["cropQuantity"]= "*integer only";
            }
        }



        if(empty($_POST["cropPrice"]))
        {
            $errors["cropPrice"] = "*required";
        }
        else
        {

            if(!ctype_digit($_POST["cropPrice"]))
            {
                $errors["cropPrice"]= "*integer only";
            }
        }



        if(!isset($_SESSION["cropPicture"]))
        {
            $errors["cropPictureError"] = "*enable JavaScript to upload a picture";
        }

    

        

        if( $errors["cropName"] == "" && $errors["cropQuantity"] == "" && $errors["cropPrice"] == "" &&  $errors["cropPictureError"] == "" )
        {

            if(updateAdvertisement($_SESSION["advertisementID"], $_POST["cropName"], $_POST["cropQuantity"], $_POST["cropPrice"], $_SESSION["cropPicture"]))
            {

                unset($_SESSION["cropPicture"]);
                unset($_SESSION["errors"]);
                unset($_SESSION["advertisementID"]);

                header("Location: ../View/viewOwnAdvertisements.php?updated=true");
            }
            else
            {
                
                unset($_SESSION["cropPicture"]);
                unset($_SESSION["errors"]);
                unset($_SESSION["advertisementID"]);

                header("Location: ../View/viewOwnAdvertisements.php?failed=true");
            }

            
        }
        else
        {
            $_SESSION["errors"] = $errors;
            $_SESSION["enteredEditAdvertisementValidation"]="true";
            header("Location: ../View/editAdvertisements.php");
        }



    }

    



    function validateCropName( $cropName )
    {
        if(ctype_alpha(str_replace(" ", "", $cropName)) )
        { 
            return true;
        }
        else
        {
            return false;
        }
    }



    if(!empty($_FILES["cropPicture"]["name"]))
    {
        $destination = "../View/img/". $_FILES["cropPicture"]["name"];
        $src = $_FILES["cropPicture"]["tmp_name"];

        if(move_uploaded_file($src, $destination))
        {
            $_SESSION["cropPicture"] = $_FILES["cropPicture"]["name"];
            echo $_FILES["cropPicture"]["name"];
        }
    }







    

?>


