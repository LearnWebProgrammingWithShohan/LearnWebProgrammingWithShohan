<?php
  session_start();
  $username = "";
  $email = "";
  $errors =array();
  //CONNECT TO DB

  $db = mysqli_connect('localhost','root','','registrate');

  //IF REGISTER IS CLICKED.. actually done.. but the name is set to REGISTER

  if (isset($_POST['register'])) {
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
      $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

      if (empty($username)) {
        array_push($errors, "Don't feel shy! Tell us your name!");
      }
      if (empty($email)) {
        array_push($errors, "We won't send you mail daily! Come on!");
      }
      if (empty($password_1)) {
        array_push($errors, "Trust Us it's safe :D ");
      }
      if ($password_1 != $password_2) {
        array_push($errors, "Oops! you type a wrong pass in the confirmation :( ");
      }
      //IF ALL OKAY THEN INSERT (REMEMBER TO ENCRYPT PASSWORD)
      if ($errors == 0) {
        $password = md5($password_1);
        $sql = "INSERT INTO user (username,email,password)
                   VALUES('$username','$email','$password')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now a part of us";
        header('location:index.php');
      }
  }

  //LOG IN

  if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if (empty($username)) {
      array_push($errors, "Don't feel shy! Tell us your name!");
    }
    if (empty($password)) {
      array_push($errors, "Hey, don't tell me you forgot the pass! ");
    }
//comparing
    if (count($errors) == 0) {
      $password = md5($password); //encrypt first
      $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) == 1) {
        // LOG USER IN
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Hello there!";
        header('location:index.php');
      }else{
        array_push($errors, "Never saw you before, Forgot pass?");
      }
    }


  }


  //IF WANTS TO LOG OUT

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
  }

?>
