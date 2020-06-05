<?php

class Session {

    private $user_id;
    public $signed_in;

    function __construct() {
        session_start();
        $this->checkLoginStatus();
    }

    //Get the user login status
    public function isSigned() {

        return $this->signed_in;

    }

    //Login the user
    public function login($user) {

        if ($user) {
            $this->user_id = $_SESSION['user_id'] = $user['id'];
            $this->signed_in = true;
        }

    }

    //Logout the user
    public function logout() {

        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
        session_destroy();

    }

    //Check if the user is logged in or not
    private function checkLoginStatus() {

        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($_SESSION['user_id']);
            $this->signed_in = false;
        }

    }

}

$session = new Session();