<?php
	include_once('header.html');
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD ANOTHER ADMIN PAGE</title>
</head>
<body>
	<form method="post" action="addanotheradmincheck.php">
<fieldset>
	<legend>ADD ADMIN</legend>
	<table border="0" align="center" height="100%" width="100%">
		<tr align="left">
			<td rowspan="1">
	<select name="ADMIN">
		<option value="ADMIN"></option>
		<option value="">2nd Admin</option>
		<option value="">3rd Admin</option>
		<option value="">4th Admin</option>

	</select>
</td>
</tr>

<tr>
	<td>
		<input type="submit" name="submit" value="Add">
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