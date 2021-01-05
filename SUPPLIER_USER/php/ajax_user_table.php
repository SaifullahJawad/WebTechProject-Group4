<?php

require_once('../models/user_table_service.php');


if(isset($_REQUEST['email_check'])){


  	$email_check = $_REQUEST['email_check'];

  	$flag = emailExist($email_check);

  	if($flag){

  		echo "!**email allready exists**";
  	}



  }

  if(isset($_REQUEST['uname_check'])){


  	$uname_check = $_REQUEST['uname_check'];

  	$uname_flag = unameExist($uname_check);

  	if($uname_flag){

  		echo "!**User name allready Taken**";
  	}



  }


  ?>