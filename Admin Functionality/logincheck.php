



<?php

    session_start();
    if(isset($_POST['submit']))
    {
        $myfile = fopen('user.txt', 'r');
    $data = fread($myfile, filesize('user.txt'));
    $data = fgets($myfile);
    echo $data;
$words = explode("|", $data);
foreach ($words as $word) {
    echo  $word;
}
    

        $logun = $_POST['logun'];
        $logpas = $_POST['logp'];







 if(isset($_POST["rememberMe"]))
                {
                    setcookie("loggedInUserName", $_SESSION["userName"], time()+ 3600);
                    header("Location: viewsite.php");
                }

        if(isset($_SESSION['un']) && isset($_SESSION['password']))
        {
            if($logun == $_SESSION['un'] && $logpas== $_SESSION['password'])
            {
                $_SESSION['active'] = 'true';
                header('location: viewsite.php');
            }
            else
            {
                echo "Username and password not matched";
                //header('location: login.php?msg=invalid_user');
            }
        }
        else
        {
            header('location: login.php?msg=invalid_user');
        }

    }
    else
    {
       header('location: login.php');
    }




?>
