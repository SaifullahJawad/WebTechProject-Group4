<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_POST["uploadCropPicture"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    $error="";


    if($_FILES["cropPicture"]["size"] != 0)
    {

        $destination = "../View/img/". $_FILES["cropPicture"]["name"];
        $src = $_FILES["cropPicture"]["tmp_name"];

        if(move_uploaded_file($src, $destination))
        {
            $_SESSION["cropPicture"] = $_FILES["cropPicture"]["name"];         
            unset($_SESSION["cropPictureError"]);
            $_SESSION["enteredCropPictureValidation"] = "true";
            header("location: ../View/postAdvertisements.php");
        }
        else
        {
            $error = "*error";
            $_SESSION["cropPictureError"] = $error;
            header("location: ../View/postAdvertisements.php");
        }

    }
    else
    {
        header("location: ../View/postAdvertisements.php");
    }

    









 
    





?>