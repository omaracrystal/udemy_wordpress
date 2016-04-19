<?php

function recipe_admin_init() {
    include( 'create-metaboxes.php' );
    include( 'recipe-options.php' );

    add_action( 'add_meta_boxes_recipe', 'cu_create_metaboxes' );
    add_action( 'admin_equeue_scripts', 'cu_admin_enqueue' );
}
