<?php 
function custom_project_post_list_shortcode() {
    ob_start();
    ?>
   
    <?php
    include  "list.php";
    return ob_get_clean();
  }
  add_shortcode('my-peoject-post', 'custom_project_post_list_shortcode');