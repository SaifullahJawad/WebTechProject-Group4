<?php

    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();  

    }



?>






<td valign="top" colspan="2">


                <table border="1" style="border-collapse: collapse;" width="100%">

                    <tr height="500px">
                    
                        <td width="270px" valign="top">



                
                            <table style="padding-left: 15px;" width="100%">


                                <tr>
                                    <td>
                                        <h2>Farmer Dashboard</h2>
                                        <hr>
                                    </td>
                                </tr>



                                <tr>
                                    <td>

                                        <ul>
                                            <li><a href="../View/dashboard.php">Dashboard</a></li><br>
                                            <li><a href="../View/postAdvertisements.php">Post Advertisements</a></li><br>
                                            <li><a href="../View/viewAdvertisements.php">View Advertisements</a></li><br>
                                            <li><a href="../View/rentEquipment.php">Rent Equipment</a></li><br>
                                            <li><a href="../View/viewProfile.php">View Profile</a></li><br>
                                            <li><a href="../View/editProfile.php">Edit Profile</a></li><br>
                                            <li><a href="../View/deleteAccount.php">Delete Account</a></li><br>
                                            <li><a href="../Controller/logOut.php">Logout</a></li><br>
                                        </ul>

                                    </td>
                                    
                                </tr>


                            </table>

                        </td>

