<?php
session_start();

?>


<?php include 'r_header.php';?>

<?php

require_once('../models/user_table_service.php');

if(isset($_SESSION["is_logged_in"])){

$s_email = $_SESSION["is_logged_in"];

$s_data = viewProfile($s_email);



$id = $s_data['id'];

}

if (isset($_COOKIE["logged_in"])) {

$s_email = $_COOKIE["logged_in"];

$s_data = viewProfile($s_email);


$id = $s_data['id'];
  
}


$all_your_adds = myAdds($id);  

?>



<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
    
   
   <link rel="stylesheet" href="../css/view_your_all_post.css">


</head>
<?php include 'profile_header.php';?>
	
     <table id="supplier"> 
    <tr>
      <th>CROP NAME</th>
      <th>QUANTITY (In Kg)</th>
      <th>PRICE (Per kg)</th>
      <th>PICTURE</th>
      <th>STATUS</th>
      <th>EDIT</th>
      <th>DELETE</th>
      <th>DETAILS</th>
    </tr>

  <?php for($i=0; $i< count($all_your_adds); $i++){ ?>

      <tr>
        <td><?=$all_your_adds[$i]['product_name']?></td>
        <td><?=$all_your_adds[$i]['quantity']?></td>
        <td><?=$all_your_adds[$i]['price']?></td>
        <td>
             <div>
              <?php 

                   echo "<img src='../uploaded_picture_advertisement/".$all_your_adds[$i]['crop_picture']."'  >";
                                 
                ?>
          </div>

        </td>
        <td>
            <?php 

             if($all_your_adds[$i]['accepted_by'] == 'none'){

               echo "Add Is Waiting to be accepted";
             }else{

               echo "<h3>Accepted By :</h3>" ."  ". $all_your_adds[$i]['accepted_by'];
             }

            ?>
          
        </td>
        <td>
          
          <a href="edit_advertisement.php?id=<?=$all_your_adds[$i]['aid']?>">EDIT</a> 
        
        </td>
        <td>

          <a href="../php/delete_add.php?id=<?=$all_your_adds[$i]['aid']?>">DELETE</a>

        </td>

        <td>

          <form method="post" action="add_details.php">
            <input style="width:0px;height: 0px;text-indent: -99em;border: none;" type="text" id="add_id" name="add_id" value="<?php echo $all_your_adds[$i]['aid'] ?>" readonly>

            <input style="width:0px;height: 0px;text-indent: -99em;border: none;" type="text" id="accepted_by" name="accepted_by" value="<?php echo $all_your_adds[$i]['accepted_by'] ?>" readonly>

            <input type="submit" name="submit" value="Details">
          </form>

        </td>
      </tr>
  <?php } ?>

  </table>
<?php include 'f_footer.php';?>

</body>
</html>