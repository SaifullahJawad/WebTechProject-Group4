<?php

session_start();

?>

<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');


if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);
	
}


$dob = $s_data['dob'];
$e_dob = explode("/",$dob);

$day = $e_dob[0];
$month = $e_dob[1];
$year = $e_dob[2];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update personal info</title>

	
		<link rel="stylesheet" href="../css/edit_profile.css">

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
			<td style="height: 200px">  </td>	
			</tr>
			<tr>
			 <td style="border: none;"> </td>
			</tr>
			</table>

		</td>

		<td class="middle_body">
			<div align="center">
				<form name="edit_profile" >
					<fieldset style="width: 700px; height: 450px;">
						<legend><h3>Update Personal Info</h3></legend>

						<span id="update_response" style="color: blue" >
							

						</span>

						 <table style="width: 690px; height: 350px; border: none;" >

						 	<tr>
						 		<td>Full Name</td>
						 		<td>: <input type="text" id="fname" name="fname"  value="<?php 

						 		                       if(isset($_SESSION["supplier_fullName"])){

						 			                     echo $_SESSION["supplier_fullName"] ?? "" ;


						 		                         } else {

						 		                             echo $s_data['name'] ; 
						 		                         }

						 		                         ?>" > 
                                       
                             <span id="fname_err"> <?php echo $_SESSION["fname_er"] ?? "" ; ?> </span>

						 		                     </td>

						 	</tr>

						 	<tr>
						 		<td>Phone NO</td>
						 		<td>:<input type="text" id="phone" name="phone" value="<?php 

						 		                       if(isset($_SESSION["supplier_phone"])){

						 			                     echo $_SESSION["supplier_phone"] ?? "" ;


						 		                         } else {

						 		                             echo $s_data['phone'] ; 
						 		                         }

						 		                         ?>" >

						 		  <span id="phone_err"> <?php echo $_SESSION["phone_er"] ?? "" ; ?> </span>

						 		                     </td>
						 	</tr>

						 	<tr>
						 		<td>Gender</td>
						 		<td>

                                   <?php  $gender = $_SESSION["supplier_gender"] ?? "" ; 
                                          
                                          $gender_db = $s_data['gender'];

                                   ?>

						 			:<input type="radio" id="male" name="gender" <?php 

						 			       if (isset($gender) && $gender == "Male") {

						 			       		echo "checked";

						 			       	}else {

						 			        if (isset($gender_db) && $gender_db == "Male"){

						 			       	  echo "checked";
						 			       } 

						 			   }


						 			?>


						 			value="Male">Male
                                     

                                     <input type="radio" id="female" name="gender" <?php 

						 			       if (isset($gender) && $gender == "Female") {

						 			       		echo "checked";

						 			       	}else {

						 			        if (isset($gender_db) && $gender_db == "Female"){

						 			       	  echo "checked";
						 			       } 

						 			   }

                                      ?>


                                     value="Female"> Female

                                     <input type="radio" id="other" name="gender" <?php 

						 			       if (isset($gender) && $gender == "other") {

						 			       		echo "checked";

						 			       	}else {

						 			        if (isset($gender_db) && $gender_db == "other"){

						 			       	  echo "checked";
						 			       } 

						 			   }
						 			   
                                      ?> 


                                     value="other"> Other
                        
                      <span id="gender_err"> <?php echo $_SESSION["gender_er"] ?? "" ; ?> </span>

						 		</td>
						 	</tr>

						 	<tr>
						 	<td>Date of Birth</td>
						 	<td>: <input style="width: 20px;" type="text" id="day" name="day" value="<?php

						 	                         if(isset($_SESSION["b_day"])){

						 			                     echo $_SESSION["b_day"] ?? "" ;


						 		                         } else {

						 		                             echo $day ; 
						 		                         } 

						 	                                                     
                                                         ?>" 
						 	maxlength="2">/<input style="width: 20px;" type="text" id="month" name="month" value="<?php 

						 	  if(isset($_SESSION["b_month"])){

					           echo $_SESSION["b_month"] ?? "" ;


						 		    } else {

						 		        echo $month ; 
						 		    } 
 

						 	?>" 

						 	maxlength="2">/<input style="width: 30px;" type="text" id="year" name="year" value="<?php 

						 	if(isset($_SESSION["b_year"])){

					           echo $_SESSION["b_year"] ?? "" ;


						 		    } else {

						 		        echo $year ; 
						 		    }  

						 	?>" maxlength="4">(dd/mm/yy) 

			  <span id="dob_err"> <?php echo $_SESSION["date_er"] ?? "" ; ?> </span>

						   </td>

                            </tr>

                            <tr>
		        	           <td  align="right" colspan="2" style="border-bottom: none;">
		        		      <input type="button" name="update" value="update" onclick= "return editValidation()">

		        		         

		        		       </td>
		        		   </tr>
		        
		        	
					   </table>
					</fieldset>
				</form>
			</div>

		</td>
	</tr>
	
</table>

<script type="text/javascript" src="../javaScript/edit_personal_info.js"></script>

<?php include 'f_footer.php';?>

</body>
</html>

<?php 

    unset($_SESSION["supplier_fullName"]);
    unset($_SESSION["supplier_phone"]);
    unset($_SESSION["supplier_gender"]);
    unset($_SESSION["b_day"]);
    unset($_SESSION["b_month"]);
    unset($_SESSION["b_year"]);
    unset($_SESSION["fname_er"]);
    unset($_SESSION["phone_er"]);
    unset($_SESSION["gender_er"]);
    unset($_SESSION["date_er"]);


?>