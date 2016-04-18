<?php

function cu_save_options() {
        if( !current_user_can( 'edit_theme_options' ) ){
            wp_die(__('You are not allowed to be on this page.') );
        }

        check_admin_referer( 'cu_options_verify' );

        $opts               =   get_option( 'cu_opts' );
        $opts['twitter']    =   sanitize_text_field($_POST( 'cu_inputTwitter'));
        $opts['facebook']   =   sanitize_text_field($_POST( 'cu_inputFacebook'));
        $opts['youtube']    =   sanitize_text_field($_POST( 'cu_inputYoutube'));
        $opts['logo_type']  =   absint( $_POST('ju_inputLogoType') );
        $opts['footer']     =   $_POST('cu_inputFooter');
        $opts['logo_img']   =   esc_url_raw($_POST('cu_inputLogoImg'));

        update_option( 'cu_opts', $opts );
        wp_redirect( admin_url('') );
    }
