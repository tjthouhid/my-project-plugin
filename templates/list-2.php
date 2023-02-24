<section class="blog-section text-center">
            <div class="row">
                <div class="small-12 columns">
                    <h2><i class="fa fa-home" aria-hidden="true"></i> How Can I Beautify My Space?</h2>
                    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
                        <?php 
                        $args = array(
                          'post_type' => 'my_project',
                          'post_status' => 'publish',
                          'posts_per_page' => 3
                        );
                        $custom_posts = new WP_Query($args);
                        if ($custom_posts->have_posts()): ?>

                             <?php while ($custom_posts->have_posts()): $custom_posts->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                                <div class="blog-featured-image" style="background-image: url('<?php echo $image[0]; ?>')">

                                </div>
                                <div class="blog-info-box">
                                    <h3><?php the_title(); ?> </h3>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>"> Read More <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </ul>
                    <a href="/my-projects/" class="learn-more" title="Tips & Resources">See More Projects</a>
                </div>
            </div>
        </section>