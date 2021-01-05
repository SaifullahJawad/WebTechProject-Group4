<?php


    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Model/farmerUserService.php");

    if(isset($_GET["userName"]))
    {
        
        $userData = retrieveOtherUsers($_GET["userName"]);

        if(!is_null($userData))
        {
            $name = $userData["name"];
            $email = $userData["email"];
            $userName = $userData["username"];
            $phone = $userData["phone"];
            $genders = $userData["gender"];
            $dob = $userData["dob"];
            $profilePicture = $userData["picture"];
            $userType = strtoupper($userData["user_type"]);

            if($userType == "ADMIN")
            {
                header("HTTP/1.0 404 Not Found");
                exit();
            }

        }
        else
        {
            header("HTTP/1.0 404 Not Found");
            exit();
        }

        

    }
    else
    {
        header("HTTP/1.0 404 Not Found");
        exit();
    }
    

    



?>



<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>


                <td width="900px" align="center">

                    <fieldset style="display: inline-block;">
                        <legend><h3><?=$userType?> PROFILE</h3></legend>
                        <table>

                            <tr height="30px">
                                <td>
                                    Name:
                                </td>

                                <td>
                                    <?php echo $name;?>
                                </td>

                                <td width="250px" rowspan="8" valign="bottom">

                                    <img src="<?php echo "img/".$profilePicture;?>" alt="" width="200px" height="200px">
                                    

                                </td>
                            </tr>


                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    Email:
                                </td>

                                <td>
                                    <?php echo $email;?>
                                </td>


                            </tr>


                            

                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Phone:
                                </td>

                                <td>
                                    <?php echo $phone;?>
                                </td>


                            </tr>








                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>

                    

                            <tr height="30px">

                                <td>
                                    Gender:
                                </td>

                                <td>
                                    <?php echo $genders;?>
                                </td>


                            </tr>


                            <tr height="10px">
                                <td colspan="2"><hr></td> 
                            </tr>



                            <tr height="30px">

                                <td>
                                    Date of Birth:
                                </td>

                                <td>
                                    <?php echo $dob;?>
                                </td>

                                <td style="padding-left: 70px">
                                     
                                </td>

                            </tr>


                            <tr height="10px">
                                <td colspan="3"><hr></td> 
                            </tr>

                            <tr height="10px">
                                <td colspan="3"><a href="<?php if($userType == "SUPPLIER"){echo "../View/viewOwnAdvertisements.php";} else if ($userType =="FARMER") {echo "../View/viewOtherFarmerAdvertisements.php";} else {echo "../View/viewAcceptedEquiptments.php";} ?>" > Go Back </a></td> 
                            </tr>




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