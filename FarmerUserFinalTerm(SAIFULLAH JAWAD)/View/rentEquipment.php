<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Model/advertisementService.php");
    $advertisements = retrieveEquipmentRentAdvertisement();



?>



<!DOCTYPE html>
<html>
    <head>
        <title>View Equiptment Advertisements</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            .srchBox
        {
            position: absolute;
            right: 100px;
            top: 145px;
        }

        .srchLabel
        {
            position: absolute;
            right: 270px;
            top: 144px;
        }
        </style>
    </head>

    <body >

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

                <td  align="center">

                <big id="updateMessage" class="message" style="color:  rgb(0, 199, 43);"><?php if(isset($_GET["accepted"])){echo "Post Accepted";}?></big>
                    <table>

                        <tr>
                            <td align="right">
                                <label for="searchBox" class="srchLabel">Search Ad:</label>
                                <input type="text" class="srchBox" id="searchBox" name="searchBox" placeholder="Search by equipment name" onkeyup="searchAdvertisements(); clearErrorField('updateMessage');">
                            </td>
                        </tr>



                        <tr>

                            <td>
                                
                                    <fieldset style="display: inline-block;">
                                        <legend> <h2> EQUIPMENT RENTEE ADVERTISEMENTS </h2> </legend>
                                        
                                        <table width="1000px" border="1" style="border-collapse: collapse;">

                                            
                                            <tr height="50px">

                                                <td width="200px"><h3>Equipment Name </h3></td>
                                                <td width="200px"><h3>Rent Price[Per Day] </h3></td>
                                                <td width="200px"><h3>Equipment Picture </h3></td>
                                                <td width="200px"><h3>Equipment Status </h3></td>
                                                <td width="200px"><h3>Action</h3></td>

                                            </tr>
                                            
                                        </table>

                                            

                                        <?php
                                        
                                            if(is_null($advertisements))
                                            {
                                        ?>
                                                <tr> <td align=center colspan=6> <h3> there are no equipment rent advertisements availbale yet! </h3> </td> </tr>

                                        <?php  

                                            }
                                            else
                                            {
                                            
                                        ?>

                                            <div id="castAdvertisements">

                                        <?php

                                                for($i=0; $i<count($advertisements); $i++)
                                                {
                                        ?>             
                                                <form action="../Controller/rentEquipmentControl.php" method=POST> 
                                                    <table width="1000px" border="1" style="border-collapse: collapse;">
                                                        <tr>    
                                                            <td width="200px"><?=$advertisements[$i]["product_name"]?></td>
                                                            <td width="200px"><?=$advertisements[$i]["price"]?></td>
                                                            <td width="200px"> <img src="../View/img/<?=$advertisements[$i]["crop_picture"]?>" width=75px height=75px ></td>
                                                            <td width="200px">available</td>
                                                            <input type="hidden" name="advertisementID" value="<?=$advertisements[$i]["aid"]?>">
                                                            <td width="200px"><input type="submit" name="accept" value="Accept"></td>
                                                        
                                                        </tr>
                                                    </table>
                                                </form>
                                        <?php
                                                }
                                        
                                        ?>

                                            </div>

                                        <?php
            
                                        
                                            }
                                        ?>
                                                


                                            

                                        

                                    </fieldset>

                                
                                    

                                

                            </td>

                        </tr>


                    </table>
                    
                </td>
            
            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>


        <script type="text/javascript">


            "use strict"

            function searchAdvertisements()
            {
                let searchedEquipment = document.getElementById("searchBox").value;

                if(searchedEquipment != "")
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "../Controller/rentEquipmentControl.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange = function () {
                        
                        if (this.readyState == 4 && this.status == 200)
                        {

                            if(this.responseText != 0)
                            {
                                var advertisementData = JSON.parse(this.responseText);
                                let castAdvertisements = document.getElementById("castAdvertisements");
                                castAdvertisements.innerHTML = "";

                                for(var i=0; i<advertisementData.length; i++)
                                {

                                    castAdvertisements.innerHTML += "<form action=../Controller/rentEquipmentControl.php method=POST> <table width=1000px border=1 style=border-collapse: collapse;> <tr> <td width=200px>"+advertisementData[i].product_name+"</td> <td width=200px>"+advertisementData[i].price+"</td> <td width=200px> <img src=../View/img/"+advertisementData[i].crop_picture+" width=75px height=75px ></td> <td width=200px>available <input type=hidden name=advertisementID value="+advertisementData[i].aid+"> </td> <td width=200px><input type=submit name=accept value=Accept></td> </tr> </table> </form>";
                                    
                                }
                                
                            }
                                    
                            
                        }


                    }
                    xhttp.send("searchedEquipment=" + searchedEquipment);

                    
                                                                                                                                                

                                                                        
                    

                }
                else
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "../Controller/rentEquipmentControl.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange = function () {
                        
                        if (this.readyState == 4 && this.status == 200)
                        {

                            if(this.responseText != 0)
                            {
                                
                                var advertisementData = JSON.parse(this.responseText);
                                let castAdvertisements = document.getElementById("castAdvertisements");
                                castAdvertisements.innerHTML = "";

                                for(var i=0; i<advertisementData.length; i++)
                                {

                                    castAdvertisements.innerHTML += "<form action=../Controller/rentEquipmentControl.php method=POST> <table width=1000px border=1 style=border-collapse: collapse;> <tr> <td width=200px>"+advertisementData[i].product_name+"</td> <td width=200px>"+advertisementData[i].price+"</td> <td width=200px> <img src=../View/img/"+advertisementData[i].crop_picture+" width=75px height=75px ></td> <td width=200px>available <input type=hidden name=advertisementID value="+advertisementData[i].aid+"> </td> <td width=200px><input type=submit name=accept value=Accept></td> </tr> </table> </form>";
                                    
                                }
                                
                            }
                            
                            
                            
                        }

                    }

                    xhttp.send("searchedEquipment=empty");
                   

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