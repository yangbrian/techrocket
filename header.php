<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="en">
<!--<![endif]-->
<!--
  _______        _              _      _ _                
 |__   __|      | |       /\   (_)    | (_)               
    | | ___  ___| |__    /  \   _ _ __| |_ _ __   ___ ___ 
    | |/ _ \/ __| '_ \  / /\ \ | | '__| | | '_ \ / _ / __|
    | |  __| (__| | | |/ ____ \| | |  | | | | | |  __\__ \
    |_|\___|\___|_| |_/_/    \_|_|_|  |_|_|_| |_|\___|___/
   
-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="http://www.techairlines.com/xmlrpc.php" />
    <link rel="publisher" href="https://plus.google.com/115584030451420995590/" />
    
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" />

    <link rel="alternate" type="application/rss+xml" title="TechAirlines RSS Feed" href="http://www.techairlines.com/feed/" />
    <link rel="alternate" type="application/atom+xml" title="TechAirlines Atom Feed" href="http://www.techairlines.com/feed/atom/" />
    
    <?php if (is_attachment()) { ?>
    <meta name="robots" content="noindex,follow" />
    <?php } ?>

    <?php if(is_single() ) { ?>
    <meta property="og:site_name" content="TechAirlines"/>
    <meta property="og:title" content="<?php the_title_attribute(); ?>" />
    <meta property="fb:app_id" content="269872793048549" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );
    echo $thumb['0'];
    ?>" />
    <link rel="image_src" href="<?php
    $thumb1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
    echo $thumb1['0'];
    ?>" />
    <?php } ?>
    
    
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>	
    <![endif]-->
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>  

    <div id="nav-container" class="full-width">
        <nav id="primary-nav" class="container">
            <h1 class="logo"><a href="<?php echo home_url(); ?>">TechAirlines</a></h1>
            <div class="left">               

                <?php
                $menuClass = 'nav';
                $menuID = 'primary-navigation';
                $primaryNav = '';
                if (function_exists('wp_nav_menu')) {
                    $primaryNav = wp_nav_menu(array('theme_location' => 'primary-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false));
                }
                if ($primaryNav == '') {
                    ?>
                        <ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
                            <?php if (get_option('techrocket_home_link') == 'on') { ?>
                                <li class="<?php if (!is_page()) echo('first'); ?>"><a href="<?php echo home_url(); ?>">Home</a></li>		
                            <?php } ?>
                            <?php show_page_menu($menuClass, false, false); ?>
                        </ul>
                    <?php } else echo($primaryNav); ?>
                </div><!-- .left -->

                <div class="right">
                    <ul class="nav">                  
                        <li class="menu-category"><a href="#"><i class="icon-align-justify"></i> Categories</a>
                            <ul>
                                <?php //show_categories_menu($menuClass, false, false); ?>
                            </ul>
                        </li>
                        <li class="menu-follow"><a href="#"><i class="icon-twitter"></i> Follow</a>
                            <ul>
                                <li><a href="<?php echo get_option('techrocket_twitter_url'); ?>"><i class="icon-twitter-sign"></i> Follow on Twitter</a></li>
                                <li><a href="<?php echo get_option('techrocket_facebook_url'); ?>"><i class="icon-facebook-sign"></i> Become our fan</a></li>
                                <li><a href="<?php echo get_option('techrocket_google_plus_url'); ?>"><i class="icon-google-plus-sign"></i> Join our circle</a></li>	                		          
                                <li><a href="<?php echo get_option('techrocket_newsletter_url'); ?>"><i class="icon-envelope-alt"></i> Join our newsletter</a></li>   
                                <li><a href="<?php echo get_option('techrocket_rss_url'); ?>"><i class="icon-rss-sign"></i> Subscribe to RSS</a></li>          		         		             
                            </ul>
                        </li>
                        <li class="menu-search"><a href="#"><i class="icon-search"></i> Search</a>
                            <ul>
                                <li><?php get_search_form(); ?></li>             		
                            </ul>
                        </li>        						                
                    </ul>
                </div><!-- .right -->

                <div class="btn-nav-left">
                    Menu <i class="btn-nav-icon icon-caret-down"></i> 
                </div><!-- .btn-nav-left -->	

                <div class="clear"></div>

            </nav><!-- #primary-nav -->
    </div>
        
        <nav id="mobile-menu">
            <?php
            $menuClass = 'ul';
            $menuID = 'responsive-menu';
            $res_menu = '';
            $response_menu_args = array(
                'theme_location' => 'primary-nav',
                'container' => '',
                'fallback_cb' => '',
                'menu_class' => $menuClass,
                'menu_id' => $menuID,
                'echo' => false
            );
            $res_menu = wp_nav_menu($response_menu_args);
            if ($res_menu) {

                echo $res_menu;
            } else {
                echo '<ul id="responsive-menu">';
                show_page_menu($menuClass, false, false);
                echo '</ul>';
            }
            ?>
        </nav><!-- #mobile-menu -->

        <div id="main" class="container">