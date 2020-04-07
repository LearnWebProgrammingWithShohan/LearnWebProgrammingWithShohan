<?php
session_start();
include_once('../../vendor/autoload.php');
use App\Questions\Question;
$question = new Question();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['marks']) && !empty($_POST['unique_id']) ){
        $question->setData($_POST)->update();
    } else{
        $_SESSION['fail'] = 'Fields are required!';
        header('Location: edit.php?unique_id='. $_POST['unique_id'] .'');
    }
}
