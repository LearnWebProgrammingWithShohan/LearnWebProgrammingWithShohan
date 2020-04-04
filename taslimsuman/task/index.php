<?php

include 'Database.php';
include 'inc/header.php';

// -- get all task
$data = new Database;
$qry = "SELECT tasks.*, tasks.id as tid, users.* FROM tasks LEFT JOIN users ON tasks.assign_to = users.id";
$res = $data->execute($qry);


// get users 

  $users = new Database;

  $qry2 = "SELECT * FROM users";

  $users = $users->execute($qry2);



//Initialize array variable
//   $dbdata = array();

// //Fetch into associative array
//   while ( $row = $users->fetch_assoc())  {
//   $dbdata[]=$row;
//   }

// //Print array in JSON format
//  echo json_encode($dbdata);



?>

      <div class="container mt-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  + New
</button>

        <h2>Task List</h2>
        <div class="row">
          <div class="col-md-10">
            
          <?php
              include 'inc/msg.php';
          ?>
              
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">User</th>
            <th scope="col">Create Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($res){ 
            while($row = $res->fetch_assoc()){
          ?>
          <tr>
            <th scope="row"><?php echo $row['tid']?></th>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['created_at']?></td>
            <td><?php echo $row['status']?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['tid']; ?>" class="btn btn-primary">Edit</a>
                      
            </td>
          </tr>

          <?php
            }
            }
          ?>

         
        </tbody>
      </table>

          </div>
        </div>
      </div>

  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="action.php">
            <div class="form-group">
              <label for="exampleInputEmail1">Task Title</label>
              <input type="text" class="form-control" name="title" aria-describedby="Title" required>
              
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Details</label>
              <textarea class="form-control" cols="6" name="details"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Assign</label>
              <select class="form-control" name="assign_to" required>
                <option value="">Select</option>
                    <?php 

                  while ($usr = $users->fetch_assoc()) {

                    echo '<option value="'.$usr['id'].'"'.$st.'>'.$usr['name'].'</option>';
                  }
                ?>

              </select>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
     
    </div>
  </div>
</div>

<?php

include 'inc/footer.php';

?>
