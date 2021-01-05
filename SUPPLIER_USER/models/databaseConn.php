<?php

	$location 	= 'localhost';
	$dbuser		= 'root';
	$dbpass		= '';
	$database	= 'c&c_dist_mgt_systm'; 

	function getConnection(){
	
	

		global $location;
		global $dbuser;
		global $dbpass;
		global $database;

		$conn = mysqli_connect($location, $dbuser, $dbpass, $database);
		return $conn;	
	}

 /*$conn=getConnection();

	if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"; */


?>