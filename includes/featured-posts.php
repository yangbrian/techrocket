<div id="featured-content">

        <div class="clearfix"> 
            <div class="featured-left">
                    <?php
                    $counter = 0;
                    query_posts( array(
                        'showposts' => 1,
                        'tag' => 'featured',
                    ) );
                    if( have_posts() ) : while( have_posts() ) : the_post();
                        ?>

                        <div class="featured-content" id="featured-<?php echo $counter; ?>">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <div class="featured-post" id="featured-content-<?php echo $counter++; ?>"> 

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
        
            <div class="featured-right">
                <?php
                    $counter = 1;
                    query_posts( array(
                        'showposts' => 2,
                        'offset' => 1,
                        'tag' => 'featured',
                    ) );
                    if( have_posts() ) : while( have_posts() ) : the_post();
                ?>
                <div class="featured-content" id="featured-<?php echo $counter; ?>">
                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                        <div class="featured-post" id="featured-content-<?php echo $counter++; ?>"> 

                            <div class="featured-title">
                                <h2 class="entry-title"><?php the_title(); ?></h2>
                            </div>

                            <div class="entry-date">
                                <?php the_time('F j, Y'); ?> 
                            </div>
                            
                        </div>
                        <div class="featured-image">
                                <?php the_post_thumbnail('entry-thumb', array('class' => 'entry-thumb')); ?>
                        </div>
                    </a>
                </div>
                
                <?php endwhile; endif; wp_reset_query(); ?>
                
            </div>
    </div>
</div><!-- #featured-content -->
