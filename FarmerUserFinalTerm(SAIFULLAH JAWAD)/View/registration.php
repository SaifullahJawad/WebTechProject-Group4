<?php

    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION["isLoggedIn"]) || isset($_COOKIE["loggedInUserName"]) )
    {
        header("Location: ../View/dashboard.php");
    }
    
    if(!isset($_GET["error"]))
    {
        unset($_SESSION["previousInput"]);
        unset($genderOption);
        unset($_SESSION["errors"]);
    }
    
    


?>











<!DOCTYPE html>
<html>
    <head>
        <title> Registration </title>
    </head>
    <body>
            <?php include_once("../View/headerBeforLogin.php"); ?>
            <tr>


                <td align="Center" colspan="2"> 

                    <form action="../Controller/registrationValidation.php" method="POST" onsubmit="return validateRegistration();" >

                        <fieldset style="display: inline-block;" >

                            <legend><h3>SIGN UP AS A FARMER</h3></legend>


                            <table align="center"  width="800px">

                                
                    
                                <tr height="40px">
                    
                                    <td style="padding-left: 5px;"> <label for="name"> Name </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="name" name="name" size="30" value= "<?php echo $_SESSION["previousInput"]["name"] ?? ""; ?>" onfocus="clearErrorField('nameError');" > </td>
                                    <td id="nameError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["name"] ?? "" ; ?> </td>

                                        
                                    
                    
                                </tr>



                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                    
                                <tr height = "40px">
                    
                                    <td style="padding-left: 5px;"> <label for="email"> Email </label> </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="email" name="email" size="30" value= "<?php echo $_SESSION["previousInput"]["email"] ?? "" ;?>" onfocus="clearErrorField('emailError');" > </td>
                                    <td id="emailError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["email"] ?? "" ; ?> </td>
                                   
                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                                <tr height = "40px">

                                    <td style="padding-left: 5px;"> <label for="userName"> User Name: </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="userName" name="userName" size="30" value= "<?php echo $_SESSION["previousInput"]["userName"] ?? ""; ?>" onkeyup="userNameUniquenessCheck();" onfocus="clearErrorField('userNameError');" > </td>
                                    <td id="userNameError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["userName"] ?? "" ; ?> </td>

                                </tr>



                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>





                                <tr height = "40px">

                                    <td style="padding-left: 5px;"> <label for="password"> Password: </td>
                                    <td style="padding-left: 5px;"> <input type="password" id="password" name="password" size="30" value= "<?php echo $_SESSION["previousInput"]["password"] ?? ""; ?>" onfocus="clearErrorField('passwordError');" > </td>
                                    <td id="passwordError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["password"] ?? "" ; ?> </td>

                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>




                                <tr height = "40px">

                                    <td style="padding-left: 5px;"> <label for="confirmPassword"> Confirm Password </td>
                                    <td style="padding-left: 5px;"> <input type="password" id="confirmPassword" name="confirmPassword" size="30" value= "<?php echo $_SESSION["previousInput"]["confirmPassword"] ?? ""; ?>" onfocus="clearErrorField('confirmPasswordError');" > </td>
                                    <td id="confirmPasswordError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["confirmPassword"] ?? "" ; ?> </td>

                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>




                                <tr height="40px">
                    
                                    <td style="padding-left: 5px;"> <label for="phone"> Phone No. </td>
                                    <td style="padding-left: 5px;"> <input type="text" id="phone" name="phone" size="30" value= "<?php echo $_SESSION["previousInput"]["phone"] ?? ""; ?>" onfocus="clearErrorField('phoneError');" > </td>
                                    <td id="phoneError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["phone"] ?? "" ; ?> </td>
                                    
                                </tr>



                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>




                    
                                <tr height = 40px>
                    
                                    <td style="padding-left: 5px;" colspan="2">
                                        
                                        <fieldset>

                                            <legend>Gender</legend>
                                            <?php $genderOption = $_SESSION["previousInput"]["genders"] ?? ""; ?>
                                            <input type="radio" name="genders" value="Male" <?php if($genderOption == "Male") { echo "checked" ;} ?> id="genderOption1" onclick="clearErrorField('genderError');">
                                            <label for="genderOption1"> Male </label>
                                            <input type="radio" name="genders" value="Female" <?php if($genderOption == "Female") { echo "checked" ;} ?> id="genderOption2" onclick="clearErrorField('genderError');">
                                            <label for="genderOption2"> Female </label>
                                            <input type="radio" name="genders" value="Other" <?php if($genderOption == "Other") { echo "checked" ;} ?> id="genderOption3" onclick="clearErrorField('genderError');" >
                                            <label for="genderOption3"> Other </label>

                                        </fieldset>

                                    </td>

                                    <td id="genderError" width = "200px" style="color: red;"> <?php echo$_SESSION["errors"]["genders"] ?? "" ; ?> </td>
                    
                                    
                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                                
                    


                                <tr height = 40px>
                    
                    
                                    <td style="padding-left: 5px;" colspan="2"> 

                                        <fieldset>

                                            <legend>Date of Birth</legend>
                                            <input type="text" id="day" name="day" value= "<?php echo $_SESSION["previousInput"]["day"] ?? ""; ?>" size="1" onfocus="clearErrorField('dobError');" > <strong><big>/</big></strong>
                                            <input type="text" id="month" name="month" size="1" value= "<?php echo $_SESSION["previousInput"]["month"] ?? ""; ?>" onfocus="clearErrorField('dobError');" > <strong><big>/</big></strong>
                                            <input type="text" id="year" name="year" value= "<?php echo $_SESSION["previousInput"]["year"] ?? ""; ?>" size="2" onfocus="clearErrorField('dobError');" > 
                                            <label> (dd/mm/yyyy) </label>

                                        </fieldset>
                            
                                    </td>

                                    <td id="dobError" width = "200px" style="color: red;"> <?php echo $_SESSION["errors"]["dob"] ?? "" ; ?> </td>
                    
                    
                                </tr>


                                <tr>
                                    <td colspan="3"> <hr> </td>
                                </tr>


                    
                    
                                <tr>
                    
                                    <td align="center" colspan="3" align="left">
                                        <input type="submit" name="SignUp" value="Sign Up">
                                       
                                    </td>
                    
                                </tr>
                            
                    
                            </table>



                        </fieldset>


                    </form>
                                    
                </td>


            </tr>

            <?php include_once("../View/footerBeforeLogin.php"); ?>


        <script type="text/javascript">


            "use strict"

            
            function validateRegistration()
            {
                let name = document.getElementById("name").value;
                let email = document.getElementById("email").value;
                let userName = document.getElementById("userName").value;
                let password = document.getElementById("password").value;
                let confirmPassword = document.getElementById("confirmPassword").value;
                let phone = document.getElementById("phone").value;
                let male = document.getElementById("genderOption1");
                let female = document.getElementById("genderOption2");
                let other = document.getElementById("genderOption3");
                let day = document.getElementById("day").value;
                let month = document.getElementById("month").value;
                let year = document.getElementById("year").value;
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


                if (userName == "")
                {
                    document.getElementById("userNameError").innerHTML = "*required";
                    hasError = true;
                }



                if (password == "")
                {
                    document.getElementById("passwordError").innerHTML = "*required";
                    hasError = true;

                }
                else if (confirmPassword == "")
                {
                    document.getElementById("confirmPasswordError").innerHTML = "*required";
                    hasError = true;

                }
                else
                {
                    if (password != confirmPassword)
                    {
                        document.getElementById("passwordError").innerHTML = "*mismatched password";
                        document.getElementById("password").value = "";
                        document.getElementById("confirmPassword").value = "";
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



                if (day == "" || month == "" || year == "")
                {
                    document.getElementById("dobError").innerHTML = "*required";
                    hasError = true;
                }
                else
                {

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



                if (hasError || document.getElementById("userNameError").innerHTML == "*user name already exists")
                {
                    return false;
                }
                else
                {
                    return true;
                }


            }


            function clearErrorField(errorFieldId)
            {
                if (document.getElementById(errorFieldId).innerHTML != "*user name already exists" )
                {
                    document.getElementById(errorFieldId).innerHTML = "";
                }

            }


            function userNameUniquenessCheck()
            {
                var userName = document.getElementById("userName").value;
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../Controller/registrationValidation.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    
                    if (this.readyState == 4 && this.status == 200)
                    {

                        if (this.responseText == "exists")
                        {
                            document.getElementById("userNameError").innerHTML = "*user name already exists";

                        }
                        else
                        {
                            if (document.getElementById("userNameError").innerHTML == "*user name already exists")
                            {
                                document.getElementById("userNameError").innerHTML = "";
                            }
                            
                        }
                        
                    }
                }
                xhttp.send("uniqueUserName=" + userName);

            }

        </script>

        
    </body>
</html>