<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){
   $result = mysqli_query($conn, "SELECT * FROM tb_user");
   $row = mysqli_fetch_assoc($result);
   $name = $row['name'];
   $email = $row['email'];
   $number = $_POST['number'];
   $msg = $_POST['msg'];
   $select_message = mysqli_query($conn, "SELECT * FROM `messages` WHERE name = '$name' AND email = '$email' AND number = ''$number'' AND message = '$msg'");
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = mysqli_query($conn, "INSERT INTO `messages`(user_id, name, email, number, message) VALUES('$user_id','$name','$email','$number','$msg')");
      $message[] = 'sent message successfully!';

   }

}

include 'components/whatsapp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="background-color:beige;">
   
<?php include 'components/bar.php'; ?>
<br><br><br><br><br><br>
<section class="contact">
<?php   
   $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id=$user_id");
   $row = mysqli_fetch_assoc($result);
   ?>
   <form action="" method="post">
      <h3>Contact Us</h3>
      <label style="font-size:17px;"><?php echo $row["username"]?></label>
      <br>
      <label style="font-size:17px;"><?php echo $row["email"]?></label>
      <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number" required onkeypress="if(this.value.length == 11) return false;" class="box">
      <textarea name="msg" class="box" placeholder="Please enter your message!" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>
</section>













<?php include 'components/bottom.php'; ?>

<script src="js/script.js"></script>

</body>
</html>