<?php

if(isset($_COOKIE["logged_in"]))
{

    header('location:suppiler_dashboard.php');

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Public Home </title>
    </head>



            <?php include_once "front_page_header.php"; ?>
            <tr height="400px">
                <td colspan="2" align="Center">
                    <h1> Buy, Sell, Cultivate Crops with Ease! </h1> <br>
                    <table>
                        <tr>
                            <td align="center" width="200px"> <img src="img/Farmer.png" width="100px" height="100px"> </td>
                            <td align="center" width="200px"> <img src="img/Supplier.png" width="100px" height="100px"> </td>
                            <td align="center" width="200px"> <img src="img/EquipmentRentee.png" width="100px" height="100px"> </td>
                            <td align="center" width="200px"> <img src="img/Admin.png" width="100px" height="100px"> </td>
                        </tr>

                        <tr>
                            <td align="center" width="200px"> Farmer <br> <a href="">Login</a> or <a href="">Register</a>  </td>
                            <td align="center" width="200px"> Supplier <br> <a href="login.php">Login</a> or <a href="registration.php">Register</a>  </td>
                            <td align="center" width="200px"> Equipment Rentee <br> <a href="">Login</a> or <a href="">Register</a>  </td>
                            <td align="center" width="200px"> Admin <br> <a href="">Login</a> </td>
                        </tr>

                    </table>
                </td>
            </tr>
            <?php include_once "front_page_footer.php"; ?>

            
</html>