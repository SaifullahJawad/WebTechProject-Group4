<?php



    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Model/farmingTipsService.php");

    $farmingTips = retrieveFarmingTips();

    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Farming Tips</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

                        <td>

                            <div style="padding-left: 50px;">
                            
                                <h2> View Farming Tips To Grow Your Plants Bigger</h2>
                                <hr>

                                <?php
                                
                                    if(is_null($farmingTips))
                                    {
                                
                                ?>
                                        <table><tr> <td align=center colspan=6> <h3> No Tips to show! </h3> </td> </tr></table>

                                <?php

                                    }

                                    else
                                    {

                                        for($i=0; $i<count($farmingTips); $i++)
                                        {
                                
                                ?>
                                        <table>
                                            <tr>
                                                <td>
                                                    <h3><?=$farmingTips[$i]["headline"]?></h3>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <?=$farmingTips[$i]["tips_details"]?>
                                                </td>
                                            </tr>
                                            <tr height="20px">
                                            <td>
                                            </td>
                                            </tr>
                                        </table>

                                <?php

                                        }

                                    }
                                
                                ?>

                            </div>
                            
                        
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