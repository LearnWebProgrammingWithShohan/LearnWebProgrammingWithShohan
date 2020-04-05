<?php
    include_once 'partials/header.php'
?>
<div class="menu-section">
        <div class="row">
            <div class="col-md-9 col-lg-7 mx-auto">
                <div class="menu text-center">
                    <h1>Learning Resource Sharing</h1>
                    <div class="tags">
                        <ul>
                            <li class="align-center"><a href="#"> <span class="hash-tag">#</span> <span class="text">PHP</span></a></li>
                            <li class="align-center"><a href="#"> <span class="hash-tag">#</span> <span class="text">JavaScript</span></a></li>
                            <li class="align-center"><a href="#"> <span class="hash-tag">#</span> <span class="text">CSS</span></a></li>
                            <li class="align-center"><a href="#"> <span class="hash-tag">#</span> <span class="text">Bootstrap</span></a></li>
                            <li class="align-center"><a href="#"> <span class="hash-tag">#</span> <span class="text">Laravel</span></a></li>
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
                                <input type="text" class="form-control" name="resource-title" placeholder="Resource title">
                            </div>
                            <div class="form-group">
                                <textarea rows="4" class="form-control" name="resource" placeholder="What's your opinion about the Resource"></textarea>
                            </div>
                            <select class="selectpicker" multiple>
                                <option>Mustard</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>

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

<?php include_once 'partials/footer.php'?>