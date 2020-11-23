<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Controller/fileDataHandler.php");
    retrieveUserData();



?>



<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>


                <td  align="center">

                    <fieldset style="display: inline-block;">
                        <legend> <h2>YOUR ADVERTISEMENTS </h2> </legend>
                        <table width="1000px" border="1" style="border-collapse: collapse;">


                            <tr height="50px">

                                <td><h3>Crop Name </h3></td>
                                <td><h3>Crop Quantity </h3></td>
                                <td><h3>Crop Price </h3></td>
                                <td><h3>Crop Picture </h3></td>
                                <td><h3>Status </h3></td>
                                <td><h3>Action</h3></td>

                            </tr>

                            <?php
                            
                            
                            $data = file("../farmerAdvertisements.txt");

                            if(empty($data))
                            {
                                echo "<tr> <td align=center colspan=6> <h3> No advertisements in the system! </h3> </td> </tr>";
                            }
                            else
                            {
                                $flag = false;
                                for($i=0; $i<count($data); $i++)
                                {
                                    $advertisementElements = explode("|",$data[$i]);

                                    
                                    if(actualInput($advertisementElements[6]) == $_SESSION["userName"])
                                    {

                                        echo " <form action=../Controller/controlViewAdvertisements.php method=POST>
                                                <tr>
    
                                                    <td>".$advertisementElements[1]." </td>
                                                    <td>".$advertisementElements[2]." </td>
                                                    <td>".$advertisementElements[3]." </td>
                                                    <td> <img src=../View/img/".$advertisementElements[4]." width=75px height=75px ></td>
                                                    <td>".$advertisementElements[5]." </td>
                                                    <td> <input type=submit name=edit value=Edit> <big>/</big> <input type=submit name=delete value=Delete> </td>
    
    
                                                </tr>
                                                <input type=hidden name=advertisementId value=".$advertisementElements[0].">
                                                
                                              </form>";

                                        $flag = true;

                                    }
                                
                                }

                                if(!$flag)
                                {
                                    echo "<tr> <td align=center colspan=6> <h3> You have no advertisements! </h3> </td> </tr>";

                                }



                            }






                            function actualInput($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                              }
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            ?>


                        </table>

                    </fieldset>


                    
                </td>
            
            <?php include_once("dashboardSidebarFooter.php"); ?>
            
        </tr>

        <?php include_once("footer.php"); ?>


    </body>
</html>