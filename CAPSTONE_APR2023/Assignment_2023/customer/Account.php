<?php
require 'components/connect.php';
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};

if(isset($_POST['submit'])){
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
        $update_user_pass = mysqli_query($conn, "UPDATE `tb_user` SET password = '$confirm_pass' WHERE id='$user_id'");
        $message[] = 'password updated successfully!';
     }else{
        $message[] = 'please enter a new password!';
     }
  }
  
}
include 'components/whatsapp.php';
?>
<html>
<style>
a3 {
  left: 50px;
  top: 50px;
  position: relative;
  font-size: 20px;
}
.img{
top:90px;
left:95px;
position: relative;
}
.vl {
  border-left: 3px solid black;
  height: 600px;
  left:300px;
  bottom:-20px;
  position:relative;
}
p {
  left: 100px;
  top: -500px;
  position: relative;
  font-size: 16px;
}
p1{
  left: 500px;
  top: -650px;
  position: relative;
  font-size: 23px;
}
p2{
  left: 650px;
  top: -650px;
  position: relative;
  font-size: 23px;
}
p3{
  left: 390px;
  top: -690px;
  position: relative;
  font-size:23px;
}
.table1 {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  position:absolute;
  left: 390px;
  top: 270px;
  border: 0px solid black;
  font-size:17px;
}
</style>
<body style="background-color:beige;">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php include 'components/bar.php';?>
<br><br><br>
<a3><a href="home.php" alt="" style="color:black;">Home </a></a3><a3>/<a href="account.php" alt="" style="color:black;"> My account </a></a3><a3>/ Account Details</a3>
<div class="img">
<img src="account.png" alt="Girl in a jacket" width="50" height="50" position="10 10">
</div>
<div class="vl"></div>
<p>Account Details</p>
<p><a href="wishlist.php" style="color:black;">Wishlist</a></p>
<p><a href="order.php" style="color:black;">Orders</a></p>
<p><a href="logout.php" style="color:black;">Log out</a></p>
<form action="" method="post" onSubmit="return valid();">
<p3>Change Password</p3>
<table class="table1">
<tr>
  <th>Current Password</th>
</tr>
<tr>
  <td><input type="password" name="old_pass" id="old_pass"></td>
</tr>
<tr>
<th>New Password</th>
</tr>
<tr>
  <td><input type="password" name="new_pass" id="new_pass"></td>
</tr>
<tr>
<th>Confirm Password</th>
</tr>
<tr>
  <td><input type="password" name="confirm_pass" id="confirm_pass"></td>
</tr>
<tr>
<td><br><input type="submit" name="submit" value="Change Password"></td>
</tr>
</table>
</form>
<?php include 'components/bottom.php';?>
</body>
</html>

