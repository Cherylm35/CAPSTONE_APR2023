<?php

include '../components/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}


if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $update_payment = mysqli_query($conn, "UPDATE `orders` SET payment_status = '$payment_status' WHERE id = '$order_id'");
   $message[] = 'payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = mysqli_query($conn, "DELETE FROM `orders` WHERE id ='$delete_id'");
   header('location:orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ELEC.STORE - ADMINPANEL | ORDERS</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>

<?php include '../admins/adminheader.php'; ?>

<section class="orders">

<h1 class="heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Orders</h1>

<div class="box-container">

   <?php
   $select_orders = mysqli_query($conn, "SELECT * FROM `orders`");
   if(mysqli_num_rows($select_orders) > 0){
   while($row = mysqli_fetch_assoc($select_orders)){ 
      date_default_timezone_set("Asia/Kuala_Lumpur");
   ?>
   <div class="box">
      <p> Ordered Date : <span><?php echo date('d-m-Y'); ?></span> </p>
      <p> Name : <span><?= $row['name']; ?></span> </p>
      <p> Phone No. : <span><?= $row['number']; ?></span> </p>
      <p> Address : <span><?= $row['address']; ?></span> </p>
      <p> Total Products : <span><?= $row['total_products']; ?></span></p>
      <p> Total Price : <span>RM<?= $row['total_price']; ?></span> </p>
      <p> Payment Method : <span><?= $row['method']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $row['id']; ?>">
         <select name="payment_status" class="select">
            <option selected disabled><?= $row['payment_status']; ?></option>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
         </select>
        <div class="flex-btn">
         <input type="submit" value="Update" class="option-btn" name="update_payment">
         <a href="../admins/orders.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this order? Order related information will also be delete.');">Delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">No orders available!</p>';
      }
   ?>

</div>

</section>












<script src="../js/admin.js"></script>
   
</body>
</html>