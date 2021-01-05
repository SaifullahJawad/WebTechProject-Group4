<?php
include_once('header.html');
session_start();

 	if($_POST['ADMIN'] == "ADMIN")
 	{
 		echo "Please Select Admin";
 	}
 	else
 	{
 		echo "Admin Added successfully" .$_POST['ADMIN']; 
 			}

 ?>


