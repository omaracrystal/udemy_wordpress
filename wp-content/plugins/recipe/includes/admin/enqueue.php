<?php

function cu_admin_enqueue() {
    wp_register_style( 'cu_bootstrap', plugins_url( '/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL ));
    wp_enqueue_style( 'cu_bootstrap', plugins_url() );

}
