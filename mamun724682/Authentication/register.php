<?php

require_once "includes/config.php";

$username = $password = $confirm_password = $first_name = $last_name = $email ="";
$username_err = $password_err = $confirm_password_err = $first_name_err = $last_name_err = $email_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_first_name = trim($_POST["first_name"]);
    $input_last_name = trim($_POST["last_name"]);
    $input_username = trim($_POST["username"]);
    $input_email = trim($_POST["email"]);
    $input_password = trim($_POST["password"]);
    $input_confirm_password = trim($_POST["confirm_password"]);

    // Validate first_name
    if(empty($input_first_name)){
        $first_name_err = "Please enter your first name.";
    } else{        
        $first_name = $input_first_name;
    }

    // Validate last_name
    if(empty($input_last_name)){
        $last_name_err = "Please enter your last name.";
    } else{        
        $last_name = $input_last_name;
    }

    // Validate username
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } else{
        $sql=mysqli_query($mysqli, "SELECT * FROM users WHERE username='$input_username'");        

        if(mysqli_num_rows($sql)>0){
            $username_err = "This username is already taken.";
        } else{
            $username = $input_username;
        }
    }

    // Validate email
    if(empty($input_email)){
        $email_err = "Please enter your email.";
    } else{
        $sql=mysqli_query($mysqli, "SELECT * FROM users WHERE email='$input_email'");        

        if(mysqli_num_rows($sql)>0){
            $email_err = "This email is already taken.";
        } else{
            $email = $input_email;
        }
    }
    
    // Validate password
    if(empty($input_password)){
        $password_err = "Please enter a password.";     
    } elseif(strlen($input_password) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = $input_password;
    }
    
    // Validate confirm password
    if(empty($input_confirm_password)){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = $input_confirm_password;
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name','$username', '$email', '$hash_password')";

        $result = mysqli_query($mysqli, $insert_sql);

        if ($result) {
            header("location: login.php");
        } else {
            echo 'Something went wrong. Please try again later.';
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="">
                <span class="help-block"><?php echo $first_name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="">
                <span class="help-block"><?php echo $last_name_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>