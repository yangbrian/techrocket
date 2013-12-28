<?php get_header(); ?>

<div id="content" class="one-col">

    <div class="featured">
        <?php if ((get_option('techrocket_featured_content_enable') == "on" ) && !is_paged()) { ?>

            <?php get_template_part('includes/featured-posts'); ?>

        <?php } ?>
    </div>

    <div class="content-loop">

        <?php if ((get_query_var('paged') > 0) && (get_option('techrocket_pagination_style') == 'Numeric Pagination')) { ?>
            <div id="breadcrumbs">
                <?php printf(__('Page %s', 'theme rocket'), $paged); ?>
            </div><!-- #breadcrumbs -->
        <?php } ?>

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
