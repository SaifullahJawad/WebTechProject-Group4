<?php


    if(!isset($_POST["update"]))
    {

        header("HTTP/1.0 404 Not Found");
        exit(); 

    }



    if(!isset($_SESSION))
    {
        session_start();
    }

    $errors = ["name" => "", "email" => "", "phone" => "", "genders" => "", "dob" => ""];
    
    



    if(empty($_POST["name"]))
    {
        $errors["name"]= "*required";
    }
    else
    {
        if(!isValidName($_POST["name"]))
        {
            $errors["name"]= "*invalid";
        }
    }


    if(empty($_POST["email"]))
    {
        $errors["email"]= "*required";
    }
    else
    {
        if(!isValidEmail($_POST["email"]))
        {
            $errors["email"]= "*invalid";
        }
        
    }


    if(empty($_POST["phone"]))
    {
        $errors["phone"]= "*required";
    }
    else
    {
        
        if(!isValidPhone($_POST["phone"]))
        {
            $errors["phone"] = "*invalid";
        }
    }




    if( !isset($_POST["genders"]) )
    {
        $errors["genders"] = "*required";
    }



    if(empty($_POST["dob"]))
    {
        $errors["dob"] = "*required";
    }
    else
    {
        
        $splitedDob = explode("/",$_POST["dob"]);
        if(!isValidDOB($splitedDob[0], $splitedDob[1], $splitedDob[2]))
        {
            $errors["dob"] = "*invalid";
        }

    }

   

    

    if( $errors["name"] == "" && $errors["email"] == "" && $errors["phone"] == "" && $errors["genders"] == "" && $errors["dob"] == "" )
    {
 
        require_once("../Controller/fileDataHandler.php");
        updateData($_POST["name"]."|".$_POST["email"]."|".$_SESSION["userName"]."|".$_SESSION["password"]."|".$_POST["phone"]."|".$_POST["genders"]."|".$_POST["dob"]."|".$_SESSION["profilePicture"], "../farmerProfileData.txt", $_SESSION["userName"]);

        unset($_SESSION["errors"]);
        header("Location: ../View/editProfile.php");

    }
    else
    {
        $_SESSION["errors"] = $errors;
        $_SESSION["enteredEditProfileValidation"]="true";
        header("Location: ../View/editProfile.php");
    }



















    function isValidName( $name )
    {
        if(str_word_count($name) >= 2  && ctype_alpha($name[0]) &&  ctype_alpha(str_replace(" ", "", $name)) )
        { 
            return true;
        }
        else if(str_word_count(str_replace(".", " ",$name)) >= 2 && ctype_alpha($name[0]) &&  ctype_alpha(str_replace(".", "", $name)) && $name[strlen($name)-1] != "." )
        {
            return true;
        }
        else if(str_word_count(str_replace("-", " ",$name)) >= 2 && ctype_alpha($name[0]) &&  ctype_alpha(str_replace("-", "", $name)) && $name[strlen($name)-1] != "-" )
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    function isValidEmail( $email)
    {

        $atSign = strpos($email, "@");
        $lastDot = strripos($email, ".");


        if($atSign > 0 && $email[$atSign+1] != "." && substr_count($email, "@") == 1 && $lastDot > $atSign+1 && !strpos($email, " ") && !strpos($email, "..") && strlen($email) > ($lastDot+1))
        {
            return true;
        }
        else
        {
            return false;
        }
    }




    function isValidPhone( $phone )
    {
        if(is_numeric(str_replace("-","",$phone)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }



    function isValidDOB($day, $month, $year)
    {


        if( $day >= 1 && $day <=31 && $month >= 1 && $month <= 12 && $year >= 1900 && $year <= 2016)
        {

            if( ($month == 4 || $month == 6 ||  $month == 9 || $month == 11 ) && $day <= 30 )
            {
                return true;
                
            }
            else if( ($month == 1 || $month == 3 ||  $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12 ) && $day <= 31 )
            {
                return true;

            }
            else if( $month == 2 && $day <= 28 )
            {
                return true;

            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }


    }




    










    

?>


