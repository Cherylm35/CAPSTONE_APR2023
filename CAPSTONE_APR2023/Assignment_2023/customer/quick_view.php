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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:beige;">
   
<?php include 'components/bar.php'; ?>

<section class="quick-view">

   <h1 class="heading">quick view</h1>
<br><br><br>
   <?php
     $pid = $_GET['pid'];
     $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$pid'");
     if(mysqli_num_rows($select_products) > 0){
     while($row = mysqli_fetch_assoc($select_products)){ 
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['image_01']; ?>">
      <div class="row">
         <div class="image-container">
            <div class="main-image">
               <img src="admins/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
            </div>
            <div class="sub-image">
               <img src="admins/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
               <img src="admins/uploaded_img.2/<?php echo $row['image_02']; ?>" alt="">
               <img src="admins/uploaded_img.3/<?php echo $row['image_03']; ?>" alt="">
            </div>
         </div>
         <div class="content">
            <div class="name"><?php echo $row['name']; ?></div>
            <div class="flex">
               <div class="price"><span>RM</span><?php echo $row['price']; ?><span></span></div>
               <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <div class="details"><?php echo $row['details']; ?></div>
            <div class="flex-btn">
               <input type="submit" value="add to cart" class="btn" name="add_to_cart">
               <input class="option-btn" type="submit" name="add_to_wishlist" value="add to wishlist">
            </div>
         </div>
      </div>
   </form>
   <?php
      }}
   ?>

</section>













<?php include 'components/bottom.php'; ?>

<script src="js/script.js"></script>

</body>
</html>