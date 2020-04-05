<?php 
    include('lib/functions.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        if(delete_user_info($id))
            header("location: http://localhost/phpoopcurd/users.php");
    }

?>