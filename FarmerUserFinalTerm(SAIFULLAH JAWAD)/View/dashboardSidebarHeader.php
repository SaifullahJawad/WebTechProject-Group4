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
                                            <li>View Advertisements</li><br>
                                            <ul>
                                                <li><a href="../View/viewOwnAdvertisements.php">Your Advertisements</a></li><br>
                                                <li><a href="../View/viewOtherFarmerAdvertisements.php">Other Farmer Advertisements</a></li><br>
                                            </ul>
                                            <li>Rent Equipment Advertisemets</li><br>
                                            <ul>
                                                <li><a href="../View/rentEquipment.php">Rent Equipments</a></li><br>
                                                <li><a href="../View/viewAcceptedEquiptments.php">Equipments Accepted</a></li><br>
                                            </ul>
                                        
                                            <li><a href="../View/viewFarmingTips.php">Farming Tips</a></li><br>
                                            <li><a href="../View/postComplaint.php">Post Complaint</a></li><br>
                                            <li><a href="../View/viewProfile.php">View Profile</a></li><br>
                                            <li><a href="../View/editProfile.php">Edit Profile</a></li><br>
                                            <li><a href="../View/deleteAccount.php">Delete Account</a></li><br>
                                            <li><a href="../Controller/logOut.php">Logout</a></li><br>
                                        </ul>

                                    </td>
                                    
                                </tr>


                            </table>

                        </td>

