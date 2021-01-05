<?php 

session_start();

?>

<?php include 'r_header.php';?>




<!DOCTYPE html>
<html>
<head>
	<title>Delete Profile</title>
		
	 <link rel="stylesheet" href="../css/account_delete_form.css">   

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
				<form method="post" action="../php/delete_account.php" onsubmit="return deleteAccount()">
					<fieldset style="width:700px">
						<legend><h3>Delete Profile</h3></legend>
						<table style="border: none;">
							<tr>
								<td><br>Enter Your Email</td>
								<td><br>:<input type="email" id="email" name="email" value="<?php echo $_SESSION["delete_email"] ?? "" ;  ?>">
                    
                    <span id="email_err" > <?php echo $_SESSION["delete_email_empty"] ?? "" ; ?> </span>
								</td>
							</tr>
                           
							<tr>
				<td style="border-bottom: none;"><br>Enter Your Password</td>
				<td style="border-bottom: none;"><br>:<input type="password" id="password" name="password" value="<?php echo $_SESSION["delete_password"] ?? "" ;  ?>">

                    <span id="pass_err"> <?php echo $_SESSION["delete_password_empty"] ?? "" ; ?> </span>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="border-bottom: none;">
									<hr>
									<input type="submit" name="submit" value="Delete Account">
								</td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>
		</td>
	</tr>

</table>

<script type="text/javascript" src="../javaScript/delete_account.js"></script>


</body>
<?php include 'f_footer.php';?>
</html>

<?php

    unset($_SESSION["delete_email"]);

    unset($_SESSION["delete_password"]);

    unset($_SESSION["delete_email_empty"]);

    unset($_SESSION["delete_password_empty"]);

 ?>