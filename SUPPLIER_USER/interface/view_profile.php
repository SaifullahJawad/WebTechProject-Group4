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
	<title>View Profile</title>
    
    <link rel="stylesheet" href="../css/view_profile.css">
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
			<tr>
			<td style="height: 300px;border: none;">  </td>	
			</tr>
			<tr>
			 <td style="border: none;"> </td>
			</tr>
			</table>
		</td>
		

		<td class="middle_body">
			
			<div align="center">
				<fieldset style="width: 650px; height: 650px;">
					<legend><h3>Profile</h3></legend>
					<table style="width: 550px; height: 550px; border: none;">
						<tr>
							<td colspan="2">

								<div style="height: 205px;width: 190px;border: 1px solid black;">

								<?php 

								   echo "<img src='../uploaded_picture/".$s_data['picture']."'  >";

								   echo "<a  href='profile_picture_change.php'>Change</a>" ;
                                 ?>
								</div>
							</td>
						</tr>

						<tr>
							<td>Full Name</td>
							<td>:<?php
                                
                                echo $s_data['name'] ; 

							?></td>
							
						</tr>
						<tr>
							<td>Email</td>
							<td>:<?php
                                  
                                 echo $s_data['email'] ;
							?>

							</td>
							
						</tr>

						<tr>
							<td>User Name</td>
							<td>:<?php
                                  
                                 echo $s_data['username'];
							?>

							</td>
							
						</tr>

						<tr>
							<td>Phone Number</td>
							<td>:<?php
                                
                                echo $s_data['phone'] ;  

							?>

							</td>
							
						</tr>
						<tr>
							<td>Gender</td>
							<td>:<?php
                                  
                                echo $s_data['gender'] ;
							?>

							</td>
							
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>:<?php
                                  
                                  echo $s_data['dob'] ;

							?>

							</td>
							
						</tr>
						<tr>
							<td colspan="2" style="border-bottom: none;"><a href="edit_profile.php">Edit Profile</a></td>
						</tr>
					</table>
				</fieldset>
			</div>

		</td>
	</tr>
	
</table>
<?php include 'f_footer.php';?>

</body>
</html>