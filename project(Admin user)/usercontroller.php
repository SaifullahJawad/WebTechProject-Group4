<?php
	require_once('userService.php');

	//create new user
	if(isset($_POST['create'])){

		$name 	= $_POST['name'];
		$email 		= $_POST['email'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$gender 		= $_POST['gender'];
		if(empty($username) || empty($password) || empty($email) || empty($gender)|| empty($name)){
			header('location: addanotheradmin.php?error=null');
		}else{
			$user = [
				'name'   =>$name,
				'email' =>$email,
				'username'	=>$username,
				'password'	=>$password,
				'gender'  =>$gender,
			];
			$status = create($user);
			if($status){
				echo "success";
								//header('location: user_list.php?msg=success');
			}else{
				header('location: addanotheradmin.php?error=dberror');
			}
		}	
	}
?>