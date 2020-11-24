

<?php
	include_once('header.html');

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>VIEW MEMBER ACCOUNT PAGE</title>
</head>
<body>
	<form method="post" action="viewmemberaccountcheck.php">
		<fieldset>
			<legend>VIEW MEMBER ACCOUNT</legend>
			<table>
				<tr>
					<td>
						<input type="submit" name="submit" value="view">
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