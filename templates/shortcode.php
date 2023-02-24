<?php 
function custom_project_post_list_shortcode() {
    ob_start();
    include  "list.php";
    return ob_get_clean();
  }
  add_shortcode('my-project-post', 'custom_project_post_list_shortcode');

  function custom_project_post_list_shortcode2() {
    ob_start();
    include  "list-2.php";
    return ob_get_clean();
  }
  add_shortcode('my-project-post-2', 'custom_project_post_list_shortcode2');