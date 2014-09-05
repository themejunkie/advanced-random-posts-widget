<?php
/**
 * Shortcode helper
 *
 * @package    Advanced_Random_Posts_Widget
 * @since      0.0.1
 * @author     Satrya
 * @copyright  Copyright (c) 2014, Satrya
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Display random posts with shortcode
 *
 * @since  0.0.1
 */
function arpw_shortcode( $atts, $content ) {
	$args = shortcode_atts( arpw_get_default_args(), $atts );
	return arpw_get_random_posts( $args );
}
add_shortcode( 'arpw', 'arpw_shortcode' );