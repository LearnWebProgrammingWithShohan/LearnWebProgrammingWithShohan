<?php
namespace App;

class Task extends PDODB
{
    protected function store($info)
    {
        try {
            $this->insert('tasks', $info);
            Helper::redirect('index.php');
        } catch (\PDOException $e) {
            //error
            echo "Your fail message: " . $e->getMessage();
        }
    }

    protected function view()
    {
        return $this->select('tasks');
    }
    protected function destroy($id)
    {
        try {
            $this->delete('tasks', ['id' => $id]);
            Helper::redirect('index.php');
        } catch (\PDOException $e) {
            //error
            echo "Your fail message: " . $e->getMessage();
        }
    }
}
