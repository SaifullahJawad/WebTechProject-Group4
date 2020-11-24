<?php
include_once('header.html');
session_start();

 	if($_POST['MEMBER'] == "MEMBER")
 	{
 		echo "Please Select Member";
 	}
 	else
 	{
 		echo "Member Added successfully" .$_POST['MEMBER']; 
 			}

 ?>

