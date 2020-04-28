<?php
  require_once 'core/init.php';

  $user = DB::getInstance()->get('users', array('id', '=', 5));

  print_r($user);
 ?>
