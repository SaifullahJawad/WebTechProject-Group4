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



    



<body>
    <table border="1" style="border-collapse: collapse;" width = "100%">

    <tr>

        <td align="left" style="border:0px">  <h1> <img src="img/websiteLogo.png" hieght="100px" width=100px"> Cultivation and Crop Distribution Management System </h1> </td>
        <td style="border:0px; padding-right:15px" align="right"> 
        <?php

            if( isset($_SESSION["isLoggedIn"]) || isset($_COOKIE["loggedInUserName"]))
            {
        ?>
                Logged in as <a href="dashboard.php"> <?php if(isset($_COOKIE["loggedInUserName"])){echo $_SESSION["name"];}else{echo $_SESSION["name"];} ?> </a> |
                <a href="logout.php"> Logout </a>

        <?php
            }
            else
            {
        ?>
                <a href="publicHome.php"> Home </a> |
                <a href=""> About Us </a>
                
        <?php
            }
        
        ?>
        </td>

    </tr>