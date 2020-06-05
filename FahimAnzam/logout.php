<?php

require_once "includes/header.php";

if (!$session->isSigned()) { 
    header('location: login.php'); 
} 

$session->logout();
header('location: login.php');