<?php

class User {

    public $user_name;
    public $email;
    public $password;
    public $confirm_password;


    //Create a user
    public function create() {

        global $database;

        $sql = "INSERT INTO users (user_name, email, password) 
                VALUES ('$this->user_name', '$this->email', '$this->password')";

        if ($this->validate() && !$this->emailExists()) {
            $database->query($sql);
            return true;
        } else {
            $_SESSION['error'] = "something is not right!";
            return false;
        }

    }


    //Validate user input
    private function validate() {

        if (empty($this->user_name) || $this->user_name == '') {
            return false;
        } 
        else if (empty($this->email) || $this->email =='') {
            return false;
        }
        else if (empty($this->password) || $this->password == '') {
            return false;
        }
        else if (empty($this->confirm_password) || $this->confirm_password == '') {
            return false;
        } 
        else if ($this->password !== $this->confirm_password) {
            return false;
        } 
        else {
            return true;
        }
    }


    //Check if the user email already exists
    private function emailExists() {
        
        global $database;

        $sql = "SELECT * FROM users WHERE email = '{$this->email}'";
        $result = $database->query($sql);

        if ($result->num_rows) {
            return true;
        } else {
            return false;
        }

    }


    //Verify User
    public static function verifyUser($email, $password) {

        global $database;

        $sql = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
        $result = $database->query($sql);

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }

    }

}

