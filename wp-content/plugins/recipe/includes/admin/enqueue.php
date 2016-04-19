<?php

function cu_admin_enqueue() {
    golbal $typenow;

    if( $typenow !== 'recipe' ) {
        return;
    }

    wp_register_style( 'cu_bootstrap', plugins_url( '/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL ));
    wp_enqueue_style( 'cu_bootstrap' );
}
