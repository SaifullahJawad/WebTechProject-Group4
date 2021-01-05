<?php


    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Model/advertisementService.php");
    $advertisements = retriveAcceptedEquipmentAdvertisements( $_SESSION["userName"] );



?>



<!DOCTYPE html>
<html>
    <head>
        <title>View Accepted Advertisements</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body >

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

                <td  align="center">
    

                    <fieldset style="display: inline-block;">
                        <legend> <h2>ACCEPTED EQUIPMENT RENTS</h2> </legend>
                        
                        <table id="adTable" width="1000px" border="1" style="border-collapse: collapse;">


                            <tr height="50px">

                                <td width="200px"><h3>Equipment Name </h3></td>
                                <td width="200px"><h3>Rent Price[Per Day] </h3></td>
                                <td width="200px"><h3>Equipment Picture </h3></td>
                                <td width="200px"><h3>Equipment Status </h3></td>
                                <td width="200px"><h3>Posted By</h3></td>

                            </tr>



                            <?php
                            
                                if(is_null($advertisements))
                                {
                            ?>
                                    <tr> <td align=center colspan=6> <h3> You haven't rented any equipments yet! </h3> </td> </tr>
                                    <tr> <td align=center colspan=6> <h3> Rent equipments <a href="../View/rentEquipment.php">here</a> </h3> </td> </tr>

                            <?php  

                                }
                                else
                                {
                            

                                    for($i=0; $i<count($advertisements); $i++)
                                    {

                            ?>              
                                        <tr>    
                                            <td><?=$advertisements[$i]["product_name"]?></td>
                                            <td><?=$advertisements[$i]["price"]?></td>
                                            <td> <img src="../View/img/<?=$advertisements[$i]["crop_picture"]?>" width=75px height=75px ></td>
                                            <td>accepted by you</td>
                                            <td> <a href="../View/viewOthersProfile.php?userName=<?=$advertisements[$i]["username"]?>" > <?=$advertisements[$i]["username"]?> </a></td>
                                        </tr>
                            <?php
                                    
                                    }

                            
                                }
                            ?>
                                


                            

                        </table>

                    </fieldset> 

                    
                </td>
            
            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>


        <script type="text/javascript">


            "use strict"

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