<?php

   if(isset($_GET['id'])){

   	if(isset($_GET['id'])){

   		require_once('../models/user_table_service.php');
	
		$add_id = $_GET['id'];

		$flag = deleteAdd($add_id);

          if ($flag) {
          	
            header('location:../interface/view_your_all_post.php');

          }else{

          	header('location:../interface/view_your_all_post.php?msg=conn_error');
          }


		}

	}else {

       header('location:../interface/login.php'); 
	}

 ?>