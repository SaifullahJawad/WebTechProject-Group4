<?php
    session_start();
    if(isset($_POST['submit']))
    {

        
        $name='';
        if(!empty($_POST['name']))
        {
            $name = $_POST['name'];
        }
        else{
            $name='';
        }

        $email = $_POST["email"];
        $atSign = strpos($email, "@");
        $lastDot = strripos($email, ".");
        if(!empty($_POST["email"]))
        {
            if($atSign > 0 && $email[$atSign+1] != "." && $lastDot > $atSign+1 && !strpos($email, " ") && !strpos($email, "..") && strlen($email) > ($lastDot+1))
            {
                $email = $_POST['email'];
            }
            else
            {

               $email='';
            }
    
        }
        else
        {
            $email='';
        }
  
        $n = $_POST['user_name'];
        $j ='';
        $count=1;
        if(!empty($n))
        {
            if(strlen($n)>1)
            {
                if($n[0]>='A' && $n[0]<='z')
                {
                    $count = strlen($n);
                    $k = str_split($n);
                    foreach ($k as $ks)
                    {
                        if(($ks>='A' && $ks<='z') || $ks =='.' || $ks == '-')
                        {
                            $j = $j.$ks;
                        }
                        else
                        {
                            $j = '';
                            
                            break;
                        }

                    }
                }
                else
                {
                    $j = '';
                }

            }
            else
            {
               
                $j = '';
            }  
        }
        else
        {
           
            $j = '';
        }
        $password='';
        if($_POST['password']==$_POST['con_pas'])
        {
            $password = $_POST['password'];
        }
        else
        {
          
            $password='';
        }

        if(isset($_POST['gen']))
        {
           $gen =  $_POST['gen'];
          
        }
        else
        {
           
            $gen ='';
        }



        if(!empty($_POST['dob']))
        {
            $dobb = $_POST['dob'];
          

        }
        else{
        
            $dobb ='';
        }
        
        if($name!="" && $email!='' && strlen($j)==$count && $password!='' && $gen!='' && $dobb !='')
        {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['un'] = $j;
            $_SESSION['password'] = $password;
            $_SESSION['gen'] = $gen;
            $_SESSION['dob'] = $dobb;

            header('location: login.php');
        }
        else
        {
            echo "wrong data";
        }

    }

    else
    {
        header('location: registration.php');
    }



?>