<?php
require '../components/connect.php';
if(!empty($_SESSION["id"])){
  header("Location: ../admins/dashboard.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: ../admins/dashboard.php");
    }
    else{
      echo
      "<script> alert('Oops! Invalid password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('Oops! Invalid username or email'); </script>";
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
         <img src="https://i.pinimg.com/originals/5a/82/09/5a8209e560031605a8d6393985667e92.jpg" alt="login image" class="login__img">

         <form method="post" id="validate_form" action="" class="login__form">
            <h1 class="login__title">WELCOME ADMIN</h1>
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

               <a href="../admins/forgotpassword.php" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" name="submit" class="login__button">Login</button>
         </form>
      </div>

      
      <!--=============== MAIN JS ===============-->
      <script src="../js/login.js"></script>
   </body>
</html>