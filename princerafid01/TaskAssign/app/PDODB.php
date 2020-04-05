<?php
namespace App;

class PDODB
{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "1234";
    private $dbName     = "org";
    protected $db;

    public function __construct()
    {
        try {
            $conn = new \PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
            $this->db = $conn;
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Failed to connect with : " . $e->getMessage());
        }
    }

    protected function select($table, $conditions = array())
    {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        $query = $this->db->prepare($sql);
        $query->execute();
        $result =[];
        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function insert($table, array $data)
    {
        $columns = '';
        $values  = '';
        $i = 0;

        $columnString = implode(',', array_keys($data));
        $valueString = ":".implode(',:', array_keys($data));
        $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
        $query = $this->db->prepare($sql);
        foreach ($data as $key=>$val) {
            $query->bindValue(':'.$key, $val);
        }
        // return $sql;
        $insert = $query->execute();
        return $insert? true:false;
    }

    protected function update($table, $data, $conditions)
    {
        $colvalSet = '';
        $whereSql = '';
        $i = 0;
        foreach ($data as $key=>$val) {
            $pre = ($i > 0)?', ':'';
            $colvalSet .= $pre.$key."='".$val."'";
            $i++;
        }
        if (!empty($conditions)&& is_array($conditions)) {
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
        $query = $this->db->prepare($sql);
        $update = $query->execute();
        return $update ? 'Success':false;
    }

    protected function delete($table, $conditions)
    {
        $whereSql = '';
        if (!empty($conditions)&& is_array($conditions)) {
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$table.$whereSql;
        $delete = $this->db->query($sql);
        return $delete ? 'Success':false;
    }
}
