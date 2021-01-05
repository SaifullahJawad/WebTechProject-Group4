<?php

require_once('databaseConn.php');

function insertSupplier($supplier){


$conn = getConnection();


$fname = $supplier['fname'];
$email = $supplier['email'];
$uname = $supplier['uname'];

$cpassword = $supplier['cpassword'];
$phone = $supplier['phone'];
$gender = $supplier['gender'];
$photo = $supplier['picture'];
$dob = $supplier['dob'];
$type = $supplier['type'];

$sql = "INSERT INTO users  VALUES ('', '$fname', '$email', '$uname', '$cpassword', '$phone', '$gender', '$dob','$photo', '$type')";



/*$result = mysqli_query($conn, $sql);*/


if(mysqli_query($conn, $sql)){

			return true; 

		}else{

			return "";

		}

}

function emailExist($email){

	$conn = getConnection();

	$sql = "SELECT * FROM users WHERE email='$email'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    if($row > 0){

				
               return true;
				

			}else{

				return "";
			}


}

function unameExist($uname){

	$conn = getConnection();

	$sql = "SELECT * FROM users WHERE username='$uname'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    if($row > 0){

				
               return true;
				

			}else{

				return "";
			}


}

function loginCheck($login_value){

  $conn = getConnection();

  $email = $login_value['email'];
  $password = $login_value['password'];
  $type = $login_value['type'];

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND user_type='$type'";

    $result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

    if($row > 0){

				
               return true;
				

			}else{

				return "";
			}

}

function viewProfile($email){

$conn = getConnection();

$sql = "SELECT * FROM users WHERE email='$email'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if($row > 0){

	return $row;
	
}else{

	return "";
}


}

function updatePersonalInfo($info){

   $conn = getConnection();


$fname = $info['fname'];
$email = $info['email'];
$phone = $info['phone'];
$gender = $info['gender'];
$dob = $info['dob'];
$type = $info['type'];

$sql = "UPDATE users
SET name='$fname', phone='$phone', gender='$gender', dob='$dob'
WHERE email='$email' AND user_type='$type'";


if(mysqli_query($conn, $sql)){

	return true;
	
}else{

	return "";
}


}


function updateEmail($email,$id){

	$conn = getConnection();

	$sql = "UPDATE users
	  SET email='$email'
	  WHERE id='$id'";

 if(mysqli_query($conn, $sql)){

	return true;
	
    }else{

	return "";
}
 
}


function updateUserName($uname,$id){

     $conn = getConnection();

     $sql = "UPDATE users
	  SET username ='$uname'
	  WHERE id='$id'";

	  if(mysqli_query($conn, $sql)){

	return true;
	
    }else{

	return "";
}


}

function changePhoto($file_name,$id){

$conn = getConnection();

$sql = "UPDATE users
	  SET picture ='$file_name'
	  WHERE id='$id'";

if(mysqli_query($conn, $sql)){

	return true;
	
    }else{

	return "";

}


}

function passwordChange($id, $password, $type){


$conn = getConnection();

$sql = "UPDATE users
	  SET password ='$password'
	  WHERE id='$id' AND user_type='$type'";

if(mysqli_query($conn, $sql)){

	return true;
	
    }else{

	return "";

}


}

function deleteAccount($id){

  $conn = getConnection();

  $sql = "DELETE FROM users WHERE id='$id'";

  if(mysqli_query($conn, $sql)){

	return true;
	
    }else{

	return "";

}


}

function addPost($add_name, $add_quantity, $add_price, $file_name, $status, $id){


$conn = getConnection();

$sql = "INSERT INTO advertisements  

VALUES ('', '$add_name', '$add_quantity', '$add_price', '$file_name', '', '$status', '$id')";



/*$result = mysqli_query($conn, $sql);*/


if(mysqli_query($conn, $sql)){

			return true; 

		}else{

			return "";

		}

}

function myAdds($id){

   $conn = getConnection();
   
   $sql = "SELECT * FROM advertisements WHERE user_id='$id'";
   
   $result = mysqli_query($conn, $sql);
   $all_your_adds = [];

   while ($row = mysqli_fetch_assoc($result)) {

			array_push($all_your_adds, $row);
		}

		return $all_your_adds;

}



function otherSupplierAdds($id){

   $conn = getConnection();

   $all_supp_adds = [];

   $status = "none";
   $type = "supplier";

   $sql = "SELECT * FROM advertisements WHERE NOT (user_id = '$id' OR accepted_by != '$status')";

   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
   	
   	  while ($row = mysqli_fetch_assoc($result)) {

   	  	$uid = $row['user_id'];

   	  	$sqlType = "SELECT * FROM users WHERE id = '$uid'";

   	  	$resultStatus = mysqli_query($conn, $sqlType);

   	  	while ($rowStatus = mysqli_fetch_assoc($resultStatus)) {

            if($rowStatus['user_type'] == $type){
              
              array_push($all_supp_adds, $row);

            }

   	  	}
   	  	
   	  }


   }



return $all_supp_adds;



}


function viewAdvertisement($add_id){

$conn = getConnection();

$sql = "SELECT * FROM advertisements WHERE aid = '$add_id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if($row > 0){

	return $row;
	
}else{

	return "";
}


}


function editAdvertisement($add_name, $add_quantity, $add_price, $file_name, $add_id){

$conn = getConnection();


$sql = "UPDATE advertisements
SET product_name='$add_name', quantity='$add_quantity', price='$add_price', crop_picture='$file_name'
WHERE aid='$add_id'";

if(mysqli_query($conn, $sql)){

	return true;
	
}else{

	return "";
}


}


function viewSellerProfile($user_id){

$conn = getConnection();

$sql = "SELECT * FROM users WHERE id='$user_id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if($row > 0){

	return $row;
	
}else{

	return "";
}


}

function deleteAdd($add_id){

    $conn = getConnection();

    $sql = "DELETE FROM advertisements WHERE aid='$add_id'";

   if(mysqli_query($conn, $sql)){

	return true;
	
   }else{

	return "";
 }

}

function acceptSupplierAdd($add_id,$userName){

$conn = getConnection();

$sql = "UPDATE advertisements
	  SET accepted_by = '$userName'
	  WHERE aid = '$add_id'";


	if(mysqli_query($conn, $sql)){

	return true;
	
   }else{

	return "";
  }  


}

function allFarmerAdds(){

   $conn = getConnection();

   $all_farmer_adds = [];

   $status = "none";
   $type = "farmer";

   $sql = "SELECT * FROM advertisements WHERE NOT (accepted_by != '$status')";

   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
   	
   	  while ($row = mysqli_fetch_assoc($result)) {

   	  	$uid = $row['user_id'];

   	  	$sqlType = "SELECT * FROM users WHERE id = '$uid'";

   	  	$resultStatus = mysqli_query($conn, $sqlType);

   	  	while ($rowStatus = mysqli_fetch_assoc($resultStatus)) {

            if($rowStatus['user_type'] == $type){
              
              array_push($all_farmer_adds, $row);

            }

   	  	}
   	  	
   	  }


   }

   return $all_farmer_adds;

}


function acceptFarmerAdd($add_id_farmer, $uname_s){

$conn = getConnection();

$sql = "UPDATE advertisements
	  SET accepted_by = '$uname_s'
	  WHERE aid = '$add_id_farmer'";


	if(mysqli_query($conn, $sql)){

	return true;
	
   }else{

	return "";
  }  




}


function all_my_accepted_adds($my_user_name){

      $conn = getConnection();


   $sql = "SELECT * FROM advertisements WHERE accepted_by = '$my_user_name'";

   $result = mysqli_query($conn, $sql);

    $all_accepted_adds = [];

   while ($row = mysqli_fetch_assoc($result)) {

			array_push($all_accepted_adds, $row);
		}

		return $all_accepted_adds;


}


function viewBuyerInfo($buyer){

    $conn = getConnection();

  $sql = "SELECT * FROM users WHERE username = '$buyer'";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);

 if($row > 0){

	return $row;
	
 }else{

	return "";
 }


}

function complainPost($complaint_name, $complaint, $id){

  $conn = getConnection();

  $sql = "INSERT INTO complaint VALUES ('','$complaint_name', '$complaint', '$id')";

  if(mysqli_query($conn, $sql)){

			return true; 

		}else{

			return "";

		}

}

//function getAlluser(){


	//$conn = getConnection();
	//$sql = "select * from user_table";

		//$result = mysqli_query($conn, $sql);
		//$allusers = [];

		//while ($row = mysqli_fetch_assoc($result)) {
			//array_push($allusers, $row);
		//}

		//return $allusers;

//}




?>