<?php

include '../components/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $delete_wishlist_item = mysqli_query($conn, "DELETE FROM admins WHERE id = '$id'");
   mysqli_query($conn, "DELETE FROM admins WHERE id = $id");
   header('location:admins.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ELEC.STORE - ADMINPANEL | ADMINS ACCOUNTS</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>

<?php include '../admins/adminheader.php'; ?>

<section class="accounts">

   <h1 class="heading"><i class="fa fa-user-secret" aria-hidden="true"></i> Admin Accounts</h1>

   <div class="box-container">

   <div class="box">
      <p>Create New Admin</p>
      <a href="../admins/registers.php" class="option-btn">Create</a>
   </div>

   <?php
      $select = mysqli_query($conn, "SELECT * FROM admins");
         while($row = mysqli_fetch_assoc($select)){ 
   ?>
   <div class="box">
      <p> admin id : <span><?php echo $row['id']; ?></span> </p>
      <p> admin name : <span><?php echo $row['name']; ?></span> </p>
      <div class="flex-btn">
         <a href="../admins/admins.php?delete=<?= $row['id']; ?>" onclick="return confirm('Delete this account? User related information will also be delete.')" class="delete-btn">Delete</a>
         <?php
            if($row['id'] == $admin_id){
               echo '<a href="../admins/editprofile.php" class="option-btn">Update</a>';
            }
         ?>
      </div>
   </div>
   <?php
         }
   ?>

   </div>

</section>












<script src="../js/admin.js"></script>
   
</body>
</html>