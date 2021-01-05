<?php


    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Model/advertisementService.php");
    $advertisements = retrieveOtherFarmerAdvertisements($_SESSION["userID"]);



?>



<!DOCTYPE html>
<html>
    <head>
        <title>View Advertisements</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body >

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

                <td  align="center">
    
                    <table>

                        <tr>
                            <td align="right">
                                <label for="searchBox" class="searchLabel">Search Ad:</label>
                                <input type="text" id="searchBox" class="searchBox" name="searchBox" placeholder="Search by crop name" onkeyup="searchAdvertisements();">
                            </td>
                        </tr>



                        <tr>

                            <td>

                                <fieldset style="display: inline-block;">
                                    <legend> <h2>OTHER FARMER ADVERTISEMENTS</h2> </legend>
                                    
                                    <table id="adTable" width="1000px" border="1" style="border-collapse: collapse;">

                                        <thead>
                                            <tr height="50px">

                                                <td><h3>Crop Name </h3></td>
                                                <td><h3>Crop Quantity </h3></td>
                                                <td><h3>Crop Price </h3></td>
                                                <td><h3>Crop Picture </h3></td>
                                                <td><h3>Status </h3></td>
                                                <td><h3>Posted By</h3></td>

                                            </tr>
                                        </thead>


                                        <tbody id="adTableBody">

                                        

                                            <?php
                                            
                                                if(is_null($advertisements))
                                                {
                                            ?>
                                                    <tr> <td align=center colspan=6> <h3> No farmer posted advertisement yet! </h3> </td> </tr>

                                            <?php  

                                                }
                                                else
                                                {
                                            

                                                    for($i=0; $i<count($advertisements); $i++)
                                                    {

                                            ?>              
                                                        <tr>    
                                                            <td><?=$advertisements[$i]["product_name"]?></td>
                                                            <td><?=$advertisements[$i]["quantity"]?></td>
                                                            <td><?=$advertisements[$i]["price"]?></td>
                                                            <td> <img src="../View/img/<?=$advertisements[$i]["crop_picture"]?>" width=75px height=75px ></td>
                                                            <td>available</td>
                                                            <td><a href="../View/viewOthersProfile.php?userName=<?=$advertisements[$i]["username"]?>" > <?=$advertisements[$i]["username"]?> </a></td>
                                                        </tr>
                                            <?php
                                                    
                                                    }
                
                                            
                                                }
                                            ?>
                                            


                                        </tbody>

                                    </table>

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
                let searchedCropName = document.getElementById("searchBox").value;

                if(searchedCropName != "")
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "../Controller/viewAdvertisementsControl.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange = function () {
                        
                        if (this.readyState == 4 && this.status == 200)
                        {

                            if(this.responseText != 0)
                            {
                                var advertisementData = JSON.parse(this.responseText);
                                let tableBody = document.getElementById("adTableBody");
                                tableBody.innerHTML = "";
                                for(var i=0; i<advertisementData.length; i++)
                                {
                                    var newRow = tableBody.insertRow();

                                    var nameCell = newRow.insertCell();
                                    var quantityCell = newRow.insertCell();
                                    var priceCell = newRow.insertCell();
                                    var pictureCell = newRow.insertCell();
                                    var statusCell = newRow.insertCell();
                                    var postedByCell = newRow.insertCell();

                                    nameCell.innerHTML = advertisementData[i].product_name;
                                    quantityCell.innerHTML = advertisementData[i].quantity;
                                    priceCell.innerHTML = advertisementData[i].price;
                                    pictureCell.innerHTML = "<img src=../View/img/"+advertisementData[i].crop_picture+" width=75px height=75px>";
                                    statusCell.innerHTML = "avilable";
                                    postedByCell.innerHTML = "<a href=../View/viewOthersProfile.php?userName="+advertisementData[i].username+"> "+advertisementData[i].username+" </a>"



                                }
                                
                            }
                            
                            
                            
                        }
                    }
                    xhttp.send("searchedOtherFarmerCropName=" + searchedCropName);

                    
                                                                                                                                                

                                                                        
                    

                }
                else
                {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "../Controller/viewAdvertisementsControl.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange = function () {
                        
                        if (this.readyState == 4 && this.status == 200)
                        {

                            if(this.responseText != 0)
                            {
                                var advertisementData = JSON.parse(this.responseText);
                                let tableBody = document.getElementById("adTableBody");
                                tableBody.innerHTML = "";
                                for(var i=0; i<advertisementData.length; i++)
                                {
                                    var newRow = tableBody.insertRow();

                                    var nameCell = newRow.insertCell();
                                    var quantityCell = newRow.insertCell();
                                    var priceCell = newRow.insertCell();
                                    var pictureCell = newRow.insertCell();
                                    var statusCell = newRow.insertCell();
                                    var postedByCell = newRow.insertCell();

                                    nameCell.innerHTML = advertisementData[i].product_name;
                                    quantityCell.innerHTML = advertisementData[i].quantity;
                                    priceCell.innerHTML = advertisementData[i].price;
                                    pictureCell.innerHTML = "<img src=../View/img/"+advertisementData[i].crop_picture+" width=75px height=75px>";
                                    statusCell.innerHTML = "avilable";
                                    postedByCell.innerHTML = "<a href=../View/viewOthersProfile.php?userName="+advertisementData[i].username+"> "+advertisementData[i].username+" </a>"



                                }
                            
                                
                            }
                            
                            
                            
                        }

                    }
                    xhttp.send("searchedOtherFarmerCropName=empty");
                   

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