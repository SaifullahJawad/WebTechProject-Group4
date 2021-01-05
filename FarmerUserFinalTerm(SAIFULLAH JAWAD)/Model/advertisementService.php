<?php

    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }


    require_once("../Model/database.php");

    

    function createAdvertisement($cropName, $cropQuantity, $cropPrice, $cropPicture, $acceptedBy, $userID)
    {
        $conn = getConnection();

        $cropName = actualInput($cropName);
        $cropQuantity = actualInput($cropQuantity);
        $cropPrice = actualInput($cropPrice);
        $cropPicture = actualInput($cropPicture);
        
        $sql = "INSERT INTO advertisements (product_name, quantity, price, crop_picture, accepted_by, user_id) VALUES ('$cropName', '$cropQuantity', '$cropPrice', '$cropPicture', '$acceptedBy', '$userID')";
 
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Create Advertisement Error: ". mysqli_error($conn));

        }

        return false;
    }




    function retrieveOwnAdvertisements($userID)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM advertisements where user_id = $userID ORDER BY time_added DESC ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrieve Advertisements Error: ". mysqli_error($conn));
        }



    }




    function searchAdvertisements($cropName, $userID)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM advertisements where product_name = '$cropName' AND user_id = $userID ORDER BY time_added DESC ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Search Advertisements Error: ". mysqli_error($conn));
        }

    }




    function retrieveOtherFarmerAdvertisements($userID)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM advertisements, users where advertisements.user_id = users.id AND advertisements.accepted_by = 'none' AND users.id != $userID AND users.user_type = 'farmer' ORDER BY time_added DESC";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrieve Advertisements Error: ". mysqli_error($conn));
        }



    }



    function searchOtherFarmerAdvertisements($cropName, $userID)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM advertisements, users where advertisements.user_id = users.id AND advertisements.accepted_by = 'none' AND users.id != $userID AND advertisements.product_name = '$cropName' AND users.user_type = 'farmer' ORDER BY time_added DESC";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrieve Advertisements Error: ". mysqli_error($conn));
        }



    }



    function retrieveAdvertisementsByAID( $advertisementID )
    {
        $conn = getConnection();
        $sql = "SELECT * FROM advertisements where aid = $advertisementID ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisement = mysqli_fetch_assoc($result);
                return $advertisement;
                
            }
            else
            {
                die("Advertisement ID: $advertisementID not found");
            }
        }
        else
        {
            die("Retrieve Advertisements By AID Error: ". mysqli_error($conn));
        }


    }


    
    function updateAdvertisement($advertisementID, $cropName, $cropQuantity, $cropPrice, $cropPicture)
    {
        $conn = getConnection();

        $cropName = actualInput($cropName);
        $cropQuantity = actualInput($cropQuantity);
        $cropPrice = actualInput($cropPrice);
        
        $sql = "UPDATE advertisements SET product_name = '$cropName', quantity = '$cropQuantity', price = '$cropPrice', crop_picture = '$cropPicture' WHERE aid = $advertisementID ";

        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Update Error: " . mysqli_error($conn));
        }

        return false;
    }



    function deleteAdvertisement($advertisementID)
    {
        $conn = getConnection();
        $sql = "DELETE FROM advertisements WHERE aid = $advertisementID";

        if (mysqli_query($conn, $sql))
        {
            return true;
        } 
        else
        {
            die("Delete Advertisement Error: " . mysqli_error($conn));
        }

        return false;

    }



    function retrieveEquipmentRentAdvertisement()
    {

        $conn = getConnection();
        $sql = "SELECT * FROM advertisements, users where advertisements.user_id = users.id AND advertisements.accepted_by = 'none' AND users.user_type = 'rentee' ORDER BY time_added DESC";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrieve Equipment Rent Advertisements Error: ". mysqli_error($conn));
        }


    }



    function searchedEquipmentRentAdvertisements($equipmentName)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM advertisements, users where advertisements.user_id = users.id AND advertisements.accepted_by = 'none' AND advertisements.product_name = '$equipmentName' AND users.user_type = 'rentee' ORDER BY time_added DESC";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Searched Equipment Rent Advertisements Error: ". mysqli_error($conn));
        }



    }




    function updateAcceptedEquipmentAdvertisement($advertisementID, $userName)
    {
        $conn = getConnection();
        $sql = "UPDATE advertisements SET accepted_by = '$userName' WHERE aid = $advertisementID ";

        if($result = mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Update Accepted Equipment Advertisement Error: ". mysqli_error($conn));
        }

        return false;



    }




    function retriveAcceptedEquipmentAdvertisements( $userName )
    {

        $conn = getConnection();
        $sql = "SELECT * FROM advertisements, users where advertisements.user_id = users.id AND advertisements.accepted_by = '$userName' ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $advertisements = [];

                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($advertisements, $row);
                }

                return $advertisements;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrive Accepted Equipment Advertisements Error: ". mysqli_error($conn));
        }


    }






    function actualInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }


?>