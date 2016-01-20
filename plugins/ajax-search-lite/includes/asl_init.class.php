<?php
class aslInit {

    function ajaxsearchlite_activate() {
        $this->chmod();
    }

    function asl_init() {
        load_plugin_textdomain( 'ajax-search-lite', false, ASL_DIR . '/languages' );
    }

    function navigation_menu() {
        if (current_user_can('manage_options'))  {
            add_menu_page(
                __('Ajax Search Lite', 'ajax-search-lite'),
                __('Ajax Search Lite', 'ajax-search-lite'),
                'manage_options',
                ASL_DIR.'/backend/settings.php',
                '',
                ASL_URL.'icon.png',
                "207.9"
            );
            add_submenu_page(
                ASL_DIR.'/backend/settings.php',
                __("Ajax Search Lite", 'ajax-search-lite'),
                __("Analytics Integration", 'ajax-search-lite'),
                'manage_options',
                ASL_DIR.'/backend/analytics.php'
            );
            add_submenu_page(
                ASL_DIR.'/backend/settings.php',
                __("Ajax Search Lite", 'ajax-search-lite'),
                __("Compatibility Options", 'ajax-search-lite'),
                'manage_options',
                ASL_DIR.'/backend/compatibility.php'
            );
            add_submenu_page(
                ASL_DIR.'/backend/settings.php',
                __("Ajax Search Lite", 'ajax-search-lite'),
                __("Performance Options", 'ajax-search-lite'),
                'manage_options',
                ASL_DIR.'/backend/performance_options.php'
            );
            add_submenu_page(
                ASL_DIR.'/backend/settings.php',
                __("Ajax Search Lite", 'ajax-search-lite'),
                __("Help and support", 'ajax-search-lite'),
                'manage_options',
                ASL_DIR.'/backend/help_and_support.php'
            );
        }
    }

    function styles() {

    }

    function scripts() {
        $prereq = 'wpdreams-asljquery';
        $js_source = 'nomin-scoped';
        $performance_options = get_option('asl_performance');

        $load_in_footer = w_isset_def($performance_options['load_in_footer'], 1) == 1 ? true : false;

        wp_register_script('wpdreams-asljquery',  ASL_URL.'js/'.$js_source.'/asljquery.js', array(), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-asljquery');
        wp_register_script('wpdreams-gestures', ASL_URL.'js/'.$js_source.'/jquery.gestures.js', array($prereq), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-gestures');
        wp_register_script('wpdreams-easing', ASL_URL.'js/'.$js_source.'/jquery.easing.js', array($prereq), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-easing');
        wp_register_script('wpdreams-mousewheel',ASL_URL.'js/'.$js_source.'/jquery.mousewheel.js', array($prereq), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-mousewheel');
        wp_register_script('wpdreams-scroll', ASL_URL.'js/'.$js_source.'/jquery.mCustomScrollbar.js', array($prereq, 'wpdreams-mousewheel'), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-scroll');
        wp_register_script('wpdreams-ajaxsearchlite', ASL_URL.'js/'.$js_source.'/jquery.ajaxsearchlite.js', array($prereq, "wpdreams-scroll"), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-ajaxsearchlite');
        wp_register_script('wpdreams-asl-wrapper', ASL_URL.'js/'.$js_source.'/asl_wrapper.js', array($prereq, "wpdreams-ajaxsearchlite"), ASL_CURR_VER_STRING, $load_in_footer);
        wp_enqueue_script('wpdreams-asl-wrapper');

        $ajax_url = admin_url('admin-ajax.php');
        if ( w_isset_def($performance_options['use_custom_ajax_handler'], 0) == 1 )
            $ajax_url = ASL_URL . 'ajax_search.php';

        // @deprecated
        wp_localize_script( 'wpdreams-ajaxsearchlite', 'ajaxsearchlite', array(
            'ajaxurl' => $ajax_url,
            'backend_ajaxurl' => admin_url( 'admin-ajax.php'),
            'js_scope' => 'asljQuery'
        ));

        wp_localize_script( 'wpdreams-ajaxsearchlite', 'ASL', array(
            'ajaxurl' => $ajax_url,
            'backend_ajaxurl' => admin_url( 'admin-ajax.php'),
            'js_scope' => 'asljQuery'
        ));

    }


    function chmod() {
        if (@chmod(ASL_CSS_PATH, 0777) == false)
            @chmod(ASL_CSS_PATH, 0755);
        if (@chmod(ASL_CACHE_PATH, 0777) == false)
            @chmod(ASL_CACHE_PATH, 0755);
        if (@chmod(ASL_TT_CACHE_PATH, 0777) == false)
            @chmod(ASL_TT_CACHE_PATH, 0755);
    }

    function footer() {

    }
}