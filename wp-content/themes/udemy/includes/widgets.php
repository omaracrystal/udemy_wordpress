<?php

function cu_widgets() {
    register_sidebar(array(
        'name' => __('My First Theme Sidebar', 'udemy'),
        'id' => 'cu_sidebar',
        'description' => ( 'Sidebar for the theme Udemy', 'udemy' ),
        'class'       => '',
    ));
}
