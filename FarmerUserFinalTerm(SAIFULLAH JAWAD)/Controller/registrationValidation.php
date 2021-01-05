<?php


    if(!isset($_POST["SignUp"]) && !isset($_POST["uniqueUserName"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    if(!isset($_SESSION))
    {
        session_start();
    }

    require_once("../Model/farmerUserService.php");


    if(isset($_POST["SignUp"]))
    {

        $errors = ["name" => "", "email" => "", "userName" => "", "password" => "", "confirmPassword" => "", "phone" => "", "genders" => "", "dob" => ""];
        $previousInput = ["name" => "", "email" => "", "userName" => "", "password" => "", "confirmPassword" => "", "phone" => "", "genders" => "", "day" => "", "month" => "", "year" => ""];
        
        


        if(empty($_POST["name"]))
        {
            $errors["name"]= "*required";
        }
        else
        {
            $previousInput["name"] = $_POST["name"];
            if(!validateName($_POST["name"]))
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
            $previousInput["email"] = $_POST["email"];

            if(!validateEmail($_POST["email"]))
            {
                $errors["email"]= "*invalid";
            }
            
            
        }
        


        if(empty($_POST["userName"]))
        {
            $errors["userName"] = "*required";
        }
        else
        {
            $previousInput["userName"] = $_POST["userName"];

            if(isUserFieldValueExists("username", $_POST["userName"]))
            {
                $errors["userName"] = "*user name already exists";
            }
        }



        if(empty($_POST["password"]))
        {
            $errors["password"]= "*required";
        }
        else if(empty($_POST["confirmPassword"]))
        {
            $previousInput["password"] = $_POST["password"];
            $errors["confirmPassword"]= "*required";
        }
        else
        {
            
            if($_POST["password"] != $_POST["confirmPassword"])
            {
                $errors["password"]= "*password mismatch";
            }
            else
            {
                $previousInput["password"] = $_POST["password"];
                $previousInput["confirmPassword"] = $_POST["confirmPassword"];
            }
            
        }



        if(empty($_POST["phone"]))
        {
            $errors["phone"]= "*required";
        }
        else
        {
            $previousInput["phone"] = $_POST["phone"];
            if(!validatePhone($_POST["phone"]))
            {
                $errors["phone"] = "*invalid";
            }
        }




        if( !isset($_POST["genders"]) )
        {
            $errors["genders"] = "*required";
        }
        else
        {
            $previousInput["genders"] = $_POST["genders"];
        }



        if(empty($_POST["day"]) && empty($_POST["month"]) && empty($_POST["year"]))
        {
            $errors["dob"] = "*required";
        }
        else
        {
            $previousInput["day"] = $_POST["day"];
            $previousInput["month"] = $_POST["month"];
            $previousInput["year"] = $_POST["year"];
            if(!validateDoB($_POST["day"], $_POST["month"], $_POST["year"]))
            {
                $errors["dob"] = "*invalid";
            }

        }

    
     

        if( $errors["name"] == "" && $errors["email"] == "" && $errors["userName"] == "" && $errors["password"] == "" && $errors["phone"] == "" && $errors["genders"] == "" && $errors["dob"] == "" )
        {   

            $dateOfBirth = $_POST["day"] ."/". $_POST["month"] ."/". $_POST["year"];

            
            createUser($_POST["name"], $_POST["email"], $_POST["userName"], $_POST["password"], $_POST["phone"], $_POST["genders"], $dateOfBirth, "farmer.png", "farmer");

            unset($_SESSION["previousInput"]);
            unset($_SESSION["errors"]);

            header("Location: ../View/logIn.php");
        }
        else
        {
            $_SESSION["previousInput"] = $previousInput;
            $_SESSION["errors"] = $errors;
            header("Location: ../View/registration.php?error=true");
        }


    }

    









    function validateName( $name )
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


    function validateEmail( $email)
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


    function validatePhone( $phone )
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




    function validateDoB($day, $month, $year)
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


    




    if(isset($_POST["uniqueUserName"]))
    {
        if(isUserFieldValueExists("username", $_POST["uniqueUserName"]))
        {
            echo "exists";
        }
    }



    

?>