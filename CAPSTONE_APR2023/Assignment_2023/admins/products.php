<?php

include '../components/connect.php';
if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $details = $_POST['details'];
   $price = $_POST['price'];

   $image_01 = $_FILES['image_01']['name'];
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img.1/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img.2/'.$image_02;

   $image_03 = $_FILES['image_03']['name'];
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $image_folder_03 = 'uploaded_img.3/'.$image_03;

   if(empty($name) || empty($details) || empty($price) || empty($image_01) || empty($image_02) || empty($image_03)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO products(name,details, price, image_01, image_02, image_03) VALUES('$name', '$details', '$price','$image_01','$image_02','$image_03')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($image_tmp_name_01, $image_folder_01);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);
         $message[] = 'New product added successfully';
      }else{
         $message[] = 'Could not add the product';
      }
   }

}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:products.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ELEC.STORE - ADMINPANEL | PRODUCTS</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/adminstyle.css">

</head>
<body>

<?php include '../admins/adminheader.php'; ?>

<section class="add-products">

   <h1 class="heading"><i class="fa fa-plus-circle" aria-hidden="true"></i> product</h1>

   <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Product Name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="Enter product name" name="name">
         </div>
         <div class="inputBox">
            <span>Product Price (required)</span>
            <input type="number" min="0" class="box" required max="9999999999" placeholder="Enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
         </div>
        <div class="inputBox">
            <span>Image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 02 (required)</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
            <span>Image 03 (required)</span>
            <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
         <div class="inputBox">
            <span>Product Details (required)</span>
            <textarea name="details" placeholder="Enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
      </div>
      <?php
if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}
?>
   <input type="submit" value="add product" class="btn" name="add_product">
   </form>

</section>

<section class="show-products">
   <h1 class="heading">product catalog</h1>
   <div class="box-container">
   <?php
   $select = mysqli_query($conn, "SELECT * FROM products");
   while($row = mysqli_fetch_assoc($select)){ 
   ?>
   <div class="box">
      <img src="uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
      <div class="name"><?php echo $row['name']; ?></div>
      <div class="name"><span>RM<?php echo $row['price']; ?></span></div>
      <div class="details"><span><?php echo $row['details']; ?></span></div>
      <div class="flex-btn">
         <a href="../admins/editproducts.php?get=<?php echo $row['id']; ?>" class="option-btn">edit</a>
         <a href="../admins/products.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php } ?>
   </div>

</section>








<script src="../js/admin.js"></script>
   
</body>
</html>