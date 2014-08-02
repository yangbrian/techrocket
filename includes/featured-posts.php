<div id="featured-content">

        <div class="clearfix"> 
            <div class="featured-left">
                    <?php
                    $counter = 1;
                    query_posts( array(
                        'showposts' => 1,
                        'tag' => 'featured',
                    ) );
                    if( have_posts() ) : while( have_posts() ) : the_post();
                        ?>

                        <div class="featured-<?php echo $counter; ?>">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <div class="featured-post" id="featured-<?php echo $counter++; ?>"> 

                                    <div class="featured-title">
                                        <h2 class="entry-title"><?php the_title(); ?></h2>
                                    </div>

                                    <div class="entry-date">
                                        <?php the_time('F j, Y'); ?> 
                                    </div>
                                    
                                </div>
                                <div class="featured-image">
                                        <?php the_post_thumbnail('featured-thumb', array('class' => 'entry-thumb')); ?>
                                </div>
                            </a>
                        </div>
                        
                        <?php endwhile; endif; wp_reset_query(); ?>

            </div><!-- .featured-left -->
        
        
        
       </div>
    </div><!-- #featured-content -->
