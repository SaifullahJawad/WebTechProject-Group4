<?php


    session_start();


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

    require_once("../Model/farmerUserService.php");

    $userData = retrieveFarmerUser($_SESSION["loggedInUserName"] ?? $_COOKIE["loggedInUserName"]);
    $_SESSION["profilePicture"]= $userData["picture"];


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Change Profile Picture</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="400px">

        <?php include_once("dashboardSidebarHeader.php"); ?>


            <td width="900px" align="center">

                <form action="../Controller/changeProfilePictureValidation.php" method="POST" enctype="multipart/form-data" onsubmit="return changeProfilePictureValidation();">
                
                
                    <fieldset style="display: inline-block;">

                        <legend>CHANGE PROFILE PICTURE</legend>
                        <table width= "500px" height="350px" >

                            <tr>
                                <td valign="bottom">

                                    <img src="<?php echo "img/".$_SESSION["profilePicture"];?>" alt="" width="200px" height="200px">
                                </td>

                                <td id="profilePictureError" width="200px" style="color: red;"> <?php echo $_SESSION["profilePictureError"] ?? "";?> </td>

                            </tr>



                            <tr>

                                <td height=30px>
                                    <input type="file" id="profilePicture" name="profilePicture" onclick="clearErrorField('profilePictureError');">
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


        <script type="text/javascript">


            "use strict"

            function changeProfilePictureValidation()
            {
                let profilePicture = document.getElementById("profilePicture");
                
                

                if (profilePicture.files.length == 0)
                {
                    document.getElementById("profilePictureError").innerHTML = "*select your picture";
                    return false;
                }
                else
                {
                    let filename = profilePicture.files[0].name;
                    let exentsion = filename.split(".");
                    if(exentsion[exentsion.length - 1] != "png" && exentsion[exentsion.length - 1] != "jpg")
                    {
                        document.getElementById("profilePictureError").innerHTML = "*only .png and .jpg files";
                        return false;
                    }
                    else
                    {
                        return true;
                    }

                } 
                
               
            }


            function clearErrorField(errorFieldId)
            {

                document.getElementById(errorFieldId).innerHTML = "";

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