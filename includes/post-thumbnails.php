<?php

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');

    //default thumbnail size	
    add_image_size('entry-thumb', 450, 150, true);
    
    add_image_size( 'featured-thumb', 696, 450, true );

    //add_image_size( 'featured-thumb-small', 250, 150, true);
}
