<?php


session_start();

if(isset($_FILES['image'])){



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


  if(isset($_FILES['image'])){



  $source = "";
  $destination = "";
  $file_name = "";

	
	$picture_flag = "";

     // imag validation ////


    if ($_FILES['image']['size'] == 0 && $_FILES['cover_image']['error'] == 0){

       $picture_flag = "error";

       $_SESSION["image_error"] = "*upload a photo";

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

         $_SESSION['image_error'] ="*please choose a JPEG or jpg or PNG file.";

      }
    }



if (strlen($picture_flag) == 0) {
	
 
  $type = "supplier";
  
  $flag = changePhoto($file_name,$id);

    if ($flag) {

    unset($_SESSION["image_error"]);

    $destination = "../uploaded_picture/".$_FILES['image']['name'];
    $source = $_FILES['image']['tmp_name'];

     move_uploaded_file($source, $destination);

    
    header('location:../interface/profile_picture_change.php');

    }else{

      header('location:../interface/profile_picture_change.php?msg=conn_error');
    }

   }else{


   	header('location:../interface/profile_picture_change.php');
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