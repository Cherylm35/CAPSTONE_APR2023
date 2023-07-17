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
p{
  font-size:37px; 
  color:orange;
  margin-top:170px;
  margin-left:210px;
}
p1{
  font-size:17px;
  margin-left:190px;
}
.img{
top:-230px;
left:800px;
position: relative;
max-width: 400px;
max-height: 400px;
}
p3{
  font-size:37px; 
  color:orange;
  margin-left:210px;
}
</style>
<body style="background:beige;">
<?php include 'components/bar.php';?>
<p><b>About Us</b></p>
<p1>Provides customers with an easy-to-use interface to select products<br>add them to cart, and complete their purchase.It is designed to simplify the order<br>management process, making it more efficient and less error-prone.In order to achieve<br>these goals, the system needs to solve many problems such as simple operation, friendly<br>interface, safe payment and refund, real-time and smooth inventory management, and<br>guaranteed system security.</p1>
<div class="img">
<img src="https://media.istockphoto.com/id/612248188/photo/electrical-tools-and-cables-used-in-electrical-installations.jpg?s=612x612&w=0&k=20&c=HZYqsuQOL_ktpejF7-2b4Po43uyuG1VaHJ5eu522R84=" alt="">
</div>
<p3>Where we are?</p3>
<center>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63745.8377502102!2d101.5803093602473!3d3.0639526930828964!2m3!1f0!2
f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4b5429c55541%3A0xbf1b73c0129cabb1!2sEner-sis%20Electrical%20
Sdn%20Bhd!5e0!3m2!1sen!2smy!4v1688423871437!5m2!1sen!2smy" width="770" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
referrerpolicy="no-referrer-when-downgrade"></iframe>
</center>
<?php include 'components/bottom.php';?>
</body>
</html>