
<?php

    require_once 'auth.php';

?>


<?php

    $user  = new Auth();
    $msg = '';
    $loginmsg = '';
    $data = '';

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
        // echo 'test'; die();
        // print_r($_POST);die();
      $msg = $user->registration($_POST);


    }

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
        // echo 'test'; die();
        // print_r($_POST);die();
      $data = $user->login($_POST);
      if($data!=''){
        $u = $user->setUser($data);
        $role = $_SESSION['role'];

        $loginmsg = '<h1 style="color:green">Success..!!</h1>';
      }else{
        $loginmsg = '<h1 style="color:red">Failed..!!</h1>';
      }




    }

    if(isset($_GET['logout'])=='true' and session_status()==PHP_SESSION_ACTIVE){

        $l = $user->logout();
       if(session_status()==PHP_SESSION_NONE )
            $data='';
        

    }

?>

<html>

    <head></head>
    <body>

    
    <?php if(session_status()==PHP_SESSION_NONE){ ?>


    <h1>registration</h1>
    
    <?php
        if($msg!=''){
            echo $msg;
        }
    ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" placeholder="name" name="name"><br>
            <input type="text" placeholder="email" name="email"><br>
         
            <input type="password" placeholder="password" name="password"><br>
            <select name="role">
                <option value="1">User</option>
                <option value="2">Manager</option>
            </select>

            
            <br>
            <input type="submit" value="Register" name="register">
        
        </form>

       
        <br></br>

        <h1>Login</h1>
    
    <?php
        // if($loginmsg!=''){
        //     echo $loginmsg;
        // }
    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
   
            <input type="text" placeholder="email" name="email"><br>
         
            <input type="password" placeholder="password" name="password"><br>

            
            <br>
            <input type="submit" value="submit" name="login">
        
        </form>

        <?php 

}elseif(session_status()==PHP_SESSION_ACTIVE){

    if($role == 1){
        echo "User";
    }elseif($role == 2){
        echo "Manager";
    }

    ?>
    
    <h2> Your are logged in </h2>
    <h3>Name: <?php echo $_SESSION['name'] ?></h3>
    <h3>Email: <?php echo $_SESSION['email'] ?></h3>
    
    <a href='index.php?logout=true' >Logout </a>
    
    
    <?php 

}

?>
    </body>

</html>