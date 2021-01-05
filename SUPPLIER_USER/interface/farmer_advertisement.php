<?php
session_start();

?>


<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');




$all_farmer_adds = allFarmerAdds();  

?>



<!DOCTYPE html>
<html>
<head>
  <title>View Profile</title>
    <link rel="stylesheet" href="../css/farmer_advertisement.css">

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

  <?php for($i=0; $i< count($all_farmer_adds); $i++){ ?>

      <tr>
        <td><?=$all_farmer_adds[$i]['product_name']?></td>
        <td><?=$all_farmer_adds[$i]['quantity']?></td>
        <td><?=$all_farmer_adds[$i]['price']?></td>
        <td>
             <div>
              <?php 

                   echo "<img src='../uploaded_picture_advertisement/".$all_farmer_adds[$i]['crop_picture']."'  >";
                                 
                ?>
          </div>

        </td>
        <td>
            <?php 

             if($all_farmer_adds[$i]['accepted_by'] == 'none'){

               echo "Add Is Waiting to be accepted";
             
             }

            ?>
          
        </td>
        
        
      <td>
          <form method="post" action="farmer_add_details.php">
            <input style="width:0px;height:0px;border: none;text-indent: -99em;" type="text" id="add_id" name="add_id" value="<?php echo $all_farmer_adds[$i]['aid'] ?>" readonly>

            <input style="width:0px;height:0px;border: none;text-indent: -99em;" type="text" id="user_id" name="user_id" value="<?php echo $all_farmer_adds[$i]['user_id'] ?>" readonly>

            
            <input type="submit" name="submit" value="Details">
          </form>

        </td>

        
      </tr>
  <?php } ?>

  </table>
<?php include 'f_footer.php';?>

</body>
</html>