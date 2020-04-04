<?php

    require_once 'Database.php';

	class Task{

        public function insertTask($data){

            $task_name = $data;

            $sql = "INSERT INTO tasks (task_name) VALUES ('$task_name')";
            $result = mysqli_query(Database::dbconnect(), $sql);
            if ($result) {
                $message = "Category save successfully.";
                return $message;
            }
            else{
                $message = "Category not saved.";
                return $message;
            }
        }

        public function showAllTasks(){
            $sql = "SELECT * FROM tasks ORDER BY id DESC";
            $result = mysqli_query(Database::dbconnect(), $sql);
            return $result;
        }

        public function updateTask($upd_taskname,$upd_id){
            
            $sql = " UPDATE tasks SET task_name='$upd_taskname' WHERE id='$upd_id'";
            $result = mysqli_query(Database::dbconnect(),$sql);
            if ($result) {
                $message = "Task udpated successfully.";
                return $message;
            }
            else{
                $message = "Task udpate failed!";
                return $message;
            }

        }

        public function deleteTask($id){
            $sql = "DELETE FROM tasks WHERE id='$id' ";
            $result = mysqli_query(Database::dbconnect(), $sql);
            return $result;
        }

    }

	

?>