<?php
require_once 'core/init.php';
  if(Input::exists('post')) {
    if(Token::check(Input::get('token'))) {
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'name' => array(
          'required' => true,
          'min'      => 2,
          'max'      => 20,
        ),
        'email' => array(
          'required' => true,
          'unique'   => 'users'
        ),
        'password' => array(
          'required' => true,
          'min'      => 6
        ),
        'password_again' => array(
          'required' => true,
          'matches'  => 'password',
        )
      ));

      if($validation->passed()) {
        $user = new User();

        try {
          $user->create(array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'groups' => 1
          ));

          Session::flash('home', 'You registered successfully!');
          Redirect::to('index.php');
        } catch(Exception $e) {
          die($e->getMessage());
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
       <input type="text" name="name" placeholder="Your Name">
       <input type="email" name="email" placeholder="Your Email">
       <input type="password" name="password" placeholder="Your Password">
       <input type="password" name="password_again" placeholder="Confirm Password">
       <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
       <input type="submit" value="register">
     </form>
   </body>
 </html>
