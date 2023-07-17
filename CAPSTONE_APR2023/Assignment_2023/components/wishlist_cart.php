<?php

if($user_id == ''){
   header('location:signin.php');
}else{
   if(isset($_POST['add_to_wishlist'])){
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$pid' AND user_id = '$user_id'");
      if(mysqli_num_rows($check_wishlist_numbers) > 0){
         $message[] = 'already added to wishlist!';
      }else{
         $insert_wishlist =mysqli_query($conn, "INSERT INTO wishlist(user_id, pid, name, price, image) VALUES('$user_id','$pid', '$name','$price','$image')");
         $message[] = 'added to wishlist!';
        }
   }   
}
/*
if(isset($_POST['add_to_cart'])){
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $qty = $_POST['qty'];
      $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$name'");
      if(mysqli_num_rows($check_cart_numbers) > 0){
         $message[] = 'already added to cart!';
      }else{
        $check_wishlist_numbers = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$name'");
         if(mysqli_num_rows($check_wishlist_numbers) > 0){
            $delete_wishlist = mysqli_query($conn, "DELETE * FROM `wishlist` WHERE name = '$name'");
         }
         $insert_cart =mysqli_query($conn, "INSERT INTO cart(pid, name, price, quantity, image) VALUES('$pid', '$name','$price','$qty','$image')");
         $message[] = 'added to cart!';
        }
   } 
*/  
if($user_id == ''){
   header('location:signin.php');
}else{
   if(isset($_POST['add_to_cart'])){
      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      $qty = $_POST['qty'];
      $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$name' AND user_id = '$user_id'");
      if(mysqli_num_rows($check_cart_numbers) > 0){
         $message[] = 'already added to cart!';
      }else{
         $insert_cart =mysqli_query($conn, "INSERT INTO cart(user_id,pid, name, price, quantity, image) VALUES('$user_id','$pid', '$name','$price','$qty','$image')");
         $message[] = 'added to cart!';
        }
   }  
}
?>