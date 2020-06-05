<?php
  require_once 'core/init.php';

  if(Session::exists('home')) {
    echo Session::flash('home');
  }

  $user = new User();
  if($user->isLoggedIn()) {
  ?>
  <p>Hello <a href="#"><?php echo escape($user->data()->name); ?></a>!</p>
  <ul>
    <li><a href="logout.php">Log out</a> </li>
  </ul>
  <?php

  if($user->hasPermission('admin')) {
    echo '<p>You are an administratior!</p>';
  }

} else {
  echo '<p>You need to <a href="login.php">log in</a> or <a href="register.php">register</a></p>';
}
?>
