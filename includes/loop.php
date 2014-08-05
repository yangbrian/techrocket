<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('entry-thumb', array('class' => 'entry-thumb', 'itemprop'=>'image')); ?></a>

    <div class="entry-meta">
       by <span class="meta-author"><?php the_author_posts_link(); ?></span> &#8212; <span class="meta-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
    </div><!-- .entry-meta -->

    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
        <div class="meta"><span class="continue"> Continue <a href="<?php the_permalink() ?>" rel="bookmark" title="Continue reading <?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a> </span></div>                
    </div><!-- .entry-excerpt -->

    <div class="clear"></div>

</article><!-- #post-<?php the_ID(); ?> -->
