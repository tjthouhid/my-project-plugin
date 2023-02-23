<?php 
$args = array(
  'post_type' => 'my_project',
  'post_status' => 'publish',
  'posts_per_page' => -1
);
$custom_posts = new WP_Query($args);
if ($custom_posts->have_posts()): ?>
  <div class="project-list">
     <div class="project-list-row">
    <?php while ($custom_posts->have_posts()): $custom_posts->the_post(); ?>
     
        <div class="project-list-col">
          <div class="project-box">
              
              <?php 
                  if (has_post_thumbnail( get_the_ID() ) ): 
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'single-post-thumbnail' ); 
              ?>
              <div class="project-thumb">
                  <img src="<?php echo $image[0]; ?>" alt="project-thumb">
              </div>
              <?php endif; ?>
              <h2 class="projet-title"><?php the_title(); ?></h2>
              <div class="project-detail">
                <?php the_excerpt(); ?>
                <a href="<?php echo get_post_permalink() ?>" class="project-link">Read More <i class="gg-arrow-right"></i></a>
              </div>
          </div>
          
          
        </div>
      
      <?php endwhile; ?>
      </div>
  </div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>


