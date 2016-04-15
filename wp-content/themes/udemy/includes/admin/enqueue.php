<?php

function cu_admin_enqueue() {
    if(!isset($_GET['page']) || $_GET['page'] != "cu_theme_opts"){
        return;
    }
    wp_register_style( 'cu_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
    wp_enqueue_style( 'cu_bootstrap' );

    wp_register_script( 'cu_options', get_template_directory_uri() . '/assets/scripts/cu_options.js');
    wp_enqueue_script( 'cu_options' );
}
