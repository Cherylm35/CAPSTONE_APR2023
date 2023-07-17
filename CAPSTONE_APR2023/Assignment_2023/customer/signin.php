<?php
include 'components/connect.php';
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};

if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="../css/loginstyle.css">

      <title>ELEC.STORE - ADMINPANEL | LOGIN</title>
   </head>
   <body>
      <div class="login">
         <img src="https://wallpapercave.com/wp/wp11531332.jpg" alt="login image" class="login__img">

         <form method="post" id="validate_form" action="" class="login__form">
            <h1 class="login__title">WELCOME TO Elec.Store</h1>
            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="usernameemail" class="login__input" placeholder=" " required >
                     <label for="email" class="login__label">Username or Email</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="password" class="login__input" id="login-pass" placeholder=" " required >
                     <label for="password" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <input type="checkbox" class="login__check-input">
                  <label for="" class="login__check-label">Remember me</label>
               </div>

               <a href="signup.php" class="login__forgot">Register</a>
            </div>

            <button type="submit" name="submit" class="login__button">Login</button>
         </form>
      </div>

      <script src="../js/login.js"></script>
   </body>
</html>