<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

//  includes
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);

	// theme styles
	wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/dist/css/theme-styles.css', array(), '1.0.0', 'all' );

	wp_enqueue_script('theme-main-js', get_stylesheet_directory_uri() . '/dist/js/theme-js.js', array(), 1, true);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


// checking acf and acf pro is active
if ( !is_plugin_active('advanced-custom-fields/acf.php')){
	echo '<div class="notice notice-error is-dismissible">
		<p>You need to install and activate <a href="https://wordpress.org/plugins/advanced-custom-fields/"> ACF plugin</a>.</p>
	</div>';
}

if ( !is_plugin_active('advanced-custom-fields-pro/acf.php')){
	echo '<div class="notice notice-error is-dismissible">
		<p>You need to install and activate <a href="https://www.advancedcustomfields.com/pro/"> ACF Pro plugin</a>.</p>
	</div>';
}


// Add theme options page
if (is_plugin_active('advanced-custom-fields/acf.php') && is_plugin_active('advanced-custom-fields-pro/acf.php')){
	add_action('acf/init', 'theme_acf_init');
}


function theme_acf_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}