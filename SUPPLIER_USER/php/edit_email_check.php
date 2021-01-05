<?php

session_start();

if(isset($_POST['submit'])){



require_once('../models/user_table_service.php');

if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);

$id = $s_data['id'];

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);

$id = $s_data['id'];
  
}

   //if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['submit'])){

	
    
	
	$email = "";
	
	$email_flag = "";


  $_SESSION["nemail"]= $_REQUEST['email'];



   /*----Email Validation------*/


     if (empty($_REQUEST["email"])) {

         $email_flag = "error";

        $_SESSION["email_update"]="*Email Required";

     } 


    if(!empty($_POST["email"])){


       $email = test_input($_REQUEST["email"]);
       $atPosition = strpos($email, "@");
       $firstDot =  stripos($email,".");
       $lastDotPosition = strripos($email, ".");



    if(!($atPosition > 0 && $firstDot > 1 && !strpos($email, ".@") && $email[$atPosition+2] != "." && $lastDotPosition > $atPosition+1 && !strpos($email, "..") && strlen($email) > ($lastDotPosition+1))){

            $email_flag = "error";

            $_SESSION["email_update"]="*Email invalid";

        }

    }
    

  


if (strlen($email_flag) == 0) {
	
 
  $type = "supplier";
  
  $flag = updateEmail($email,$id);

  if ($flag) {

    unset($_SESSION["nemail"]);
    unset($_SESSION["email_update"]);

    session_destroy();

    setcookie("logged_in", "$email", time()-1000, '/');
   

    header('location:../interface/login.php');

    }else{

      header('location:../interface/edit_email.php?msg=conn_error');
    }

   }else{


   	header('location:../interface/edit_email.php');
   }

 }



}else{

  header('location:../interface/login.php');
}


function test_input($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  } 