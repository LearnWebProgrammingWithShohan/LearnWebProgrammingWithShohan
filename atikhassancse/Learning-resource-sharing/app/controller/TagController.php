<?php
namespace App\controller;
use App\model\Tag;

class TagController
{
    public function save($tags = null){
        if($tags){
            $_tag = new Tag();
            $tags = explode(',', $tags);
            foreach ($tags as $tag){
                if(!$_tag->save($tag)){
                    return false;
                    exit();
                }
            }
            return true;
        }
        return false;
    }
}