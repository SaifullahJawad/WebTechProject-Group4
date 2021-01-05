<?php

    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }


    require_once("../Model/database.php");


    function retrieveFarmingTips()
    {

        $conn = getConnection();

        $sql = "SELECT * FROM farming_tips ORDER BY id DESC ";
        
        
        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $farmingTips = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($farmingTips, $row);
                }

                return $farmingTips;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrieve Farming Tips Error: ". mysqli_error($conn));
        }


    }


?>