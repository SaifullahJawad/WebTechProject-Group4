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

                                <td><h3>Equipment Type </h3></td>
                                <td><h3> Price(per Hour) </h3></td>
                                <td><h3>Equipment Picture </h3></td>
                                <td><h3> Status </h3></td>
                                <td><h3>Action</h3></td>

                            </tr>

                            <?php
                            
                            
                            $data = file("../rentalEquipmentAdvertisements.txt");

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


                                    echo " <form action=../Controller/controlRentEquipment.php method=POST>
                                            <tr>

                                                <td>".$advertisementElements[1]." </td>
                                                <td>".$advertisementElements[2]." </td>
                                                <td> <img src=../View/img/".$advertisementElements[3]." width=75px height=75px ></td>
                                                <td>".$advertisementElements[4]." </td>
                                                <td> <input type=submit name=accept value=Accept> </td>


                                            </tr>
                                            <input type=hidden name=advertisementId value=".$advertisementElements[0].">
                                            
                                            </form>";

             
                                }

 



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