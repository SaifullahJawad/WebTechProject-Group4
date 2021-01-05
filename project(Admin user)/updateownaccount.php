<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_POST["submit"]))
    {
        require_once("updateownaccountcheck.php");
    }
    else
    {
        unset($_SESSION["errors"]);
       
    }
    $img = "";
    if(isset($_SESSION['img'])){
        $img = $_SESSION['img'];
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
    </head>

    <body style="background-color: linen">

        <?php include_once("header.html"); ?>

        <tr height="400px">

            <td width="900px" align="center">

                <form action="updateownaccount.php" method="POST" enctype="multipart/form-data">
                
                
                    <fieldset style="display: inline-block;">

                        <legend>PROFILE</legend>
                        <table width= "500px" height="350px" >

                            <tr height="30px">
                                <td>
                                    <label for="name"> Name</label>:
                                </td>

                                <td>
                                    <input type="text" name="name" id="name" size="30px" value="<?php echo $_SESSION["name"];?>">
                                </td>

                                <td width = "150px"> <p style="color: red;"> <?php echo $_SESSION["errors"]["name"] ?? "" ; ?> </p> </td>

                            
                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    <label for="email">Email</label>
                                </td>

                                <td>
                                    <input type="text" name="email" id="email" size="30px" value="<?php echo $_SESSION["email"];?>">
                                </td>

                                <td width = "150px"> <p style="color: red;"> <?php echo $_SESSION["errors"]["email"] ?? "" ; ?> </p> </td>


                            </tr>



                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Genders
                                </td>

                                <td>
                                    <input type="radio" name="gender">Male
                                    <input type="radio" name="gender">feMale
                                    <input type="radio" name="gender">others
                                </td>

                                <td width = "150px"> <p style="color: red;"> <?php echo $_SESSION["errors"]["genders"] ?? "" ; ?> </p> </td>


                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td style="padding-bottom: 20px">
                                    <label for="dob"> Date of Birth</label>
                                </td>

                                <td>
                                    <input type="text" name="dob" id="dob" size="30px" value="<?php echo $_SESSION["dob"];?>"><br>
                                    (dd/mm/yyyy) 
                                </td>
                                
                                <td width = "150px"> <p style="color: red;"> <?php echo $_SESSION["errors"]["dob"] ?? "" ; ?> </p> </td>
                                

                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>

                          
                            
                          
                            <td>
                                <img src="../uploads/" height="100px" width="100px">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                               <input type="submit" value="Upload Image" name="submit">
                            </td>
                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>



                            <tr height="30px">
                                <td colspan="3">
                                    <input type="submit" name="submit" value="Submit">
                                <button type="reset">Reset</button>
                                </td> 
                            </tr>



                        </table>

                    </fieldset>
                    
                
                
                </form>


                
            </td>
            
        </tr>

        <?php include_once("footer.html"); ?>


    </body>
</html>