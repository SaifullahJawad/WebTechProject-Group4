<?php


    if(!isset($_POST["LogIn"]) && !isset($_POST["uniqueUserName"]) && !isset($_POST["typedPassword"]) )
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    session_start();


    require_once("../Model/farmerUserService.php");


    if(isset($_POST["LogIn"]))
    {


        $errors = ["userName" => "", "password" => ""];
        $previousInput = "";



    

        if(empty($_POST["userName"]))
        {
            $errors["userName"] = "*required";
        }
        else
        {
            $previousInput = $_POST["userName"];

            if(!isUserFieldValueExists("username", $_POST["userName"]))
            {
                $errors["userName"] = "*user name does not exist";
            }
        }


        if(empty($_POST["password"]))
        {
            $errors["password"] = "*required";
        }


        if(!empty($_POST["userName"]) && !empty($_POST["password"]))
        {
            if(!isValidUser($_POST["userName"], $_POST["password"]) && $errors["userName"] == "")
            {
                $errors["password"] = "*wrong password";
            }
        }


        

        if($errors["userName"] == "" && $errors["password"] == "" )
        {

            if(isset($_POST["rememberMe"]))
            {
                setcookie("loggedInUserName", $_POST["userName"], time()+ 3600, "/");

                unset($_SESSION["previousInput"]);
                unset($_SESSION["errors"]);

                header("Location: ../View/dashboard.php");
            }
            else
            {
                $_SESSION["loggedInUserName"] = $_POST["userName"];

                unset($_SESSION["previousInput"]);
                unset($_SESSION["errors"]);

                header("Location: ../View/dashboard.php");
            }

        }
        else
        {
            $_SESSION["previousInput"] = $previousInput;
            $_SESSION["errors"] = $errors;
            $_SESSION["enteredLogInValidation"]="true";
            header("Location: ../View/logIn.php");
        }



    }



    if(isset($_POST["uniqueUserName"]))
    {
        if(!isUserFieldValueExists("username", $_POST["uniqueUserName"]))
        {
            echo "does not exists";
        }
    }


    if(isset($_POST["typedPassword"]))
    {
        if(!isValidUser($_POST["typedUserName"], $_POST["typedPassword"]))
        {
            echo 1;
        }
    }

    
    
    
   



?>