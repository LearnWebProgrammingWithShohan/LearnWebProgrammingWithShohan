<?php

use App\model\Tag;

include_once 'init.php';
include_once 'partials/header.php';
$tags = Tag::all();

?>
<div class="menu-section">
        <div class="row">
            <div class="col-md-9 col-lg-7 mx-auto">
                <div class="menu text-center">
                    <h1>Learning Resource Sharing</h1>
                    <div class="tags">
                        <ul>
                            <?php
                                if(count($tags)){
                                    foreach ($tags as $tag){
                                        echo '<li id="'. $tag['id'] .'" class="align-center"><a href="#"> <span class="hash-tag">#</span> <span class="text">'.$tag['tag'].'</span></a></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>

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
                                <textarea rows="4" class="textarea form-control" name="resource" placeholder="What's your opinion about the Resource"></textarea>
                            </div>
                            <div class="form-inline">
                                <select class="selectpicker form-control" multiple data-live-search="true" title="Select tag">
                                    <option data-tokens="PHP">PHP</option>
                                    <option data-tokens="PHP">PHP</option>
                                    <option data-tokens="PHP">PHP</option>
                                    <option data-tokens="PHP">PHP</option>
                                </select>
                                <span class="btn btn-info" data-toggle="modal" data-target="#addTag">+</span>
                            </div>

                            <div class="text-right">
                                <input type="submit" value="Share Your Resource" class="btn btn-info">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<div class="newsfeed py-5">
    <div class="container bootstrap snippet">
        <div class="col-md-10 col-lg-8 mx-auto">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>Ryan Haywood</b></a>
                        </div>
                        <h6 class="text-muted time">1 minute ago</h6>
                    </div>
                </div>
                <div class="post-description">
                    <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="stats">
                                <a href="#" class="btn btn-outline-info stat-item">
                                    <i class="fa fa-thumbs-up icon"></i>2
                                </a>
                                <a href="#" class="btn btn-outline-danger stat-item">
                                    <i class="fa fa-thumbs-down icon"></i>12
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="post-tags text-right" style="margin-top: 20px;">
                                <a href="#" class="btn btn-outline-danger">Laravel</a>
                                <a href="#" class="btn btn-outline-danger">PHP</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>




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