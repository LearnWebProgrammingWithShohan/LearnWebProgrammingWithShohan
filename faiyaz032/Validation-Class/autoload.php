<?php
function __autoload($className){
    if (file_exists($className . '.php')) 
    {
        require_once $className . '.php';
        return true;
    }
    return false;
}