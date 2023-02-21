<?php 
/*
Plugin Name: My Project Plugin
Description: A plugin to create custom post type for projects
Author: Tj Thouhid
Author Url : http://www.tjthouhid.com
*/

function my_project_post_type() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'menu_name' => 'Projects',
        'add_new_item' => 'Add New Project',
        'edit_item' => 'Edit Project',
        'new_item' => 'New Project',
        'view_item' => 'View Project',
        'search_items' => 'Search Projects',
        'not_found' => 'No projects found',
        'not_found_in_trash' => 'No projects found in trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projects'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true,
    );

    register_post_type('project', $args);
}

add_action('init', 'my_project_post_type');

function my_project_add_meta_boxes() {
    add_meta_box('project_details', 'Project Details', 'my_project_details_callback', 'project', 'normal', 'default');
}
add_action('add_meta_boxes', 'my_project_add_meta_boxes');

function my_project_details_callback($post) {
    wp_nonce_field(basename(__FILE__), 'project_details_nonce');
    $project_url = get_post_meta($post->ID, '_project_url', true);
    ?>
    <label for="project_url">Project URL</label>
    <input type="text" name="project_url" id="project_url" value="<?php echo $project_url; ?>">
    <?php
}

function my_project_save_meta_boxes($post_id) {
    if (isset($_POST['project_details_nonce']) && wp_verify_nonce($_POST['project_details_nonce'], basename(__FILE__))) {
        if (isset($_POST['project_url'])) {
            update_post_meta($post_id, '_project_url', sanitize_text_field($_POST['project_url']));
        }
    }
}
add_action('save_post', 'my_project_save_meta_boxes');

//single-project.php
function my_project_archive_template( $archive_template ) {
    if ( is_post_type_archive( 'project' ) ) {
        $archive_template = plugin_dir_path( __FILE__ ) . 'templates/archive-project.php';
    }
    return $archive_template;
}
add_filter( 'archive_template', 'my_project_archive_template' );

function my_project_single_template( $single_template ) {
    global $post;

    if ( $post->post_type == 'project' ) {
        $single_template = plugin_dir_path( __FILE__ ) . 'templates/single-project.php';
    }

    return $single_template;
}
add_filter( 'single_template', 'my_project_single_template' );