<?php include('server.php');?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Registration and login</title>
     <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <div class="header">
      <h2>Register</h2>
    </div>
      <form action="register.php" method="post">
        <?php include('errors.php');?>
          <div class="input-group ">
            <label>Username</label>
              <input type="text" name="username" value="<?php echo $username?>">
          </div>

          <div class="input-group">
            <label>E-mail</label>
              <input type="text" name="email" value="<?php echo $email?>">
          </div>

          <div class="input-group">
            <label>Password</label>
              <input type="password" name="password_1" >
          </div>

          <div class="input-group">
            <label>Confirm Password</label>
              <input type="password" name="password_2" >
          </div>
          <div class="input-group">
            <button type="submit" name="register" class="btn">Done?</button>
          </div>

      </form>

      <p>Are you one of us? <a href="login.php">Login Here!</a> </p>

   </body>
 </html>
