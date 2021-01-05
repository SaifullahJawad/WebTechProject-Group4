<?php


if (!isset($_SESSION["is_logged_in"]) && !isset($_COOKIE["logged_in"])) {


  header('location:login.php');

   
	
}




?>