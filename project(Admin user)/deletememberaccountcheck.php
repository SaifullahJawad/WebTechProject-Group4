<?php

// if(!defined('Delete')) 
// {
//     echo '<h1>';
//    die('Direct access not permitted');
//    echo '</h1>';
// }



require_once('db.php');

$conn = getConnection();
$value = $_GET['msg'];
$sql = "DELETE FROM users WHERE id="'.$id.'"";
mysqli_query($conn, $sql);
$conn->close();
header('location: deletememberaccount.php');
exit;

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body style="background-color: linen">

</body>
</html>
