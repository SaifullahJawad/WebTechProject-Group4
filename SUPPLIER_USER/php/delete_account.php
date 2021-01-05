<?php

session_start();

if(isset($_POST['submit'])){



require_once('../models/user_table_service.php');

if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);

$db_email = $s_data['email'];

$db_password = $s_data['password'];

$id = $s_data['id'];

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);

$db_email = $s_data['email'];

$db_password = $s_data['password'];

$id = $s_data['id'];
  
}

   //if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['submit'])){
 
	

	$email_flag = "";
	$password_flag = "";
  

  
  $_SESSION["delete_email"] = $_REQUEST['email'];
  $_SESSION["delete_password"] =$_REQUEST['password'];



     /*--------Confirm Email------*/

     if (empty($_REQUEST["email"])) {

         $email_flag = "error";

         $_SESSION["delete_email_empty"]="*Enter your email";

         } elseif(!empty($_REQUEST["email"])) {

        $form_email = test_input($_REQUEST["email"]);

             if ($db_email != $form_email) {

                $email_flag = "error";

                $_SESSION["delete_email_empty"]="*Email did not matched";

            
          }
           
        }


        //----confirm password---

        if (empty($_REQUEST["password"])) {

         $password_flag = "error";

         $_SESSION["delete_password_empty"]="*Enter your password";

         } elseif(!empty($_REQUEST["password"])) {

        $form_password = test_input($_REQUEST["password"]);

             if ($db_password != $form_password) {

                $password_flag = "error";

                $_SESSION["delete_password_empty"]="*Wrong password";

            
          }
           
        }



  


if (strlen($email_flag) == 0 && strlen($password_flag) == 0) {
	
 
  $type = "supplier";

  
  
  $flag = deleteAccount($id);

  if ($flag) {

    unset($_SESSION["delete_email"]);

    unset($_SESSION["delete_password"]);

    unset($_SESSION["delete_email_empty"]);

    unset($_SESSION["delete_password_empty"]);

    


    session_destroy();

    setcookie("logged_in", "$email", time()-1000, '/');
   

    header('location:../interface/login.php');

    }else{

      header('location:../interface/account_delete_form.php?msg=conn_error');
    }

   }else{


   	header('location:../interface/account_delete_form.php');
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