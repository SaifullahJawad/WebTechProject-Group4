<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }


    require_once("../Controller/fileDataHandler.php");
    retrieveUserData();



    if(isset($_SESSION["enteredEditProfileValidation"]))
    {
        unset($_SESSION["enteredEditProfileValidation"]);
    }
    else
    {
        
        unset($_SESSION["errors"]);
    }



?>



<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
    </head>

    <body>

        <?php include_once("../View/header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>


            <td width="900px" align="center">

                <form action="../Controller/editProfileValidation.php" method="POST">
                
                
                    <fieldset style="display: inline-block;">

                        <legend>EDIT PROFILE</legend>
                        <table width= "500px" height="350px" >

                            <tr height="30px">
                                <td>
                                    <label for="name"> Name</label>:
                                </td>

                                <td>
                                    <input type="text" name="name" id="name" size="30px" value="<?php echo $_SESSION["name"];?>">
                                </td>

                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["name"] ?? "" ; ?> </td>

                            
                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    <label for="email">Email</label>
                                </td>

                                <td>
                                    <input type="text" name="email" id="email" size="30px" value="<?php echo $_SESSION["email"];?>">
                                </td>

                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["email"] ?? "" ; ?> </td>


                            </tr>





                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    <label>Password</label>
                                </td>

                                <td colspan="2">
                                    <a href="../View/changePassword.php"> Change Password </a>
                                </td>

                            </tr>








                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>


                            <tr height="30px">

                                <td>
                                    <label for="phone">Phone</label>
                                </td>

                                <td>
                                    <input type="text" name="phone" id="phone" size="30px" value="<?php echo $_SESSION["phone"];?>">
                                </td>

                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["phone"] ?? "" ; ?> </td>


                            </tr>



                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Genders
                                </td>

                                <td>
                                    <input type="radio" name="genders" value="Male" <?php if($_SESSION["genders"] == "Male") { echo "checked" ;} ?> id="genderOption1">
                                    <label for="genderOption1"> Male </label>
                                    <input type="radio" name="genders" value="Female" <?php if($_SESSION["genders"] == "Female") { echo "checked" ;} ?> id="genderOption2">
                                    <label for="genderOption2"> Female </label>
                                    <input type="radio" name="genders" value="Other" <?php if($_SESSION["genders"] == "Other") { echo "checked" ;} ?> id="genderOption3">
                                    <label for="genderOption3"> Other </label>
                                </td>

                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["genders"] ?? "" ; ?> </td>


                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td style="padding-bottom: 20px">
                                    <label for="dob"> Date of Birth</label>
                                </td>

                                <td>
                                    <input type="text" name="dob" id="dob" size="30px" value="<?php echo $_SESSION["dob"];?>"><br>
                                    (dd/mm/yyyy) 
                                </td>
                                
                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["dob"] ?? "" ; ?> </td>
                                

                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">
                                <td colspan="3">
                                    <input type="submit" name="update" value="Update">
                                </td> 
                            </tr>



                        </table>

                    </fieldset>
                    
                
                
                </form>


                
            </td>

            <?php include_once("dashboardSidebarFooter.php"); ?>

            
        </tr>

        <?php include_once("footer.php"); ?>


    </body>
</html>