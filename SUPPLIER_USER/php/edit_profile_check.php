<?php

session_start();

if(isset($_POST['fname'])){

  require_once('../models/user_table_service.php');

   //if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['fname'])){

  
    
  
  
  $fname = "";
  $phone_no = "";
  $gender = "";

  $day = "";
  $month = "";
  $year = "";
  $dob = "";


  
  $fname_flag = "";
  $phone_flag = "";
  $gender_flag = "";
  $date_flag = "";
  
  $_SESSION["supplier_fullName"] = $_REQUEST["fname"];
  $_SESSION["supplier_phone"] = $_REQUEST["phone"];
   
  $_SESSION["supplier_gender"] = $_REQUEST["gender"]; 
  $_SESSION["b_day"] = $_REQUEST["day"];
        
  $_SESSION["b_month"] = $_REQUEST["month"];

  $_SESSION["b_year"] = $_REQUEST["year"];



     /*----full_name_validation----*/

      if (empty($_POST["fname"])) {

        $fname_flag="error";

       $_SESSION["fname_er"]="*Enter Your Full Name";

    } elseif(!empty($_POST["fname"])) {

      $fname = test_input($_POST["fname"]);

       if (!(strtolower($fname[0]) >='a' && strtolower($fname[0]) <='z')){

          

       $fname_flag="error";

       $_SESSION["fname_er"]="*must be start with a letter";

    }

    }


    if(!empty($_POST["fname"])) {

        if (str_word_count($fname) < 2 ) {
         
           $fname_flag="error";

          $_SESSION["fname_er"]="*must be atleast 2 words";


        }

    }


    if (!empty($_POST["fname"])){

        $dup = str_replace(" ","", $fname);

        $doubleDot = stripos($dup,".."); 
        $doubleDash = stripos($dup,"--");

        if ($doubleDot != ""){

       $fname_flag="error";

       $_SESSION["fname_er"]="*name can not contain (..)";
     

        }else if ($doubleDash != ""){

       $fname_flag="error";

       $_SESSION["fname_er"]="*name can not contain (--)";

      

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

       $_SESSION["fname_er"]="*name can only contain A to Z and a to z";


   }


   }
    
   



     /*----Phone NO validation-------*/

    if(empty($_REQUEST['phone'])) {

      $phone_flag="error";

      $_SESSION["phone_er"] = "*Phone Number Required";
    
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

       $_SESSION["phone_er"]="*Phone NO can only contain numbers";


   }
      


    }

    /*------Gender------*/

    if (empty($_REQUEST['gender'])) {
          

          $gender_flag = "error";
          $_SESSION["gender_er"]="*Select Your gender";

    }else {
      
      $gender = test_input($_REQUEST['gender']);
    }



    

        /*---------Date of Birth validation-----*/


          

        if(empty($_REQUEST['day']) || empty($_REQUEST['month']) || empty($_REQUEST['year'])){

          $date_flag = "error";

          $_SESSION["date_er"] = "*Date of birth Required";

        }

        if(!empty($_REQUEST['day']) && !empty($_REQUEST['month']) && !empty($_REQUEST['year'])){


              if(!($_REQUEST['day'] >= 1 && $_REQUEST['day'] <= 31))
              {

                $date_flag = "error";
                 
                 $_SESSION["date_er"] = "*invalid Day Format";

              } else if (!($_REQUEST['month'] >= 1 && $_REQUEST['month'] <= 12))
              {

                $date_flag = "error";
                
                $_SESSION["date_er"] = "*invalid Month Format";

              } else if (!($_REQUEST['year'] >= 1970 && $_REQUEST['year'] <= 2020)){

                $date_flag = "error";

                $_SESSION["date_er"] = "*invalid year Format";

              }

        }



   
        

if (strlen($fname_flag) == 0 && strlen($phone_flag) == 0 && strlen($gender_flag) == 0 &&  strlen($date_flag) == 0  ) {
  
 
  $type = "supplier";
  $day = $_REQUEST['day'];
  $month = $_REQUEST['month'];
  $year = $_REQUEST['year'];

  $dob_temp = $day ."/". $month ."/". $year;
  $dob= test_input($dob_temp);

  if(isset($_SESSION["is_logged_in"])){

$c_email = $_SESSION["is_logged_in"];


}

if (isset($_COOKIE["logged_in"])) {

$c_email = $_COOKIE["logged_in"];

  
}







$personal_info = ["fname"=> $fname, "email"=> $c_email, "phone"=> $phone_no, "gender"=> $gender, "dob"=> $dob, "type"=> $type];


$flag = updatePersonalInfo($personal_info);

  if ($flag) {

    unset($_SESSION["supplier_fullName"]);
    unset($_SESSION["supplier_phone"]);
    unset($_SESSION["supplier_gender"]);
    unset($_SESSION["b_day"]);
    unset($_SESSION["b_month"]);
    unset($_SESSION["b_year"]);
    unset($_SESSION["fname_er"]);
    unset($_SESSION["phone_er"]);
    unset($_SESSION["gender_er"]);
    unset($_SESSION["date_er"]);

    echo "*YOUR PROFILE IS SUCCESSFULLY UPDATED*<br>VIEW YOUR PROFILE:<a href='view_profile.php'>View Profile </a> ";
    

    //header('location:../interface/login.php');

    }

   }else{

    header('location:../interface/edit_profile.php');
   }

 }



} else{

  header('location:../interface/login.php');
}


function test_input($data) {

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  
  } 



?>