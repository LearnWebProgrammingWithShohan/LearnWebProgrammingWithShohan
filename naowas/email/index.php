<?php
include 'functions.php';
$insert_mail=new Mysql_Connection();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Email</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php

    if(isset($_POST['sendmail'])){
    $mail_id = $_POST['email'];
    $mail_sub = $_POST['subject'];
    $mail_body = $_POST['message'];
   
   $sent_mail_online = mail($_POST['email'], $_POST['subject'], $_POST['message']);
   $sql=$insert_mail->sent_mail_db($mail_id,$mail_sub,$mail_body);


   if ($sent_mail_online && $sql ){    
            echo "<script>alert('Mail has been sent')</script>";
            echo"<script>window.open('index.php','_self')</script>";
   }  
     else {
             die("Database connection error: " . mysqli_connect_error());
          }

    }

?>

<body>
    <div class="contact-clean">
        <form action="index.php" method="post" enctype="multipart/form-data" >
            <h2 class="text-center">Send E-mail</h2>
			 <div class="form-group"><input class="form-control is-invalid" type="email" name="email" placeholder="Email"><small class="form-text text-danger">Please enter a correct email address.</small></div>
            <div class="form-group"><input class="form-control" type="text" name="subject" placeholder="Subject"></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="14"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit" name="sendmail">send </button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>