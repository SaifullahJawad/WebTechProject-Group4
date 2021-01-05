<?php

session_start();

?>

<?php include 'r_header.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Complain</title>
   
<link rel="stylesheet" href="../css/complain_form.css"> 

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
				<form method="post" action="../php/complain_check.php" onsubmit="return complaintCheck()">
				<fieldset style="width: 700px">
					<legend><h3>Post Your complain</h3></legend>
					<div style="color: blue;padding: 40px;">
						
						<?php echo $_SESSION["complain_posted"] ?? "" ; ?>

					</div>
                     
					<table style="border: none">

				   <tr>
				   	<td>Complain Title</td>
				   	<td>
				   		<input type="text" id="complain_name" name="complain_name" value="<?php echo $_SESSION["complain_name"] ?? "" ; ?>">

				   		<span id="comp_name_err" ><?php echo $_SESSION["comp_name_err"] ?? "" ; ?></span>
				   	</td>
				   </tr>
				    
                   <tr>
                   	<td><br>Write Complain Here</td>
                   	<td><br>
                   		<textarea id="complain" name="complain" rows="8" cols="40"><?php echo $_SESSION["complain"] ?? "" ; ?></textarea>

                   		<span id="comp_err" ><?php echo $_SESSION["complain_err"] ?? "" ; ?></span>
                   	</td>
                   </tr>

                   <tr>
                   	<td colspan="2">
                   		<hr>
                   		<input type="submit" name="submit" value="Post">

                   	</td>
                   </tr>
                    </table>
				</fieldset>
			   </div>
			</form>
		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/complaint.js"></script>
<?php include 'f_footer.php';?>

</body>
</html>

<?php

unset($_SESSION["comp_name_err"]);
unset($_SESSION["complain_err"]);

unset($_SESSION["complain_name"]);
unset($_SESSION["complain"]);

unset($_SESSION["complain_posted"]);

?>