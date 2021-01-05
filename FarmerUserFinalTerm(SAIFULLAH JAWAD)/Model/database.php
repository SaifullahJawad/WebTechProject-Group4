<?php

    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }


    function getConnection()
    {
        if($conn = mysqli_connect("localhost", "root", "", "c&c_dist_mgt_systm"))
        {
            return $conn;
        }
        else
        {
            die("Connection error:". mysqli_connect_error());
        }

    }
    



?>