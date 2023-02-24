<?php 
/*
Plugin Name: My Project Plugin
Description: A plugin to create custom post type for projects
Author: Tj Thouhid
Author Url : http://www.tjthouhid.com
*/
if ( ! defined( '_TJMPP_T_VERSION' ) ) {
    // Replace the version number of the plugin on each release.
    define( '_TJMPP_T_VERSION', '1.0.1' );
}
add_theme_support('post-thumbnails');
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
        'rewrite' => array('slug' => 'my-projects'),
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'category' ),
        'menu_icon' => 'dashicons-portfolio',
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );

    register_post_type('my_project', $args);
}

add_action('init', 'my_project_post_type');

function gd_request_scripts() {
  //wp_register_script( 'gd_reques_js', plugins_url( '/assets/js/gd-request.js', __FILE__ ), array('jquery'),_GD_REQUEST_VERSION, true);
  //wp_localize_script( 'gd_reques_js', 'gdAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));  
 
  //wp_enqueue_script('gd_reques_js');

  wp_enqueue_style( 'custom_project_css', plugins_url('/assets/css/style.css', __FILE__ ), array(), _TJMPP_T_VERSION );
}
add_action( 'wp_enqueue_scripts', 'gd_request_scripts', 20, 1);


//include 'includes/template_define.php';
include 'templates/shortcode.php';

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'plugin_manage_link', 10, 4 );

function plugin_manage_link( $actions, $plugin_file, $plugin_data, $context ) {

    $settings_link = sprintf( '<a href="%s" target="_blank">%s</a>', 'https://www.tjthouhid.com', __( 'Tj Thouhid' ) );
    array_unshift( $actions, $settings_link );
    $settings_link = sprintf( '<a href="%s" target="_blank">%s</a>', 'https://github.com/tjthouhid/my-project-plugin', __( 'GitHub' ) );
    array_unshift( $actions, $settings_link );
    

    return $actions;

}
