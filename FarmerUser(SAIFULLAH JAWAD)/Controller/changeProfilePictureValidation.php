<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_POST["upload"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    $error="";


    if($_FILES["profilePicture"]["size"] != 0)
    {

        $destination = "../View/img/". $_FILES["profilePicture"]["name"];
        $src = $_FILES["profilePicture"]["tmp_name"];

        if(move_uploaded_file($src, $destination))
        {
            require_once("../Controller/fileDataHandler.php");
            updateData($_SESSION["name"]."|".$_SESSION["email"]."|".$_SESSION["userName"]."|".$_SESSION["password"]."|".$_SESSION["phone"]."|".$_SESSION["genders"]."|".$_SESSION["dob"]."|".$_FILES["profilePicture"]["name"]."\r\n", "../farmerProfileData.txt", $_SESSION["userName"]);
            
            unset($_SESSION["profilePictureError"]);
            header("location: ../View/changeProfilePicture.php");
        }
        else
        {
            $error = "Image error";
            $_SESSION["profilePictureError"] = $error;
            $_SESSION["enteredChangeProfilePictureValidation"] = "true";
            header("location: ../View/changeProfilePicture.php");
        }

    }
    else
    {
        header("location: ../View/changeProfilePicture.php");
    }

    









 
    





?>