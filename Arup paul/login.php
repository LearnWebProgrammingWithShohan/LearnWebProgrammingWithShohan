<?php


include 'lib/User.php';
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/lib/Session.php';
 Session::init();
 Session::checkLogin();
?>

<?php

$user = new User();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
   $userLogin = $user->userLogin($_POST);
}


?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" type="image/png" href="/imgs/favicon.png" /> -->
        <title>Login</title>

        <!-- inject:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="bower_components/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="bower_components/themify-icons/css/themify-icons.css">
        <!-- endinject -->

        <!-- Main Style  -->
        <link rel="stylesheet" href="dist/css/main.css">

        <script src="assets/js/modernizr-custom.js"></script>
    </head>
    <body>

        <div class="sign-in-wrapper">
            <div class="sign-container">
                <div class="text-center">
                    <h2 class="logo"><img src="imgs/logo-dark.png" width="130px" alt=""/></h2>
                    <h4>Login to Admin</h4>
                </div>

                
                <?php
                 if(isset($userLogin )){
                     echo $userLogin ; 
                 }
                ?>

                <form class="sign-in-form" role="form" action="#" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                     <div class="form-group">
                        <select class="form-control"  name="role" id="">
                            <option value="">Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Moderator</option>
                            <option value="3">Editor</option>
                        </select>
                    </div>
                  
                    <button type="submit" name="login" class="btn btn-info btn-block">Login</button>
                    <div class="text-center help-block">
                        <a href="forgot-password.php"><small>Forgot password?</small></a>
                        <p class="text-muted help-block"><small>Do not have an account?</small></p>
                    </div>
                    <a class="btn btn-md btn-default btn-block" href="registration.php">Create an account</a>
                </form>
                <div class="text-center copyright-txt">
                    <small>Arup Paul</small>
                </div>
            </div>
        </div>

        <!-- inject:js -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
        <script src="bower_components/autosize/dist/autosize.min.js"></script>
        <!-- endinject -->

        <!-- Common Script   -->
        <script src="dist/js/main.js"></script>

    </body>
</html>
