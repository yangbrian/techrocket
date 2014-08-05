<?php get_header(); ?>

<div id="content" class="one-col">

    <div id="breadcrumbs" itemprop="breadcrumb">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>

    <div class="content-loop">

        <?php if (have_posts()) : while (have_posts()) : the_post() ?>

                <?php get_template_part('includes/loop'); ?>

            <?php endwhile; ?>

        </div><!-- .content-loop -->

        <div class="clear"></div>

        <?php if (function_exists('rocket_pagination')) { ?>

            <div class="rocket-pagination">

                <?php rocket_pagination(); ?>

            </div><!-- .pagination --> 

        <?php } ?>

    <?php else : ?>

    <?php endif; ?>

    <?php get_template_part('includes/copyright'); ?>

</div><!-- #content -->

<?php get_footer(); ?>
