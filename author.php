<?php get_header(); ?>

<div id="content" class="one-col">

    <div id="breadcrumbs" itemprop="breadcrumb">
        <?php if(function_exists('bcn_display')) {
            bcn_display();
        }?>
    </div>
    
    <?php 
    $curauth = isset($_GET['author_name']) ? get_userdatabylogin($author_name) : get_userdata(intval($author));
    if (have_posts()) : ?>
        <h1>About <?php echo $curauth->display_name; ?></h1>

        <div class="authorbox clearfix">
            <div id="auth-img"><?php echo get_avatar( get_the_author_meta('email'), '128'); ?></div>
            <p class="auth-bio"><?php
                if (!$curauth->description == '')
                    echo '<p>'.$curauth->description.'</p>';

                    echo '<p>TechAirlines member since '.date('F j, Y', strtotime($curauth->user_registered)).'</p>'; ?>

            <div id="post-share">
                <div class="share-buttons">
                <?php 
                    if (!$curauth->twitter == '') echo '
                        <div id="twitter" class="share"><a href="http://twitter.com/'. $curauth->twitter. '" target="_blank" title="Twitter"><i class="icon-twitter"></i> Twitter</a></div>';
                    if (!$curauth->fb == '') echo '
                        <div id="facebook" class="share"><a href="http://www.facebook.com/'. $curauth->fb. '" target="_blank" title="Facebook"><i class="icon-facebook"></i> Facebook</a></div>';
                    if (!$curauth->fb == '') echo '
                        <div id="googleplus" class="share"><a href="https://plus.google.com/'. $curauth->gplus. '" target="_blank" rel="me" title="Google+"><i class="icon-googleplus"></i> Google+</a></div>';
                ?>
                </div>
            </div>

        </div>
    <?php endif; ?>

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
