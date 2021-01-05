<?php


    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }


    if(!isset($_SESSION["advertisementID"]))
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }


    require_once("../Model/advertisementService.php");

    $advertisement = retrieveAdvertisementsByAID($_SESSION["advertisementID"]);
    $_SESSION["cropPicture"] = $advertisement["crop_picture"];




    if(isset($_SESSION["enteredEditAdvertisementValidation"]))
    {
        unset($_SESSION["enteredEditAdvertisementValidation"]);
    }
    else
    {
        unset($_SESSION["errors"]);
    }
    
    


?>











<!DOCTYPE html>
<html>
    <head>
        <title> Edit Advertisements </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
            <?php include_once("../View/header.php") ?>
            <tr height="500px">

                <?php include_once("dashboardSidebarHeader.php"); ?>

                <td align="Center"> 

                    <big id="updateMessage" style="color:  rgb(0, 199, 43);"><?php if(isset($_GET["posted"])){echo "POSTED SUCCESSFULLY";}?></big>

                    <form action="../Controller/editAdvertisementValidation.php" method="POST"  onsubmit="return advertisementsValidation();">

                        <fieldset style="display: inline-block;" >

                            <legend>
                                <h2>EDIT CROP SELLING ADVERTISEMENTS</h2>
                            </legend>


                                <table align="center">

                                    

                                    <tr height="20px">

                                        <td style="padding-left: 5px;"> <label for="cropName"> Crop Name </td>
                                        <td style="padding-left: 5px;"> <input type="text" id="cropName" name="cropName" size="30" value= "<?=$advertisement["product_name"]?>" onfocus="clearErrorField('cropNameError');" > </td>
                                        <td id="cropNameError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropName"] ?? "" ; ?> </td>
                                        <td rowspan="5">
                                            <img id="pictureDestination" src="img/<?=$advertisement["crop_picture"]?>" alt="" width="150px" height="150px" valign="bottom">
                                            
                                        </td>
                                        <td id="cropPictureError" rowspan="5" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropPictureError"] ?? ""; ?> </td>

                                    </tr>



                                    <tr height="10px">
                                        <td colspan="2"> <hr> </td>
                                    </tr>



                                    <tr height="20px">

                                        <td style="padding-left: 5px;"> <label for="cropQuantity"> Quantity(In KGs)</label> </td>
                                        <td style="padding-left: 5px;"> <input type="text" id="cropQuantity" name="cropQuantity" size="30" value= "<?=$advertisement["quantity"]?>" onfocus="clearErrorField('cropQuantityError');" > </td>
                                        <td id="cropQuantityError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropQuantity"] ?? "" ; ?> </td>
                                    
                                    </tr>


                                    <tr height="10px">
                                        <td colspan="2"> <hr> </td>
                                    </tr>


                                    <tr height="20px">

                                        <td style="padding-left: 5px;"> <label for="cropPrice"> Price(per KG) </td>
                                        <td style="padding-left: 5px;"> <input type="text" id="cropPrice" name="cropPrice" size="30" value= "<?=$advertisement["price"]?>" onfocus="clearErrorField('cropPriceError');" > </td>
                                        <td id="cropPriceError" width = "150px" style="color: red;"> <?php echo $_SESSION["errors"]["cropPrice"] ?? "" ; ?> </td>

                                    </tr>



                                    <tr height="50px">
                                        <td colspan="3"> </td>
                                        <td colspan="2">
                                            <input type="file" id="cropPicture" name="cropPicture" onfocus="clearErrorField('cropPictureError');" >
                                            <button type="button" onclick="cropPictureValidation();"> Upload </button>
                                        </td>
                                    </tr>

    
                                        


                                    <tr>

                                        <td colspan="4" style="padding-left: 5px;">
                                        
                                            <hr><br>
                                            <input type="submit" name="editAd" value="Update Advertisement">
                                        
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

                function cropPictureValidation()
                {
                    let cropPicture = document.getElementById("cropPicture");
                    let hasError = false;
                    
                    

                    if (cropPicture.files.length == 0)
                    {
                        document.getElementById("cropPictureError").innerHTML = "*select crop picture";
                        hasError = true;
                    }
                    else
                    {
                        let filename = cropPicture.files[0].name;
                        let exentsion = filename.split(".");
                        if(exentsion[exentsion.length - 1] != "png" && exentsion[exentsion.length - 1] != "jpg")
                        {
                            document.getElementById("cropPictureError").innerHTML = "*only .png and .jpg files";
                            hasError = true;
                        }

                    }


                    if(hasError)
                    {
                        return false;
                    }
                    else
                    {
                        
                        var cropPictureFile = document.getElementById("cropPicture").files[0];
                        var xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "../Controller/editAdvertisementValidation.php", true);
                        xhttp.onreadystatechange = function () 
                        {
                            
                            if (this.readyState == 4 && this.status == 200)
                            {

                                if (this.responseText != "")
                                {
                                    var pictureSource = "img/" + this.responseText;
                                    var imgTag = document.getElementById("pictureDestination");
                                    imgTag.setAttribute("src", pictureSource);

                                    document.getElementById("cropPictureError").innerHTML = "";

                                }
                                else
                                {
                                    document.getElementById("cropPictureError").innerHTML = "*upload error";
                                }
                                    
                            }
                                
                        }

                        var formData = new FormData();
                        formData.append("cropPicture", cropPictureFile);
                        xhttp.send(formData);

                    }
                    

                    return true;
                
                }



                function advertisementsValidation()
                {
                    let cropName = document.getElementById("cropName").value;
                    let cropQuantity = document.getElementById("cropQuantity").value;
                    let cropPrice = document.getElementById("cropPrice").value;
                    let cropPicture = document.getElementById("pictureDestination").getAttribute("src");
                    let hasError = false;

                    if (cropName == "")
                    {
                        document.getElementById("cropNameError").innerHTML = "*required";
                        hasError = true;
                    }
                    else
                    {
                        var tempCropName = cropName.replace(" ", "");
                        var i;
                        for(i = 0; i<tempCropName.length; i++)
                        {
                            if(tempCropName[i].toUpperCase() == tempCropName[i].toLowerCase())
                            {
                                document.getElementById("cropNameError").innerHTML = "*invalid";
                                hasError = true;
                                break;
                            }
                        }

                    }


                    if (cropQuantity == "")
                    {
                        document.getElementById("cropQuantityError").innerHTML = "*required";
                        hasError = true;
                    }
                    else
                    {
                        if (cropQuantity != parseInt(cropQuantity, 10))
                        {
                            document.getElementById("cropQuantityError").innerHTML = "*integer only";
                            hasError = true;
                        }

                    }


                    if (cropPrice == "")
                    {
                        document.getElementById("cropPriceError").innerHTML = "*required";
                        hasError = true;
                    }
                    else
                    {
                        if (cropPrice != parseInt(cropPrice, 10))
                        {
                            document.getElementById("cropPriceError").innerHTML = "*integer only";
                            hasError = true;
                        }

                    }


                    if(cropPicture == "" || cropPicture == "img/crops.png")
                    {
                        document.getElementById("cropPictureError").innerHTML = "*required";
                        hasError = true;
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

                    if (document.getElementById(errorFieldId).innerHTML != "*upload error")
                    {
                        document.getElementById(errorFieldId).innerHTML = "";
                    }

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