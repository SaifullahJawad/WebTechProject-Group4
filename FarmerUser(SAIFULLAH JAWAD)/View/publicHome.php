<?php

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION["loggedInUserName"]) || isset($_COOKIE["loggedInUserName"]) )
{
    header("Location: View/dashboard.php");
}

    

?>



<!DOCTYPE html>
<html>
    <head>
        <title> Public Home </title>
    </head>



            <?php include_once "../View/header.php"; ?>
            <tr height="400px">
                <td colspan="2" align="Center">
                    <h1> Buy, Sell, Cultivate Crops with Ease! </h1> <br>
                    <table>
                        <tr>
                            <td align="center" width="200px"> <img src="../View/img/Farmer.png" width="100px" height="100px"> </td>
                            <td align="center" width="200px"> <img src="../View/img/Supplier.png" width="100px" height="100px"> </td>
                            <td align="center" width="200px"> <img src="../View/img/EquipmentRentee.png" width="100px" height="100px"> </td>
                            <td align="center" width="200px"> <img src="../View/img/Admin.png" width="100px" height="100px"> </td>
                        </tr>

                        <tr>
                            <td align="center" width="200px"> Farmer <br> <a href="../View/logIn.php">Login</a> or <a href="../View/registration.php">Sign Up</a>  </td>
                            <td align="center" width="200px"> Supplier <br> <a href="">Login</a> or <a href="">Sign Up</a>  </td>
                            <td align="center" width="200px"> Equipment Rentee <br> <a href="">Login</a> or <a href="">Sign Up</a>  </td>
                            <td align="center" width="200px"> Admin <br> <a href="">Login</a> </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <?php include_once "../View/footer.php"; ?>

            
</html>