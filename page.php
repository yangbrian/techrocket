<?php get_header(); ?>

<div id="content" class="one-col">

    <div id="breadcrumbs">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h1 class="page-title"><?php the_title(); ?></h1>

            <div class="entry-content">

                <?php the_content(''); ?>

            </div><!-- .entry-content -->

            <div class="clear"></div>

            <?php edit_post_link('(' . __('Edit', 'rocket') . ')', '', ''); ?>

            <?php if (get_option('techrocket_show_page_comments') == 'on') { ?>

                <?php comments_template('', true); ?>

            <?php } ?>  

        <?php endwhile; ?>

    <?php else : ?>

    <?php endif; ?>

    <?php get_template_part('includes/copyright'); ?>

</div><!-- #content -->

<?php get_footer();
