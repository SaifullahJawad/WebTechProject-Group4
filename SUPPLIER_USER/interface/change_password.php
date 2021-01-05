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
	<title>change Password</title>
	
	<link rel="stylesheet" href="../css/change_password.css"> 
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

		<td class="just_body">
			<div align="center">
				<form method="post" action="../php/password_change_check.php" onsubmit="return changePassword()">
					<fieldset style="width:700px">
						<legend><h3>change password</h3></legend>
						<table style="border: none;">
							<tr>
								<td><br>Current Password</td>
								<td><br>:<input type="password" id="cupassword" name="cupassword" value="<?php 

						 	
						 		                             echo $s_data['password'] ;

						 		                         ?>">
                             
                             <span id="current_pass" > <?php echo $_SESSION["cuRpass_error"] ?? "" ; ?> </span>

						 		                     </td>
							</tr>
							<tr>
								<td><br>New Password</td>
								<td><br>:<input type="password" id="npassword" name="npassword" value="<?php echo $_SESSION["pass_change"] ?? "" ;  ?>">

                  <span id="new_pass_err" > <?php echo $_SESSION["change_pass_error"] ?? "" ; ?> </span>
								</td>
							</tr>
							<tr>
								<td style="border-bottom: none;"><br>Retype New Password</td>
								<td style="border-bottom: none;"><br>:<input  type="password" id="rnpassword" name="rnpassword" value="<?php echo $_SESSION["rnpass_change"] ?? "" ;  ?>">

               <span id="rnew_pass_err" > <?php echo $_SESSION["change_cpass_error"] ?? "" ; ?> </span>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="border-bottom: none;">
									<hr>
									<input type="submit" name="submit" value="Change">
								</td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/password_change.js"></script>
<?php include 'f_footer.php';?>

</body>
</html>

<?php 

    unset($_SESSION["change_cpass_error"]);

    unset($_SESSION["change_pass_error"]);

    unset($_SESSION["cuRpass_error"]);

    unset($_SESSION["pass_change"]);

    unset($_SESSION["rnpass_change"]);


?>