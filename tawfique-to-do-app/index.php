<?php
    ob_start();
    session_start();

    // require_once 'App/classes/Database.php';
    require_once 'App/classes/Task.php';

    $taskObj = new Task();


    if (isset($_POST['insert'])) {
        $taskname_add = $_POST['taskname_add'];
        $message = $taskObj->insertTask($taskname_add);
        if($message){
            echo "<h2 style='color: green' class='text-center'>Successfully Added</h2>";
        }
    }
    

    // update session message
    if(isset($_SESSION['update_msg'])){
        echo "<h2 style='color: green' class='text-center'>Task Updated Successfully</h2>";
    }
    // delete session message
    if(isset($_SESSION['delete_msg'])){
        echo "<h2 style='color: red' class='text-center'>Task Deleted Successfully</h2>";
    }
    session_destroy();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO APP</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>
    
    <header class="header-area">
        <div class="container">
            <h1 class="text-center"> To Do App</h1>
            <hr>
        </div>
    </header>
    
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel  panel-warning">
                        <div class="panel-heading">
                            <h3 class="text-center">Add Your Today's Task</h3><hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Date: <?php echo date('d-m-Y'); ?> </h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-right" id="js_time"></h4>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <?php 
                                        $sl = 1;
                                        // show all tasks
                                        $allTasks = $taskObj->showAllTasks();
                                        while ($row = mysqli_fetch_assoc($allTasks)) {
                                            $id = $row['id'];
                                            $task_name = $row['task_name'];

                                    ?>
                                        
                                    <form class="from-group" method="post" action="update.php">
                                        <div class="input-group">
                                          <span name="task_id" class="input-group-addon"><?php echo $sl++ ?></span>

                                          <input value="<?php echo $id ;?>" name="id" type="hidden">
                                        
                                          <input value="<?php echo $task_name ;?>" name="taskname_update" type="text" class="input-lg form-control" placeholder="Edit your task">

                                          <span class="input-group-btn">
                                                <button name="update" title="Update" class="btn btn-warning btn-lg"><i class="fa fa-pencil-square-o"></i></button>

                                                <!-- <a href="update.php?update_id=<?php echo $row["id"];?>" name="update" title="Update" class="btn btn-warning btn-lg"><i class="fa fa-pencil-square-o"></i></a> -->

                                                <a href="delete.php?id=<?php echo $row["id"];?>" name="delete" title="Delete" class="btn btn-danger btn-lg "><i class="fa fa-trash-o"></i></a>
                                           </span>
                                        </div> <br>
                                    </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer panel-danger">
                            <form class="from-group" method="post" action="">
                                <div class="input-group">
                                   <input name="taskname_add" type="text" class="form-control input-lg" placeholder="Add you task here">
                                   <span class="input-group-btn">
                                        <button name="insert" title="Insert" class="btn btn-primary btn-lg" type="submit" ><i class="fa fa-arrow-up"></i></button>
                                   </span>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-area">
        <div class="container">
            <p class="text-center">&copy; To Do App by Php and Javascript - <?php echo date('Y') ?></p>
        </div>
    </footer>





    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        
        var myVar = setInterval(myTimer, 1000);

        function myTimer() {
          var d = new Date();
          document.getElementById("js_time").innerHTML = d.toLocaleTimeString();
        }

    </script>
    




</body>
</html>