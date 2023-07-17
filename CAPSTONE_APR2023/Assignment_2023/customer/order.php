<?php
require 'components/connect.php';

if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};
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
  left: 400px;
  top: -550px;
  position: relative;
  font-size: 23px;
}
p3{
  left: 211px;
  top: -450px;
  position: relative;
  font-size:23px;
}
p4{
  left: 163px;
  top: -350px;
  position: relative;
  font-size:23px;
}
.box{
top: 670px;
border:0px;
left:230px;
position:absolute;
}
</style>
<body style="background-color:beige;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
<?php include 'components/bar.php';?>
<br><br><br>
<a3><a href="home.php" alt="" style="color:black;">Home </a></a3><a3>/<a href="account.php" alt="" style="color:black;"> My account </a></a3><a3>/ Orders</a3>
<div class="img">
<img src="account.png" alt="Girl in a jacket" width="50" height="50" position="10 10">
</div>
<div class="vl"></div>
<p><a href="account.php" style="color:black;">Account Details</a></p>
<p><a href="wishlist.php" style="color:black;">Wishlist</a></p>
<p>Orders</p>
<p><a href="logout.php" style="color:black;">Log out</a></p>
<div class="box-container">
<?php
   if($user_id == ''){
      echo '<p class="empty">please login to see your orders</p>';
   }else{
    $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'");
    date_default_timezone_set("Asia/Kuala_Lumpur");
    if(mysqli_num_rows($select_orders) > 0){
    while($row = mysqli_fetch_assoc($select_orders)){ 
?>
<div class="box">
   <p>placed on : <span><?= date('d-m-Y');; ?></span></p>
   <p>name : <span><?= $row['name']; ?></span></p>
   <p>email : <span><?= $row['email']; ?></span></p>
   <p>number : <span><?= $row['number']; ?></span></p>
   <p>address : <span><?= $row['address']; ?></span></p>
   <p>payment method : <span><?= $row['method']; ?></span></p>
   <p>your orders : <span><?= $row['total_products']; ?></span></p>
   <p>total price : <span>RM<?= $row['total_price']; ?>/-</span></p>
   <p> payment status : <span style="color:<?php if($row['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $row['payment_status']; ?></span> </p>
</div>
<?php
   }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   }
?>

</div>


<?php include 'components/bottom.php'; ?>

<script src="js/script.js"></script>

</body>
</html>