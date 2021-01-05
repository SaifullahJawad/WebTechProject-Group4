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
    $advertisements = retrieveOwnAdvertisements($_SESSION["userID"]);



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

                <big id="updateMessage" class="message" style="color:  rgb(0, 199, 43);"><?php if(isset($_GET["updated"])){echo "Updated Successfully";}?></big>
                <big id="deleteMessage" class="message" style="color: rgb(255, 0, 0);";"><?php if(isset($_GET["deleted"])){echo "Post Deleted";}?></big>

                                
                    <fieldset style="display: inline-block;">
                        <legend> <h2>YOUR ADVERTISEMENTS </h2> </legend>
                        
                        <table id="adTable" width="1000px" border="1" style="border-collapse: collapse;">

                                <tr height="50px">

                                    <td><h3>Crop Name </h3></td>
                                    <td><h3>Crop Quantity </h3></td>
                                    <td><h3>Crop Price </h3></td>
                                    <td><h3>Crop Picture </h3></td>
                                    <td><h3>Status </h3></td>
                                    <td><h3>Action</h3></td>

                                </tr>


                            <tbody id="adTableBody">


                                <?php
                                
                                    if(is_null($advertisements))
                                    {
                                ?>
                                        <tr> <td align=center colspan=6> <h3> You don't have any advertisements! </h3> </td> </tr>
                                        <tr> <td align=center colspan=6> <h3> Post your advertisments <a href="../View/postAdvertisements.php">here</a> </h3> </td> </tr>

                                <?php  

                                    }
                                    else
                                    {
                                

                                        for($i=0; $i<count($advertisements); $i++)
                                        {
                                ?>           
                                        <form action="../Controller/viewAdvertisementsControl.php" method="POST">   
                                            <tr>    
                                                <td><?=$advertisements[$i]["product_name"]?></td>
                                                <td><?=$advertisements[$i]["quantity"]?></td>
                                                <td><?=$advertisements[$i]["price"]?></td>
                                                <td> <img src="../View/img/<?=$advertisements[$i]["crop_picture"]?>" width=75px height=75px ></td>
                                            <?php   
                                                if($advertisements[$i]["accepted_by"] == "none")
                                                {
                                            ?>
                                            
                                                    <td>pending <input type="hidden" name="advertisementID" value="<?=$advertisements[$i]["aid"]?>"> </td>
                                                    <td><input type="submit" name="edit" value="Edit"> <big> / </big><input type="submit" name="delete" value="Delete"></td>
                                            <?php

                                                }
                                                else
                                                {
                                            ?>
                                                    <td>accepted by <a href="../View/viewOthersProfile.php?userName=<?=$advertisements[$i]["accepted_by"]?>" > <?=$advertisements[$i]["accepted_by"]?> </a> </td>
                                                    <td>No action Available</td>

                                            <?php

                                                }              
                                            
                                            
                                            ?>
                                            </tr>
                                            
                                        </form>

                                <?php
                                        }
    
                                
                                    }
                                ?>
                                


                            </tbody>

                        </table>

                    </fieldset>

                    
                </td>
            
            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>
        
        <script type="text/javascript">

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