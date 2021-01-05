<?php
session_start();

?>

<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');

if(isset($_GET['id'])){
		
		
		$_SESSION["update_post_id"] = $_GET['id'];

	}

  $add_id = $_SESSION["update_post_id"];

  $add_data = viewAdvertisement($add_id);


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>

	<link rel="stylesheet" href="../css/edit_advertisement.css"> 
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
			<td style="height: 200px;border:none;" >  </td>	
			</tr>
			<tr>
			 <td style="border: none;"> </td>
			</tr>
			</table>

		</td>

		

		<td class="just_body">
			<div align="center">
				<form name="edit_add_form" method="post" action="../php/edit_advertisement_check.php" enctype="multipart/form-data" onsubmit="return editAdd()">

					<fieldset style="width: 700px; height: 480px;" >
                         
                         <div style="color: blue;">
                         	
                         	<?php echo $_SESSION["post_edited"] ?? "" ; ?>

                         </div>

						<legend><h3>Edit Advertisement</h3></legend>

						<table style="width: 690px; height: 400px; border: none;">
							
							<tr>
							<td>Product Name</td>
							<td>
								: <input type="text" name="add_name" id="add_name"

								value="<?php 

                               if(isset($_SESSION["edit_form_input"]["add_name"])){

								echo $_SESSION["edit_form_input"]["add_name"] ?? "" ;

                                }else{

                                      echo $add_data['product_name'];

                                }

								?>">
                                
                  <span id="add_name_err" > <?php echo $_SESSION["edit_name_err"] ?? "" ; ?></span>

                                </td>
							</tr>

							<tr>
								<td>Quantity (In Kg)</td>
								<td>
									: <input type="text" name="quantity" id="quantity"

								value="<?php 

								if(isset($_SESSION["edit_form_input"]["quantity"])){

								echo $_SESSION["edit_form_input"]["quantity"] ?? "" ;

								}else{
                                     
                                     echo $add_data['quantity'];

								}

								?>">
                                 
                        <span id="quantity_err" > <?php echo $_SESSION["quantity_error"] ?? "" ; ?></span>

								</td>
							</tr>

							<tr>
								<td>Price /Kg</td>
								<td>: <input type="text" name="price" id="price" 

									value="<?php
                                       
                                      if(isset($_SESSION["edit_form_input"]["price"])){

									 echo $_SESSION["edit_form_input"]["price"] ?? "" ;

                                         }else {

                                         	echo $add_data['price'];
                                         }

									 ?>">

						<span id="price_err" > <?php echo $_SESSION["price_error"] ?? "" ; ?></span>

								</td>

							</tr>

							<tr>
								<td>Product Image</td>
								<td>
                                    <div>
                                    	<?php 

                       echo "<img src='../uploaded_picture_advertisement/".$add_data['crop_picture']."'  >";

                                    	?>

                                    </div>

                                    <input type="file" name="image" id="image">

                              <span id="picture_err" > <?php echo $_SESSION["picture_error"] ?? "" ; ?> </span>
								</td>
							</tr>

							<tr>
								<td   style="border-bottom: none;">
		        		           
		        		           <input type="submit" name="submit" value="SAVE">
		        		          
		        	           </td>

		        	           <td  style="border-bottom: none;text-align: right;">

		        	           	<a href="view_your_all_post.php">All Your Posts</a>

		        	           </td>
							</tr>
						</table>
					</fieldset>
				</form>
			</div>

		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/edit_add.js"></script>

<?php include 'f_footer.php';?>

</body>
</html>

<?php

unset($_SESSION["edit_form_input"]);


unset($_SESSION["edit_name_err"]);
unset($_SESSION["quantity_error"]);
unset($_SESSION["price_error"]);

unset($_SESSION["picture_error"]);


unset($_SESSION["post_edited"]);



?>