<?php 
function custom_project_post_list_shortcode() {
    ob_start();
    include  "list.php";
    return ob_get_clean();
  }
  add_shortcode('my-project-post', 'custom_project_post_list_shortcode');

  function custom_project_post_list_shortcode2($atts = array()) {
    $default = array(
        'headertext' => '<i class="fa fa-home" aria-hidden="true"></i> How Can I Beautify My Space?',
        'buttontext' => 'See More Projects',
    );
    $a = shortcode_atts($default, $atts);
    ob_start();
    $h1 = $a['headertext'];
    $button = $a['buttontext'];
    include  "list-2.php";
    return ob_get_clean();
  }
  add_shortcode('my-project-post-2', 'custom_project_post_list_shortcode2');