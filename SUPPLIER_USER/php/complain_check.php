<?php
session_start();
?>

<?php

if(isset($_POST['submit'])){



if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
 

    //$_form_input=["complain"=>"","user_id"=>""];
    
	
  $_SESSION["complain_name"] = $_REQUEST["complain_name"];
	$_SESSION["complain"] = $_REQUEST["complain"];


  if (empty($_REQUEST["complain_name"])) {


    $complain_name_flag = "**Field Empty**";

    $_SESSION["comp_name_err"] = $complain_name_flag;

  }else{

      $cmp_name = $_REQUEST["complain_name"];
    $complaint_name = test_input($cmp_name);
  }

  if (empty($_REQUEST["complain"])) {
    
    $complain_falg = "**Field Empty**";

    $_SESSION["complain_err"] = $complain_falg;

  }else{

       $cmp = $_REQUEST["complain"];

       $complaint = $cmp;
      
  }


  if(strlen($complain_name_flag) == 0 && strlen($complain_falg) == 0){


     $flag = complainPost($complaint_name, $complaint, $id);

           if($flag){

               
               unset($_SESSION["comp_name_err"]);
               unset($_SESSION["complain_err"]);

              $_SESSION["complain_posted"] = "[Your Complain Is posted Successfully]";

              header('location:../interface/complain_form.php');


           }else{


                header('location:../interface/complain_form.php?msg=conn_error'); 
           }  


    }else{

    	header('location:../interface/complain_form.php'); 
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




?>