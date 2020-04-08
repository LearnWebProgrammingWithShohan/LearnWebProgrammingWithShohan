<?php

    namespace App\Database;
    use PDO;

    class Database extends PDO{

        private $dsn        = 'mysql:host=localhost;dbname=questions';
        private $dbuser     = 'root';
        private $dbpass     = '';

        public function __construct(){
            try{
                parent::__construct($this->dsn, $this->dbuser, $this->dbpass);
                if(!isset($_SESSION)){
                    session_start();
                }
            } catch(PDOException $e){
                echo 'Error' . $e->getMessage();
            }
        }


    }

