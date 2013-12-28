<?php
if (function_exists('create_initial_post_types'))
    create_initial_post_types(); 
if (function_exists('add_custom_background'))
    add_theme_support('custom-background');
if (function_exists('add_post_type_support'))
    add_post_type_support('page', 'excerpt');

add_filter('body_class', 'tr_browser_body_class');

function tr_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    if ($is_lynx)
        $classes[] = 'lynx';
    elseif ($is_gecko)
        $classes[] = 'gecko';
    elseif ($is_opera)
        $classes[] = 'opera';
    elseif ($is_NS4)
        $classes[] = 'ns4';
    elseif ($is_safari)
        $classes[] = 'safari';
    elseif ($is_chrome)
        $classes[] = 'chrome';
    elseif ($is_IE)
        $classes[] = 'ie';
    else
        $classes[] = 'unknown';

    if ($is_iphone)
        $classes[] = 'iphone';
    return $classes;
}

/* this function allows for the auto-creation of post excerpts */

function truncate_post($amount, $echo = true, $post = '') {
    global $shortname;

    if ($post == '')
        global $post;

    $postExcerpt = '';
    $postExcerpt = $post->post_excerpt;

    if (get_option($shortname . '_use_excerpt') == 'on' && $postExcerpt <> '') {
        if ($echo)
            echo $postExcerpt;
        else
            return $postExcerpt;
    } else {
        $truncate = $post->post_content;

        $truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate);

        if (strlen($truncate) <= $amount)
            $echo_out = '';
        else
            $echo_out = '...';
        $truncate = apply_filters('the_content', $truncate);
        $truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
        $truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);

        $truncate = strip_tags($truncate);

        if ($echo_out == '...')
            $truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
        else
            $truncate = substr($truncate, 0, $amount);

        if ($echo)
            echo $truncate, $echo_out;
        else
            return ($truncate . $echo_out);
    };
}

/* this function truncates titles to create preview excerpts */

function truncate_title($amount, $echo = true, $post = '') {
    if ($post == '')
        $truncate = get_the_title();
    else
        $truncate = $post->post_title;
    if (strlen($truncate) <= $amount)
        $echo_out = '';
    else
        $echo_out = '...';
    $truncate = mb_substr($truncate, 0, $amount, 'UTF-8');
    if ($echo) {
        echo $truncate;
        echo $echo_out;
    } else {
        return ($truncate . $echo_out);
    }
}

function in_subcat($blogcat, $current_cat = '') {
    $in_subcategory = false;

    if (cat_is_ancestor_of($blogcat, $current_cat) || $blogcat == $current_cat)
        $in_subcategory = true;

    return $in_subcategory;
}

function show_page_menu($customClass = 'nav clearfix', $addUlContainer = true, $addHomeLink = true) {
    global $shortname, $themename, $exclude_pages, $strdepth, $page_menu, $is_footer;

    //excluded pages
    if (get_option($shortname . '_menupages') <> '')
        $exclude_pages = implode(",", get_option($shortname . '_menupages'));

    //dropdown for pages
    $strdepth = '';
    if (get_option($shortname . '_enable_dropdowns') == 'on')
        $strdepth = "depth=" . get_option($shortname . '_tiers_shown_pages');
    if ($strdepth == '')
        $strdepth = "depth=1";

    if ($is_footer) {
        $strdepth = "depth=1";
        $strdepth2 = $strdepth;
    }

    $page_menu = wp_list_pages("sort_column=" . get_option($shortname . '_sort_pages') . "&sort_order=" . get_option($shortname . '_order_page') . "&" . $strdepth . "&exclude=" . $exclude_pages . "&title_li=&echo=0");

    if ($addUlContainer)
        echo('<ul class="' . $customClass . '">');
    if (get_option($shortname . '_home_link') == 'on' && $addHomeLink) {
        ?> 
        <li <?php if (is_front_page() || is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>">Home', $themename); ?></a></li>
        <?php
    };

    echo $page_menu;
    if ($addUlContainer)
        echo('</ul>');
}

;

function show_categories_menu($customClass = 'nav clearfix', $addUlContainer = true) {
    global $shortname, $themename, $category_menu, $exclude_cats, $hide, $strdepth2, $projects_cat;

    //excluded categories
    if (get_option($shortname . '_menucats') <> '')
        $exclude_cats = implode(",", get_option($shortname . '_menucats'));

    //hide empty categories
    if (get_option($shortname . '_categories_empty') == 'on')
        $hide = '1';
    else
        $hide = '0';

    //dropdown for categories
    $strdepth2 = '';
    if (get_option($shortname . '_enable_dropdowns_categories') == 'on')
        $strdepth2 = "depth=" . get_option($shortname . '_tiers_shown_categories');
    if ($strdepth2 == '')
        $strdepth2 = "depth=1";

    $args = "orderby=" . get_option($shortname . '_sort_cat') . "&order=" . get_option($shortname . '_order_cat') . "&" . $strdepth2 . "&exclude=" . $exclude_cats . "&hide_empty=" . $hide . "&title_li=&echo=0";

    $categories = get_categories($args);

    if (!empty($categories)) {
        $category_menu = wp_list_categories($args);
        if ($addUlContainer)
            echo('<ul class="' . $customClass . '">');
        if ($category_menu <> '<li>No categories</li>')
            echo($category_menu);
        if ($addUlContainer)
            echo('</ul>');
    };
}

;

function head_addons() {
    global $shortname, $default_colorscheme;

    if (get_option($shortname . '_color_scheme') <> $default_colorscheme) {
        ?>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style-<?php echo(get_option($shortname . '_color_scheme')); ?>.css" type="text/css" media="screen" />
        <?php
    };

    if (get_option($shortname . '_child_css') == 'on') { //Enable child stylesheet  
        ?>
        <link rel="stylesheet" href="<?php echo(get_option($shortname . '_child_cssurl')); ?>" type="text/css" media="screen" />
        <?php
    };

    if (get_option($shortname . '_custom_colors') == 'on')
        custom_colors_css();
}

; // end function head_addons()
add_action('wp_head', 'head_addons', 7);

function integration_head() {
    global $shortname;
    if (get_option($shortname . '_integration_head') <> '' && get_option($shortname . '_integrate_header_enable') == 'on')
        echo(get_option($shortname . '_integration_head'));
}

;
add_action('wp_head', 'integration_head', 12);

function integration_body() {
    global $shortname;
    if (get_option($shortname . '_integration_body') <> '' && get_option($shortname . '_integrate_body_enable') == 'on')
        echo(get_option($shortname . '_integration_body'));
}

;
add_action('wp_footer', 'integration_body', 12);

/* this function gets page name by its id */

function get_pagename($page_id) {
    global $wpdb;
    $page_name = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID = '" . $page_id . "' AND post_type = 'page'");
    return $page_name;
}

/* this function gets category name by its id */

function get_categname($cat_id) {
    global $wpdb;
    $cat_name = $wpdb->get_var("SELECT name FROM $wpdb->terms WHERE term_id = '" . $cat_id . "'");
    return $cat_name;
}

/* this function gets category id by its name */

function get_catId($cat_name) {
    $cat_name_id = get_cat_ID($cat_name);
    return $cat_name_id;
}

/* this function gets page id by its name */

function get_pageId($page_name) {
    global $wpdb;
    $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $page_name . "' AND post_type = 'page'");

    //fix for qtranslate plugin
    if ($page_name_id == '')
        $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title LIKE '%" . trim($page_name) . "%' AND post_type = 'page'");

    return $page_name_id;
}
