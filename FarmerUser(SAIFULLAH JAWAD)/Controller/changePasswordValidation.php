<?php


    if(!isset($_POST["submit"]))
    {

        header("HTTP/1.0 404 Not Found");
        exit(); 

    }

    if(!isset($_SESSION))
    {
        session_start();
    }

    $message = ["currentPassword" => "", "newPassword" => "", "reTypePassword" => ""];
    





    if(empty($_POST["currentPassword"]))
    {
        $message["currentPassword"]= "*required";
    }
    else
    {
        if(!isValidPassword())
        {
            $message["currentPassword"]= "*invalid password";
        }
    }

    if(empty($_POST["newPassword"]))
    {
        $message["newPassword"]= "*required";
    }

    if(empty($_POST["reTypePassword"]))
    {
        $message["reTypePassword"]= "*required";
    }
    

   if(!empty($_POST["newPassword"]) && !empty($_POST["reTypePassword"]))
    {

        if($_POST["newPassword"] != $_POST["reTypePassword"])
        {
            $message["newPassword"]= "*password mismatch";

        }

    }


   

    

    if( $message["currentPassword"] == "" && $message["newPassword"] == "" && $message["reTypePassword"] == "" )
    {
        
        require_once("../Controller/fileDataHandler.php");
        updateData($_SESSION["name"]."|".$_SESSION["email"]."|".$_SESSION["userName"]."|".$_POST["newPassword"]."|".$_SESSION["phone"]."|".$_SESSION["genders"]."|".$_SESSION["dob"]."|".$_SESSION["profilePicture"], "../farmerProfileData.txt", $_SESSION["userName"]);

        unset($_SESSION["message"]);
        header("Location: ../View/changePassword.php");


    }
    else
    {
        $_SESSION["message"] = $message;
        $_SESSION["enteredChangePasswordValidation"]="true";
        header("Location: ../View/changePassword.php");


    }






















    function isValidPassword()
    {

        $fileHandler = fopen("../farmerProfileData.txt", "r");
        while($currentLine = fgets($fileHandler))
        {

            if($currentLine != "\r\n")
            {

                $userDataElements = explode("|",$currentLine);

                if($userDataElements[2] == $_SESSION["userName"] && $userDataElements[3] == $_POST["currentPassword"])
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


