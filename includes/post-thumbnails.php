<?php

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');

    //default thumbnail size	
    add_image_size('entry-thumb', 375, 250, true);
    add_image_size('yarpp-thumbnail', 150, 150, true);
    add_image_size( 'featured-thumb', 700, 460, true );

    //add_image_size( 'featured-thumb-small', 250, 150, true);
}
