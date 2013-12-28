<?php

/* --------------------------------------------------------------------------------- */
/* Loads all the .php files found in /includes/widgets/ directory */
/* --------------------------------------------------------------------------------- */

$preview_template = _preview_theme_template_filter();

if (!empty($preview_template)) {
    $tr_widgets_dir = WP_CONTENT_DIR . "/themes/" . $preview_template . "/includes/widgets/";
} else {
    $tr_widgets_dir = WP_CONTENT_DIR . "/themes/" . get_option('template') . "/includes/widgets/";
}

if (@is_dir($tr_widgets_dir)) {
    $tr_widgets_dh = opendir($tr_widgets_dir);
    while (($tr_widgets_file = readdir($tr_widgets_dh)) !== false) {

        if (strpos($tr_widgets_file, '.php') && $tr_widgets_file != "widget-blank.php") {
            include_once($tr_widgets_dir . $tr_widgets_file);
        }
    }
    closedir($tr_widgets_dh);
}

/* --------------------------------------------------------------------------------- */
/* Deregister Default Widgets */
/* --------------------------------------------------------------------------------- */
if (!function_exists('tr_deregister_widgets')) {

    function tr_deregister_widgets() {
        unregister_widget('WP_Widget_Search');
    }

}
add_action('widgets_init', 'tr_deregister_widgets');
?>