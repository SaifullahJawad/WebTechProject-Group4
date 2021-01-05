<?php  
session_start();
require_once('header.html');
  require_once('db.php');

  $conn = getConnection();
  $sql = 'select * from farming_tips';
  $result = mysqli_query($conn, $sql);
?>
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body style="background-color: linen">  

<?php
// define variables and set to empty values

$farmingtips =  "";

  if (empty($_POST["farmingtips"])) {
    $farmingtips = "";
  } else {
    $farmingtips = test_input($_POST["farmingtips"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>News And Farming Tips</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <table border="1">
    <tr>
     <tr>
      <td>ID</td>
      <td align="middle">HEADLINE</td>
      <td align="middle">TIPSDETAILS</td>
    </tr>

  <?php while($data = mysqli_fetch_assoc($result)){ ?>

      <tr>
        <td><?=$data['id']?></td>
        <td><?=$data['headline']?></td>
        <td><?=$data['tips_details']?></td>
      </tr>
  <?php } ?>
</table>
</form>
</body>
</html>
