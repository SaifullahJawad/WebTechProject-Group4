<?php


    if(!isset($_POST["postComplaint"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    session_start();

    require_once("../Model/complaintService.php");


    $errors = ["complaintSubject" => "", "complaintDetail" => ""];
    $previousInput = ["complaintSubject" => "", "complaintDetail" => ""];
    
    

    if(empty($_POST["complaintSubject"]))
    {
        $errors["complaintSubject"]= "*required";
    }
    else
    {
        $previousInput["complaintSubject"] = $_POST["complaintSubject"];

        if(str_word_count(actualInput($_POST["complaintSubject"])) < 2 )
        {
            $errors["complaintSubject"]= "*at least 2 words";
        }

    }



    if(empty(actualInput($_POST["complaintDetail"])))
    {
        $errors["complaintDetail"]= "*required";
    }
    else
    {
        $previousInput["complaintDetail"] = $_POST["complaintDetail"];

        if(str_word_count(actualInput($_POST["complaintDetail"])) < 3 )
        {
            $errors["complaintDetail"]= "*at least one sentence";
        }

    }



    

    if( $errors["complaintSubject"] == "" && $errors["complaintDetail"] == "" )
    {

        if(createComplaint($_POST["complaintSubject"], $_POST["complaintDetail"], $_SESSION["userID"]))
        {
            unset($_SESSION["previousInput"]);
            unset($_SESSION["errors"]);

            header("Location: ../View/postComplaint.php?posted=true");
        }
        else
        {
            unset($_SESSION["previousInput"]);
            unset($_SESSION["errors"]);

            header("Location: ../View/postComplaint.php?failed=true");
        }

        
    }
    else
    {
        $_SESSION["previousInput"] = $previousInput;
        $_SESSION["errors"] = $errors;
        $_SESSION["enteredpostComplaintValidation"]="true";
        header("Location: ../View/postComplaint.php");
    }



    function actualInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }



    

?>
