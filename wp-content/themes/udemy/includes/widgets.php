<?php

function cu_widgets() {
    register_sidebar(array(
        'name' => __('My First Theme Sidebar', 'udemy'),
        'id' => 'cu_sidebar',
        'description' => __( 'Sidebar for the theme Udemy', 'udemy' ),
        'class'       => '',
        'before_widget' => '<div id="%1$s" class="card %2$s">',
        'after_widget'  => '</div></div></div>',
        'before_title'  => '<div class="card-header bg-primary"><span class="card-title">',
        'after_title'   => '</span></div><div class="card-content"><div class="widget">'
    ));
}
