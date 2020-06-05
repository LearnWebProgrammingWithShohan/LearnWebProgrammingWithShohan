<?php
require_once 'core/init.php';
if(Input::exists('post')) {
  if(Token::check(Input::get('token'))) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'email' => array('required' => true),
      'password' => array('required' => true)
    ));

    if($validation->passed()) {
      $user = new User();
      $login = $user->login(Input::get('email'), Input::get('password'));
      if($login) {
        Redirect::to('index.php');
      }
    } else {
      foreach($validation->errors() as $error) {
        echo $error . '<br>';
      }
    }
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="" method="post">
       <input type="email" name="email" placeholder="Email">
       <input type="password" name="password" placeholder="Password">
       <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
       <input type="submit" name="" value="login">
     </form>
   </body>
 </html>
