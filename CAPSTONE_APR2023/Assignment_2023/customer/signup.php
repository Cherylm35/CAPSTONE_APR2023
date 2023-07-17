<?php
include 'components/connect.php';
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else{
  $user_id = '';
};

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $cpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
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
                     <input type="text" name="name" class="login__input" placeholder=" " required >
                     <label for="name" class="login__label">Name</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="username" class="login__input" placeholder=" " required >
                     <label for="username" class="login__label">UserName</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="text" name="email" class="login__input" placeholder=" " required >
                     <label for="email" class="login__label">Email</label>
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

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="cpassword" class="login__input" id="login-pass2" placeholder=" " required >
                     <label for="cpassword" class="login__label">Confirm Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye2"></i>
                  </div>
               </div>

            </div>

            <div class="login__check">
               <div class="login__check-group">
                  <a href="signin.php" class="login__forgot">Back to Sign In</label>
               </div>
            </div>

            <button type="submit" name="submit" class="login__button">Register</button>
         </form>
      </div>

      <script src="../js/login.js"></script>
   </body>
</html>