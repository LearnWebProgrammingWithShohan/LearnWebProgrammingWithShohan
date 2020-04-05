<?php include('server.php');
  //without reg or logged in can't access $this

  if (empty($_SESSION['username'])) {
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration and login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="header">

     <h2>Welcome Home </h2>
   </div>

   <div class="content">
     <?php if(isset($_SESSION['success'])): ?>
       <div class="error success">
         <h3><?php echo $_SESSION['success'];
         unset($_SESSION['success']);
         ?></h3>
       </div>
     <?php endif?>

     <?php if(isset($_SESSION['username'])): ?>
       <p>What's up <strong><?php echo $_SESSION['username']?>!</strong> </p> <?php endif?>
       <p> <a href="index.php?logout='1'"> Want to logout? Will miss you :( </a> </p>
   </div>

  </body>
</html>
