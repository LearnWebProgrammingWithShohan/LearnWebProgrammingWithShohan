  <?php
                  
    if (isset($_GET['msg'])) {
                    echo '<div class="alert alert-info" role="alert">';

          echo " " .$_GET['msg'];
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>';
          echo '</div>';

        }
      ?>