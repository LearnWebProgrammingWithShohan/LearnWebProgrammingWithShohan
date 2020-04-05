<?php 

function __autoload($className){
    if (file_exists($className . '.php')) 
    {
        require_once $className . '.php';
        return true;
    }
    return false;
}

use Validators\UserValidator;

  if(isset($_POST['submit'])){
    // validate entries
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
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
      <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>">
      <div class="error">
        <?php echo $errors['username'] ?? '' ?>
      </div>

      <label>Email: </label>
      <input type="text" name="email">
      <input type="submit" value="submit" name="submit" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
      <div class="error">
        <?php echo $errors['email'] ?? '' ?>
      </div>

    </form>
  </div>

</body>
</html>