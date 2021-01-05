<?php

session_start();

if(isset($_POST['submit'])){

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  require_once('../models/user_table_service.php');

  $email_err="";
  $pass_err="";

  $email = $_REQUEST["email"];
  $password = $_REQUEST["password"];

  $_form_input=["email"=>"","password"=>""];


	$_form_input["email"]=$_REQUEST["email"];
  $_form_input["password"]=$_REQUEST["password"];

  $_SESSION["log_form_input"]=$_form_input;



	if (empty($_REQUEST["email"])) {
		
	   $email_err="Enter Your Email Address";

	}

  if(empty($_REQUEST["password"])) {
		
		$pass_err="Enter Your Password";

	}

  if(strlen($email_err)==0 && strlen($pass_err)==0){

        if (!empty($_REQUEST["email"]) && !empty($_REQUEST["password"])) {

          //database//

          $type = "supplier";
          $login_value = ["email"=> $email, "password"=> $password, "type"=> $type];

          $flag = loginCheck($login_value);

          // Login check//


          if ($flag) {

            if (isset($_REQUEST["remember"])) {
              
              setcookie("logged_in", "$email", time()+3600, '/');

              unset($_SESSION["invalid"]);
              unset($_SESSION["log_form_input"]);
              unset($_SESSION["email_empty"]);
              unset($_SESSION["pass_empty"]);

              header('location:../interface/suppiler_dashboard.php');

            }else{
                  
                  $_SESSION["is_logged_in"] = $email;

                  unset($_SESSION["invalid"]);
                  unset($_SESSION["log_form_input"]);
                  unset($_SESSION["email_empty"]);
                  unset($_SESSION["pass_empty"]);

                  header('location:../interface/suppiler_dashboard.php');


            }

                  
            }else{
                
                $_SESSION["invalid"]="User invalid";

                header('location:../interface/login.php');

            }


        }
    
          

	}else{


    $_SESSION["email_empty"]=$email_err;
    $_SESSION["pass_empty"]=$pass_err;


  header('location:../interface/login.php');
}



}else{

	header('location:../interface/login.php');
}





}else{


  header('location:../interface/login.php');
}



//function userExist(){

 //require_once('../models/user_table_service.php');

 //$type = "supplier";
 //global $email;
 //global $password;

 //$login_value = ["email"=> $email, "password"=> $password, "type"=> $type];

 //$flag = loginCheck($login_value);

 //if ($flag) {
   
   //return true;
      
 //}
    

//return false;

//}

?>