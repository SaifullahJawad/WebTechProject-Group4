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

	
    
	
	$uname = "";
	
	$uname_flag = "";


  $_SESSION["s_uname"]= $_REQUEST['email'];



   /*----Uname Validation------*/


     if (empty($_POST["uname"])) {

        $uname_flag = "error";

        $_SESSION["uname_update"]="*User Name Required";

       }


       if(!empty($_REQUEST["uname"])){

         $uname=test_input($_REQUEST["uname"]);
     
         $pCount = 0;
         $k = 0;

         $lowerUname = strtolower($uname);

     while($k < strlen($uname)){

    if (!($lowerUname[$k] >= 'a' && $lowerUname[$k] <= 'z') && !($lowerUname[$k] >= '0' && $lowerUname[$k] <= '9')){

        $pCount++;

    }

    $k++;

   }

   if ($pCount != 0){

       $uname_flag="error";

       $_SESSION["uname_update"]="*username can only contain A to Z and 0 to 9";


   }


   }
    

  


if (strlen($uname_flag) == 0) {
	
 
  $type = "supplier";
  
  $flag = updateUserName($uname,$id);

  if ($flag) {


    unset($_SESSION["s_uname"]);
    unset($_SESSION["uname_update"]);

    session_destroy();

    setcookie("logged_in", "$email", time()-1000, '/');
   

    header('location:../interface/login.php');

    }else{

      header('location:../interface/edit_userName.php?msg=conn_error');
    }

   }else{


   	header('location:../interface/edit_userName.php');
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