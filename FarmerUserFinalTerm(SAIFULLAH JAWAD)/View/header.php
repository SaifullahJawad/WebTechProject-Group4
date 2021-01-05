<?php

    if (realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ))
    {
        header("HTTP/1.0 404 Not Found");
        exit();   

    }

    if(!isset($_SESSION))
    {
        session_start();
    }
?>



    



<body onload="updateDarkMode();">
    <table border="1" style="border-collapse: collapse;" width = "100%">

    <tr>

        <td align="left" style="border:0px">  <h1> <img src="../View/img/websiteLogo.png" hieght="70px" width=70px"> Cultivation and Crop Distribution Management System </h1> </td>
        <td style="border:0px; padding-right:15px" align="right">
        <?php

            if( isset($_SESSION["loggedInUserName"]) || isset($_COOKIE["loggedInUserName"]))
            {
        ?>
                <label class="darkModeLabel">Toggle Dark Mode:</label>
                <label id="darkModeToggler" class="darkModeToggler" onclick="toggleDarkMode();"></label>
                Logged in as <a href="../View/dashboard.php"> <?php echo $_SESSION["userName"]; ?> </a> |
                <a href="../Controller/logout.php"> Logout </a>

        <?php
            }
            else
            {
        ?>
                <a href="../View/publicHome.php"> Home </a> |
                <a href=""> About Us </a>
                
        <?php
            }
        
        ?>
        </td>

    </tr>