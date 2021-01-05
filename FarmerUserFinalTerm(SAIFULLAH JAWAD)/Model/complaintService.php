<?php

    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }


    require_once("../Model/database.php");


    function createComplaint($complaintSubject, $complaintDetail, $userID)
    {
        $conn = getConnection();

        
        $sql = "INSERT INTO complaint (complaint_name, complaint_detail, posted_by) VALUES ('$complaintSubject', '$complaintDetail', '$userID')";
 
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Create Complaint Error: ". mysqli_error($conn));

        }

        return false;
    }
    


?>