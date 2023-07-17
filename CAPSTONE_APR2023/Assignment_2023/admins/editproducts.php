<?php

include '../components/connect.php';

$id = $_GET['get'];

if(isset($_POST['update'])){
   $name = $_POST['name'];
   $price = $_POST['price'];
   $details = $_POST['details'];
   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image_01']['name'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img.1/'.$image_01;
   
   $old_image_02 = $_POST['old_image_02'];
   $image_02 = $_FILES['image_02']['name'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img.2/'.$image_02;

   $old_image_03 = $_POST['old_image_03'];
   $image_03 = $_FILES['image_03']['name'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = 'uploaded_img.3/'.$image_03;


   if(empty($name) || empty($details) || empty($price)|| empty($image_01)|| empty($image_02)|| empty($image_03)){
      $message[] = 'Please fill out all!';    
   }else{
      $update_data = "UPDATE products SET name='$name', details='$details', price='$price', image_01='$image_01', image_02='$image_02', image_03='$image_03'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);
      if($upload){
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);
         header('location:products.php');
      }else{
         $$message[] = 'Please fill out all!'; 
      }

   }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ELEC.STORE - ADMINPANEL | PRODUCT MANAGE</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>
<?php /*include '../admins/adminheader.php'; */?>

<section class="update-product">
<?php
      $select = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$id'");
      if($row = mysqli_fetch_assoc($select)){
   ?>
   <h1 class="heading"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Product</h1>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_image_01" value="<?php echo $row['image_01']; ?>">
      <input type="hidden" name="old_image_02" value="<?php echo $row['image_02']; ?>">
      <input type="hidden" name="old_image_03" value="<?php echo $row['image_03']; ?>">
      <div class="image-container">
         <div class="main-image">
            <img src="uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
         </div>
         <div class="sub-image">
            <img src="uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
            <img src="uploaded_img.2/<?php echo $row['image_02']; ?>" alt="">
            <img src="uploaded_img.3/<?php echo $row['image_03']; ?>" alt="">
         </div>
      </div>
      <span>Product Name</span>
      <input type="text" name="name" required class="box" maxlength="100" placeholder="enter product name" value="<?php echo $row['name']; ?>">
      <span>Product Price</span>
      <input type="number" name="price" required class="box" min="0" max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" value="<?php echo $row['price']; ?>">
      <span>Product Details</span>
      <textarea name="details" class="box" required cols="30" rows="10"><?php echo $row['details']; ?></textarea>
      <span>Product Image 01</span>
      <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>Product Image 02</span>
      <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>Product Image 03</span>
      <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
         <input type="submit" name="update" class="btn" value="Update">
         <a href="../admins/products.php" class="option-btn">Go Back</a>
      </div>
      </form>

</section>
<?php }; ?>












<script src="../js/admin.js"></script>
   
</body>
</html>
