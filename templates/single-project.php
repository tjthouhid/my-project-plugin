<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();
        echo '<h1>tj ' . get_the_title() . '</h1>';
        the_content();
        $project_url = get_post_meta($post->ID, '_project_url', true);
        if ($project_url) {
            echo '<p><strong>Project URL:</strong> <a href="' . esc_url($project_url) . '">' . esc_html($project_url) . '</a></p>';
        }
    endwhile;
else :
    echo '<p>No projects found</p>';
endif;
get_footer();
?>
