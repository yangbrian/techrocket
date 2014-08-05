<?php get_header(); ?>

<div id="content" class="one-col">
    
    <div id="breadcrumbs" itemprop="breadcrumb">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article itemscope="" itemtype="http://schema.org/BlogPosting" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php the_title('<h1 itemprop="headline" class="entry-title">', '</h1>'); ?>

                <div class="entry-meta">
                    <span itemprop="author" class="meta-author"><?php the_author_posts_link(); ?></span> / <time class="meta-date" datetime="<?php the_date('c'); ?>" itemprop="datePublished"><?php the_time(get_option('date_format')); ?></time> / <span class="meta-comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span> <?php edit_post_link('Edit', ' / <span class="edit-post">', '</span>'); ?>
                </div><!-- .entry-meta -->

                <div itemprop="articleBody text" class="entry-content">

                    <?php if ( has_tag(809)) { // Guest Post ?>
                        <div class="alert" id="guest-post">
                            
                                <p>This is a <a href="http://www.techairlines.com/write/">guest post</a> by <?php the_author(); ?>.</p>
                            
                        </div>
                    <?php } // End Guest Post ?>

                    <?php techrev_review_box(get_the_ID()); ?>
                    <?php if (get_option('techrocket_integrate_singletop_enable') == 'on') echo (get_option('techrocket_integration_single_top')); ?>

                    <?php the_content(''); ?>

                    <div class="clearfix post-bottom">
                        <?php related_posts(); ?>

                        <div id="post-share">
                            <p>Liked this article? Share it with your friends. </p>
                            <div class="share-buttons">
                                <div id="twitter" class="share"><a href="http://twitter.com/share?url=<?php the_permalink();?>&amp;via=TechAirlines&amp;text=<?php the_title();?>"><i class="icon-twitter"></i> Tweet</a></div>
                                <div id="facebook" class="share"><a href="http://www.facebook.com/share.php?u=<?php the_permalink();?>"><i class="icon-facebook"></i> Share</a></div>
                                <div id="googleplus" class="share"><a href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="icon-googleplus"></i> Share</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="authorbox clearfix">
                        <div id="auth-img"><?php echo get_avatar( get_the_author_meta('email'), '64'); ?></div>
                        <p class="auth-bio"><strong>By <?php the_author_posts_link(); ?></strong><br />
                        <?php the_author_meta( 'description' ); ?></p>
                    </div>


                    <?php wp_link_pages(array('before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>')); ?>

                    <?php if (get_option('techrocket_integrate_singlebottom_enable') == 'on') echo (get_option('techrocket_integration_single_bottom')); ?>							

                </div><!-- .entry-content-->

            </article><!-- #post-<?php the_ID(); ?> -->

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
