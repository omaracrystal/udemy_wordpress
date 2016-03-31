<?php

// Set up
add_theme_support( 'menus' );

//  Includes
include( get_template_directory() . '/includes/front/enqueue.php' );
include( get_template_directory() . '/includes/setup.php' );
include( get_template_directory() . '/includes/widgets.php' );


//  Action and Filter Hooks
add_action( 'wp_enqueue_scripts', 'cu_enqueue' );
add_action( 'after_setup_theme', 'cu_setup_theme' );
add_action( 'widgets_init', 'cu_widgets' );

//  Shortcodes
