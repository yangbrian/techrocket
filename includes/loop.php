<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('entry-thumb', array('class' => 'entry-thumb')); ?></a>

    <div class="entry-meta">
        <?php _e('by', 'rocket'); ?> <span class="meta-author"><?php the_author_posts_link(); ?></span> &#8212; <span class="meta-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . __(' ago', 'rocket'); ?></span>
    </div><!-- .entry-meta -->

    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

    <div class="entry-excerpt">
        <?php tr_content_limit(get_option('techrocket_loop_post_char_num')); ?>
        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more', 'rocket'); ?> &rarr;</a>                
    </div><!-- .entry-excerpt -->

    <div class="clear"></div>

</article><!-- #post-<?php the_ID(); ?> -->
