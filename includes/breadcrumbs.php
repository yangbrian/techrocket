<div id="breadcrumbs">
    <?php
    if (function_exists('bcn_display')) {
        bcn_display();
    } else {
        ?>
        <?php if (is_tag()) { ?>
            Posts Tagged <?php
            single_tag_title();
            echo('&quot;');
            ?>
        <?php } elseif (is_day()) { ?>
            Posts made in <?php the_time('F jS, Y'); ?>
        <?php } elseif (is_month()) { ?>
            Posts made in <?php the_time('F, Y'); ?>
        <?php } elseif (is_year()) { ?>
            Posts made in <?php the_time('Y'); ?>
        <?php } elseif (is_search()) { ?>
            Search results for <?php
            echo('&quot');
            the_search_query();
            echo('&quot');
            ?>
        <?php } elseif (is_single()) { ?>
            <?php
            $category = get_the_category();
            if (!empty($category)) {
                $catlink = get_category_link($category[0]->cat_ID);
                echo ('<a href="' . $catlink . '">' . $category[0]->cat_name . '</a> ' . '<span class="entry-title">' . get_the_title()) . '</span>';
            };
            ?>
        <?php } elseif (is_category()) { ?>
            Posts in <?php
            echo('&quot');
            single_cat_title();
            echo('&quot');
            ?>
        <?php } elseif (is_author()) { ?>
            <?php
            global $wp_query;
            $curauth = $wp_query->get_queried_object();
            ?>
            <?php
            _e('Posts by ', 'rocket');
            echo ' ', $curauth->nickname;
            ?>
        <?php } elseif (is_page()) { ?>
            <?php wp_title(''); ?>
        <?php }; ?>
    <?php }; ?>
</div><!--end #breadcrumbs-->




