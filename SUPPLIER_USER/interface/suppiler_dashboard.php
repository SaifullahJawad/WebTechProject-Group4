<?php

session_start();


?>


<?php include 'r_header.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	
		
		<link rel="stylesheet" href="../css/supplier_dashboard.css">

</head>
<body>

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
			<tr>
			<td style="height: 300px">  </td>	
			</tr>
			<tr>
			 <td> </td>
			</tr>
			</table>
		</td>
		<td class="just_body" >
			<table align="center" style="border: none;">
				<tr>
					<td>
						<div >
							<div style="width: 300px;background-color:rgb(60, 179, 113);color: white;height: 70px" >
								<h3> Buy Crops??</h3>

								<a style="color: white;" href="farmer_advertisement.php"><h3>View Farmer's advirtisement</h3></a>
							</div>
							
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div>
							<div style="width: 300px;background-color:#CD5C5C;color: white;height: 70px">

								<h3> Sell crops to other Supplier?? </h3>

								<a style="color: white;" href="supplier_advirtisement.php"><h3>Post For Sale</h3></a>

							</div>
							
						</div>
					</td>
				</tr>
                 
                 <tr>
					<td>
						<div>
							<div style="width: 300px;background-color:grey;color: white;height: 70px">
								<h3 style="color: white;">All your posts</h3>

								<a style="color: white;" href="view_your_all_post.php"><h3> Your posts</h3></a>
							</div>
							
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div>
							<div style="width: 300px;background-color:red;color: white;height: 70px">
								<h3 style="color: white;">View Other Supplier's selling Post</h3>

								<a style="color: white;" href="all_suppliers_selling_post.php"><h3>Other Supplier's post</h3></a>
							</div>
							
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div>
							<div style="width: 300px;background-color:hsl(0, 20%, 50%);color: white;height: 70px">
								<h3 style="color: white;">View Your Accepted Ads</h3>

								<a style="color: white;" href="your_accepted_adds.php"><h3>All Your Accepted Ads</h3></a>
							</div>
							
						</div>
					</td>
				</tr>

				
				<tr>
					<td>
						<div>
							<div style="width: 300px;background-color:rgb(106, 90, 205);color: white;height: 70px">
								<h3>Facing any problem??</h3>

								<a style="color: white;" href="complain_form.php"><h3>Make A complain</h3></a>
							</div>
							
						</div>
					</td>
				</tr>

			</table>
		</td>
	</tr>
</table>
<?php include 'f_footer.php';?>
</body>
</html>