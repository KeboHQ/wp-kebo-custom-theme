<?php
/**
 * Plugin Name: Kebo Social - Post Sharing - Addon Theme
 * Plugin URI:  http://domain.com/
 * Description: A custom Theme for Kebo Social Share Buttons.
 * Version:     0.1.0
 * Author:      Author
 * Author URI:  http://domain.com/
 * License:     GPLv2+
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Sorry, no direct access.' );
}

// Useful global constants
define( 'PREFIX_VERSION', '0.4.3' );
define( 'PREFIX_URL', plugin_dir_url(__FILE__) );
define( 'PREFIX_PATH', plugin_dir_path(__FILE__) );

/*
 * Load Plugin
 */
function prefix_plugin_setup() {

    /*
     * Add the Custom Theme to the Post Sharing Theme list.
     */
    function prefix_add_custom_post_sharing_theme( $themes ) {
        
        $custom_theme = array(
            'awesome' => array(
                'value' => 'awesome',
                'label' => __( 'Awesome' )
            ),
        );
        
        $all_themes = array_merge( $themes, $custom_theme );
        
        return $all_themes;
        
    }
    add_filter( 'kbso_post_sharing_themes', 'prefix_add_custom_post_sharing_theme' );
    
    /*
     * If using our custom theme, edit path to custom view files.
     * 
     * Only need this if you want to change the HTML structure/output.
     */
    function prefix_change_post_sharing_view_dir( $view, $theme ) {
        
        if ( 'awesome' == $theme ) {
        
            $view = PREFIX_PATH . 'views';
        
        }
        
        return $view;
        
    }
    add_filter( 'kbso_post_sharing_view_dir', 'prefix_change_post_sharing_view_dir', 10, 2 );
    
    
}
add_action( 'plugins_loaded', 'prefix_plugin_setup', 15 );