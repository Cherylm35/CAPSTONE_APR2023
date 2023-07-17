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

      <title>ELEC.STORE - ADMINPANEL | RESET PASSWORD</title>
   </head>
   <body>
      <div class="login">
         <img src="https://i.pinimg.com/originals/5a/82/09/5a8209e560031605a8d6393985667e92.jpg" alt="login image" class="login__img">

         <form method="post" action="" class="login__form">
            <h1 class="login__title">Reset Password</h1>
            <div class="login__content">
            <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="password" required data-parsley-type="pwd" data-parsley-trigger="keyup" class="login__input" id="login-pass" placeholder=" " value="<?= $_POST['new_password'] ?? "" ?>" autofocus>
                     <label for="newpassword" class="login__label">New Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
            </div>
            <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" name="cpwd" required data-parsley-type="cpwd" data-parsley-trigger="keyup" class="login__input" id="login-pass2" placeholder=" " value="<?= $_POST['confirm_password'] ?? "" ?>">
                     <label for="password" class="login__label">Confirm Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye2"></i>
                  </div>
               </div>
            </div>

            <button type="submit" name="submit" class="login__button">Submit</button>
         </form>
      </div>
      
      <!--=============== MAIN JS ===============-->
      <script src="../js/login.js"></script>
   </body>
</html>