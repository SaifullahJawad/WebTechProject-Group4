<?php
session_start();

?>

<?php include 'r_header.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>

	<link rel="stylesheet" href="../css/supplier_advertisement.css">
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
				<form name="add_form" method="post" action="../php/supplier_add_check.php" enctype="multipart/form-data" onsubmit="return supplierAdd()">

					<fieldset style="width: 700px; height: 420px;" >
                         
                         <div style="color: blue;">
                         	
                         	<?php echo $_SESSION["post_added"] ?? "" ; ?>

                         </div>

						<legend><h3>Post Advertisement</h3></legend>

						<table style="width: 690px; height: 350px; border: none;">
							
							<tr>
							<td>Product Name</td>
							<td>
								: <input type="text" name="add_name" id="add_name"

								value="<?php echo $_SESSION["add_form_input"]["add_name"] ?? "" ;?>">
                                
                         <span id="add_name_err" > <?php echo $_SESSION["add_name_err"] ?? "" ; ?></span>

                                </td>
							</tr>

							<tr>
								<td>Quantity (In Kg)</td>
								<td>
									: <input type="text" name="quantity" id="quantity"

								value="<?php echo $_SESSION["add_form_input"]["quantity"] ?? "" ;?>">
                                 
                        <span id="quantity_err" > <?php echo $_SESSION["quantity_err"] ?? "" ; ?></span>

								</td>
							</tr>

							<tr>
								<td>Price /Kg</td>
								<td>: <input type="text" name="price" id="price" 

									value="<?php echo $_SESSION["add_form_input"]["price"] ?? "" ;?>">

						<span id="price_err" > <?php echo $_SESSION["price_err"] ?? "" ; ?></span>

								</td>

							</tr>

							<tr>
								<td>Product Image</td>
								<td>
                                    <input type="file" name="image" id="image">

                              <span id="picture_err" > <?php echo $_SESSION["picture_err"] ?? "" ; ?> </span>
								</td>
							</tr>

							<tr>
								
		        	           <td style="border-bottom: none;">
		        	           	<a href="view_your_all_post.php">All Your Posts</a>
		        	           </td>

		        	           <td  align="right" style="border-bottom: none;">
		        		           <input type="submit" name="submit" value="Post">
		        		          
		        	           </td>

							</tr>
						</table>
					</fieldset>
				</form>
			</div>

		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/supplier_advertisement.js"></script>

<?php include 'f_footer.php';?>

</body>
</html>

<?php

unset($_SESSION["add_form_input"]);


unset($_SESSION["add_name_err"]);
unset($_SESSION["quantity_err"]);
unset($_SESSION["price_err"]);

unset($_SESSION["picture_err"]);


unset($_SESSION["post_added"]);



?>