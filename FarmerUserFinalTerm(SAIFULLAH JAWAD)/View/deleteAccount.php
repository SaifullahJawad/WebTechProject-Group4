<?php


    session_start();

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }


    require_once("../Model/farmerUserService.php");

    $userData = retrieveFarmerUser($_SESSION["loggedInUserName"] ?? $_COOKIE["loggedInUserName"]);

    $_SESSION["userName"] = $userData["username"];
    



?>



<!DOCTYPE html>
<html>
    <head>
        <title>Delete Account</title>
        <link rel="stylesheet" href="styles.css">
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
                                        <input type="submit" name="delete" value="Delete" onclick="return confirmDeleteAccount();">
                                    </td>

                                    <td  style="padding-left: 10px;">
                                        <!-- <a href="../View/dashboard.php"> Cancel </a> -->
                                    </td>

                                </tr>


                            </table>

                        
                    
                    
                    </form>


                    
                </td>

            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>

        <script type="text/javascript">
        
            function confirmDeleteAccount()
            {
                if(confirm("The action will permanetly delete your account!"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }


            function toggleDarkMode()
            {
                let darkModeStatus = localStorage.getItem("darkModeStatus");
                var content = document.getElementsByTagName("body")[0];
                var darkModeToggler = document.getElementById("darkModeToggler");
                
                if(darkModeStatus == "enabled")
                {
                    darkModeToggler.classList.remove('active');
                    content.classList.remove('dark');

                    localStorage.setItem("darkModeStatus", "disabled" );
                }
                else
                {
                    darkModeToggler.classList.toggle('active');
                    content.classList.toggle('dark');

                    localStorage.setItem("darkModeStatus", "enabled" );

                }
            }


            function updateDarkMode()
            {
                let darkModeStatus = localStorage.getItem("darkModeStatus");
                var content = document.getElementsByTagName("body")[0];
                var darkModeToggler = document.getElementById("darkModeToggler");

                if(darkModeStatus == "enabled")
                {
                    darkModeToggler.classList.toggle('active');
                    content.classList.toggle('dark');

                    localStorage.setItem("darkModeStatus", "enabled");
                }
                else
                {
                    darkModeToggler.classList.remove('active');
                    content.classList.remove('dark');
                    localStorage.setItem("darkModeStatus", "disabled");

                }
            }
            
        </script>

    </body>
</html>