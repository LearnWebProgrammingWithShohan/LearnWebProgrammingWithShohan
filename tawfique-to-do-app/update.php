<?php
	ob_start();
	session_start();
    require_once 'app/classes/Database.php';
    require_once 'app/classes/Task.php';

	$taskObj = new Task();

	if(isset($_POST['update'])){

		$taskname_update   = $_POST['taskname_update'];
		$update_id   	   = $_POST['id'];

		$result = $taskObj->updateTask($taskname_update,$update_id);
		
		if($result){
			$_SESSION['update_msg'] = "Task Updated Successfully";
	        header("location:index.php");
	    }
		    
	}


?>