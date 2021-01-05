<?php
session_start();

include_once('userloginheader.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
  background-color: linen;
}
h3 {
  background-color: lightblue;
  margin: 8px;
  padding: 25px;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <table align="center" width='50%' border="1">
        <tr>
            <td align="center">
                <h3>AdminViewSite</h3>
                <hr>
                <label>
                <ul>
                    <li><a href="addanotheradmin.php">AddAnotherAdmin</a></li>
                    <li><a href="addmember.php">AddMembers</a></li>
                    <li><a href="viewmemberaccount.php">ViewMemberAccount</a></li>
                    <li><a href="deletememberaccount.html">DeleteMember'sAccount</a></li>
                    <li><a href="vvieweverymemberpost.php">ViewEveryMember'sPost</a></li>
                    <li><a href="deleteeverymemberpost.html">DeleteAnyMember'sPost</a></li>
                    <li><a href="viewcomplain.php">ViewComplain</a></li>
                    <li><a href="farmingtipss.html">FarmingTips</a></li>
                    <li><a href="DeleteOwnAccount">DeleteOwnAccount</a></li>
                    <li><a href="UpdateOwnAccount.php">UpdateOwnAccount</a></li>
                    <li><a href="logout.php">LOgOut</a></li>
                </ul>
                </label>                
            </td>
        </tr>
    </table>
</body>
</html>

<?php

    include_once('footer.html');
?>