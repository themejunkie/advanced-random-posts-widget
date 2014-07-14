<?php
/**
 * Plugin Name:  Advanced Random Posts Widget
 * Plugin URI:   http://satrya.me/wordpress-plugins/advanced-random-posts-widget/
 * Description:  Enables advanced random posts widget.
 * Version:      1.6
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
 * @since      1.0
 * @author     Satrya <satrya@satrya.me>
 * @copyright  Copyright (c) 2014, Satrya
 * @link       http://satrya.me/wordpress-plugin/related-post-types
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Advanced_Random_Posts_Widget {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	 */
	public function __construct() {

		// Set constant path to the plugin directory.
		add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );

		// Internationalize the text strings used.
		add_action( 'plugins_loaded', array( &$this, 'i18n' ), 2 );

		// Loads the functions files.
		add_action( 'plugins_loaded', array( &$this, 'includes' ), 3 );

		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_style' ) );

	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since 1.0
	 */
	public function constants() {

		// Set constant path to the plugin directory.
		define( 'ARPW_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		// Set the constant path to the plugin directory URI.
		define( 'ARPW_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// Set the constant path to the includes directory.
		define( 'ARPW_INCLUDES', ARPW_DIR . trailingslashit( 'includes' ) );

	}

	/**
	 * Loads the translation files.
	 *
	 * @since 1.0
	 */
	public function i18n() {
		load_plugin_textdomain( 'arpw', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since 1.0
	 */
	public function includes() {
		require_once( ARPW_INCLUDES . 'widget-advanced-random-posts.php' );
	}

	/**
	 * Register custom style for the widget setting.
	 *
	 * @since 1.5
	 */
	function admin_style() {
		wp_enqueue_style( 'arpw-admin-style', ARPW_URI . 'includes/admin.css' );
	}

}

new Advanced_Random_Posts_Widget;