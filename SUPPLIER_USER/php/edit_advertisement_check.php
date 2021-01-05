<?php 

session_start();

if(isset($_POST['submit']) && isset($_FILES['image'])){


//if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['submit']) && isset($_FILES['image'])) {

  
  
  require_once('../models/user_table_service.php');

//********Add id *******************
  $add_id = $_SESSION["update_post_id"];

//********************************

	
	$add_name_err = "";
	$quantity_err = "";
	$price_err = "";
	$picture_err = "";

  $file_name = "";
  $source = "";
  $destination = "";

  $status = "";
  $add_name = "";
  $add_quantity = "";
  $add_price = "";
	


$_form_input=["add_name"=>"","quantity"=>"","price"=>""];


   $_form_input["add_name"]= $_REQUEST["add_name"];
   $_form_input["quantity"]=$_REQUEST["quantity"];
   $_form_input["price"]=$_REQUEST["price"];
   
   $_SESSION["edit_form_input"]=$_form_input;


//**************** Add name *********************************

  if(empty($_REQUEST["add_name"])){

   $add_name_err="*Enter Crop Name";

   $_SESSION["edit_name_err"]=$add_name_err;

  }


  if(!empty($_POST["add_name"])){

    $add_name = test_input($_POST["add_name"]);
     
     $alphaCount = 0;
     $j = 0;

    $lower = strtolower($add_name);

    $dtName = str_replace(" ", "", $lower);
    
  
     while($j < strlen($dtName)){

        if (!($dtName[$j] >= 'a' && $dtName[$j] <= 'z')){

        $alphaCount++;

    }

    $j++;

   }

   if ($alphaCount != 0){

       $add_name_err="*Use Alphabet For Crop Name";

       $_SESSION["edit_name_err"] = $add_name_err;


   }


   }



//************ Quantiy ***********************


if(empty($_REQUEST["quantity"])){

   $quantity_err="*Enter quantity";

   $_SESSION["quantity_error"]=$quantity_err;

  }

if (!empty($_REQUEST['quantity'])){

      $qCount = 0;
      $x=0;
      $add_quantity = test_input($_REQUEST['quantity']);


      while($x < strlen($add_quantity)){

    if (!($add_quantity[$x] >= '0' && $add_quantity[$x] <= '9')){

        $qCount++;

    }

    $x++;

   }

   if ($qCount != 0){

       $quantity_err = "**Use Just number and no SPACE to set Quantiy";

       $_SESSION["quantity_error"] = $quantity_err ;


   }
      


    }

//*************Price err check**********************


  if(empty($_REQUEST["price"])){

   $price_err="Enter price of product";

   $_SESSION["price_error"]=$price_err;

  }

  if (!empty($_REQUEST['price'])){

      $pCount = 0;
      $y=0;
      $add_price = test_input($_REQUEST['price']);


      while($y < strlen($add_price)){

    if (!($add_price[$y] >= '0' && $add_price[$y] <= '9')){

        $pCount++;

    }

    $y++;

   }

   if ($pCount != 0){

       $price_err = "** Use Just number and no SPACE to set Price";

       $_SESSION["price_error"] = $price_err ;


   }
      


    }
//*********Picture validation ********


if ($_FILES['image']['size'] == 0){

       $picture_err = "*upload a photo";

       $_SESSION["picture_error"] = $picture_err;

      }

    if($_FILES['image']['size'] != 0){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      
      $imgname = explode('.',$_FILES['image']['name']);
      $imgn2 = end($imgname);

      $file_ext = strtolower($imgn2);

      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions) === false){


        $picture_err = "*please choose a JPEG or jpg or PNG file.";

         $_SESSION['picture_error'] = $picture_err ;

      }
    }




  if (strlen($add_name_err)==0 && strlen($quantity_err)==0 && strlen($price_err)==0 && strlen($picture_err)==0  ) {


    $destination = "../uploaded_picture_advertisement/".$_FILES['image']['name'];
    $source = $_FILES['image']['tmp_name'];

    move_uploaded_file($source, $destination);

   

  $flag = editAdvertisement($add_name, $add_quantity, $add_price, $file_name, $add_id);


    if ($flag) {

     unset($_SESSION["edit_form_input"]);


    unset($_SESSION["edit_name_err"]);
    unset($_SESSION["quantity_error"]);
    unset($_SESSION["price_error"]);

     unset($_SESSION["picture_error"]);


    

    $_SESSION["post_edited"]= "Advertisement Is Successfully Edited";
    
    header('location:../interface/edit_advertisement.php');

    }else{

      header('location:../interface/edit_advertisement.php?msg=conn_error');
    }

  	
  }else{

       header('location:../interface/edit_advertisement.php'); 

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