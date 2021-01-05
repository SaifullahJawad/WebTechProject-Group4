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
	<title>Profile Photo Change</title>

	<link rel="stylesheet" href="../css/profile_picture_change.css">

</head>
<?php include 'profile_header.php';?>
<table width="100%">
	<tr>
		<td style="border-right: 1px solid green;width: 300px;background: lightblue">
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
				<form name="imageChange" action="../php/photo_change_handler.php" method="post" enctype="multipart/form-data" onsubmit="return changeImage()">

					<fieldset style="width: 700px">
						<legend><h3>Profile Picture</h3></legend>


                             <div style="height: 220px;width: 220px;border: 1px solid black;">

							    <?php 

								   echo "<img src='../uploaded_picture/".$s_data['picture']."'  >";

                                 ?>

							 </div>
                             <table style="border: none;">
                             	<tr>
							    <td style="border: none"><input type="file" name="image" id="image"></td>
                              
                             </tr>
							 <hr>
							 <tr>
	                          <td style="border: none"><br><input type="submit" name="submit" value="Upload">

                                  <span id="picture_err"> <?php echo $_SESSION["image_error"] ?? "" ; ?></span>
	                          </td>
                             </tr>
                            </table>
					</fieldset>
				</form>
			</div>
		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/change_profile_image.js"></script>
<?php include 'f_footer.php';?>

</body>
</html>

<?php 

unset($_SESSION["image_error"]);

?>