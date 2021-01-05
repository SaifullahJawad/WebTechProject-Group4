<?php

session_start();

if(isset($_POST['submit'])){

  require_once('../models/user_table_service.php');

   //if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['submit'])){

	
    
	$uname = "";
	$email = "";
	$fname = "";
	$phone_no = "";
	$gender = "";
	$password = "";
	$cpassword = "";

	$day = "";
  $month = "";
  $year = "";
  $dob = "";

  $source = "";
  $destination = "";
  $file_name = "";

	
	$uname_flag = "";
	$email_flag = "";
	$fname_flag = "";
	$phone_flag = "";
	$gender_flag = "";
	$pass_flag = "";
	$cpass_flag = "";
	$date_flag = "";
  
  $picture_flag = "";

   $_form_input=["full_name"=>"", "email"=>"", "uname"=>"", "password"=>"", "confirm_password"=>"", "phone_no"=>"", "gender"=>"", "day"=>"", "month"=>"", "year"=>""];

   //$_form_input["id"]=$_REQUEST["id"];
   $_form_input["full_name"]=$_REQUEST["fname"];
   $_form_input["email"]= $_REQUEST["email"];

   $_form_input["uname"]=$_REQUEST["uname"];
   
   $_form_input["password"]=$_REQUEST["password"];
   $_form_input["confirm_password"]=$_REQUEST["cpassword"];

   $_form_input["phone_no"]=$_REQUEST["phone"];
   $_form_input["gender"]=$_REQUEST["gender"];
   
   $_form_input["day"] = $_REQUEST['day'];
   $_form_input["month"] = $_REQUEST["month"];
   $_form_input["year"] = $_REQUEST["year"];


   $_SESSION["form_input"]=$_form_input;


        


     /*----full_name_validation----*/

      if (empty($_POST["fname"])) {

        $fname_flag="error";

       $_SESSION["fname_error"]="*Enter Your Full Name";

    } elseif(!empty($_POST["fname"])) {

      $fname = test_input($_POST["fname"]);

       if (!(strtolower($fname[0]) >='a' && strtolower($fname[0]) <='z')){

          

       $fname_flag="error";

       $_SESSION["fname_error"]="*must be start with a letter";

    }

    }


    if(!empty($_POST["fname"])) {

        if (str_word_count($fname) < 2 ) {
         
           $fname_flag="error";

          $_SESSION["fname_error"]="*must be atleast 2 words";


        }

    }


    if (!empty($_POST["fname"])){

        $dup = str_replace(" ","", $fname);

        $doubleDot = stripos($dup,".."); 
        $doubleDash = stripos($dup,"--");

        if ($doubleDot != ""){

       $fname_flag="error";

       $_SESSION["fname_error"]="*name can not contain (..)";
     

        }else if ($doubleDash != ""){

       $fname_flag="error";

       $_SESSION["fname_error"]="*name can not contain (--)";

      

        }


   }

   if(!empty($_POST["fname"])){
     
     $alphaCount = 0;
     $j = 0;

    $lower = strtolower($fname);

    $rpName = str_replace(" ", "", $lower);
    
    $dotRp  = str_replace(".","", $rpName);

    $dtName = str_replace("-", "", $dotRp);

     while($j < strlen($dtName)){

        if (!($dtName[$j] >= 'a' && $dtName[$j] <= 'z')){

        $alphaCount++;

    }

    $j++;

   }

   if ($alphaCount != 0){

       $fname_flag="error";

       $_SESSION["fname_error"]="*name can only contain A to Z and a to z";


   }


   }
    
   

     

   /*----Email Validation------*/


     if (empty($_REQUEST["email"])) {

         $email_flag = "error";

        $_SESSION["email_error"]="*Email Required";

     } 


    if(!empty($_POST["email"])){


       $email = test_input($_REQUEST["email"]);
       $atPosition = strpos($email, "@");
       $firstDot =  stripos($email,".");
       $lastDotPosition = strripos($email, ".");



    if(!($atPosition > 0 && $firstDot > 1 && !strpos($email, ".@") && $email[$atPosition+2] != "." && $lastDotPosition > $atPosition+1 && !strpos($email, "..") && strlen($email) > ($lastDotPosition+1))){

            $email_flag = "error";

            $_SESSION["email_error"]="*Email invalid";

        }

    }
    

    //if (!empty($_REQUEST["email"])) {
      
      
        //if (userEmailExists() == true){

          //$email_flag = "error";

          //$_SESSION["email_error"]="*Theis Email is Aready Exists Choose Another One";

        //}


    //}

    /*---user Name Validation-----*/

      if (empty($_POST["uname"])) {

        $uname_flag = "error";

        $_SESSION["uname_error"]="*User Name Required";

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

       $_SESSION["uname_error"]="*username can only contain A to Z and 0 to 9";


   }


   }

  /*-------password Validation-----*/


   if (empty($_REQUEST["password"])) {

         $pass_flag = "error";

         $_SESSION["password_error"]="*Enter Your Password";

         } else {
           $password = test_input($_REQUEST["password"]);
          
           
       } 

     /*--------Confirm Password------*/

     if (empty($_REQUEST["cpassword"])) {

         $cpass_flag = "error";

         $_SESSION["cpass_error"]="*Confirm Your password";

         } elseif(!empty($_REQUEST["cpassword"])) {

          $cpassword = test_input($_REQUEST["cpassword"]);

             if ($password == $cpassword ) {

              $cpassword = test_input($_REQUEST["cpassword"]);
            
          }else{

            $cpass_flag = "error";

                $_SESSION["cpass_error"]="*Password did not matched";

          }
           
        }


     /*----Phone NO validation-------*/

    if(empty($_REQUEST['phone'])) {

    	$phone_flag="error";

    	$_SESSION["phone_error"] = "*Phone Number Required";
    
    }

    if (!empty($_REQUEST['phone'])){

      $phoneCount = 0;
      $x=0;
    	$phone_no = test_input($_REQUEST['phone']);


      while($x < strlen($phone_no)){

    if (!($phone_no[$x] >= '0' && $phone_no[$x] <= '9')){

        $phoneCount++;

    }

    $x++;

   }

   if ($phoneCount != 0){

       $phone_flag="error";

       $_SESSION["phone_error"]="*Phone NO can only contain numbers";


   }
      


    }

    /*------Gender------*/

    if (empty($_REQUEST['gender'])) {
          

          $gender_flag = "error";
          $_SESSION["gender_error"]="*Select Your gender";

    }else {
    	
    	$gender = test_input($_REQUEST['gender']);
    }

    // imag validation ////


    if ($_FILES['image']['size'] == 0){

       $picture_flag = "error";

       $_SESSION["pic_error"] = "*upload a photo";

      }

    if($_FILES['image']['size'] != 0){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      //$file_size = $_FILES['image']['size'];
      //$file_tmp = $_FILES['image']['tmp_name'];
      //$file_type = $_FILES['image']['type'];
      $imgname = explode('.',$_FILES['image']['name']);
      $imgn2 = end($imgname);

      $file_ext = strtolower($imgn2);

      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions) === false){


          $picture_flag = "error";

         $_SESSION['pic_error'] ="*please choose a JPEG or jpg or PNG file.";

      }
    }


    

        /*---------Date of Birth validation-----*/


          

        if(empty($_REQUEST['day']) || empty($_REQUEST['month']) || empty($_REQUEST['year'])){

          $date_flag = "error";

          $_SESSION["date_error"] = "*Date of birth Required";

        }

        if(!empty($_REQUEST['day']) && !empty($_REQUEST['month']) && !empty($_REQUEST['year'])){


              if(!($_REQUEST['day'] >= 1 && $_REQUEST['day'] <= 31))
              {

                $date_flag = "error";
                 
                 $_SESSION["date_error"] = "*invalid Day Format";

              } else if (!($_REQUEST['month'] >= 1 && $_REQUEST['month'] <= 12))
              {

                $date_flag = "error";
                
                $_SESSION["date_error"] = "*invalid Month Format";

              } else if (!($_REQUEST['year'] >= 1970 && $_REQUEST['year'] <= 2020)){

                $date_flag = "error";

                $_SESSION["date_error"] = "*invalid year Format";

              }

        }



   
        

if (strlen($uname_flag) == 0 && strlen($email_flag) == 0 && strlen($fname_flag) == 0 && strlen($phone_flag) == 0 && strlen($gender_flag) == 0 && strlen($pass_flag) == 0 && strlen($cpass_flag) == 0 && strlen($date_flag) == 0 && strlen($picture_flag) == 0) {
	
 
  $type = "supplier";
  $day = $_REQUEST['day'];
  $month = $_REQUEST['month'];
  $year = $_REQUEST['year'];

  $dob_temp = $day ."/". $month ."/". $year;
  $dob= test_input($dob_temp);

 


  $destination = "../uploaded_picture/".$_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];

  move_uploaded_file($source, $destination);



$supplier = ["fname"=> $fname, "email"=> $email, "uname"=> $uname, "cpassword"=> $cpassword, "phone"=> $phone_no, "gender"=> $gender, "picture"=> $file_name, "dob"=> $dob, "type"=> $type];

$flag = insertSupplier($supplier);

  if ($flag) {

    unset($_SESSION["form_input"]);
    unset($_SESSION["id_error"]);
    unset($_SESSION["uname_error"]);
    unset($_SESSION["email_error"]);
    unset($_SESSION["fname_error"]);
    unset($_SESSION["phone_error"]);
    unset($_SESSION["gender_error"]);
    unset($_SESSION["password_error"]);
    unset($_SESSION["cpass_error"]);
    unset($_SESSION["date_error"]);
    unset($_SESSION["pic_error"]);

    header('location:../interface/login.php');

    }else{

      header('location:../interface/registration.php?msg=conn_error');
    }

   }else{

   	header('location:../interface/registration.php');
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