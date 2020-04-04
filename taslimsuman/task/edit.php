<?php

include 'inc/header.php';

include 'Database.php';

if(isset($_GET['id'])){

	$id = $_GET['id'];

	$db = new Database;

	$qry = "SELECT * FROM tasks WHERE id = $id";

	$res = $db->execute($qry);
	$res = $res->fetch_assoc() ;

// get users 

	$users = new Database;

	$qry2 = "SELECT * FROM users";

	$users = $users->execute($qry2);

	
}

?>

      <div class="container mt-4">

        <h2>Task Edit</h2>
        <div class="row">
        	<?php
              include 'inc/msg.php';
          ?>
          <div class="col-md-10">
             <form method="post" action="action.php">
            <div class="form-group">
              <label for="exampleInputEmail1">Task Title</label>
              <input type="text" class="form-control" name="title" value="<?php if(isset($res['title'])) echo $res['title']; ?>">
               <input type="hidden" class="form-control" name="id" value="<?php if(isset($res['id'])) echo $res['id']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Details</label>
              <textarea class="form-control" cols="6" name="details"><?php if(isset($res['details'])) echo $res['details']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Assign</label>
              <select class="form-control" name="assign_to">
                <option value="">Select</option>
                <?php 

                	while ($usr = $users->fetch_assoc()) {

                		$st = '';
                		if($usr['id']==$res['assign_to']) $st = "selected";

                		echo '<option value="'.$usr['id'].'"'.$st.'>'.$usr['name'].'</option>';
                	}
                ?>
                
              </select>
            </div>
             <div class="form-group">
              <label for="exampleInputPassword1">Status</label>
              <select class="form-control" name="status">
                <option value="">Select</option>

                	<?php
                		$opt = ['Active','Close'];
                		

                		foreach ($opt as $item) {

                			if($item==$res['status']){
								$selected = 'selected';
                			}else{
                				$selected = '';
                			}
                	?>

                			<option value="<?php echo $item?>" <?php echo $selected;?> ><?php echo $item ?></option>

                	<?php
                		};

                		
                	?>
               
              </select>
            </div>
            
            <button type="submit" name="update" class="btn btn-primary">Save</button>
            <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
            <a href="index.php" class="btn btn-default">Back</a>
          </form>
          </div>
        </div>
        
      </div>


<?php

include 'inc/footer.php';

?>

