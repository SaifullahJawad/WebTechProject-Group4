<?php


    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }



    if(isset($_SESSION["enteredpostComplaintValidation"]))
    {
        unset($_SESSION["enteredpostComplaintValidation"]);
    }
    else
    {
        unset($_SESSION["previousInput"]);
        unset($_SESSION["errors"]);
    }
    
    


?>











<!DOCTYPE html>
<html>
    <head>
        <title> Post Complaint </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
            <?php include_once("../View/header.php") ?>
            <tr height="500px">

                <?php include_once("dashboardSidebarHeader.php"); ?>

                <td align="Center"> 

                    <big id="updateMessage" style="color:  rgb(0, 199, 43);"><?php if(isset($_GET["posted"])){echo "COMPLAINT POSTED AND WILL BE REVIEWD BY THE ADMINS";}?></big>
                    
                    <form action="../Controller/postComplaintValidation.php" method="POST" onsubmit="return complaintValidation();">

                        <fieldset style="display: inline-block;" >

                            <legend>
                                <h2>POST COMPLAINT</h2>
                            </legend>


                                <table align="center">

                                    

                                    <tr>

                                        <td><label for="complaintSubject">Complaint Subject:</label></td>
                                        <td><input type="text" id="complaintSubject" name="complaintSubject" size="54px" value="<?=$_SESSION["previousInput"]["complaintSubject"] ?? ""?>" onfocus="clearErrorField('complaintSubjectError');"></td>
                                        <td id="complaintSubjectError" width = "150px" style="color: red;"><?=$_SESSION["errors"]["complaintSubject"] ?? ""?></td>
                                    </tr>



                                    <tr height="15px">
                                        <td colspan="3"></td>
                                    </tr>



                                    <tr height="20px">

                                        <td><label for="complaintDetail">Complaint Detail:</label></td>
                                        <td><textarea type="text" id="complaintDetail" name="complaintDetail" rows="20" cols="50" value="<?=$_SESSION["previousInput"]["complaintDetail"] ?? ""?>" onfocus="clearErrorField('complaintDetailError');"></textarea></td>
                                        <td id="complaintDetailError" width = "150px" style="color: red;"><?=$_SESSION["errors"]["complaintDetail"] ?? ""?></td>                                    
                                    </tr>




                                    <tr>

                                        <td colspan="2" style="padding-left: 5px;">
                                        
                                            <hr><br>
                                            <input type="submit" name="postComplaint" value="Post">
                                        
                                        </td>

                                    </tr>
                                

                                </table> 



                        </fieldset>

                    </form>



                   

                    
                                    
                </td>

                <?php include_once("dashboardSidebarFooter.php"); ?>



            </tr>

            <?php include_once "../View/footer.php" ?>


            <script type="text/javascript">


                "use strict"


                function complaintValidation()
                {
                    let complaintSubject = document.getElementById("complaintSubject").value;
                    let complaintDetail = document.getElementById("complaintDetail").value;
                    let hasError = false;

                    if (complaintSubject == "")
                    {
                        document.getElementById("complaintSubjectError").innerHTML = "*required";
                        hasError = true;
                    }
                    else
                    {
                        
                        if(complaintSubject.split(" ").length < 2)
                        {
                            document.getElementById("complaintSubjectError").innerHTML = "*at least 2 words";
                            hasError = true;
                        }
                    }


                    if (complaintDetail == "")
                    {
                        document.getElementById("complaintDetailError").innerHTML = "*required";
                        hasError = true;
                    }
                    else
                    {
                        if (complaintDetail.split(" ").length < 3)
                        {
                            document.getElementById("complaintDetailError").innerHTML = "*at least one sentence";
                            hasError = true;
                        }

                    }


                    if(hasError )
                    {
                        document.getElementById("updateMessage").innerHTML = "";
                        return false;
                    }
                    else
                    {
                        return true;
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