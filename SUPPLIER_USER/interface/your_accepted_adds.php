<?php
session_start();

?>


<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');

if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);



$my_user_name = $s_data['username'];

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);


$my_user_name = $s_data['username'];
  
}


$all_accepted_adds = all_my_accepted_adds($my_user_name);  

?>



<!DOCTYPE html>
<html>
<head>
  <title>your accepted adds</title>
   
   <link rel="stylesheet" href="../css/your_accepted_adds.css">


</head>
<?php include 'profile_header.php';?>
  
     <table id="supplier"> 
    <tr>
      <th>CROP NAME</th>
      <th>QUANTITY (In Kg)</th>
      <th>PRICE (Per kg)</th>
      <th>PICTURE</th>
      <th>STATUS</th>

      <th>DETAILS</th>

    </tr>

  <?php for($i=0; $i< count($all_accepted_adds); $i++){ ?>

      <tr>
        <td><?=$all_accepted_adds[$i]['product_name']?></td>
        <td><?=$all_accepted_adds[$i]['quantity']?></td>
        <td><?=$all_accepted_adds[$i]['price']?></td>
        <td>
             <div>
              <?php 

                   echo "<img src='../uploaded_picture_advertisement/".$all_accepted_adds[$i]['crop_picture']."'  >";
                                 
                ?>
          </div>

        </td>
        <td>
            <?php 

             if($all_accepted_adds[$i]['accepted_by'] == 'none'){

               echo "Add Is Waiting to be accepted";
             
             }else {

             	echo "<h3>Accepted By You</h3>";
             }

            ?>
          
        </td>
        
        
      <td>
          <form method="post" action="your_accepted_add_details.php">
            <input style="width:0px;height: 0px;border: none;text-indent: -99em;" type="text" id="add_id" name="add_id" value="<?php echo $all_accepted_adds[$i]['aid'] ?>" readonly>

            <input style="width:0px;height: 0px;border: none;text-indent: -99em;" type="text" id="user_id" name="user_id" value="<?php echo $all_accepted_adds[$i]['user_id'] ?>" readonly>

            
            <input type="submit" name="submit" value="Details">
          </form>

        </td>

        
      </tr>
  <?php } ?>

  </table>
<?php include 'f_footer.php';?>

</body>
</html>