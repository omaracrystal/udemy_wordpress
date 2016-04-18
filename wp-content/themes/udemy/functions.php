<?php

// Set up
add_theme_support( 'menus' );

//  Includes
include( get_template_directory() . '/includes/front/enqueue.php' );
include( get_template_directory() . '/includes/setup.php' );
include( get_template_directory() . '/includes/widgets.php' );
include( get_template_directory() . '/includes/activate.php' );
include( get_template_directory() . '/includes/admin/menus.php' );
include( get_template_directory() . '/includes/admin/options-page.php' );
include( get_template_directory() . '/includes/admin/init.php' );
include( get_template_directory() . '/process/save-options.php' );


//  Action and Filter Hooks
add_action( 'wp_enqueue_scripts', 'cu_enqueue' );
add_action( 'after_setup_theme', 'cu_setup_theme' );
add_action( 'widgets_init', 'cu_widgets' );
add_action( 'after_switch_theme', 'cu_activate' );
add_action( 'admin_menu', 'cu_admin_menus' );
add_action( 'admin_init', 'cu_admin_init' );
// cu_save_options action is called in the ``init.php`` folder under ``process``


//  Shortcodes
