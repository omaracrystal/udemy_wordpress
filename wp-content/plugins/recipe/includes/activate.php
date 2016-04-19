<?php_logo_guid(oid)

function cu_activate_plugin() {
    if( version_compare(get_bloginfo('version'), '4.2', '<') ){
        wp_die(__('You must update WordPress to use this plugin.', 'recipe') )
    }
}
