<?php

include 'components/connect.php';
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:user_login.php');
};

include 'components/wishlist_cart.php';

if(isset($_POST['delete'])){
   $wishlist_id = $_POST['wishlist_id'];
   $delete_wishlist_item = mysqli_query($conn, "DELETE FROM `wishlist` WHERE id ='$wishlist_id'");
}

if(isset($_GET['delete_all'])){
   $delete_wishlist_item = mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = '$user_id'");
   header('location:wishlist.php');
}
include 'components/whatsapp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>wishlist</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style='background-color:beige;'>
   
<?php include 'components/bar.php'; ?>
<br><br><br><br><br><br>
<section class="products">

   <h3 class="heading">your wishlist</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'");
      if(mysqli_num_rows($select_wishlist) > 0){
         while($row = mysqli_fetch_assoc($select_wishlist)){ 
            $grand_total += $row['price'];  
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $row['pid']; ?>">
      <input type="hidden" name="wishlist_id" value="<?= $row['id']; ?>">
      <input type="hidden" name="name" value="<?= $row['name']; ?>">
      <input type="hidden" name="price" value="<?= $row['price']; ?>">
      <input type="hidden" name="image" value="<?= $row['image']; ?>">
      <a href="quick_view.php?pid=<?= $row['pid']; ?>" class="fas fa-eye"></a>
      <img src="admins/uploaded_img.1/<?= $row['image']; ?>" alt="">
      <div class="name"><?= $row['name']; ?></div>
      <div class="flex">
         <div class="price">RM<?= $row['price']; ?></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      <input type="submit" value="delete item" onclick="return confirm('delete this from wishlist?');" class="delete-btn" name="delete">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">your wishlist is empty</p>';
   }
   ?>
   </div>

   <div class="wishlist-total">
      <p>grand total : <span>RM<?= $grand_total; ?></span></p>
      <a href="product.php" class="option-btn">continue shopping</a>
      <a href="wishlist.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from wishlist?');">delete all item</a>
   </div>

</section>

<script src="js/script.js"></script>

</body>
</html>