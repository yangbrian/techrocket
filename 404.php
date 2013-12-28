<?php get_header(); ?>

<div id="content">
    <?php the_post(); ?>
    <h1 class="page-title">Error 404</h1>		
    <div id="post-0" class="hentry post error404 not-found">
        <div class="entry-content">
            <p>The page you\'ve requested <strong>can not be displayed</strong>. It appears you\'ve missed your intended destination, either through a bad or outdated link, or a typo in the page you were hoping to reach.', 'techrocket') ?></p>
        </div><!-- .entry-content -->
    </div><!-- #post-0 -->
    <?php get_template_part('includes/copyright'); ?>		
</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
