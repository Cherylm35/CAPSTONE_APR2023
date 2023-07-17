
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

      <title>ELEC.STORE - ADMINPANEL | FORGOT PASSWORD</title>
   </head>
   <body>
      <div class="login">
         <img src="https://i.pinimg.com/originals/5a/82/09/5a8209e560031605a8d6393985667e92.jpg" alt="login image" class="login__img">

         <form method="post" id="validate_form" action="" class="login__form">
            <h1 class="login__title">Forgot Password</h1>
            <div class="login__content">
                <h6 class="login__des">Please enter your email</h6>
               
                <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="email" name="email" class="login__input" placeholder=" " value="<?= $_POST['email'] ?? "" ?>">
                     <label for="email" class="login__label">Email</label>
                  </div>
                </div>
            </div>

            <div class="login__check">
               
               <a href="../admins/login.php" class="login__forgot">Back to Login ?</a>
            </div>

            <button type="submit" name="submit"  class="login__button">Reset</button>

         </form>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="../js/login.js"></script>
   </body>
</html>