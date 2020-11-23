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
        <title>Delete Account</title>
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="400px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

                <td valign="top" width="900px" align="center">

                    <form action="../Controller/deleteAccountAction.php" method="POST">
                    
                            <table height="200px" width="600px">

                                <tr>

                                    <td colspan="2" style="color: red;" align="center">
                                        <h1>WARNING</h1>
                                    </td>

                                </tr>



                                <tr>

                                    <td colspan="2" style="color: red;" align="center">
                                        <h2> The following action will permanetly delete your account!</h2>
                                    </td>

                                </tr>



                                <tr height="100px">

                                    <td colspan="2"  align="center" style="padding-top: 50px;">
                                        Are you sure you want to delete your account?
                                    </td>

                                </tr>


                                

                                <tr>

                                    <td  align="right" width="200px">
                                        <input type="submit" name="delete" value="Delete">
                                    </td>

                                    <td  style="padding-left: 10px;">
                                        <a href="../View/dashboard.php"> Cancel </a>
                                    </td>

                                </tr>


                            </table>

                        
                    
                    
                    </form>


                    
                </td>

            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>


    </body>
</html>