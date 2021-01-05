<?php



    session_start();


    if(!isset($_SESSION["loggedInUserName"]) && !isset($_COOKIE["loggedInUserName"]))
    {
        header("Location: ../View/login.php");
    }

    require_once("../Model/farmerUserService.php");
    

    $userData = retrieveFarmerUser($_SESSION["loggedInUserName"] ?? $_COOKIE["loggedInUserName"]);

    $_SESSION["userID"] = $userData["id"];
    $_SESSION["name"] = $userData["name"];
    $_SESSION["email"] = $userData["email"];
    $_SESSION["userName"] = $userData["username"];
    $_SESSION["password"] = $userData["password"];
    $_SESSION["phone"] = $userData["phone"];
    $_SESSION["genders"] = $userData["gender"];
    $_SESSION["dob"] = $userData["dob"];
    $_SESSION["profilePicture"]= $userData["picture"];



    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="styles.css">
 
    </head>

    <body>

        <?php include_once("header.php"); ?>

        <tr height="500px">

            <?php include_once("dashboardSidebarHeader.php"); ?>

            <td>
                <h1 class="welcomeHeading">Welcome <?php echo $_SESSION["name"]; ?></h1> 
                
                <h2 class="postAdNow">Post your advertisements <a href="../View/postAdvertisements.php">now</a>! </h2>
            
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