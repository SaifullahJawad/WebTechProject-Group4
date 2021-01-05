<?php

session_start();

if(isset($_POST['submit'])){



require_once('../models/user_table_service.php');

if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);

$db_password = $s_data['password'];

$id = $s_data['id'];

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);

$db_password = $s_data['password'];

$id = $s_data['id'];
  
}

   //if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['submit'])){

	
  $current_password = $_REQUEST['cupassword'];   
	
	$password = "";


	$cuRpass_flag = "";
	$pass_flag = "";
  $cpass_flag = "";

  
  $_SESSION["pass_change"] = $_REQUEST['npassword'];
  $_SESSION["rnpass_change"] =$_REQUEST['rnpassword'];



   /*----Current password validation validation------*/

   if (empty($_REQUEST["cupassword"])) {

         $cuRpass_flag = "error";

         $_SESSION["cuRpass_error"]="*Enter your current password";

         } elseif(!empty($_REQUEST["cupassword"])) {

             if ($db_password != $current_password ) {
           
                  $cuRpass_flag = "error";

                  $_SESSION["cuRpass_error"]="*Current password did not Matched";
            
          }
           
        }


     


//-----new password validation


     if (empty($_REQUEST["npassword"])) {

         $pass_flag = "error";

         $_SESSION["change_pass_error"]="*Enter Your Password";

         } else {
           $password = test_input($_REQUEST["npassword"]);
          
           
       } 

     /*--------Confirm Password------*/

     if (empty($_REQUEST["rnpassword"])) {

         $cpass_flag = "error";

         $_SESSION["change_cpass_error"]="*Confirm Your password";

         } elseif(!empty($_REQUEST["rnpassword"])) {

       $cpassword = test_input($_REQUEST["rnpassword"]);

             if ($password != $cpassword ) {

                $cpass_flag = "error";

                $_SESSION["change_cpass_error"]="*Password did not matched";

            
          }
           
        }



  


if (strlen($pass_flag) == 0 && strlen($cpass_flag) == 0 && strlen($cuRpass_flag) == 0) {
	
 
  $type = "supplier";

  
  
  $flag = passwordChange($id, $password, $type);

  if ($flag) {

    unset($_SESSION["change_cpass_error"]);

    unset($_SESSION["change_pass_error"]);

    unset($_SESSION["cuRpass_error"]);

    unset($_SESSION["pass_change"]);

    unset($_SESSION["rnpass_change"]);


    session_destroy();

    setcookie("logged_in", "$email", time()-1000, '/');
   

    header('location:../interface/login.php');

    }else{

      header('location:../interface/change_password.php?msg=conn_error');
    }

   }else{


   	header('location:../interface/change_password.php');
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