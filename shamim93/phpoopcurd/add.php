<?php
        include('lib/functions.php');
        
        if(isset($_POST['email'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            
            $result = add_user_info($name,$email);
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <base href="http://localhost/phpoopcurd/">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container-fluid">
    
    <?php include('inc/header.php'); ?>


    <section>
    
    <?php if(isset($result)){ ?>
    <div class='alert alert-secondary' role='alert'>
            <?php echo $result['message'] ;?>
    </div>
    <?php } ?>
    
    <h2>Add User info</h2>

    <form action="add.php" method="POST">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </section>
    <footer>
    
    </footer>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>