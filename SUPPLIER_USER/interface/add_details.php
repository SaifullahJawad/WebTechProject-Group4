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

if (isset($_REQUEST["accepted_by"])) {

	$buyer = $_REQUEST["accepted_by"];

	if ($buyer != 'none') {

		$buyer_data = viewBuyerInfo($buyer);
	}


}else{

	$buyer_data = "";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
    
    <link rel="stylesheet" href="../css/add_details.css">

</head>
<?php include 'profile_header.php';?>
<table width="100%">
	<tr>
		
		

		<td class="back_body">
			
			<div align="center">
				<fieldset style="width: 650px; height: 870px;">
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
							<td colspan="2" style="border-bottom: none;" ><h3>Buyer Info</h3><hr></td>
						</tr>
						<tr>
							<td>Seller Name</td>
							<td>:<?php
                                  
                                  if(!empty($buyer_data)){

                                  echo $buyer_data['name'] ;

                                  }else {

                                  	echo "NONE";
                                  }

							?>

							</td>
							
						</tr>
                        
                        <tr>
							<td>Seller email</td>
							<td>:<?php
                                  if(!empty($buyer_data)){

                                  echo $buyer_data['email'] ;
                                  
                                  }else {
                                       
                                       echo "NONE";

                                  }

							?>

							</td>
							
						</tr>

						<tr>
							<td>Seller Phone NO</td>
							<td>:<?php
                                  
                                  if(!empty($buyer_data)){

                                  echo $buyer_data['phone'] ;

                                   }else {

                                   	echo "NONE";

                                   }

							?>

							</td>
							
						</tr>

						<tr>
							<td>Seller Photo</td>
							<td>

								<div>

								<?php 
                                     
                                     if(!empty($buyer_data)){

								   echo "<img src='../uploaded_picture/".$buyer_data['picture']."'  >";
                                     
                                     }else {

                                     	echo "NONE";
                                     }
								   
                                 ?>
								</div>
							</td>
						</tr>

						<tr>
							<td colspan="2" style="border-bottom: none;"><a href="view_your_all_post.php">All your posts</a></td>
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