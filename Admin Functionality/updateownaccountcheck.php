<?php

include_once('header.html');
    if(!isset($_POST["submit"]))
    {
        exit(); 

    }


    if(!isset($_SESSION))
    {
        session_start();
    }

    $errors = ["name" => "", "email" => "", "genders" => "", "dob" => "","fileToUpload" => ""];
    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = move_uploaded_file($target_dir, $target_file);
    



    if(empty($_POST["name"]))
    {
        $errors["name"]= "";
    }
    else
    {
        if(!isValidName($_POST["name"]))
        {
            $errors["name"]= "";
        }
    }


    if(empty($_POST["email"]))
    {
        $errors["email"]= "";
    }
    else
    {
        if(!isValidEmail($_POST["email"]))
        {
            $errors["email"]= "";
        }
        
    }

    if( !isset($_POST["genders"]) )
    {
        $errors["genders"] = "";
    }



    if(empty($_POST["dob"]))
    {
        $errors["dob"] = "";
    }
    else
    {
        echo "profile updated";
        echo "<br>";
    }
    
  if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<br>";
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

    if( $errors["name"] == "" && $errors["email"] == "" && $errors["genders"] == "" && $errors["dob"] == "" )
    {
        

        $_SESSION["name"] = $_POST["name"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["dob"] = $_POST["dob"];
        unset($_SESSION["errors"]);

    }
    else
    {
        $_SESSION["errors"] = $errors;
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
        else  {
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

  
    include_once('header.html');
?>