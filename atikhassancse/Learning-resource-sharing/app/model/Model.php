<?php


namespace App\model;
use mysqli;


class Model
{
    protected static $tableName = null;
    protected static $id = null;
    protected $created_at =  null;
    protected static $query = null;
    protected static $count = 0;

    public function __construct()
    {
        $this->created_at = date('Y-m-d h:m:s');
    }

    public static function find($id){

        $sql = "select * from ".static::$tableName." where id = ".$id;
        $query = DB::getInstance()->query($sql);
        return $query->num_rows ? $query->fetch_assoc() : null;
    }

    public static function all(){
        $sql = "select * from ".static::$tableName;
        $query = DB::getInstance()->query($sql);
        $result = [];
        if($query->num_rows){
            while ($row = $query->fetch_assoc()){
                $result[] = $row;
            }
        }
        return count($result) ? $result : null;
    }

    public static function where($filter = []){
        if(count($filter)){
            $field      = null;
            $operator   = null;
            $value      = null;

            if(count($filter) == 3){
                $field      = $filter[0];
                $operator   = $filter[1];
                $value      = $filter[2];
            }

            if(count($filter) == 2){
                $field      = $filter[0];
                $operator   = '=';
                $value      = $filter[1];
            }

            if(self::$count == 0){
                self::$query = "select * from ".static::$tableName." where ".$field." ".$operator." '".$value."'";
                self::$count = 1;
            } else{
                self::$query .= " and ".$field." ".$operator." '".$value."''";
            }

            return new static();
        }
        return false;
    }

    public static function orWhere($filter = []){
        if(count($filter)){
            $field      = null;
            $operator   = null;
            $value      = null;

            if(count($filter) == 3){
                $field      = $filter[0];
                $operator   = $filter[1];
                $value      = $filter[2];
            }

            if(count($filter) == 2){
                $field      = $filter[0];
                $operator   = '=';
                $value      = $filter[1];
            }
            if(self::$count)
                self::$query .= " or ".$field." ".$operator." '".$value."'";
            else
                return false;

            return new static();
        }
        return false;
    }

    public static function get(){
        self::$count = 0;
        $query = DB::getInstance()->query(self::$query);
        $result = [];
        if($query->num_rows){
            while ($row = $query->fetch_assoc()){
                $result[] = $row;
            }
        }

        return count($result)  ? $result : null;
    }

}