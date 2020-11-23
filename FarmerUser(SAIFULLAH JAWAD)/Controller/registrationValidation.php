<?php


    if(!isset($_POST["SignUp"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    if(!isset($_SESSION))
    {
        session_start();
    }

    

    $errors = ["name" => "", "email" => "", "userName" => "", "password" => "", "confirmPassword" => "", "phone" => "", "genders" => "", "dob" => ""];
    $previousInput = ["name" => "", "email" => "", "userName" => "", "password" => "", "confirmPassword" => "", "phone" => "", "genders" => "", "day" => "", "month" => "", "year" => ""];
    
    


    if(empty($_POST["name"]))
    {
        $errors["name"]= "*required";
    }
    else
    {
        $previousInput["name"] = $_POST["name"];
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
        $previousInput["email"] = $_POST["email"];
        if(isEmailExists())
        {
            $errors["email"] = "*email already exists";
        }
        else
        {
            if(!isValidEmail($_POST["email"]))
            {
                $errors["email"]= "*invalid";
            }

        }
        
        
    }



    if(empty($_POST["userName"]))
    {
        $errors["userName"] = "*required";
    }
    else
    {
        $previousInput["userName"] = $_POST["userName"];

        if(isUserNameExists())
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
        
        if(!isValidPassword($_POST["password"], $_POST["confirmPassword"]))
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
        if(!isValidPhone($_POST["phone"]))
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
        if(!isValidDOB($_POST["day"], $_POST["month"], $_POST["year"]))
        {
            $errors["dob"] = "*invalid";
        }

    }

   

    

    if( $errors["name"] == "" && $errors["email"] == "" && $errors["userName"] == "" && $errors["password"] == "" && $errors["phone"] == "" && $errors["genders"] == "" && $errors["dob"] == "" )
    {
        

        $dateOfBirth = $_POST["day"] ."/". $_POST["month"] ."/". $_POST["year"];


        require_once("../Controller/fileDataHandler.php");
        createData("../farmerProfileData.txt", $_POST["name"]."|".$_POST["email"]."|".$_POST["userName"]."|".$_POST["password"]."|".$_POST["phone"]."|".$_POST["genders"]."|".$dateOfBirth."|"."farmer.png"."\r\n");

        unset($_SESSION["previousInput"]);
        unset($_SESSION["errors"]);

        header("Location: ../View/logIn.php");
    }
    else
    {
        $_SESSION["previousInput"] = $previousInput;
        $_SESSION["errors"] = $errors;
        $_SESSION["enteredRegistrationValidation"]="true";
        header("Location: ../View/registration.php");
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


    function isValidPassword( $password, $confirmPassword )
    {
        if($password == $confirmPassword)
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



    function isUserNameExists()
    {

        $fileHandler = fopen("../farmerProfileData.txt", "r");
        while($currentLine = fgets($fileHandler))
        {

            if($currentLine != "\r\n")
            {

                $userDataElements = explode("|",$currentLine);

                if($userDataElements[2] == $_POST["userName"])
                {
                    fclose($fileHandler);
                    return true;
                }

            }

            
        }

        fclose($fileHandler);
        return false;
    }




    function isEmailExists()
    {

        $fileHandler = fopen("../farmerProfileData.txt", "r");
        while($currentLine = fgets($fileHandler))
        {

            if($currentLine != "\r\n")
            {

                $userDataElements = explode("|",$currentLine);

                if($userDataElements[1] == $_POST["email"])
                {
                    fclose($fileHandler);
                    return true;
                }

            }

            
        }

        fclose($fileHandler);
        return false;
    }











    function actualInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }








    

?>


