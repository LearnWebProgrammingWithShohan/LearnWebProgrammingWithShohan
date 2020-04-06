<?php

use App\controller\TagController;

require_once '../init.php';
    if (isset($_GET['tags'])){
        $tagCon = new TagController();
        $result = $tagCon->save($_GET['tags']);
        if($result){
           $data = [
               'status' => 'success',
               'message' => 'tag inserted successfully',
               'data' => [],
           ];
            header('Content-Type: application/json');
            echo json_encode($data);
        }
        else{
            header('Content-Type: application/json');
            $data = [
                'status' => 'fail',
                'message' => 'tag not inserted',
                'data' => [],
            ];
            echo json_encode($data);
        }

    }
?>