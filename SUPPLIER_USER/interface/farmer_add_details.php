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

if(isset($_SESSION["is_logged_in"])){

    $s_email = $_SESSION["is_logged_in"];

    $s_data = viewProfile($s_email);

    $userName = $s_data['username'];

    }

  if (isset($_COOKIE["logged_in"])) {

   $s_email = $_COOKIE["logged_in"];

  $s_data = viewProfile($s_email);

   $userName = $s_data['username'];
  
  }



?>

<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
    
    <link rel="stylesheet" href="../css/farmer_add_details.css">
</head>
<?php include 'profile_header.php';?>
<table width="100%">
	<tr>
		
		

		<td class="back_body">
			
			<div align="center">
				<fieldset style="width: 650px; height: 950px;">
					<legend><h3>Advertisement Details</h3></legend>
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
							<td style="border-bottom: none;"><a href="farmer_advertisement.php">All Farmer's Post</a></td>

						 <td align="right" style="border-bottom: none;">
								<form>
								
								<input style="text-indent: -99em;width: 0px;height: 0px;background: lightblue;border: none;" type="text" name="add_id" id="add_id" value="<?php echo $add_id; ?>" readonly>

								<input style="text-indent: -99em;width: 0px;height: 0px;background: lightblue;border: none;" type="text" name="uname" id="uname" value="<?php echo $userName; ?>" readonly>
                              
								<input style="width:100px;height: 50px;" type="button" name="button" value="ACCEPT" onclick= "return farmerAcceptCheck()" >

								</form>
							  </td>
						</tr>
					</table>

					<div id="accept_response_farmer_add" >         </div>
				</fieldset> 
			</div>

		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/accept_handler.js"></script>
<?php include 'f_footer.php';?>

</body>
</html>