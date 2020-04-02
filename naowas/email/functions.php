<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'email_db');
class Mysql_Connection
{

    function __construct()

    {
        $mysql = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->connect_db = $mysql;
        if (mysqli_connect_errno())
        {
            echo "Database connection error: " . mysqli_connect_error();
        }
    }
    public function sent_mail_db($mail_id, $mail_sub, $mail_body)
    {
        $result = mysqli_query($this->connect_db, "insert into send_mail(email_id, sub, message_body)
        values('$mail_id','$mail_sub','$mail_body')");

        return $result;
    }

    public function sentmail_db()
	 {
	 $result=mysqli_query($this->connect_db,"select * from send_mail");
	 
	 return $result;
	 }
}
?>
