<?php
namespace App;

class TaskController extends Task
{
    public function createTask(array $info)
    {
        $data['name'] = $info['name'];
        $data['description'] = $info['description'];
        $data['assignee'] = $info['assignee'];
        $this->store($data);
    }
    public function getTasks()
    {
        return $this->view();
    }
    public function deleteTask($id)
    {
        $this->destroy($id);
    }
}
