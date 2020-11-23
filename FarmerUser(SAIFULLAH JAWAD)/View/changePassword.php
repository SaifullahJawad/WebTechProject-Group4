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



    if(isset($_SESSION["enteredChangePasswordValidation"]))
    {
        unset($_SESSION["enteredChangePasswordValidation"]);
    }
    else
    {
        
        unset($_SESSION["message"]);
    }



?>



<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="400px">

            <?php include_once("dashboardSidebarHeader.php"); ?>


                <td width="900px" align="center">

                    <form action="../Controller/changePasswordValidation.php" method="POST">
                    
                    
                        <fieldset style="display: inline-block;">

                            <legend>CHANGE PASSWORD</legend>
                            <table height="200px" width="600px" >

                                <tr>
                                    <td>
                                        <label for="currentPassword"> Current Password:</label>
                                    </td>

                                    <td>
                                        <input type="password" name="currentPassword" id="currentPassword" size="30px">
                                    </td>

                                    <td width = "150px" style="color: red;"> <?php echo $_SESSION["message"]["currentPassword"] ?? "" ; ?> </td>

                                </tr>



                                <tr>

                                    <td>
                                        <label for="newPassword" style="color: green;"> New Password: </label>
                                    </td>

                                    <td>
                                        <input type="password" name="newPassword" id="newPassword" size="30px">
                                    </td>

                                    <td width = "150px" style="color: red;"> <?php echo $_SESSION["message"]["newPassword"] ?? "" ; ?> </td>



                                </tr>



                                <tr>
                                
                                
                                    <td>
                                        <label for="reTypePassword" style="color: red;"> Retype New Password: </label>
                                    </td>

                                    <td>
                                        <input type="password" name="reTypePassword" id="reTypePassword" size="30px">
                                    </td>

                                    <td width = "150px" style="color: red;"> <?php echo $_SESSION["message"]["reTypePassword"] ?? "" ; ?> </td>
                                
                                
                                </tr>


                                <tr height="10px"><td colspan="3"><hr></td></tr>



                                <tr height="30px">
                                    <td colspan="3">
                                        <input type="submit" name="submit" value="Submit">
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