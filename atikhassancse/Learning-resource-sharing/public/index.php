<?php

use App\model\Tag;

include_once 'init.php';
include_once 'partials/header.php';
$tags = Tag::all();
include_once 'partials/home/menu.php'
?>

<div class="post-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Share Your Learning Resource</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="">
                            <div class="form-group">
                                <textarea rows="4" id="resource" class="textarea form-control" name="resource" placeholder="What's your opinion about the Resource"></textarea>
                            </div>
                            <div class="form-inline">
                                <select class="selectpicker form-control" multiple data-live-search="true" title="Select tag">
                                    <?php
                                        if (count($tags)){
                                            foreach ($tags as $tag){
                                                echo '<option value="'.$tag['tag'].'" data-tokens="'. $tag['tag'].'">'. $tag['tag'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                                <span class="btn btn-info" data-toggle="modal" data-target="#addTag">+</span>
                            </div>

                            <div class="text-right">
                                <input type="submit" id="submit-form" value="Share Your Resource" class="btn btn-info">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<?php include_once 'partials/home/newsfeed.php'?>



    <!-- Modal -->
    <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="taglabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taglabel">Add A New Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error text-center text-danger pb-2">
                        <span id="msg"></span>
                    </div>
                    <form action="" method="">
                        <div class="form-inline">
                            <input style="width: 85%; margin-right: 10px" id="input-tags" class="form-control" name="tags" placeholder="Tag1, Tag2, Tag3">
                            <input type="submit"  name="submit" class="btn btn-info add-tag-database" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







<?php include_once 'partials/footer.php'?>