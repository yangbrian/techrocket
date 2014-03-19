<?php get_header(); ?>

<div id="content" class="one-col">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                <div class="entry-meta">
                    <span class="meta-author"><?php the_author_posts_link(); ?></span> / <span class="meta-date"><?php the_time(get_option('date_format')); ?></span> / <span class="meta-comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span> <?php edit_post_link('Edit', ' / <span class="edit-post">', '</span>'); ?>
                </div><!-- .entry-meta -->

                <div class="entry-content">

                    <?php techrev_review_box(get_the_ID()); ?>
                    <?php if (get_option('techrocket_integrate_singletop_enable') == 'on') echo (get_option('techrocket_integration_single_top')); ?>

                    <?php the_content(''); ?>

                    <?php wp_link_pages(array('before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>')); ?>

                    <div class="entry-meta">
                        <?php printf(the_tags('<span class="entry-tags">Tags: ', ', ', '</span> / ')); ?>
                        <span class="entry-categories">Posted in: <?php the_category(', ') ?></span>
                    </div><!-- .entry-meta -->

                    <?php if (get_option('techrocket_integrate_singlebottom_enable') == 'on') echo (get_option('techrocket_integration_single_bottom')); ?>							

                </div><!-- .entry-content-->

            </div><!-- #post-<?php the_ID(); ?> -->

            <?php
            /* Single Ad */
            if (get_option('techrocket_single_ad_enable') == 'on') {
                echo "<div class='single-ad'>" . get_option('techrocket_single_ad_code') . "</div>";
            }
            ?>

            <?php if (get_option('techrocket_show_post_comments') == 'on') { ?>
                <?php comments_template('', true); ?> 	
            <?php } ?>

            <?php
        endwhile;
    else:
        ?>	
    <?php endif; ?>

    <?php get_template_part('includes/copyright'); ?>

</div><!-- #content-->

<?php get_footer();
