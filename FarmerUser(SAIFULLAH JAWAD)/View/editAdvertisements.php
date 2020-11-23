<?php

    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }


    if(!isset($_SESSION["advertisementId"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    
    require_once("../Controller/fileDataHandler.php");
    retrieveUserData();



    if(isset($_SESSION["enteredEditAdvertisementValidation"]))
    {
        unset($_SESSION["enteredEditAdvertisementValidation"]);
    }
    else
    {
        
        unset($_SESSION["errors"]);
        unset($_SESSION["cropAdPictureError"]);
    }
    
    


?>











<!DOCTYPE html>
<html>
    <head>
        <title> Edit Advertisements </title>
    </head>
    <body>
            <?php include_once("../View/header.php") ?>
            <tr height="500px">

                <?php include_once("dashboardSidebarHeader.php"); ?>

                <td align="Center"> 



                    <fieldset style="display: inline-block;" >

                        <legend><h2>EDIT ADVERTISEMENTS</h2></legend>


                        <table width="100%">
                        
                        
                        
                        
                            <tr>
    

                                <td>
                                
                                
                                    <form action="../Controller/editAdvertisementValidation.php" method="POST">


                                        <table align="center">

                                            

                                            <tr height="40px">

                                                <td style="padding-left: 5px;"> <label for="cropName"> Crop Name </td>
                                                <td style="padding-left: 5px;"> <input type="text" id="cropName" name="cropName" size="30" value= "<?php echo $_SESSION["cropName"] ?? ""; ?>" > </td>
                                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropName"] ?? "" ; ?> </td>

                                            </tr>



                                            <tr>
                                                <td colspan="2"> <hr> </td>
                                            </tr>



                                            <tr height = "40px">

                                                <td style="padding-left: 5px;"> <label for="cropQuantity"> Quantity(In KGs)</label> </td>
                                                <td style="padding-left: 5px;"> <input type="text" id="cropQuantity" name="cropQuantity" size="30" value= "<?php echo $_SESSION["cropQuantity"] ?? "" ;?>" > </td>
                                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropQuantity"] ?? "" ; ?> </td>
                                            
                                            </tr>


                                            <tr>
                                                <td colspan="2"> <hr> </td>
                                            </tr>


                                            <tr height = "40px">

                                                <td style="padding-left: 5px;"> <label for="cropPrice"> Price(per KG) </td>
                                                <td style="padding-left: 5px;"> <input type="text" id="cropPrice" name="cropPrice" size="30" value= "<?php echo $_SESSION["cropPrice"] ?? ""; ?>" > </td>
                                                <td width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropPrice"] ?? "" ; ?> </td>

                                            </tr>



                                            <tr height="50px">
                                                <td colspan="3"> </td>
                                            </tr>



                                            
                                                


                                            <tr>

                                                <td colspan="4" style="padding-left: 5px;">
                                                
                                                    <hr><br>
                                                    <input type="submit" name="postAd" value="Edit Advertisement">
                                                
                                                </td>

                                            </tr>
                                        

                                        </table> 


                                    </form>
                                
                                
                                </td>








                                <td valign="top">

                                    <form action="../Controller/editCropPictureValidation.php" method="POST" enctype="multipart/form-data">
                                    
                                    
                                    
                                        <table>
                                        
                                        
                                            <tr>
                                            
                                                <td>
                                                
                                                    <img src="<?php echo "../View/img/".$_SESSION["cropPicture"]; ?>" alt="" width="150px" height="150px">
                                                
                                                </td>


                                                <td width="120px" style="color: red;">
                                                    <?php echo $_SESSION["cropPictureError"] ?? "";?>
                                                </td>
                                            
                                            
                                            </tr>
                                        



                                            <tr>
                                            
                                                <td colspan=2>
                                                    <input type="file" name="cropPicture">                                                
                                                </td>
                                        
                                        
                                            </tr>




                                            <tr>
                                            
                                                <td colspan=2>
                                                    <input type="submit" name="uploadCropPicture" value="Upload">                                                
                                                </td>
                                        
                                        
                                            </tr>


                                            <tr>

                                                <td colspan=2 style="padding-top: 12px;"><hr></td>
                                            
                                            </tr>
                                        
                                        
                                        </table>
                                    
                                    
                                    
                                    
                                    </form>
                                
                                
                                
                                </td>
                            
                            
                            </tr>
                        
                        
                        
                        
                        
                        </table>

                    </fieldset>
                    
                                    
                </td>

                <?php include_once("dashboardSidebarFooter.php"); ?>



            </tr>

            <?php include_once "../View/footer.php" ?>

        
    </body>
</html>