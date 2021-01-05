<?php

require_once('../models/user_table_service.php');


if(isset($_REQUEST["add_id"])){

if (isset($_REQUEST["add_id"])) {
	
	$add_id = $_REQUEST["add_id"];

    }


  	if (isset($_REQUEST["uname"])) {

  		$userName = $_REQUEST["uname"];
  	}
  	

  	$flag = acceptSupplierAdd($add_id, $userName);


  	if($flag){

  		echo "<h3>**Advertisement Accepted**</h3>";
  	}



  }


  //*******************Farmer add accept Check************//


  if(isset($_REQUEST["add_id_farmer"])){

  if (isset($_REQUEST["add_id_farmer"])) {
  
  $add_id_farmer = $_REQUEST["add_id_farmer"];

    }


    if (isset($_REQUEST["uname_s"])) {

      $uname_s = $_REQUEST["uname_s"];
    }
    

    $flag22 = acceptFarmerAdd($add_id_farmer, $uname_s);


    if($flag22){

      echo "<h3>**Advertisement Accepted**</h3>";
    }



  }

  ?>