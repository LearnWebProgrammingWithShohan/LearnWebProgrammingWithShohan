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
            $sql = "SELECT * FROM tasks";
            $result = mysqli_query(Database::dbconnect(), $sql);
            return $result;
        }


    }

	

?>