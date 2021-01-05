<?php 

session_start();

?>




<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	
	<link rel="stylesheet" href="../css/registration.css">
</head>
<body>



<?php include 'header.php';?>


<table width="100%">
	
	<tr>
		<td class="middle_body" colspan="3" >

    	<div align="center">

          <form name="regForm" method="POST" action="../php/registration_check.php" enctype="multipart/form-data" onsubmit="return regValidation()">

          	<fieldset style="width: 700px; height: 530px;">
          		<legend><h3>Registration</h3></legend>

	          <table style="width: 690px; height: 460px; border: none;" >
		         
		     <tr>
		       <td>Full Name </td>
		        	<td>:<input type="text" id="fname" name="fname" value="<?php echo $_SESSION["form_input"]["full_name"] ?? "" ; ?>" >

		        		<span id="fname_err" > <?php echo $_SESSION["fname_error"] ?? "" ; ?></span>
		        		 
		        	</td>
		      </tr>

		      
		        <tr>
		        	<td>Email</td>
		        	<td>:<input type="email" id="email" name="email" value="<?php echo $_SESSION["form_input"]["email"] ?? "" ; ?>" onkeyup="emailCheck()">

		        		 <span id="email_err"> <?php echo $_SESSION["email_error"] ?? "" ; ?> </span>
		        	</td>
		        	
		        </tr>

		     <tr >
			  <td >User Name</td>
			  <td >:<input type="text" id="uname" name="uname" value="<?php echo $_SESSION["form_input"]["uname"] ?? "" ; ?>" onkeyup="userNameCheck()">

			        <span id="uname_err" > <?php echo $_SESSION["uname_error"] ?? "" ; ?></span>    
                          
			        </td>
			        
		        </tr>

		        <tr>
		        	<td>Password</td>
		        	<td>:<input type="Password" id="password" name="password" value="<?php echo $_SESSION["form_input"]["password"] ?? "" ;  ?>">

		        		<span id="pass_err"> <?php echo $_SESSION["password_error"] ?? "" ; ?> </span>
		        		
		        	</td>
		        </tr>
		        <tr>
		        	<td>Confirm Password</td>
		        	<td>: <input type="Password" id="cpassword"  name="cpassword" value="<?php echo $_SESSION["form_input"]["confirm_password"] ?? "" ; ?>" >

		        		<span id="cpass_err" > <?php echo $_SESSION["cpass_error"] ?? "" ; ?> </span>
		        		
		        	</td>
		        </tr>
		        

		      <tr>
		       <td>Phone Number </td>
		       <td>:<input type="text" id="phone" name="phone" value="<?php echo $_SESSION["form_input"]["phone_no"] ?? "" ; ?>" >

		       	  <span id="phone_err"> <?php echo $_SESSION["phone_error"] ?? "" ; ?> </span>
		        		 
		        	</td>
		        </tr>
		        
		        <tr>
		        	<td>Gender</td>
		        	<td>

		        		<?php $gender= $_SESSION["form_input"]["gender"] ?? "" ; ?>

		        		:<input type="radio" id="male" name="gender" <?php if (isset($gender) && $gender=="Male") {echo "checked";} ?>

		        		value="Male"> Male

                        <input type="radio" id="female" name="gender" <?php if (isset($gender) && $gender=="Female") {echo "checked";} ?>

                        value="Female"> Female

                        <input type="radio" id="other" name="gender" <?php if (isset($gender) && $gender=="Other") {echo "checked";} ?> 

                         value="Other"> Other 

                         <span id="gender_err"> <?php echo $_SESSION["gender_error"] ?? "" ; ?> </span>
                        
		        	</td>
		        	
		        </tr>

		        <tr>
		        	<td>Profile Picture</td>
		        	<td>:<input type="file" name="image" id="image">

		        	<span id="picture_err" > <?php echo $_SESSION["pic_error"] ?? "" ; ?> </span>

		        	</td>
		        </tr>
		        
		        <tr>
		        	<td>Date of Birth</td>
		        	<td>:
		        <input style="width: 20px;" type="text" id="day" name="day" value="<?php echo $_SESSION["form_input"]["day"] ?? "" ; ?>" maxlength="2">/<input style="width: 20px;" type="text" id="month" name="month" value="<?php echo $_SESSION["form_input"]["month"] ?? "" ; ?>" maxlength="2">/<input style="width: 30px;" type="text" id="year" name="year" value="<?php echo $_SESSION["form_input"]["year"] ?? "" ; ?>" maxlength="4">(dd/mm/yy)
		        

		        		<span id="dob_err"> <?php echo $_SESSION["date_error"] ?? "" ; ?> </span>
		        		
		        	</td>
		        	
		        </tr>

		       
		        <tr>
		        	<td  align="right" colspan="2" style="border-bottom: none;">
		        		<input type="submit" name="submit" value="Submit">
		        		<input type="reset" name="reset" value="Reset" >
		        	</td>
		        	
		        </tr>
	        </table>
	      </fieldset>
       </form>
      </div>
     </td>
	</tr>
</table>

<script type="text/javascript" src="../javaScript/reg_check.js"></script>
<?php include 'f_footer.php';?>
</body>
</html>

<?php

unset($_SESSION["form_input"]);
unset($_SESSION["id_error"]);
unset($_SESSION["uname_error"]);
unset($_SESSION["email_error"]);
unset($_SESSION["fname_error"]);
unset($_SESSION["phone_error"]);
unset($_SESSION["gender_error"]);
unset($_SESSION["password_error"]);
unset($_SESSION["cpass_error"]);
unset($_SESSION["date_error"]);
unset($_SESSION["pic_error"]);

?>