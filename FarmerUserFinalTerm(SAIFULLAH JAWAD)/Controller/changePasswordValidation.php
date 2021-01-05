<?php


    if(!isset($_POST["submit"]) && !isset($_POST["typedPassword"]))
    {

        header("HTTP/1.0 404 Not Found");
        exit(); 

    }


    session_start();

    require_once("../Model/farmerUserService.php");


    if(isset($_POST["submit"]))
    {


        $errors = ["currentPassword" => "", "newPassword" => "", "reTypePassword" => ""];



        if(empty($_POST["currentPassword"]))
        {
            $errors["currentPassword"]= "*required";
        }
        else
        {
            if(!isValidUser($_SESSION["userName"], $_POST["currentPassword"]))
            {
                $errors["currentPassword"]= "*wrong password";
            }
        }

        if(empty($_POST["newPassword"]))
        {
            $errors["newPassword"]= "*required";
        }

        if(empty($_POST["reTypePassword"]))
        {
            $errors["reTypePassword"]= "*required";
        }
        

        if(!empty($_POST["newPassword"]) && !empty($_POST["reTypePassword"]))
        {

            if($_POST["newPassword"] != $_POST["reTypePassword"])
            {
                $errors["newPassword"]= "*mismatched password";

            }

        }


    

        if( $errors["currentPassword"] == "" && $errors["newPassword"] == "" && $errors["reTypePassword"] == "" )
        {
            
            if(updatePassword($_SESSION["userName"], $_POST["newPassword"]))
            {
                unset($_SESSION["errors"]);
                header("Location: ../View/changePassword.php?updated=true");
            }
            else
            {
                unset($_SESSION["errors"]);
                header("Location: ../View/changePassword.php?failed=true");
            }
            


        }
        else
        {
            $_SESSION["errors"] = $errors;
            $_SESSION["enteredChangePasswordValidation"]="true";
            header("Location: ../View/changePassword.php");


        }


    }



    if(isset($_POST["typedPassword"]))
    {
        if(!isValidUser($_SESSION["userName"], $_POST["typedPassword"]))
        {
            echo 1;
        }
    }
    





















   
?>


