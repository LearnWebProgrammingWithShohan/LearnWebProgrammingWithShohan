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
                                echo '<li id="'. $tag['id'] .'" class="align-center btn-tag"><a href="#"> <span class="hash-tag">#</span> <span class="text">'.$tag['tag'].'</span></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>