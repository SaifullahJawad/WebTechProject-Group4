<?php


    session_start();

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/logIn.php");
    }


    if(isset($_SESSION["enteredChangePasswordValidation"]))
    {
        unset($_SESSION["enteredChangePasswordValidation"]);
    }
    else
    {
        
        unset($_SESSION["errors"]);
    }



?>



<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="400px">

            <?php include_once("dashboardSidebarHeader.php"); ?>


                <td width="900px" align="center">

                    <big id="updatedMessage" style="color:  rgb(0, 199, 43);"><?php if(isset($_GET["updated"])){echo "Updated Successfully";}?></big>

                    <form action="../Controller/changePasswordValidation.php" method="POST" onsubmit="return changePasswordValidation();">
                    
                    
                        <fieldset style="display: inline-block;">

                            <legend>CHANGE PASSWORD</legend>
                            <table height="200px" width="600px" >

                                <tr>
                                    <td>
                                        <label for="currentPassword"> Current Password:</label>
                                    </td>

                                    <td>
                                        <input type="password" name="currentPassword" id="currentPassword" size="30px" onblur="isValidPassword();" onfocus="clearErrorField('currentPasswordError');">
                                    </td>

                                    <td id="currentPasswordError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["currentPassword"] ?? "" ; ?> </td>

                                </tr>



                                <tr>

                                    <td>
                                        <label for="newPassword" style="color: green;"> New Password: </label>
                                    </td>

                                    <td>
                                        <input type="password" name="newPassword" id="newPassword" size="30px" onfocus="clearErrorField('newPasswordError');">
                                    </td>

                                    <td id="newPasswordError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["newPassword"] ?? "" ; ?> </td>



                                </tr>



                                <tr>
                                
                                
                                    <td>
                                        <label for="reTypePassword" style="color: red;"> Retype New Password: </label>
                                    </td>

                                    <td>
                                        <input type="password" name="reTypePassword" id="reTypePassword" size="30px" onfocus="clearErrorField('reTypePasswordError');">
                                    </td>

                                    <td id="reTypePasswordError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["reTypePassword"] ?? "" ; ?> </td>
                                
                                
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


        <script type="text/javascript">


            "use strict"

            function changePasswordValidation()
            {
                let currentPassword = document.getElementById("currentPassword").value;
                let newPassword = document.getElementById("newPassword").value;
                let reTypePassword = document.getElementById("reTypePassword").value;

                let hasError = false;

                if (currentPassword == "")
                {
                    document.getElementById("currentPasswordError").innerHTML = "*required";
                    hasError = true;

                }


                if (newPassword == "")
                {
                    document.getElementById("newPasswordError").innerHTML = "*required";
                    hasError = true;

                }


                if (reTypePassword == "")
                {
                    document.getElementById("reTypePasswordError").innerHTML = "*required";
                    hasError = true;
                }



                if(newPassword != "" && reTypePassword != "")
                {
                    if (newPassword != reTypePassword)
                    {
                        document.getElementById("newPasswordError").innerHTML = "*mismatched password";
                        document.getElementById("newPassword").value = "";
                        document.getElementById("reTypePassword").value = "";
                        hasError = true;    
                    }
                    
                }


            

                if (hasError || document.getElementById("currentPasswordError").innerHTML == "*wrong password")
                {
                    document.getElementById("updatedMessage").value = "";
                    return false;
                }
                else
                {
                    return true;
                }
            }




            function clearErrorField(errorFieldId)
            {
                if ( document.getElementById(errorFieldId).innerHTML != "*wrong password")
                {
                    document.getElementById(errorFieldId).innerHTML = "";
                }

            }


            

            function isValidPassword()
            {

                let currentPassword = document.getElementById("currentPassword").value;
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../Controller/changePasswordValidation.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    
                    if (this.readyState == 4 && this.status == 200)
                    {

                        if (this.responseText == 1)
                        {
                            document.getElementById("currentPasswordError").innerHTML = "*wrong password";
                            document.getElementById("updatedMessage").innerHTML = "";

                        }
                        else
                        {                
                            if (document.getElementById("currentPasswordError").innerHTML == "*wrong password")
                            {
                                document.getElementById("currentPasswordError").innerHTML = "";
                            }
                            
                        }
                        
                    }
                }
                xhttp.send("typedPassword=" + currentPassword);
                    

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