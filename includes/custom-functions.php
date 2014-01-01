<?php
add_theme_support('automatic-feed-links');
add_editor_style();
//add_custom_image_header();

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width))
    $content_width = 735;

/* ----------------------------------------------------------------------------------- */
/* 	Custom Menus
  /*----------------------------------------------------------------------------------- */

function register_main_menus() {
    register_nav_menus(
            array(
                'primary-nav' => __('Primary Nav', 'techrocket'),
            )
    );
}

if (function_exists('register_nav_menus'))
    add_action('init', 'register_main_menus');

/* ----------------------------------------------------------------------------------- */
/* 	Register and deregister Scripts files	
  /*----------------------------------------------------------------------------------- */
if (!is_admin()) {
    add_action('wp_print_scripts', 'my_deregister_scripts', 100);
}

function my_deregister_scripts() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/includes/js/jquery.min.js', false, '1.10.2');
    //wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/includes/js/jquery-ui-1.10.3.custom.min', false, '1.10.3');
    //wp_enqueue_script('jquery-nanoscroller', get_template_directory_uri() . '/includes/js/jquery.nanoscroller.min.js', false, '0.7.6');
    wp_enqueue_script('jquery-infinitescroll', get_template_directory_uri() . '/includes/js/jquery.infinitescroll.js', false, '2.0');
    wp_enqueue_script('jquery-superfish', get_template_directory_uri() . '/includes/js/superfish.min.js', false, '1.7.4');
    wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/includes/js/custom.js', false, '1.0');

    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
}

/* ----------------------------------------------------------------------------------- */
/* 	Remove Image Caption from Index/Archive/Search Page
  /*----------------------------------------------------------------------------------- */
if (is_home() || is_archive() || is_search()) {
    add_filter('img_caption_shortcode', create_function('$a, $b, $c', 'return $c;'), 10, 3);
}

/* ----------------------------------------------------------------------------------- */
/* 	Pagination
  /*----------------------------------------------------------------------------------- */

function rocket_pagination($prev = '&laquo;', $next = '&raquo;') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged', '%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'plain'
    );
    if ($wp_rewrite->using_permalinks())
        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

    if (!empty($wp_query->query_vars['s']))
        $pagination['add_args'] = array('s' => get_query_var('s'));

    echo paginate_links($pagination);
}


/* ----------------------------------------------------------------------------------- */
/* 	Exclude Pages from Search Results
  /*----------------------------------------------------------------------------------- */

function tr_exclude_pages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts', 'tr_exclude_pages');

/* ----------------------------------------------------------------------------------- */
/* 	Get Limit Excerpt
  /*----------------------------------------------------------------------------------- */

function tr_content_limit($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

    if (strlen($_GET['p']) > 0) {
        echo "";
        echo $content;
        echo "...";
    } else if ((strlen($content) > $max_char) && ($espacio = strpos($content, " ", $max_char))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo "...";
    } else {
        echo "";
        echo $content;
    }
}

/* ----------------------------------------------------------------------------------- */
/* 	Comment Styling
  /*----------------------------------------------------------------------------------- */

if (!function_exists('tr_comment')) {

    function tr_comment($comment, $args, $depth) {

        $isByAuthor = false;

        if ($comment->comment_author_email == get_the_author_meta('email')) {
            $isByAuthor = true;
        }

        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(($isByAuthor ? 'author-comment' : '')); ?> id="li-comment-<?php comment_ID() ?>">

            <div id="comment-<?php comment_ID(); ?>">
                <div class="line"></div>

                <?php echo get_avatar($comment, $size = '36'); ?>

                <div class="comment-author vcard">
                    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>', 'techrocket'), get_comment_author_link()) ?>
                </div>

                <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'techrocket'), '  ', '') ?> / <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="moderation">Your comment is awaiting moderation.', 'techrocket') ?></em>
                    <br />
                <?php endif; ?>

                <div class="comment-body">
                    <?php comment_text() ?>
                </div>

            </div>
            <?php
        }

    }

    /* ----------------------------------------------------------------------------------- */
    /* 	Seperated Pings Styling
      /*----------------------------------------------------------------------------------- */

    if (!function_exists('tr_list_pings')) {

        function tr_list_pings($comment, $args, $depth) {
            $GLOBALS['comment'] = $comment;
            ?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
            <?php
        }

    }

    /* ----------------------------------------------------------------------------------- */
    /* 	Turn a category ID to a Name
      /*----------------------------------------------------------------------------------- */

    function cat_id_to_name($id) {
        foreach ((array) (get_categories()) as $category) {
            if ($id == $category->cat_ID) {
                return $category->cat_name;
                break;
            }
        }
    }
    ?>