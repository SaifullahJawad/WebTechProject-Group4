<?php


session_start();

?>

<?php include 'r_header.php';?>

<?php


if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];


}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];


	
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>change Email</title>
	<link rel="stylesheet" href="../css/edit_email.css"> 

</head>
<?php include 'profile_header.php';?>
<table width="100%">
	<tr>
		
		<td  style="border-right: 1px solid green;width: 300px;background: lightblue;">
			<table style="border:none;">
			<tr>
		    <td  style="border: none;">
			    <?php include 'sidebar.php';?>
			</td>
			</tr>
			</table>
		
		</td>

		<td class="middle">
			<div align="center">
				<form name="email_update_form" method="POST" action="../php/edit_email_check.php" onsubmit="return editEmail()">

					<fieldset style="width:700px;">
						<legend><h3>Change Email</h3></legend>
						<table style="border: none;">
							<tr>
								<td>Current Email</td>
								<td>: <?php 

								    if(isset($_SESSION["is_logged_in"])){

								    	echo $s_email;
								    } 

								    if(isset($_COOKIE["logged_in"])){

								    	echo $s_email;
								    }


								 ?> </td>
							</tr>
							<tr> 
								<td style="border-bottom: none"><br>Type New Email</td>
								<td style="border-bottom: none"><br>:<input type="email" name="email" id="email" value="<?php echo $_SESSION["nemail"] ?? "" ; ?>" onkeyup="emailCheck()">
                            
                          <span id="email_err" > <?php echo $_SESSION["email_update"] ?? "" ; ?></span>

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

<script type="text/javascript" src="../javaScript/edit_email.js"></script>

<?php include 'f_footer.php';?>

</body>
</html>

<?php
    unset($_SESSION["nemail"]);
    unset($_SESSION["email_update"]);


 ?>