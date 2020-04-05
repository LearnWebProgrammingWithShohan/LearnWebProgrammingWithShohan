<?php
include('layouts/header.php');

use \App\TaskController;

if (!empty($_POST)) {
    $task_controller = new TaskController();
    $task_controller->createTask($_POST);
}

?>

<div class="container">
    <h1 class="pt-4">Create Task</h1>
    <div class="row">
    <form class="pt-5 pb-5 w-100" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
     <div class="form-group">
            <label for="Name">Task Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Task Name">
        </div>
        <div class="form-group">
            <label for="Desc">Task Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">Enter Task Description</textarea>
        </div>
        <div class="form-group">
            <label for="Assignne">Select Assignee:  </label>
            <!-- Note: Assignee will come from database  -->
            <select name="assignee" id="" class="form-control">
                <option value="">Select Assignee</option>
                <option value="Aminul">Aminul</option>
                <option value="Shohan">Shohan</option>
                <option value="Rafid">Rafid</option>
                <option value="Soumya">Soumya</option>
            </select>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
    </div>
</div>
<?php include('layouts/footer.php'); ?>