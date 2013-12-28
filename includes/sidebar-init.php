<?php

// Register Widgets
function tr_widgets_init() {
    // Sidebar
    register_sidebar(array(
        'name' => __('Sidebar', 'techrocket'),
        'id' => 'sidebar',
        'description' => __('Sidebar', 'techrocket'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('init', 'tr_widgets_init');
?>