<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

function asl_search_stylesheets() {
    // Don't print if on the back-end
    if (!is_admin()) {
        $asl_options = get_option('asl_options');
        wp_register_style('wpdreams-asl-basic', ASL_URL.'css/style.basic.css', array(), ASL_CURR_VER_STRING);
        wp_enqueue_style('wpdreams-asl-basic');
        wp_enqueue_style('wpdreams-ajaxsearchlite', plugins_url('css/style-'.w_isset_def($asl_options['theme'], 'polaroid').'.css', dirname(__FILE__)), array(), ASL_CURR_VER_STRING);
    }
}

add_action('wp_print_styles', 'asl_search_stylesheets');