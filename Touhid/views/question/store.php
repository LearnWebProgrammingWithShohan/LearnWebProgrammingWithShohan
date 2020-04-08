<?php
include_once('../../vendor/autoload.php');
use App\Questions\Question;
$question = new Question();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['answer']) && !empty($_POST['question']) ){
        $question->setData($_POST)->store();
    } else{
        $_SESSION['fail'] = 'Fields are required!';
        header('Location: create.php');
    }
}
