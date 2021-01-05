<?php

	require_once('header.html');

  ?>



<!DOCTYPE html>
<html>
<head>
	
	<title>MEMBER ADD PAGE</title>
</head>
<body style="background-color: linen">
	<form method="post" action="addmembercheck.php">
		<fieldset>
			<legend>
				MEMBER ADD
			</legend>
			<table border="0" align="center" height="100%" width="100%">
				<tr>
				<td rowspan="1">
	<select name="MEMBER">
		<option value="MEMBER"></option>
		<option value="">1st member</option>
		<option value="">2nd member</option>
		<option value="">3rd member</option>

	</select>
					</td>

					
				</tr>
				<tr>
					<td>
						<label><input type="submit" name="submit" value="Add"></label>
					</td>

				</tr>
			</table>
		</fieldset>
	</form>

</body>
</html>





<?php  

require_once('footer.html');

?>