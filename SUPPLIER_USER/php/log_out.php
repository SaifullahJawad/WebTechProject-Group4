<?php

    session_start();
	session_destroy();

	setcookie("logged_in", "$email", time()-1000, '/');
	
	header('location:../interface/login.php')


?>