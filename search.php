<?php get_header(); ?>

<div id="content" class="one-col">

    <?php get_template_part('includes/breadcrumbs'); ?>

    <div class="content-loop">

        <?php if (have_posts()) : while (have_posts()) : the_post() ?>

                <?php get_template_part('includes/loop'); ?>

            <?php endwhile; ?>


            <div class="clear"></div>

            <?php if (function_exists('rocket_pagination')) { ?>

                <div class="rocket-pagination">

                    <?php rocket_pagination(); ?>

                </div><!-- .pagination --> 

            <?php } ?>


        <?php else : ?>

            <?php get_template_part('includes/not-found'); ?>

        <?php endif; ?>

    </div><!-- .content-loop -->


    <?php get_template_part('includes/copyright'); ?>

</div><!-- #content -->

<?php get_footer(); ?>