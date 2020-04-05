<?php
/**
 * Created by PhpStorm.
 * User: atikh
 * Date: 4/5/2020
 * Time: 7:04 PM
 */
namespace App\model;
namespace App\model;


class Tag extends Model
{
    protected static $tableName = "tags";


    public function save($tag){
        $query = self::where(['tag', $tag])->get();
        if (!$query){
            $sql = "insert into ".self::$tableName." (tag, created_at) values( '$tag', '$this->created_at')";
            $query = DB::getInstance()->query($sql);
        }
        return $query;
    }

}