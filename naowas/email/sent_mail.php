<?php
include 'functions.php';
$sent_mail=new Mysql_Connection();
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

<body>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Email ID</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  
  <?php
  $sql=$sent_mail->sentmail_db();
  $count=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
 
  <tbody>
    <tr>
      <td><?php echo $count;?></td>
      <td><?php echo $row['email_id'];?></td>
      <td><?php echo $row['sub'];?></td>
	  <td><?php echo $row['message_body'];?></td>
    </tr>
  </tbody>
  <?php $count=$count+1;} ?>
</table>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>