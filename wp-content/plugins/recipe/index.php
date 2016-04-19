<?php
/**
 * Plugin Name: Recipe
 * Description: A simple Wordpress plugin that allows users to create recipes and rate those recipes
 * Version: 1.0
 * Author: Crystal
 * Author URI: https://jaskokoyn.com
 * Text Domain: recipe
 */

if ( !function_exists( 'add_action' ) ){
    echo 'Not allowed!';
    exit();
}


// Setup
define('RECIPE_PLUGIN_URL', __FILE__ );

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/index.php' );


// Hooks
register_activation_hook( _FILE_, 'cu_activate_plugin' );
add_action( 'init', 'recipe_init' );
add_action( 'admin_init', 'recipe_admin_init' );
add_action( 'save_post_recipe', 'cu_save_posts_admin', 10, 3 );

// Shortcodes

