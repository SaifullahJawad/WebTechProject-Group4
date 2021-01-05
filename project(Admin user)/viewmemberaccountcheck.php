
<?php
		include_once("header.html");
	$name = "";
	$id = 123;

	
	$member = ['1','', 23, 3.5];
	$members = [
					'm1'=> ['id'=>12, 'name'=>'xyz','email'=>'bob@gmail.com'],
					'm2'=> ['id'=>11, 'name'=>'pqr','email'=>'alex@gmail.com'],
					'm3'=> ['id'=>10, 'name'=>'abc','email'=>'jesson@gmail.com']
				];


$members = [
				'm1'=> ['id'=>1012, 'name'=>'bob', 'email'=>'bob@gmail.com'],
				'm2'=> ['id'=>1111, 'name'=>'alex', 'email'=>'alex@gmail.com'],
				'm3'=> ['id'=>1510, 'name'=>'jesson', 'email'=>'jesson@gmail.com']
			];


$data = "<table border=1>
			<tr>
				<td>ID</td>
				<td>NAME</td>
				<td>EMAIL</td>
			</tr>";

	foreach ($members as $m) {
		

		$data .="<tr>
				<td>{$m['id']}</td>
				<td>{$m['name']}</td>
				<td>{$m['email']}</td>
			</tr>";
	}

$data .= "</table>";
echo $data;
require_once("footer.html");
?>