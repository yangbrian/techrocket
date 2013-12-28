<?php

/* sets predefined Post Thumbnail dimensions */

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');

    //default thumbnail size	
    add_image_size('entry-thumb', 520, 300, true);
    add_image_size('category-widget-thumb', 80, 80, true);
};

// NOTE: You need to regenerate all thumbnails if you modified the default thumbnails size
// Regenerate Thumbnails Plugin: http://wordpress.org/extend/plugins/regenerate-thumbnails/
?>