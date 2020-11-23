<?php


    if(!isset($_POST["LogIn"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }



    if(!isset($_SESSION))
    {
        session_start();
    }



    $errors = ["userName" => "", "password" => ""];
    $previousInput = "";



 

    if(empty($_POST["userName"]))
    {
        $errors["userName"] = "*required";
    }
    else
    {
        $previousInput = $_POST["userName"];
    }


    if(empty($_POST["password"]))
    {
        $errors["password"] = "*required";
    }


    if(!empty($_POST["userName"]) && !empty($_POST["password"]))
    {
        if(!isValidUser())
        {
            $errors["userName"] = "Invalid User Name or Password";
        }
    }





    

    if($errors["userName"] == "" && $errors["password"] == "" )
    {

        if(isset($_POST["rememberMe"]))
        {
            echo "hola from remeber me";
            setcookie("loggedInUserName", $_POST["userName"], time()+ 3600, "/");

            unset($_SESSION["previousInput"]);
            unset($_SESSION["errors"]);

            header("Location: ../View/dashboard.php");
        }
        else
        {
            echo "hola from session";
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

    





    function isValidUser()
    {

        $fileHandler = fopen("../farmerProfileData.txt", "r");
        while($currentLine = fgets($fileHandler))
        {

            if($currentLine != "\r\n")
            {

                $userDataElements = explode("|",$currentLine);

                if($userDataElements[2] == $_POST["userName"] && $userDataElements[3] == $_POST["password"])
                {
                    fclose($fileHandler);
                    return true;
                }

            }

            
        }

        fclose($fileHandler);
        return false;
    }
    
    
   



?>