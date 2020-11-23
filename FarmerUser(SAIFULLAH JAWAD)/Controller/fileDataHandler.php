<?php


    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }

    if(!isset($_SESSION))
    {
        session_start();
    }





    function createData($fileLocation, $newLine)
    {
        $fileHandler = fopen($fileLocation, "a");
        fwrite($fileHandler, $newLine);
        fclose($fileHandler);
    }



    function retrieveUserData()
    {

        $fileHandler = fopen("../farmerProfileData.txt", "r");
        while($currentLine = fgets($fileHandler))
        {
    
            if($currentLine != "\r\n")
            {
    
                $userDataElements = explode("|",$currentLine);
    
                if($userDataElements[2] == ($_COOKIE["loggedInUserName"] ?? $_SESSION["loggedInUserName"]))
                {
                    $_SESSION["name"] = $userDataElements[0];
                    $_SESSION["email"] = $userDataElements[1];
                    $_SESSION["userName"] = $userDataElements[2];
                    $_SESSION["password"] = $userDataElements[3];
                    $_SESSION["phone"] = $userDataElements[4];
                    $_SESSION["genders"] = $userDataElements[5];
                    $_SESSION["dob"] = $userDataElements[6];
                    $_SESSION["profilePicture"]= $userDataElements[7];
                    fclose($fileHandler);
                    return true;
                }
            } 
            
            
        }

        fclose($fileHandler);
        return false;
    }





    function updateData($updatedLine, $fileLocation, $lineId)
    {

        $fileHandler = fopen($fileLocation, "r");
        while($currentLine = fgets($fileHandler))
        {
            if($currentLine != "\r\n")
            {

                $lineDataElements = explode("|",$currentLine);
    
                if($lineDataElements[2] == $lineId)
                {

                break;

                }

            }
            
        }
        fclose($fileHandler);
    
       
        $fileContents = file_get_contents($fileLocation);
        $fileContents = str_replace($currentLine, $updatedLine, $fileContents);
        file_put_contents($fileLocation, $fileContents);

    }



    function generateAdvertisementId()
    {
        $data = file("../farmerAdvertisements.txt");

        if(empty($data))
        {
            return $advertisementId=1;
        }
        else
        {
            $advertisementLine = $data[count($data)-1];
            $advertisementDataElements = explode("|",$advertisementLine);

            return $advertisementDataElements[0]+1;

        }
    }





    function retrieveAdvertisementData()
    {

        $fileHandler = fopen("../farmerAdvertisements.txt", "r");
        while($currentLine = fgets($fileHandler))
        {
    
            if($currentLine != "\r\n")
            {
    
                $advertisementDataElements = explode("|",$currentLine);
    
                if($advertisementDataElements[0] == $_SESSION["advertisementId"] )
                {
                    $_SESSION["cropName"] = $advertisementDataElements[1];
                    $_SESSION["cropQuantity"] = $advertisementDataElements[2];
                    $_SESSION["cropPrice"] = $advertisementDataElements[3];
                    $_SESSION["cropPicture"] = $advertisementDataElements[4];
                    $_SESSION["status"] = $advertisementDataElements[5];
                    $_SESSION["advertiserId"] = $advertisementDataElements[6];
                    fclose($fileHandler);
                    return true;
                }
            } 
            
            
        }

        fclose($fileHandler);
        return false;
    }


 




    function updateAdvertisementData($updatedLine, $fileLocation, $lineId)
    {

        $fileHandler = fopen($fileLocation, "r");
        while($currentLine = fgets($fileHandler))
        {
            if($currentLine != "\r\n")
            {

                $lineDataElements = explode("|",$currentLine);
    
                if($lineDataElements[0] == $lineId)
                {

                break;

                }

            }
            
        }
        fclose($fileHandler);
    
       
        $fileContents = file_get_contents($fileLocation);
        $fileContents = str_replace($currentLine, $updatedLine, $fileContents);
        file_put_contents($fileLocation, $fileContents);

    }



    function updateRentalAdvertisement($fileLocation, $lineId)
    {

        $fileHandler = fopen($fileLocation, "r");
        while($currentLine = fgets($fileHandler))
        {
            if($currentLine != "\r\n")
            {

                $lineDataElements = explode("|",$currentLine);
    
                if($lineDataElements[0] == $lineId)
                {

                    $currentStatus = lineDataElements[4];
                    $temporaryLine = $currentLine;
                    $temporaryLine = str_replace($currentStatus, "Accepted", $temporaryLine);
                break;

                }

            }
            
        }
        fclose($fileHandler);
    
       
        $fileContents = file_get_contents($fileLocation);
        $fileContents = str_replace($currentLine, $temporaryLine, $fileContents);
        file_put_contents($fileLocation, $fileContents);

    }







?>