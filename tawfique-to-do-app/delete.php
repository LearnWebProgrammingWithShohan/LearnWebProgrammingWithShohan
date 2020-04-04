<?php
	ob_start();
	session_start();
    require_once 'app/classes/Database.php';
    require_once 'app/classes/Task.php';

	$taskObj = new Task();

    if(isset($_GET['id'])){
    	$del_id = $_GET['id'];

		$message = $taskObj->deleteTask($del_id);
		
		if($message){
			$_SESSION['delete_msg'] = "Task Deleted Successfully";
	        header("location:index.php");
	    }
	    
    }

	
    


?>