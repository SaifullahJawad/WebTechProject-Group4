<?php


    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    if(isset($_SESSION["enteredChangeProfilePictureValidation"]))
    {
        unset($_SESSION["enteredChangeProfilePictureValidation"]);
    }
    else
    {
        
        unset($_SESSION["profilePictureError"]);
    }

    require_once("../Controller/fileDataHandler.php");
    retrieveUserData();


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Change Profile Picture</title>
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="400px">

        <?php include_once("dashboardSidebarHeader.php"); ?>


            <td width="900px" align="center">

                <form action="../Controller/changeProfilePictureValidation.php" method="POST" enctype="multipart/form-data" >
                
                
                    <fieldset style="display: inline-block;">

                        <legend>CHANGE PROFILE PICTURE</legend>
                        <table width= "500px" height="350px" >

                            <tr>
                                <td valign="bottom">

                                    <img src="<?php echo "img/".$_SESSION["profilePicture"];?>" alt="" width="200px" height="200px">
                                </td>

                                <td width="200px" style="color: red;"> <?php echo $_SESSION["profilePictureError"] ?? "";?> </td>

                            </tr>



                            <tr>

                                <td height=30px>
                                    <input type="file" name="profilePicture">
                                </td>



                            </tr>



                            <tr height="10px">
                                <td><hr></td> 
                            </tr>



                            <tr height="30px">
                                <td colspan="3">
                                    <input type="submit" name="upload" value="Upload">
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