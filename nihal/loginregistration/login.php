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
     <form action="login.php" method="post">
       <?php include('errors.php');?>
         <div class="input-group ">
           <label>Username</label>
             <input type="text" name="username" >
         </div>

         <div class="input-group">
           <label>Password</label>
             <input type="password" name="password" >
         </div>

         <div class="input-group">
           <button type="submit" name="register" class="btn">Let's go!</button>
         </div>

     </form>

     <p>Not one of us? No worries! <a href="register.php">Register Here!</a> </p>

  </body>
</html>
