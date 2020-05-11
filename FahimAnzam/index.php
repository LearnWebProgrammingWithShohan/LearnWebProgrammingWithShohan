<?php require_once "includes/header.php"?>

<?php

    if (isset($_POST['register'])) {

        $user_name = $database->escapeString($_POST['user_name']);
        $email = $database->escapeString($_POST['email']);
        $password = $database->escapeString($_POST['password']);
        $confirm_password = $database->escapeString($_POST['confirm_password']);

        $user = new User();
        $user->user_name = $user_name;
        $user->email = $email;
        $user->password = $password;
        $user->confirm_password = $confirm_password;
        
        if ($user->create()) {
            $_SESSION['success'] = "Successfully Signed Up";
            header('location: login.php');
        }

    }

?>


<div class="container" style="width: 50%;margin: 0 auto;">  

    <?php if (isset($_SESSION['error'])): ?>
        <h4>
            <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']); 
            ?>
        </h4>
    <?php endif; ?>

    <h2>Sign Up Here</h2>
    <form action="" method="POST">
        <div>
            <label for="user_name">User Name:</label>
            <input type="text" name="user_name" placeholder="Enter your user name" value="<?php echo isset($_POST['user_name']) ? $_POST['user_name'] : ''; ?>">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        </div>

        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" placeholder="Enter your password again">
        </div>

        <input type="submit" value="Sign Up" name="register">
    </form>

    <p>Already have an account? <a href="login.php">Sign In</a></p>
</div>


<?php require_once "includes/footer.php"?>
