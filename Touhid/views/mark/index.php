<?php
include_once('../../vendor/autoload.php');
use App\Questions\Question;
$info = new Question();
$allUserData = $info->allUser();
include_once('../inc/header.php');
?>


<section class="board">
    <div class="container">
        <div class="row">
            <?php
                if(isset($_SESSION['msg'])){
                    echo "<h5 class='text-success'>".$_SESSION['msg']."</h5>"; 
                    unset($_SESSION['msg']);	
                }
            ?>
            <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $count = 1; foreach($allUserData as $userData):?>
                        <td><?php echo $count++;?></td>
                        <td><?php echo $userData['name'];?></td>
                        <td><?php echo $userData['email'];?></td>
                        <td><?php echo $userData['marks'];?></td>
                        <td><a href="edit.php?unique_id=<?php echo $userData['uq_id'];?>" class="btn btn-info">Give Mark</a></td>
                        <?php endforeach;?>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>


<?php include_once('../inc/footer.php');?>