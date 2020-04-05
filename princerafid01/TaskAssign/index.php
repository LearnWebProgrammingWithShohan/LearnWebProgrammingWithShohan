<?php
include('layouts/header.php');
use App\TaskController;

$tasks = new TaskController();
if (!empty($_GET['id'])) {
    $tasks->deleteTask($_GET['id']);
}
 ?>
    <div class="container pt-4">
    <h1>Tasks</h1>
        <div class="row">
            <?php foreach ($tasks->getTasks() as $task) { ?>
            <div class="col-md-3">
                <div class="card mt-5">
                    <div class="card-body">
                        <a href="/delete_task?id=<?php echo $task['id'] ?>" class="float-right">X</span></a>
                        <h5 class="card-title"><?php echo $task['name'] ?></h5>
                        <p class="card-text"><?php echo $task['description'] ?></p>
                        <h6>Assigned to: <strong><?php echo $task['assignee'] ?></strong></h6>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php include('layouts/footer.php'); ?>