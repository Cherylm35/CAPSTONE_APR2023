<?php

include '../components/connect.php';

$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];

   $update_profile_name = mysqli_query($conn, "UPDATE `admins` SET name = '$name' WHERE id = '$admin_id'");

   $prev_pass = $_POST['prev_pass'];
   $old_pass = $_POST['old_pass'];
   $new_pass = $_POST['new_pass'];
   $confirm_pass =$_POST['confirm_pass'];

   if(empty($old_pass)){
      $message[] = 'please enter old password!';
   }elseif($old_pass != $prev_pass){
      $message[] = 'old password not matched!';
   }elseif($new_pass != $confirm_pass){
      $message[] = 'confirm password not matched!';
   }else{
      if (!empty($new_pass)){
         $update_admin_pass = mysqli_query($conn, "UPDATE `admins` SET password = '$confirm_pass' WHERE id = '$admin_id'");
         $message[] = 'password updated successfully!';
      }else{
         $message[] = 'please enter a new password!';
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ELEC.STORE - ADMINPANEL | PROFILE</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>
<?php include '../admins/adminheader.php'; ?>
<section class="form-container">

   <form action="" method="post">
      <h3><i class="fa fa-address-card" aria-hidden="true"></i> update profile</h3>
      <input type="hidden" name="prev_pass" value="<?= $row['password']; ?>">
      <input type="text" name="name" value="<?= $row['name']; ?>" required placeholder="Enter your name (as per NRIC)" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="username" value="<?= $row['username']; ?>" required placeholder="Enter your username" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="email" name="email" value="<?= $row['email']; ?>" required placeholder="Enter your email" maxlength="40"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="old_pass" placeholder="Enter old password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" placeholder="Enter new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirm_pass" placeholder="Confirm new password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Update" class="btn" name="submit">
   </form>

</section>












<script src="../js/admin.js"></script>
   
</body>
</html>