<?php
include 'components/connect.php'; 
include 'components/whatsapp.php';  
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};
include 'components/wishlist_cart.php';
?>
<html>
<head>
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<style>
.mySlides {display: none}
img {vertical-align: middle;}

p{
   position:relative;
   text-align:center;
   font-size:20px;
}
.slideshow-container {
  max-width: 770px;
  max-height: 770px;
  position: relative;
  margin: auto;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #1d1d1d;
}

.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body style="background-color:beige;">
<?php include 'components/bar.php';?>
<br><br><br><br><br><br><br><br><br>
<div class="slideshow-container">
<div class="mySlides fade">
  <a href="product.php" alt=""><img src="https://pioneerhardwares.com/wp-content/uploads/2022/06/Electrical-Supplies-in-Ruaka.webp" style="width:100%; height:370px;"></a>
  <div class="text">Shop now</div>
</div>

<div class="mySlides fade">
<a href="aboutus.php" alt=""><img src="https://www.thervgeeks.com/wp-content/uploads/2022/05/rv-electrical-supplies-featured-image-728x410.jpg" style="width:100%; height:370px;"></a>
  <div class="text">Are you ready to know us!</div>
</div>

<div class="mySlides fade">
<a href="aboutus.php" alt=""><img src="https://img.freepik.com/premium-photo/various-electrical-supplies-wooden-table-repair-electrical-equipment-home-with-your-own-hands-getting-ready-repair-wires-high-quality-photo_373520-310.jpg" style="width:100%; height:370px;" ></a>
  <div class="text">Our shop</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<br><br>
<div class="products">

   <h1 class="heading">Products</h1>

   <div class="box-container">

   <?php
      $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($row = mysqli_fetch_assoc($select_product)){
   ?>
      <form method="post" class="box" action="">
      <input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
      <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?php echo $row['id']; ?>" class="fas fa-eye"></a>
      <img src="admins/uploaded_img.1/<?php echo $row['image_01']; ?>" alt="">
      <div class="name"><?php echo $row['name']; ?></div>
      <div class="flex">
         <div class="price"><span>RM</span><?php echo $row['price']; ?><span></span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      </form>
      <?php }   }?>
   </div>
</div>
<?php include 'components/bottom.php';?>
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html> 