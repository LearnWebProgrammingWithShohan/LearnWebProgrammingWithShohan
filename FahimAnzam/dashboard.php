<?php require_once "includes/header.php"?>

<?php 
    if (!$session->isSigned()) { 
        header('location: login.php'); 
    } 
?>

<div class="container" style="width: 50%;margin: 0 auto;">
    
    <h1>Hi, You are in dashboard now!!!!</h1>

    <h1><?php echo $_SESSION['user_id'] ?></h1>

    <a href="logout.php">Log Out :(</a>

</div>

<?php require_once "includes/footer.php"?>
