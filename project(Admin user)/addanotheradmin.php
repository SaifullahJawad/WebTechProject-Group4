<?php
	include_once('header.html');
  ?>
<!DOCTYPE html>
<html>
<head>
	<style>
body {
  background-image: url("index1.png");
  background-repeat: no-repeat;
  background-position: top right;

}
</style>
	<title>ADD ANOTHER ADMIN PAGE</title>
</head>
<body>
	<form method="post" action="usercontroller.php">
<fieldset>
	<legend>ADD ADMIN</legend>
	<table border="0" align="center" height="100%" width="100%">
				<tr>
					<td>name</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
						<tr>
					<td>Email</td>
					<td><input type="email" name="email"></td>
				</tr>
					<td>username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td> <input type="radio" name="gender">Male
						 <input type="radio" name="gender">FeMale
						 <input type="radio" name="gender">others
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="add" value="add">
					</td>
				</tr>
	</table>
</fieldset>
</form>


</body>
</html>
<?php 
	
	include_once('footer.html');

 ?>