<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <style type="text/css">
        form {
            text-align: justify;
        }
    </style>
</head>
<body>
<!--Contact Form-->

<?php
if ( isset( $mess ) == 1 ) {
	echo "Success";
} else {
	echo "";
}
?>

<form action="email_submit.php" method="post">
    <label>Email:&nbsp;</label><input type="text" name="email"><br/>
    <label>Name:&nbsp;</label><input type="text" name="name"><br/>
    <label>Subject:&nbsp;</label><input type="text" name="subject"><br/>
    <label>Message:&nbsp;</label><textarea name="message"></textarea><br/>
    <input type="submit" vlaue="Send">
</form>

<!--End of Contact form-->
</body>
</html>