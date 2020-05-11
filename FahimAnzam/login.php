<?php require_once "includes/header.php"?>

<?php

    if (isset($_POST['login'])) {

        $email = $database->escapeString($_POST['email']);
        $password = $database->escapeString($_POST['password']);

        $verify_user = User::verifyUser($email, $password);

        if ($verify_user) {
            header('location: dashboard.php');
        } else {
            $_SESSION['error'] = "It seems you are a outsider! :/";
        }

    }

?>


<div class="container" style="width: 50%;margin: 0 auto;">

    <?php if (isset($_SESSION['success'])): ?>
        <h4>
            <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
        </h4>
    <?php endif;?>

    <?php if (isset($_SESSION['error'])): ?>
        <h4>
            <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
        </h4>
    <?php endif;?>

    <h2>Sign In</h2>
    <form action="" method="POST">

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        </div>

        <input type="submit" value="Sign In" name="login">
    </form>

    <p>Don't have an account? <a href="index.php">Sign Up</a></p>
</div>


<?php require_once "includes/footer.php"?>