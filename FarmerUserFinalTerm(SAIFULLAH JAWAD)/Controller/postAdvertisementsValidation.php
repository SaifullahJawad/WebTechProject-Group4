<?php


    if(!isset($_POST["postAd"]) && empty($_FILES["cropPicture"]["name"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    session_start();

    require_once("../Model/advertisementService.php");


    if(isset($_POST["postAd"]))
    {

        $errors = ["cropName" => "", "cropQuantity" => "", "cropPrice" => "", "cropPictureError" => ""];
        $previousInput = ["cropName" => "", "cropQuantity" => "", "cropPrice" => ""];
        
        

        if(empty($_POST["cropName"]))
        {
            $errors["cropName"]= "*required";
        }
        else
        {
            $previousInput["cropName"] = $_POST["cropName"];

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
            $previousInput["cropQuantity"] = $_POST["cropQuantity"];  

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
            $previousInput["cropPrice"] = $_POST["cropPrice"];

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

            if(createAdvertisement($_POST["cropName"], $_POST["cropQuantity"], $_POST["cropPrice"], $_SESSION["cropPicture"], "none", $_SESSION["userID"]))
            {
                unset($_SESSION["previousInput"]);
                unset($_SESSION["cropPicture"]);
                unset($_SESSION["errors"]);

                header("Location: ../View/postAdvertisements.php?posted=true");
            }
            else
            {
                unset($_SESSION["previousInput"]);
                unset($_SESSION["cropPicture"]);
                unset($_SESSION["errors"]);

                header("Location: ../View/postAdvertisements.php?failed=true");
            }

            
        }
        else
        {
            $_SESSION["previousInput"] = $previousInput;
            $_SESSION["errors"] = $errors;
            $_SESSION["enteredpostAdvertisementValidation"]="true";
            header("Location: ../View/postAdvertisements.php");
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


