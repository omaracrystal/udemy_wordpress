<?php

function cu_enqueue(){
    //REGISTER STYLES
    wp_register_style( 'cu_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
    wp_register_style( 'cu_main', get_template_directory_uri() . '/assets/styles/main.css');
    wp_register_style( 'cu_roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900');
    wp_register_style( 'cu_roboto_mono', 'https://fonts.googleapis.com/css?family=Roboto+Mono:400,300,700');
    //ENQUEUE STYLES
    wp_enqueue_style( 'cu_bootstrap' );
    wp_enqueue_style( 'cu_main' );
    wp_enqueue_style( 'cu_roboto' );
    wp_enqueue_style( 'cu_roboto_mono' );

    //REGISTER SCRIPTS
    wp_register_script( 'cu_fastclick', get_template_directory_uri() . '/assets/vendor/fastclick/fastclick.js' );
    wp_register_script( 'cu_modernizr', get_template_directory_uri() . '/assets/vendor/modernizr/modernizr.js' );
    wp_register_script( 'cu_bootstrap', get_template_directory_uri() . '/assets/scripts/bootstrap.min.js', array(), false, true );
    wp_register_script( 'cu_rippler', get_template_directory_uri() . '/assets/vendor/rippler/rippler.min.js', array(), false, true );
    wp_register_script( 'cu_slimscroll', get_template_directory_uri() . '/assets/vendor/slimscroll/slimscroll.min.js', array(), false, true );
    wp_register_script( 'cu_swipebox', get_template_directory_uri() . '/assets/vendor/swipebox/swipebox.min.js', array(), false, true );
    wp_register_script( 'cu_dotdotdot', get_template_directory_uri() . '/assets/vendor/dotdotdot/dotdotdot.min.js', array(), false, true );
    wp_register_script( 'cu_app', get_template_directory_uri() . '/assets/scripts/app.js', array(), false, true );
    //ENQUEUE SCRIPTS
    wp_enqueue_script( 'jquery');
    wp_enqueue_script('cu_fastclick');
    wp_enqueue_script('cu_modernizr');
    wp_enqueue_script('cu_bootstrap');
    wp_enqueue_script('cu_rippler');
    wp_enqueue_script('cu_slimscroll');
    wp_enqueue_script('cu_swipebox');
    wp_enqueue_script('cu_dotdotdot');
    wp_enqueue_script('cu_app');
}

