<?php
        include('lib/functions.php');

       if(isset($_GET['id'])){
            
            $id = $_GET['id'];

            if(isset($_POST['email'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                
                $status = update_user_info($id,$name,$email);
            }
                        
            $user = get_single_user_info($id);
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
    <?php if(isset($status)){ ?>
    <div class='alert alert-secondary' role='alert'>
            <?php echo $status['message'] ;?>
    </div>
    <?php } ?>

    <h2>Update User info</h2>

    <form action="update.php/<?php echo $id;?>" method="POST">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo $user['name']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $user['email']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>

    </section>
    <footer>
    
    </footer>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>