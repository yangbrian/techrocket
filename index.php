<?php get_header(); ?>

<div id="content" class="one-col">

    <div class="featured">
        <?php get_template_part('includes/featured-posts'); ?>
    </div>

    <div class="content-loop">
        <?php /*
            <div id="breadcrumbs">
                <?php printf(__('Page %s', 'theme rocket'), $paged); ?>
            </div><!-- #breadcrumbs -->
        */ ?>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <?php get_template_part('includes/loop'); ?>

                <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>

    </div><!-- .content-loop -->

    <?php if (function_exists('rocket_pagination')) { ?>

        <div class="rocket-pagination">

            <?php rocket_pagination(); ?>

        </div><!-- .pagination --> 

    <?php } ?>

    <?php get_template_part('includes/copyright'); ?>

</div><!-- #content -->

<?php get_footer();
