<!DOCTYPE html>
<html lang="en">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="http://www.techairlines.com/xmlrpc.php" />
    <link rel="publisher" href="https://plus.google.com/115584030451420995590/" />
    
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/icons.css" />

    <link rel="alternate" type="application/rss+xml" title="TechAirlines RSS Feed" href="http://www.techairlines.com/feed/" />
    <link rel="alternate" type="application/atom+xml" title="TechAirlines Atom Feed" href="http://www.techairlines.com/feed/atom/" />
    
    <?php if (is_attachment()) { ?>
    <meta name="robots" content="noindex,follow" />
    <?php } ?>

    <?php if(is_single() ) { ?>
    <meta property="og:site_name" content="TechAirlines"/>
    <meta property="article:publisher" content="http://www.facebook.com/techairlines" />
    <meta property="og:title" content="<?php the_title_attribute(); ?>" />
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

    <header id="nav-container" class="full-width">
        <nav id="primary-nav" class="container">
            <div role="branding" itemscope="" itemtype="http://schema.org/Organization">
            <?php if ( is_home()  ) { ?>
                <h1 class="logo"><a href="<?php echo home_url(); ?>" rel="home"><img itemprop="logo" src="http://localhost/wordpress/wp-content/themes/techrocket/images/logo.png" alt="TechAirlines" title="TechAirlines" /></a></h1>
            <?php } else { ?>
                <h4 class="logo"><a href="<?php echo home_url(); ?>" rel="home"><img itemprop="logo" src="http://localhost/wordpress/wp-content/themes/techrocket/images/logo.png" alt="TechAirlines" title="TechAirlines" /></a></h4>
            <?php } ?>
            </div>
            <div class="left">               

                <?php
                $menuClass = 'nav';
                $menuID = 'primary-navigation';
                $primaryNav = '';
                if (function_exists('wp_nav_menu')) {
                    $primaryNav = wp_nav_menu(array('theme_location' => 'cat-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false));
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
                        <li class="menu-about"><a href="#"><i class="icon-menu"></i> About</a>
                            <?php
                                $menuClass = 'about-nav';
                                $menuID = 'about-nav';
                                if (function_exists('wp_nav_menu')) {
                                    echo wp_nav_menu(array('theme_location' => 'primary-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false));
                                } 
                            ?>
                        </li>
                        <li class="menu-follow"><a href="#"><i class="icon-twitter"></i> Follow</a>
                            <ul>
                                <li><a href="http://twitter.com/TechAirlines"><i class="icon-twitter"></i> Follow on Twitter</a></li>
                                <li><a href="http://www.facebook.com/techairlines"><i class="icon-facebook"></i> Become our fan</a></li>
                                <li><a href="http://plus.google.com/+TechAirlines"><i class="icon-googleplus"></i> Join our circle</a></li>	                		          
                                <!--<li><a href="<?php echo get_option('techrocket_newsletter_url'); ?>"><i class="icon-mail"></i> Join our newsletter</a></li>-->   
                                <li><a href="http://feeds.techairlines.com/TechAirlines"><i class="icon-feed"></i> Subscribe to RSS</a></li>          		         		             
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
                    <i class="btn-nav-icon icon-menu2"></i> Categories
                </div><!-- .btn-nav-left -->	

                <div class="clear"></div>

            </nav><!-- #primary-nav -->
    </header>
        
        <nav id="mobile-menu">
            <?php
            $menuClass = 'ul';
            $menuID = 'responsive-menu';
            $res_menu = '';
            $response_menu_args = array(
                'theme_location' => 'cat-nav',
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
