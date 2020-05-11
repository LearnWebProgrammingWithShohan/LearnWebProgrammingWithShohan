<?php

class Session {

    function __construct() {
        session_start();
    }
   
}

$session = new Session();