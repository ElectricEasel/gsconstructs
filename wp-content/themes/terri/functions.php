<?php
/**
 * Terri functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Terri
 */





/*--------------------------------------------------------------
***** Terri theme defaults
--------------------------------------------------------------*/
if ( ! function_exists( 'terri_setup' ) ) {
	function terri_setup() {

		load_theme_textdomain( 'terri', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		set_post_thumbnail_size( 1170, 700 );

		// Devclick slider image sizes
		add_image_size( 'terri-home-slider-large', 1170, 700, true );
		add_image_size( 'terri-home-slider-medium', 940, 340, true );
		add_image_size( 'terri-home-slider-small', 460, 160, true );

		// Devclick col image sizes
		add_image_size( 'terri-col-large', 1170, 650 );
		add_image_size( 'terri-col-medium', 710, 390 );
		add_image_size( 'terri-col-small', 470, 260 );

		register_nav_menus( array(
			'main'   => esc_html__( 'Main', 'terri' ),
			'mobile' => esc_html__( 'Mobile', 'terri' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'terri_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_post_type_support( 'page', 'excerpt' );
	}
	add_action( 'after_setup_theme', 'terri_setup' );
}





/*--------------------------------------------------------------
***** Terri content width
--------------------------------------------------------------*/
if ( ! function_exists( 'terri_content_width' ) ) {
	function terri_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'terri_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'terri_content_width', 0 );
}




/*--------------------------------------------------------------
***** Terri front end scripts
--------------------------------------------------------------*/
if ( ! function_exists( 'terri_scripts' ) ) {
	function terri_scripts() {
		wp_enqueue_style( 'terri-fonts', terri_fonts_url(), array(), null );
		wp_enqueue_style( 'terri-style', get_stylesheet_uri() );

		$terri_url_prefix = is_ssl() ? 'https:' : 'http:';
		$terri_gmap_api_key = '';
		if ( get_theme_mod( 'devclick_google_map_api' ) ) {
			$terri_gmap_api_key = '?key='. esc_attr( get_theme_mod( 'devclick_google_map_api' ) ) .'';
		}

		wp_enqueue_script( 'terri-maps', $terri_url_prefix . '//maps.googleapis.com/maps/api/js'. $terri_gmap_api_key .'', null, true );
		wp_enqueue_script( 'terri-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), '20160622', true );
		wp_enqueue_script( 'terri-init', get_template_directory_uri() . '/assets/js/init.js', array('jquery'), '20160622', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'terri_scripts' );
}




/*--------------------------------------------------------------
***** Terri admin scripts
--------------------------------------------------------------*/
if ( ! function_exists( 'terri_admin_scripts' ) ) {
	function terri_admin_scripts( $hook ) {
		
		wp_enqueue_style( 'terri_wp_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css' );

		wp_enqueue_style( 'wp-color-picker' );
   		wp_enqueue_script( 'terri_wp_admin_js', get_template_directory_uri() . '/assets/js/admin-style.js', array( 'wp-color-picker', 'jquery' ) );
	}
	add_action( 'admin_enqueue_scripts', 'terri_admin_scripts' );
}





/*--------------------------------------------------------------
***** Terri template tags
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/template-tags.php' );





/*--------------------------------------------------------------
***** Terri theme fonts
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/theme-fonts.php' );




/*--------------------------------------------------------------
***** Terri theme sidebars
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/theme-sidebars.php' );




/*--------------------------------------------------------------
***** Terri theme functions
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/theme-functions.php' );





/*--------------------------------------------------------------
***** Terri theme widgets
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/theme-widgets.php' );




/*--------------------------------------------------------------
***** Terri page builder
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/page-builder.php' );




/*--------------------------------------------------------------
***** Terri customizer
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/customizer.php' );




/*--------------------------------------------------------------
***** Terri customizer default styles
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/theme-style.php' );




/*--------------------------------------------------------------
***** Terri custom comments
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/custom-comments.php' );




/*--------------------------------------------------------------
***** Terri walker menu
--------------------------------------------------------------*/
require_once( get_template_directory() . '/inc/nav_walker_nav_menu.php' );




/*--------------------------------------------------------------
***** Terri ACF settings
--------------------------------------------------------------*/
if ( 'yes' !== get_theme_mod( 'devclick_acf_panel', 'no' ) && ! defined( 'ACF_LITE' ) ) {
	define( 'ACF_LITE', true );
}

require_once get_template_directory() . '/inc/custom-fields.php';





/*--------------------------------------------------------------
***** Terri TGM plugin activation
--------------------------------------------------------------*/
if ( is_admin() ) {

	require_once get_template_directory() . '/inc/plugins/class-tgm-plugin-registration.php';

}

function ocdi_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Main Demo Import', 'terri' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-files/main-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-files/main-widgets.json',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-files/main-customizer.dat',
            'import_preview_image_url'     => esc_url( 'http://terridemo.devclick.uk/wp-content/uploads/2016/11/demo-terriconstruction.jpg' ),
        ),
        array(
            'import_file_name'             => esc_html__( 'Electrician Demo Import', 'terri' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-files/electrician-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-files/electrician-widgets.json',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-files/electrician-customizer.dat',
            'import_preview_image_url'     => esc_url( 'http://terrielectrician.devclick.uk/wp-content/uploads/2016/11/demo-electrician.jpg' ),
        ),
        array(
            'import_file_name'             => esc_html__( 'Landscaper Demo Import', 'terri' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-files/landscaper-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-files/landscaper-widgets.json',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-files/landscaper-customizer.dat',
            'import_preview_image_url'     => esc_url( 'http://terrilandscaper.devclick.uk/wp-content/uploads/2016/11/demo-landscaper.jpg' ),
        ),
        array(
            'import_file_name'             => esc_html__( 'Plumber Demo Import', 'terri' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-files/plumber-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-files/plumber-widgets.json',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-files/plumber-customizer.dat',
            'import_preview_image_url'     => esc_url( 'http://terriplumber.devclick.uk/wp-content/uploads/2016/11/demo-plumber.jpg' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );