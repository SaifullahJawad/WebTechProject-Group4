<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION["loggedInUserName"]) || isset($_COOKIE["loggedInUserName"]) )
    {
        header("Location: ../View/dashboard.php");
    }

    if(isset($_SESSION["enteredLogInValidation"]))
    {
        unset($_SESSION["enteredLogInValidation"]);
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
        <title>Farmer Login</title>
    </head>

    <body>

    <?php include_once("../View/headerBeforLogin.php"); ?>

        

        <tr>

            <td colspan="2" align="center" style="padding: 100px">
                
                <form action="../Controller/logInValidation.php" method="POST" onsubmit="return loginValidation();">

                    <fieldset style="display: inline-block;">
                        
                        <legend>FARMER LOGIN</legend>
                        <table width="500px">


                            <tr>

                                <td align="right" width="100px">

                                    <label for="userName"> User Name: </label>

                                </td>

                                <td>

                                    <input type="text" name="userName" id="userName" value="<?php echo $_SESSION["previousInput"] ?? "";?>" onblur="isUserNameExists(); isValidPassword();" onfocus="clearErrorField('userNameError');" >
                                
                                </td>

                                <td id="userNameError" width="300px" style="color: red;"> <?php echo $_SESSION["errors"]["userName"] ?? "";?> </td>

                            </tr>


                            <tr>
                            
                                <td align="right">
                                    <label for="password"> Password: </label>
                                </td>

                                <td>
                                
                                    <input type="password" name="password" id="password" onblur="isValidPassword();" onfocus="clearErrorField('passwordError');">

                                </td>

                                <td id="passwordError" width="300px" style="color: red;"> <?php echo $_SESSION["errors"]["password"] ?? "";?> </td>
                            
                            </tr>


                            <tr>

                                <td colspan="3"> <hr> </td>

                            </tr>


                            <tr>
                            
                                <td colspan="3">

                                    <input type="checkbox" name="rememberMe" value="rememberMe" id="rememberMe">
                                    <label for="rememberMe"> Remember Me </label>

                                </td>

                            </tr>


                            <tr>
                                <td>
                                    <input type="submit" name="LogIn" value="Log In">
                                </td>

                                <td colspan="2">
                                    Don't have an account?<a href="../View/registration.php"> Sign Up </a>
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

            function loginValidation()
            {
                let userName = document.getElementById("userName").value;
                let password = document.getElementById("password").value;
                let isEmpty = false;

                
                

                if (userName == "")
                {
                    document.getElementById("userNameError").innerHTML = "*required";
                    isEmpty = true;

                }

                if (password == "")
                {
                    document.getElementById("passwordError").innerHTML = "*required";
                    isEmpty = true;

                }
                

               

                if (isEmpty || document.getElementById("userNameError").innerHTML == "*user name does not exists" || document.getElementById("passwordError").innerHTML == "*wrong password")
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
                if ( document.getElementById(errorFieldId).innerHTML != "*user name does not exists" &&  document.getElementById(errorFieldId).innerHTML != "*wrong password")
                {
                    document.getElementById(errorFieldId).innerHTML = "";
                }

            }




            function isUserNameExists()
            {
                
                var userName = document.getElementById("userName").value;

                if(userName != "")
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "../Controller/logInValidation.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange = function () {
                        
                        if (this.readyState == 4 && this.status == 200)
                        {

                            if (this.responseText == "does not exists")
                            {
                                document.getElementById("userNameError").innerHTML = "*user name does not exists";

                            }
                            else
                            {
                                if (document.getElementById("userNameError").innerHTML == "*user name does not exists")
                                {
                                    document.getElementById("userNameError").innerHTML = "";
                                }
                                
                            }
                            
                        }
                    }
                    xhttp.send("uniqueUserName=" + userName);
                    
                }
                

            }




            function isValidPassword()
            {
                var userName = document.getElementById("userName").value;
                let password = document.getElementById("password").value;



                if( password != "" && userName != "")
                {
                    
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "../Controller/logInValidation.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange = function () {
                        
                        if (this.readyState == 4 && this.status == 200)
                        {

                            if (this.responseText == 1)
                            {
                                document.getElementById("passwordError").innerHTML = "*wrong password";
                                

                            }
                            else
                            {                
                                if (document.getElementById("passwordError").innerHTML == "*wrong password")
                                {
                                    document.getElementById("passwordError").innerHTML = "";
                                }
                                
                            }
                            
                        }
                    }
                    xhttp.send("typedPassword=" +password+"&typedUserName="+userName);

                }
      

            }




        </script>




    </body>
</html>

