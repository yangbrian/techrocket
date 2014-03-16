<div id="featured-content">

        <div class="featured-left">
            <ul>
                <?php
                $counter = 1;
                query_posts( array(
                    'showposts' => 1,
                    'tag' => 'featured',
                ) );
                if( have_posts() ) : while( have_posts() ) : the_post();
                    ?>
                
                    <label class="featured-flag">Featured</label>
                    <li class="featured-<?php echo $counter; ?>">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <?php the_post_thumbnail('featured-thumb', array('class' => 'entry-thumb')); ?>
                        </a>
                        <span class="entry-date">
                            <?php the_time('F j, Y'); ?> &middot; <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
                        </span>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    </li>
                    
                    <?php $counter++; endwhile; endif; wp_reset_query(); ?>
            </ul>
        </div><!-- .featured-left -->
        
        <div class="featured-right">
            <ul>
                <?php
                $counter = 1;
                query_posts( array(
                    'showposts' => 3,
                    'offset' => 1,
                    'tag' => 'featured',
                ) );
                if( have_posts() ) : while( have_posts() ) : the_post();
                    ?>
                
                    <li class="featured-<?php echo $counter; ?>">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <?php the_post_thumbnail('entry-thumb', array('class' => 'entry-thumb')); ?>
                        </a>
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    </li>
                    
                    <?php $counter++; endwhile; endif; wp_reset_query(); ?>
            </ul>
        </div><!-- .featured-right -->
        
        <div class="clear"></div>
    </div><!-- #featured-content -->
