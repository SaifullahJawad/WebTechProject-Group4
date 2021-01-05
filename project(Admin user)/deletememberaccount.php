<?php  
session_start();
require_once('header.html');
  require_once('db.php');

  $conn = getConnection();
  $sql = 'select * from users';
  $result = mysqli_query($conn, $sql);
?>


<html>
<head>

</head>
<body style="background-color: linen">
  <form method="post" action="deletememberaccountcheck.php">

<table border="1">
    <tr>
     <tr>
    
      <td>ID</td>
      <td align="middle">NAME</td>
      <td align="middle">USERNAME</td>
      <td align="middle">EMAIL</td>
      <td align="middle">PASSWORD</td>
      <td align="middle">PHONE</td>
        <td align="middle">GENDER</td>
          <td align="middle">DOB</td>
            <td align="middle">USERTYPE</td>
    </tr>
  <?php while($data = mysqli_fetch_assoc($result)){ ?>

      <tr>
        <td><?=$data['id']?></td>
        <td><?=$data['name']?></td>
        <td><?=$data['username']?></td>
        <td><?=$data['email']?></td>
        <td><?=$data['password']?></td>
        <td><?=$data['phone']?></td>
        <td><?=$data['gender']?></td>
        <td><?=$data['dob']?></td>
        <td><?=$data['user_type']?></td>
      </tr>
  <?php } ?>
</table>
  <input type="submit" name="delete" value='delete'>
</script>
</form>
</body>
</html>

<?php  

 include_once('footer.html');


?>
