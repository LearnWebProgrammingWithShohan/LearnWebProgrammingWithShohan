<?php
include_once('../../vendor/autoload.php');
use App\Questions\Question;
$showObj = new Question();
$showData = $showObj->setData($_GET)->show();

include_once('../inc/header.php');

?>


<section class="form-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="update.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="question" value="<?php echo $showData['question']?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $showData['name']?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $showData['email']?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" id="answer" name="answer" id="" cols="30" rows="5" placeholder="write your answer" disabled><?php echo $showData['detail']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="marks">Give Marks:</label>
                                <input type="text" name="marks" id="marks" class="form-control">
                                <input type="hidden" name="unique_id" value="<?php echo $showData['uq_id']?>">
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
            <?php
                if(isset($_SESSION['fail'])){
                    echo "<h5 class='text-danger'>".$_SESSION['fail']."</h5>"; 
                    unset($_SESSION['fail']);	
                }
                ?>	
            </div>
        </div>
    </div>
</section>

<?php 
include_once('../inc/footer.php');
?>