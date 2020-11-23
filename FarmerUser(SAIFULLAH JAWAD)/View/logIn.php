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

        <?php include_once("header.php"); ?>

        

        <tr>

            <td colspan="2" align="center" style="padding: 100px">
                
                <form action="../Controller/logInValidation.php" method="POST">

                    <fieldset style="display: inline-block;">
                        
                        <legend>FARMER LOGIN</legend>
                        <table width="500px">


                            <tr>

                                <td align="right" width="100px">

                                    <label for="userName"> User Name: </label>

                                </td>

                                <td>

                                    <input type="text" name="userName" id="userName" value="<?php echo $_SESSION["previousInput"] ?? "";?>" >
                                
                                </td>

                                <td width="300px" style="color: red;"> <?php echo $_SESSION["errors"]["userName"] ?? "";?> </td>

                            </tr>


                            <tr>
                            
                                <td align="right">
                                    <label for="password"> Password: </label>
                                </td>

                                <td>
                                
                                    <input type="password" name="password" id="password">

                                </td>

                                <td width="300px" style="color: red;"> <?php echo $_SESSION["errors"]["password"] ?? "";?> </td>
                            
                            </tr>


                            <tr>

                                <td colspan="3"> <hr> </td>

                            </tr>


                            <tr>
                            
                                <td colspan="3">

                                    <input type="checkbox" name="rememberMe" value="SSC" id="rememberMe">
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


        

        <?php include_once("footer.php"); ?>




    </body>
</html>

