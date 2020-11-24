<?php  
  require_once('header.html');
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

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
  <table>
    <tr>
      <td>
        FarmingTips
      </td>
      <td>
   <textarea name="farmingtips" rows="5" cols="40"><?php echo $farmingtips;?></textarea>
  </td>
  <br><br>
</tr><br>

<tr>
  <td>
  <input type="submit" name="submit" value="post">
  <input type="submit" name="submit" value="update">
</td>
    </tr>  
</table>
</form>

<?php
echo "<h2>Your News and tips :</h2>";

echo "<br>";
echo $farmingtips;
echo "<br>";
?>
</body>
</html>
