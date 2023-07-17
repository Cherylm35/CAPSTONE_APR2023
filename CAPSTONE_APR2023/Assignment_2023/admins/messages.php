<?php

include '../components/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = mysqli_query($conn, "DELETE FROM `messages` WHERE id = '$delete_id'");
   header('location:messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>

<?php include '../admins/adminheader.php'; ?>

<section class="contacts">

<h1 class="heading">messages</h1>

<div class="box-container">

   <?php
            $select_messages = mysqli_query($conn, "SELECT * FROM messages");
            if(mysqli_num_rows($select_messages) > 0){
            while($row = mysqli_fetch_assoc($select_messages)){ 
   ?>
   <div class="box">
   <p> user id : <span><?php echo $row['user_id']; ?></span></p>
   <p> name : <span><?php echo $row['name']; ?></span></p>
   <p> email : <span><?php echo $row['email']; ?></span></p>
   <p> number : <span><?php echo $row['number']; ?></span></p>
   <p> message : <span><?php echo $row['message']; ?></span></p>
   <a href="messages.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
   ?>

</div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>