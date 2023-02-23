<?php 

function my_project_archive_template( $archive_template ) {
    if ( is_post_type_archive( 'project' ) ) {
        $archive_template = plugin_dir_path( __FILE__ ) . 'templates/archive-project.php';
    }
    return $archive_template;
}
//add_filter( 'archive_template', 'my_project_archive_template' );

function my_project_single_template( $single_template ) {
    global $post;

    if ( $post->post_type == 'project' ) {
        $single_template = plugin_dir_path( __FILE__ ) . 'templates/single-project.php';
    }

    return $single_template;
}
//add_filter( 'single_template', 'my_project_single_template' );


?>

