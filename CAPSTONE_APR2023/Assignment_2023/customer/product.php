<?php
include 'components/connect.php';
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';
include 'components/whatsapp.php';
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<style>
P{
    position:absolute;
    left:77px;
    top:130px;
    font-size:23px;
}
p1{
    position:absolute;
    left:60px;
    top:180px;
    font-size:23px;
}
p2{
    position:absolute;
    left:65px;
    top:230px;
    font-size:19px;
}
p3{
    position:absolute;
    left:60px;
    top:280px;
    font-size:19px;
}
</style>
<body style="background-color:beige;">
<?php include 'components/bar.php';?>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
<br><br><br><br><br><br><br><br>
<section class="products">
<center><h1 class="heading">Products</h1></center>
<div class="box-container">
<?php
$select = mysqli_query($conn, "SELECT * FROM products");
if(mysqli_num_rows($select) > 0){
while($row = mysqli_fetch_assoc($select)){ 
?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?php echo $row['id']; ?>" class="fas fa-eye"></a>
      <img src="admins/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="" style="width:400px; height:200px;">
      <div class="name"><?php echo $row['name']; ?></div>
      <div class="flex">
         <div class="price"><span>RM</span><?php echo $row['price']; ?></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php }}else{
      echo '<p class="empty">no products found!</p>';
   }?>
</div>
</section>
<?php include "components/bottom.php";?>

<script src="js/script.js"></script>
</body>
</html>
