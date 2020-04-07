<?php

namespace App\Questions;
use App\database\Database;
class Question extends Database{
    
    public $name        = '';
    public $email       = '';
    public $question    = '';
    public $answer      = '';
    public $marks      = '';
    public $unique_id   = '';


    public function __construct(){
        parent::__construct();
    }

    public function setData($data = '')
    {   
        if(array_key_exists('name', $data)){
            $this->name = $data['name'];
        }
        if(array_key_exists('email', $data)){
            $this->email = $data['email'];
        }
        if(array_key_exists('answer', $data)){
            $this->answer = $data['answer'];
        }
        
        if(array_key_exists('question', $data)){
            $this->question = $data['question'];
        }

        if(array_key_exists('unique_id', $data)){
            $this->unique_id = $data['unique_id'];
        }
        if(array_key_exists('marks', $data)){
            $this->marks = $data['marks'];
        }

        return $this;
    }


    public function store(){
        $sql = "INSERT INTO user_info (question,name,email,detail,uq_id)
        VALUES(:question, :name,:email,:detail,:uq_id)";
        $stmt = $this->prepare($sql);
        $insert = $stmt->execute(array(
            ':question' => $this->question, 
            ':name'     => $this->name,
            ':email'    => $this->email,
            ':detail'   => $this->answer,
            ':uq_id'    => uniqid()
        ));
        if($insert){
            $_SESSION['msg'] = 'Successfully Added!';
            header('Location: index.php');
        }else{
            "not exec";
        }
    }

    public function index(){
        $sql = "SELECT * FROM user_info WHERE marks IS NOT NULL";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function allUser(){
        $sql = "SELECT * FROM user_info";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function show(){
        $sql  = "SELECT * FROM user_info WHERE uq_id='$this->unique_id'";
		$stmt = $this->prepare($sql);
		$stmt->execute();
		$data = $stmt->fetch();
		return $data;
    }

    public function update(){
        $sql = "UPDATE user_info SET marks=:mark WHERE uq_id=$this->unique_id";
        $stmt = $this->prepare($sql);
        $updated = $stmt->execute(array(
            ':mark' => intval($this->marks)
        ));
        if($updated == true){
            $_SESSION['msg'] = "Succesfully updated";
			header('Location:index.php');
        } else{
            $_SESSION['fail'] = "Something Wrong!!";
			header('Location:edit.php?unique_id='. $this->unique_id .'');
        }
    }

}