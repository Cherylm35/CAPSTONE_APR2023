<?php

include '../components/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $delete_user = mysqli_query($conn, "DELETE FROM tb_user WHERE id = '$id'");
   $delete_orders = mysqli_query($conn, "DELETE FROM orders WHERE user_id = '$id'");
   $delete_messages = mysqli_query($conn, "DELETE FROM messages WHERE user_id = '$id'");
   $delete_cart = mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$id'");
   $delete_wishlist = mysqli_query($conn, "DELETE FROM wishlist WHERE user_id = '$id'");
   header('location:users.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ELEC.STORE - ADMINPANEL | Users Accounts</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>

<?php include '../admins/adminheader.php'; ?>
<section class="accounts">

   <h1 class="heading"><i class="fa fa-users" aria-hidden="true"></i> user accounts</h1>
   <?php
      $select = mysqli_query($conn, "SELECT * FROM tb_user");
         while($row = mysqli_fetch_assoc($select)){ 
   ?>
   <div class="box-container">

   
   <div class="box">
      <p> User ID : <span><?php echo $row['id']; ?></span> </p>
      <p> Username : <span><?php echo $row['name']; ?></span> </p>
      <p> Email : <span><?php echo $row['email']; ?></span> </p>
      <a href="../admins/users.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this account? User related information will also be delete.')" class="delete-btn">Delete</a>
   </div>

<?php }?>
   </div>

</section>




<script src="../js/admin.js"></script>
   
</body>
</html>