<?php
/**
 * Plugin Name:  Advanced Random Posts Widget
 * Plugin URI:   http://wordpress.org/plugins/advanced-random-posts-widget/
 * Description:  Easy to display random posts via shortcode or widget.
 * Version:      2.0.3
 * Author:       Satrya
 * Author URI:   http://satrya.me/
 * Author Email: satrya@satrya.me
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    Advanced_Random_Posts_Widget
 * @since      0.0.1
 * @author     Satrya
 * @copyright  Copyright (c) 2014, Satrya
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class ARP_Widget {

	/**
	 * PHP5 constructor method.
	 *
	 * @since  0.0.1
	 */
	public function __construct() {

		// Set the constants needed by the plugin.
		add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );

		// Internationalize the text strings used.
		add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );

		// Load the functions files.
		add_action( 'plugins_loaded', array( &$this, 'includes' ), 3 );

		// Load the admin style.
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_style' ) );

		// Register widget.
		add_action( 'widgets_init', array( &$this, 'register_widget' ) );

		// Register new image size.
		add_action( 'init', array( &$this, 'register_image_size' ) );

		// Enqueue the front-end style.
		add_action( 'wp_enqueue_scripts', array( &$this, 'plugin_style' ) );

	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since  0.0.1
	 */
	public function constants() {

		// Set constant path to the plugin directory.
		define( 'ARPW_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		// Set the constant path to the plugin directory URI.
		define( 'ARPW_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// Set the constant path to the includes directory.
		define( 'ARPW_INC', ARPW_DIR . trailingslashit( 'includes' ) );

		// Set the constant path to the classes directory.
		define( 'ARPW_CLASS', ARPW_DIR . trailingslashit( 'classes' ) );

		// Set the constant path to the assets directory.
		define( 'ARPW_ASSETS', ARPW_URI . trailingslashit( 'assets' ) );

	}

	/**
	 * Loads the translation files.
	 *
	 * @since  0.0.1
	 */
	public function i18n() {
		load_plugin_textdomain( 'arpw', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since  0.0.1
	 */
	public function includes() {
		require_once( ARPW_INC . 'resizer.php' );
		require_once( ARPW_INC . 'functions.php' );
		require_once( ARPW_INC . 'shortcode.php' );
	}

	/**
	 * Register custom style for the widget settings.
	 *
	 * @since  0.0.1
	 */
	function admin_style() {

		// Check if current screen is Widgets page.
		if ( 'widgets' != get_current_screen()->base ) {
			return;
		}

		// Loads the widget style.
		wp_enqueue_style( 'arpw-admin-style', trailingslashit( ARPW_ASSETS ) . 'css/arpw-admin.css', array(), null );

	}

	/**
	 * Register the widget.
	 *
	 * @since  0.0.1
	 */
	function register_widget() {
		require_once( ARPW_CLASS . 'widget.php' );
		register_widget( 'Advanced_Random_Posts_Widget' );
	}

	/**
	 * Register new image size.
	 *
	 * @since  0.0.1
	 */
	function register_image_size() {
		add_image_size( 'arpw-thumbnail', 50, 50, true );
	}

	/**
	 * Enqueue front-end style.
	 *
	 * @since  0.0.1
	 */
	function plugin_style() {
		wp_enqueue_style( 'arpw-style', trailingslashit( ARPW_ASSETS ) . 'css/arpw-frontend.css', array(), null );
	}

}

new ARP_Widget;