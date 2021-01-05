<?php


session_start();

?>

<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');


if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>change Username</title>
	
		
		<link rel="stylesheet" href="../css/edit_userName.css">

	
</head>
<?php include 'profile_header.php';?>
<table width="100%">
	<tr>
		
		<td style="border-right: 1px solid green;width: 300px;background: lightblue;">
			<table style="border:none;">
			<tr>
		    <td style="border: none;">
			    <?php include 'sidebar.php';?>
			</td>
			</tr>
			</table>
		
		</td>

		<td class="middle_body">
			<div align="center">
				<form name="uname_update_form" method="POST" action="../php/edit_userName_check.php" onsubmit="return editUname()">

					<fieldset style="width:700px;">
						<legend><h3>Change User Name</h3></legend>
						<table style="border: none;">
							<tr>
								<td>Current User Name</td>
								<td>: <?php 

								    if(isset($_SESSION["is_logged_in"])){

								    	echo $s_data['username'];
								    } 

								    if(isset($_COOKIE["logged_in"])){

								    	echo $s_data['username'];
								    }


								 ?> </td>
							</tr>
							<tr> 
								<td style="border-bottom: none"><br>Type New Username</td>
								<td style="border-bottom: none"><br>:<input type="text" name="uname" id="uname" value="<?php echo $_SESSION["s_uname"] ?? "" ; ?>" onkeyup="userNameCheck()">
                            
                          <span id="uname_err" > <?php echo $_SESSION["uname_update"] ?? "" ; ?></span>

								</td>
							</tr>

							<tr>
								<td colspan="2" style="border-bottom: none;">
									<hr>
									<input type="submit" name="submit" value="Submit">
								</td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/edit_userName.js"></script>

<?php include 'f_footer.php';?>

</body>
</html>

<?php
    unset($_SESSION["s_uname"]);
    unset($_SESSION["uname_update"]);


 ?>