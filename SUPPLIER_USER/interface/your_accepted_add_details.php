<?php

session_start();

?>

<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');


if(isset($_REQUEST["add_id"])){

	$add_id = $_REQUEST["add_id"];

 $add_data = viewAdvertisement($add_id);


}

if (isset($_REQUEST["user_id"])) {

	$user_id = $_REQUEST["user_id"];

	$user_data = viewSellerProfile($user_id);

//$s_email = $_COOKIE["logged_in"];

//$s_data = viewProfile($s_email);
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
    
    <link rel="stylesheet" href="../css/your_accepted_add_details.css">

</head>
<?php include 'profile_header.php';?>
<table width="100%">
	<tr>
		
		

		<td class="full_body">
			
			<div align="center">
				<fieldset style="width: 650px; height: 870px;">
					<legend><h3>Accepted Add details Details</h3></legend>
					<table style="width: 550px; height: 800px; border: none;">
                        <tr>
							<td colspan="2" style="border-bottom: none;" ><h3>Crop Info</h3><hr></td>
						</tr>
						<tr>
							<td>Crop Name</td>
							<td>:<?php
                                
                                echo $add_data['product_name'] ; 

							?></td>
							
						</tr>
						<tr>
							<td>Quantity (IN kg)</td>
							<td>:<?php
                                  
                                 echo $add_data['quantity'] ;
							?>

							</td>
							
						</tr>

						<tr>
							<td>Price (Per/Kg) </td>
							<td>:<?php
                                  
                                 echo $add_data['price'];
							?>

							</td>
							
						</tr>

						<tr>
							<td>Photo </td>
							<td>

								<div>

								<?php 

								   echo "<img src='../uploaded_picture_advertisement/".$add_data['crop_picture']."'  >";

								   
                                 ?>
								</div>
							</td>
						</tr>

						<tr>
							<td>Add Status </td>
							<td>:<?php
                                
                                if($add_data['accepted_by'] == 'none'){

                               echo "Add Is Waiting to be accepted";
                             
                                     }else{

                                echo "Accepted";
                                      
                                      }
  

							?>
                           
							</td>
							
						</tr>
						<tr>
							<td colspan="2" style="border-bottom: none;" ><h3>Seller Info</h3><hr></td>
						</tr>
						<tr>
							<td>Seller Name</td>
							<td>:<?php
                                  
                                  echo $user_data['name'] ;

							?>

							</td>
							
						</tr>
                        
                        <tr>
							<td>Seller email</td>
							<td>:<?php
                                  
                                  echo $user_data['email'] ;

							?>

							</td>
							
						</tr>

						<tr>
							<td>Seller Phone NO</td>
							<td>:<?php
                                  
                                  echo $user_data['phone'] ;

							?>

							</td>
							
						</tr>

						<tr>
							<td>Seller Photo</td>
							<td>

								<div>

								<?php 

								   echo "<img src='../uploaded_picture/".$user_data['picture']."'  >";

								   
                                 ?>
								</div>
							</td>
						</tr>

						<tr>
							<td>Seller Type</td>
							<td>:<?php
                                  
                                  echo $user_data['user_type'] ;

							?>

							</td>
							
						</tr>


						<tr>
							<td colspan="2" style="border-bottom: none;"><a href="your_accepted_adds.php">Your Accepted Posts</a></td>
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