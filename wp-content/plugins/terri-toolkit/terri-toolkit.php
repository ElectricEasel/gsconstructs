<?php

/**
 *
 * @link              http://devclick.uk
 * @since             1.0
 * @package           Terri_Toolkit
 *
 * @wordpress-plugin
 * Plugin Name:       Terri Toolkit
 * Plugin URI:        http://demo.devclick.uk/terri
 * Description:       Terri Toolkit is a plugin intended to be used with the Terri theme only. This plugin adds custom post types and shortcodes, but does not include any styles as these styles are added in the Terri theme.
 * Version:           1.0.3
 * Author:            Devclick
 * Author URI:        http://devclick.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       terri-toolkit
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Terri_Toolkit {





	private static $instance;





	/**
	 * Actions setup
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3 );
		add_action( 'after_setup_theme', array( $this, 'includes' ), 11 );

	}




	/**
	 * Constants
	 */
	function constants() {

		define( 'TT_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'TT_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

	}




	/**
	 * Includes
	 */
	function includes() {

		//Post types
		require_once( TT_DIR . 'includes/post-types/post-type-portfolio.php' );
		require_once( TT_DIR . 'includes/post-types/post-type-team.php' );

		//Shortcodes
		require_once( TT_DIR . 'includes/shortcodes/shortcodes.php' );

	}




	/**
	 * Translations
	 */
	function i18n() {

		load_plugin_textdomain( 'terri-toolkit', false, 'terri-toolkit/languages' );

	}




	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}




}




function terri_rewrite_flush() {
	terri_portfolio();
	terri_team();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'terri_rewrite_flush' );




function terri_toolkit_plugin() {

	return Terri_Toolkit::get_instance();
	
}
add_action('plugins_loaded', 'terri_toolkit_plugin', 1);