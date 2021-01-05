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
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php include_once("../View/header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

            <td width="900px" align="center">

                <big id="updateMessage" style="color:  rgb(0, 199, 43);"><?php if(isset($_GET["updated"])){echo "Updated Successfully";}?></big>

                <form action="../Controller/editProfileValidation.php" method="POST" onsubmit="return validateEditProfile();">
                
                
                    <fieldset style="display: inline-block;">

                        <legend>EDIT PROFILE</legend>
                        <table width= "500px" height="350px" >

                            <tr height="30px">
                                <td>
                                    <label for="name"> Name</label>:
                                </td>

                                <td>
                                    <input type="text" name="name" id="name" size="30px" value="<?php echo $_SESSION["name"];?>" onfocus="clearErrorField('nameError');">
                                </td>

                                <td id="nameError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["name"] ?? "" ; ?> </td>

                            
                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    <label for="email">Email</label>
                                </td>

                                <td>
                                    <input type="text" name="email" id="email" size="30px" value="<?php echo $_SESSION["email"];?>" onfocus="clearErrorField('emailError');">
                                </td>

                                <td id="emailError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["email"] ?? "" ; ?> </td>


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
                                    <input type="text" name="phone" id="phone" size="30px" value="<?php echo $_SESSION["phone"];?>" onfocus="clearErrorField('phoneError');">
                                </td>

                                <td id="phoneError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["phone"] ?? "" ; ?> </td>


                            </tr>



                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Genders
                                </td>

                                <td>
                                    <input type="radio" name="genders" value="Male" <?php if($_SESSION["genders"] == "Male") { echo "checked" ;} ?> id="genderOption1" onclick="clearErrorField('genderError');">
                                    <label for="genderOption1"> Male </label>
                                    <input type="radio" name="genders" value="Female" <?php if($_SESSION["genders"] == "Female") { echo "checked" ;} ?> id="genderOption2" onclick="clearErrorField('genderError');">
                                    <label for="genderOption2"> Female </label>
                                    <input type="radio" name="genders" value="Other" <?php if($_SESSION["genders"] == "Other") { echo "checked" ;} ?> id="genderOption3" onclick="clearErrorField('genderError');">
                                    <label for="genderOption3"> Other </label>
                                </td>

                                <td id="genderError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["genders"] ?? "" ; ?> </td>


                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td style="padding-bottom: 20px">
                                    <label for="dob"> Date of Birth</label>
                                </td>

                                <td>
                                    <input type="text" name="dob" id="dob" size="30px" value="<?php echo $_SESSION["dob"];?>" onfocus="clearErrorField('dobError');"><br>
                                    (dd/mm/yyyy) 
                                </td>
                                
                                <td id="dobError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["dob"] ?? "" ; ?> </td>
                                

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


        <script type="text/javascript">


            "use strict"


            function validateEditProfile()
            {
                let name = document.getElementById("name").value;
                let email = document.getElementById("email").value;
                let phone = document.getElementById("phone").value;
                let male = document.getElementById("genderOption1");
                let female = document.getElementById("genderOption2");
                let other = document.getElementById("genderOption3");
                let dob = document.getElementById("dob").value;
                let hasError = false;


                if (name == "")
                {
                    document.getElementById("nameError").innerHTML = "*required";
                    hasError = true;
                }
                else
                {
                    let tempName = name.replace(" ", "");
                    let isEqual = false;
                    var i;
                    for(i = 0; i<tempName.length; i++)
                    {

                        if(tempName[i].toUpperCase() == tempName[i].toLowerCase())
                        {
                            isEqual = true;
                            break;
                        }
                    }


                    if(isEqual)
                    {
                        document.getElementById("nameError").innerHTML = "*invalid";
                        hasError = true;
                    }
                    else if (name.split(" ").length < 2)
                    {
                        document.getElementById("nameError").innerHTML = "*at least two words";
                        hasError = true;
                    }

                    
                }




                if (email == "")
                {
                    document.getElementById("emailError").innerHTML = "*required";
                    hasError = true;

                }
                else
                {
                    var at = email.indexOf("@");
                    var dot = email.lastIndexOf(".");
                    if (!(at > 0 && email[at + 1] !== "." && dot > at + 1 && dot + 1 < email.length && email.indexOf(" ") === -1 && email.indexOf("..") === -1 && email.split("@").length == 2))
                    {
                        document.getElementById("emailError").innerHTML = "*invalid";
                        hasError = true;
                    }

                }



                if (phone == "")
                {
                    document.getElementById("phoneError").innerHTML = "*required";
                    hasError = true;
                }
                else
                {
                    if (isNaN(phone.replace("-", "")))
                    {
                        document.getElementById("phoneError").innerHTML = "*invalid";
                        hasError = true;
                    }

                }


                if (!male.checked && !female.checked && !other.checked)
                {
                    document.getElementById("genderError").innerHTML = "*required";
                    hasError = true;

                }



                if (dob == "")
                {
                    document.getElementById("dobError").innerHTML = "*required";
                    hasError = true;
                }
                else if (dob.split("/").length != 3)
                {
                    document.getElementById("dobError").innerHTML = "*invalid format";
                    hasError = true;
                }
                else
                {
                    let dobSplited = dob.split("/");
                    let day = dobSplited[0];
                    let month = dobSplited[1];
                    let year = dobSplited[2];
                    
                    if( day >= 1 && day <=31 && month >= 1 && month <= 12 && year >= 1900 && year <= 2016)
                    {

                        if( ( (month == 4 || month == 6 ||  month == 9 || month == 11 ) && day <= 30 ) )
                        {
                            
                        }
                        else if( ( (month == 1 || month == 3 ||  month == 5 || month == 7 || month == 8 || month == 10 || month == 12 ) && day <= 31 ) )
                        {
                            
                        }
                        else if( ( month == 2 && day <= 28 ) )
                        {
                            
                        }
                        else
                        {
                            document.getElementById("dobError").innerHTML = "*invalid";
                            hasError = true;
                        }

                    }
                    else
                    {
                        document.getElementById("dobError").innerHTML = "*invalid";
                        hasError = true;
                    }

                
                }


                
                if (hasError)
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