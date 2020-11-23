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



?>



<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>


                <td width="900px" align="center">

                    <fieldset style="display: inline-block;">
                        <legend>MY PROFILE</legend>
                        <table>

                            <tr height="30px">
                                <td>
                                    Name:
                                </td>

                                <td>
                                    <?php echo $_SESSION["name"];?>
                                </td>

                                <td width="250px" rowspan="8" valign="bottom">

                                    <img src="<?php echo "img/".$_SESSION["profilePicture"];?>" alt="" width="200px" height="200px">
                                    

                                </td>
                            </tr>


                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    Email:
                                </td>

                                <td>
                                    <?php echo $_SESSION["email"];?>
                                </td>


                            </tr>


                            

                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Phone:
                                </td>

                                <td>
                                    <?php echo $_SESSION["phone"];?>
                                </td>


                            </tr>








                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Gender:
                                </td>

                                <td>
                                    <?php echo $_SESSION["genders"];?>
                                </td>


                            </tr>


                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    Date of Birth:
                                </td>

                                <td>
                                    <?php echo $_SESSION["dob"];?>
                                </td>

                                <td style="padding-left: 70px">
                                    <a href="../View/changeProfilePicture.php">Change</a> 
                                </td>

                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">
                                <td colspan="3"><a href="../View/editProfile.php">Edit Profile</a></td> 
                            </tr>



                        </table>
                    </fieldset>


                    
                </td>
            
            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>


    </body>
</html>