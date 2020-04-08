<?php
if (!isset($_SESSION)) {session_start(); }
include_once('../inc/header.php');

$questions = array(
    'Write something about PHP?',
    'Why are you interested to learn PHP?',
    'Why Do you choose laravel ?',
    'Do you really love to do code?',
    'Write details about yourself...',
    'Write details about your country...'
);

$random_question = array_rand($questions, 1);

?>


<section class="form-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success">
                    <h2><?php echo $questions[$random_question];?></h2>
                </div>
            </div>
            <div class="col-sm-12">
                <form action="store.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="question" value="<?php echo $questions[$random_question];?>">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea class="form-control" id="answer" name="answer" id="" cols="30" rows="5" placeholder="write your answer"></textarea>
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