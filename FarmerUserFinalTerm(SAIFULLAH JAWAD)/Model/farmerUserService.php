<?php


    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }


    require_once("../Model/database.php");


    function createUser($name, $email, $userName, $password, $phone, $gender, $dob, $picture, $userType)
    {
        $conn = getConnection();

        $name = actualInput($name);
        $email = actualInput($email);
        $userName = actualInput($userName);
        $password = actualInput($password);
        $phone = actualInput($phone);
        $gender = actualInput($gender);
        $dob = actualInput($dob);
        $picture = actualInput($picture);
        $userType = actualInput($userType);

        

        $sql = "INSERT INTO users (name, email, username, password, phone, gender, dob, picture, user_type) VALUES ('$name', '$email', '$userName', '$password', '$phone', '$gender', '$dob', '$picture', '$userType')";
 
        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Create User Error: ". mysqli_error($conn));

        }

        return false;
    }



    function isUserFieldValueExists($fieldName, $fieldValue)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM users WHERE $fieldName = '$fieldValue'";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                return true;
            }

        }
        else
        {
            die("User Field Value Check Error: ". mysqli_error($conn));
        }

        return false;
    }



    function isValidUser($userName, $password)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM users where username = '$userName' and password = '$password' ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                return true;
            }

        }
        else
        {
            die("User Validity Error: ". mysqli_error($conn));
        }

        return false;
    }



    function retrieveFarmerUser($userName)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM users where username = '$userName' ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $userData = mysqli_fetch_assoc($result);
                return $userData;
                
            }
            else
            {
                die("Username: $userName not found");
            }
        }
        else
        {
            die("Retrieve User Error: ". mysqli_error($conn));
        }

    }



    function updateFarmerUser($userName, $name, $email, $phone, $gender, $dob)
    {
        $conn = getConnection();

        $name = actualInput($name);
        $email = actualInput($email);
        $phone = actualInput($phone);
        $gender = actualInput($gender);
        $dob = actualInput($dob);
        
        $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', gender = '$gender', dob = '$dob' WHERE username = '$userName' ";

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




    function updatePassword($userName, $newPassword)
    {
        $conn = getConnection();
        $newPassword = actualInput($newPassword);
        $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$userName' ";

        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Update Password Error: " . mysqli_error($conn));
        }

        return false;

    }



    function updateProfilePicture($userName, $profilePicture)
    {
        $conn = getConnection();
        $sql = "UPDATE users SET picture = '$profilePicture' WHERE username = '$userName' ";

        if(mysqli_query($conn, $sql))
        {
            return true;
        }
        else
        {
            die("Update Profile Picture Error: " . mysqli_error($conn));
        }

        return false;
    }



    function deleteFarmerUser($userName)
    {
        $conn = getConnection();
        $sql = "DELETE FROM users WHERE username = '$userName'";

        if (mysqli_query($conn, $sql))
        {
            return true;
        } 
        else
        {
            die("Delete User Error: " . mysqli_error($conn));
        }

        return false;

    }




    function retrieveOtherUsers($userName)
    {
        $conn = getConnection();
        $sql = "SELECT * FROM users where username = '$userName' ";

        if($result = mysqli_query($conn, $sql))
        {
            if(mysqli_num_rows($result) > 0)
            {
                $userData = mysqli_fetch_assoc($result);
                return $userData;
                
            }
            else
            {
                return null;
            }
        }
        else
        {
            die("Retrieve User Error: ". mysqli_error($conn));
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