
<?php

session_start();

?>




<!DOCTYPE html>
<html>

<head>
     
  
  <link rel="stylesheet" href="../css/login.css">


</head>

<body>

     <?php include 'header.php';?>

     <table class="just_body" align="center" width="100%">
       <tr>
        <td>

     <div align="center" >
         <form method="post" action="../php/login_check.php">
          <fieldset style="width: 500px">
          	<legend><h3>Log In</h3></legend>

                 <div>
                     <span> <?php echo $_SESSION["invalid"] ?? "" ; ?></span>
                 </div>
                 <table width="100%" style="border: none;">
                 	<tr>
                 		<td>Email</td>

                 		<td>:<input type="email" name="email" value="<?php echo $_SESSION["log_form_input"]["email"] ?? "" ;?>">

                             <span> <?php echo $_SESSION["email_empty"] ?? "" ; ?></span>
                         
                      </td>
                 	</tr>
                 	<tr>
                 		<td><br>Password</td>
                 		<td><br>:<input type="password" name="password" value="<?php echo $_SESSION["log_form_input"]["password"] ?? "" ;?>" >

                            <span> <?php echo $_SESSION["pass_empty"] ?? "" ; ?></span>
                        </td>
                 		
                 	</tr>
                 	<tr>
                 		<td colspan="2">

                 			<hr>
                               <input type="checkbox" name="remember" value="rm"> Remember Me<br><br>

                 		</td>
                 	</tr>

                 	<tr>

                 		<td align="left" colspan="2">
                 			
                 			<input type="submit" name="submit" value="log in">
                 		</td>
                 		
                 	</tr>

                 </table>

                     <p>New user?<a href="registration.php" style="">Register For Free</a></p>

                     
                    
          		</fieldset>
          </form>
         </div>
         </td>
        </tr>

</table>

<?php include 'f_footer.php';?>
    	
</body>

</html>

<?php

unset($_SESSION["invalid"]);
unset($_SESSION["log_form_input"]);
unset($_SESSION["email_empty"]);
unset($_SESSION["pass_empty"]);



?>