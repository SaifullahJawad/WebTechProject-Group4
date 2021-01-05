<?php



    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }


    require_once("../Model/farmerUserService.php");

    $userData = retrieveFarmerUser($_SESSION["loggedInUserName"] ?? $_COOKIE["loggedInUserName"]);

    $_SESSION["name"] = $userData["name"];
    $_SESSION["email"] = $userData["email"];
    $_SESSION["userName"] = $userData["username"];
    $_SESSION["password"] = $userData["password"];
    $_SESSION["phone"] = $userData["phone"];
    $_SESSION["genders"] = $userData["gender"];
    $_SESSION["dob"] = $userData["dob"];
    $_SESSION["profilePicture"]= $userData["picture"];

    



?>



<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <link rel="stylesheet" href="styles.css">
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


        <script type="text/javascript">

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