<?php
include 'Database.php';


$add = new Database;
//--add
if(isset($_POST['submit'])){

   // validation to be added

   $title = $_POST['title'];
   $details = $_POST['details'];
   $assign_to = $_POST['assign_to'];
   $created_at = date('Y-m-d');
   $status = "Active";

  $qry = "INSERT INTO tasks(title,details,assign_to,created_at,status) values('$title','$details','$assign_to','$created_at','$status') ";

  $insert = $add->execute($qry);

  if($insert){
  	  header("Location: index.php?msg=".urlencode('Task added successfull'));
  	}else{
  		header("Location: index.php?msg=".urlencode('Task added failed'));
  	}



}

//----update

if(isset($_POST['update'])){

	// input validation to be set

	$id = $_POST['id'];

	$title = $_POST['title'];
	$details = $_POST['details'];
	$assign_to = $_POST['assign_to'];
	$status = $_POST['status'];

	 // update db

	//print_r($_POST);

	$qry ="UPDATE tasks SET title ='$title', details ='$details', assign_to ='$assign_to', status ='$status' WHERE id ='$id' ";

	$db = new Database;

	$sts = $db->execute($qry);

	if($sts){

		header("Location: index.php?msg=".urlencode('Task has been update'));

	}else{

		header("Location: edit.php?msg=".urlencode('Task update failed'));
	}
	
}

// delete

if(isset($_POST['delete'])){

	$id = $_POST['id'];

	$qry = "DELETE FROM tasks WHERE id='$id'";


	$db = new Database;

	$sts = $db->execute($qry);

	if($sts){

		header("Location: index.php?msg=".urlencode('Task has been deleted'));

	}else{

		header("Location: edit.php?msg=".urlencode('Task delete failed'));
	}

}