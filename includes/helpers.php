<?php
/**
 * Function helper
 *
 * @package    Advanced_Random_Posts_Widget
 * @since      2.0.5
 * @author     Satrya
 * @copyright  Copyright (c) 2015, Satrya
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Display list of tags for widget.
 *
 * @since  2.0.5
 */
function arpw_tags_list() {

	// Arguments
	$args = array(
		'number' => 99
	);

	// Allow dev to filter the arguments
	$args = apply_filters( 'arpw_tags_list_args', $args );

	// Get the tags
	$tags = get_terms( 'post_tag', $args );

	return $tags;
}

/**
 * Display list of categories for widget.
 *
 * @since  2.0.5
 */
function arpw_cats_list() {

	// Arguments
	$args = array(
		'number' => 99
	);

	// Allow dev to filter the arguments
	$args = apply_filters( 'arpw_cats_list_args', $args );

	// Get the cats
	$cats = get_terms( 'category', $args );

	return $cats;
}