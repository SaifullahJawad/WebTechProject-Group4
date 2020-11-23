<?php

    
    if(!isset($_SESSION))
    {
        session_start();
    }



    if(isset($_SESSION["isLoggedIn"]) || isset($_COOKIE["loggedInUserName"]) )
    {
        header("Location: ../View/dashboard.php");
    }
    
    if(isset($_SESSION["enteredRegistrationValidation"]))
    {
        unset($_SESSION["enteredRegistrationValidation"]);
    }
    else
    {
        unset($_SESSION["previousInput"]);
        unset($genderOption);
        unset($_SESSION["errors"]);
    }
    
    


?>











<!DOCTYPE html>
<html>
    <head>
        <title> Registration </title>
    </head>
    <body>
            <?php include_once "../View/header.php" ?>
            <tr height="600px">


                <td align="Center" colspan="2"> 

                    <form action="../Controller/registrationValidation.php" method="POST">

                        <fieldset style="display: inline-block;" >

                            <legend><h3>SIGN UP AS A FARMER</h3></legend>


                            <table align="center"  width="800px">

                                
                    
                                <tr height="40px">
                    
                                    <td style="padding-left: 5px;"> <label for="name"> Name </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="name" name="name" size="30" value= "<?php echo $_SESSION["previousInput"]["name"] ?? ""; ?>" > </td>
                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["name"] ?? "" ; ?> </td>

                                        
                                    
                    
                                </tr>



                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                    
                                <tr height = "40px">
                    
                                    <td style="padding-left: 5px;"> <label for="email"> Email </label> </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="email" name="email" size="30" value= "<?php echo $_SESSION["previousInput"]["email"] ?? "" ;?>" > </td>
                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["email"] ?? "" ; ?> </td>
                                   
                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                                <tr height = "40px">

                                    <td style="padding-left: 5px;"> <label for="userName"> User Name: </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="userName" name="userName" size="30" value= "<?php echo $_SESSION["previousInput"]["userName"] ?? ""; ?>" > </td>
                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["userName"] ?? "" ; ?> </td>

                                </tr>



                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>





                                <tr height = "40px">

                                    <td style="padding-left: 5px;"> <label for="password"> Password: </td>
                                    <td style="padding-left: 5px;"> <input type="password" id="password" name="password" size="30" value= "<?php echo $_SESSION["previousInput"]["password"] ?? ""; ?>" > </td>
                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["password"] ?? "" ; ?> </td>

                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>




                                <tr height = "40px">

                                    <td style="padding-left: 5px;"> <label for="confirmPassword"> Confirm Password </td>
                                    <td style="padding-left: 5px;"> <input type="password" id="confirmPassword" name="confirmPassword" size="30" value= "<?php echo $_SESSION["previousInput"]["confirmPassword"] ?? ""; ?>" > </td>
                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["confirmPassword"] ?? "" ; ?> </td>

                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>




                                <tr height="40px">
                    
                                    <td style="padding-left: 5px;"> <label for="phone"> Phone No. </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="phone" name="phone" size="30" value= "<?php echo $_SESSION["previousInput"]["phone"] ?? ""; ?>" > </td>
                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["phone"] ?? "" ; ?> </td>
                                    
                                </tr>



                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>




                    
                                <tr height = 40px>
                    
                                    <td style="padding-left: 5px;" colspan="2">
                                        
                                        <fieldset>

                                        
                                         
                                        

                                            <legend>Gender</legend>
                                            <?php $genderOption = $_SESSION["previousInput"]["genders"] ?? ""; ?>
                                            <input type="radio" name="genders" value="Male" <?php if($genderOption == "Male") { echo "checked" ;} ?> id="genderOption1">
                                            <label for="genderOption1"> Male </label>
                                            <input type="radio" name="genders" value="Female" <?php if($genderOption == "Female") { echo "checked" ;} ?> id="genderOption2">
                                            <label for="genderOption2"> Female </label>
                                            <input type="radio" name="genders" value="Other" <?php if($genderOption == "Other") { echo "checked" ;} ?> id="genderOption3">
                                            <label for="genderOption3"> Other </label>

                                        </fieldset>

                                    </td>

                                    <td width = "200px" style="color: red;"> <?php echo$_SESSION["errors"]["genders"] ?? "" ; ?> </td>
                    
                                    
                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                                
                    


                                <tr height = 40px>
                    
                    
                                    <td style="padding-left: 5px;" colspan="2"> 

                                        <fieldset>

                                            <legend>Date of Birth</legend>
                                            <input type="text" name="day" value= "<?php echo $_SESSION["previousInput"]["day"] ?? ""; ?>" size="1" > <strong><big>/</big></strong>
                                            <input type="text" name="month" size="1" value= "<?php echo $_SESSION["previousInput"]["month"] ?? ""; ?>" > <strong><big>/</big></strong>
                                            <input type="text" name="year" value= "<?php echo $_SESSION["previousInput"]["year"] ?? ""; ?>" size="2" > 
                                            <label> (dd/mm/yyyy) </label>

                                        </fieldset>
                            
                                    </td>

                                    <td width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["dob"] ?? "" ; ?> </td>
                    
                    
                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                    
                    
                                <tr>
                    
                                    <td align="center" colspan="3" align="left">
                                        <input type="submit" name="SignUp" value="Sign Up">
                                       
                                    </td>
                    
                                </tr>
                            
                    
                            </table>



                        </fieldset>


                    </form>
                                    
                </td>


            </tr>

            <?php include_once "../View/footer.php" ?>

        
    </body>
</html>