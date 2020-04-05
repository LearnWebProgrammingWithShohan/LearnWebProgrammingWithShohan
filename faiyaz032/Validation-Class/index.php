<?php 

  if(isset($_POST['submit'])){
    // validate entries
    echo 'form submitted';
  }

?>

<html lang="en">
<head>
  <title>User Validation</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
  <div class="new-user">
    <h2>Create a new user</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

      <label>Username: </label>
      <input type="text" name="username">

      <label>Email: </label>
      <input type="text" name="email">

      <input type="submit" value="submit" name="submit">

    </form>
  </div>

</body>
</html>