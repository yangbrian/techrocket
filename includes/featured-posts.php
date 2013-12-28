<div id="featured-content">

    <div class="featured-left">
        <?php
        query_posts(array(
            'showposts' => 1,
            'tag' => get_option('techrocket_featured_post_tags'),
        ));
        if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <label class="featured-flag">Featured</label>
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('entry-thumb', array('class' => 'entry-thumb')); ?></a>

                <div class="entry-meta">
                    by <span class="meta-author"><?php the_author_posts_link(); ?></span> &#8212; <span class="meta-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
                </div><!-- .entry-meta -->    		

                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                <div class="entry-excerpt">
                    <?php tr_content_limit(get_option('techrocket_featured_post_char_num')); ?>
                    <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more', 'rocket'); ?> &rarr;</a>
                </div><!-- .entry-excerpt -->

                <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>

    </div><!-- .featured-left -->

    <div class="featured-right">

        <?php
        $post_count = 1;
        $post_num = get_option('techrocket_featured_post_num') - 1;
        query_posts(array(
            'showposts' => $post_num,
            'offset' => 1,
            'tag' => get_option('techrocket_featured_post_tags'),
        ));
        if (have_posts()) : while (have_posts()) : the_post();
                ?>

                <div class="featured-post<?php
                if ($post_count == $post_num) {
                    echo ' featured-post-last';
                }
                ?>">

                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                    <div class="entry-meta">
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'rocket'); ?>
                    </div><!-- .entry-meta -->			

                    <div class="clear"></div>

                </div><!-- .featured-post -->

                <?php
                $post_count++;
            endwhile;
        endif;
        wp_reset_query();
        ?>

    </div><!-- .featured-right -->

    <div class="clear"></div> 

</div><!-- #featured-content -->
