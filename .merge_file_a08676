<?php

// Exit if accessed directly
if ( ! defined('ABSPATH') ) exit;

class arpw_widget extends WP_Widget {

	/**
	 * Widget setup
	 */
	function arpw_widget() {
	
		$widget_ops = array( 
			'classname'   => 'arpw_widget random-posts', 
			'description' => __( 'Enable advanced random posts widget.', 'arpw' ) 
		);

		$control_ops = array( 
			'width'   => 800, 
			'height'  => 350, 
			'id_base' => 'arpw_widget' 
		);

		$this->WP_Widget( 'arpw_widget', __( 'Advanced Random Posts', 'arpw' ), $widget_ops, $control_ops );

	}

	/**
	 * Display widget
	 */
	function widget( $args, $instance ) {

		extract( $args, EXTR_SKIP );
 
		$title        = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$title_url    = esc_url( $instance['title_url'] );
		$limit        = (int)( $instance['limit'] );
		$excerpt      = $instance['excerpt'];
		$length       = (int)( $instance['length'] );
		$thumb        = $instance['thumb'];
		$thumb_height = (int)( $instance['thumb_height'] );
		$thumb_width  = (int)( $instance['thumb_width'] );
		$cat          = $instance['cat'];
		$tag          = $instance['tag'];
		$date         = $instance['date'];
		$css          = wp_filter_nohtml_kses( $instance['css'] );
		$css_id       = $instance['css_id'];
		$css_default  = $instance['css_default'];

		echo $before_widget;

		if ( $css_default == true )
			arpw_custom_styles(); // load the custom style.

		if( $css )
		    echo '<style>' . $css . '</style>';
 
		if ( ! empty( $title_url ) && ! empty( $title ) )
			echo $before_title . '<a href="' . $title_url . '" title="' . esc_attr( $title ) . '">' . $title . '</a>' . $after_title;
		elseif ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		
			global $post;

			$args = array( 
				'numberposts'  => $limit,
				'category__in' => $cat,
				'tag__in'      => $tag,
				'post_type'    => 'post',
				'orderby'      => 'rand'
			);

		    $arpwwidget = get_posts( $args );

		    if( $arpwwidget ) : ?>

				<div <?php echo( ! empty( $css_id ) ? 'id="' . $css_id . '"' : '' ); ?> class="arpw-block">
					
					<ul>

						<?php foreach( $arpwwidget as $post ) :	setup_postdata( $post ); ?>

							<li class="arpw-clearfix">

								<?php if( $thumb == true && has_post_thumbnail() ) { ?>
									
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'arpw' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
										<?php
											if ( current_theme_supports( 'get-the-image' ) )
												get_the_image( array( 'meta_key' => 'Thumbnail', 'height' => $thumb_height, 'width' => $thumb_width, 'image_class' => 'arpw-alignleft', 'link_to_post' => false ) );
											else 
												the_post_thumbnail( array( $thumb_height, $thumb_width ), array( 'class' => 'arpw-alignleft', 'alt' => esc_attr( get_the_title() ), 'title' => esc_attr( get_the_title() ) ) );
										?>
									</a>

								<?php } ?>

								<h3 class="arpw-title">
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'arpw' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h3>

								<?php if( $date == true ) { ?>
									<span class="arpw-time"><?php echo human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . __( ' ago', 'arpw' ); ?></span>
								<?php } ?>

								<?php if( $excerpt == true ) {  ?>
									<div class="arpw-summary"><?php echo arpw_excerpt( $length ); ?></div>
								<?php } ?>

							</li>

						<?php endforeach; wp_reset_postdata(); ?>

					</ul>

				</div><!-- .arpw-block - http://wordpress.org/plugins/advanced-random-posts-widget/ -->

			<?php endif;

		echo $after_widget;
		
	}

	/**
	 * Update widget
	 */
	function update( $new_instance, $old_instance ) {

		$instance                 = $old_instance;
		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['title_url']    = esc_url_raw( $new_instance['title_url'] );
		$instance['limit']        = (int)( $new_instance['limit'] );
		$instance['excerpt']      = $new_instance['excerpt'];
		$instance['length']       = (int)( $new_instance['length'] );
		$instance['thumb']        = $new_instance['thumb'];
		$instance['thumb_height'] = (int)( $new_instance['thumb_height'] );
		$instance['thumb_width']  = (int)( $new_instance['thumb_width'] );
		$instance['cat']          = $new_instance['cat'];
		$instance['tag']          = $new_instance['tag'];
		$instance['date']         = $new_instance['date'];
		$instance['css']          = wp_filter_nohtml_kses( $new_instance['css'] );
		$instance['css_id']       = sanitize_html_class( $new_instance['css_id'] );
		$instance['css_default']  = $new_instance['css_default'];

		return $instance;

	}

	/**
	 * Widget setting
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
        $defaults = array(
            'title'        => '',
            'title_url'    => '',
            'limit'        => 5,
            'excerpt'      => '',
            'length'       => 10,
            'thumb'        => true,
            'thumb_height' => 45,
            'thumb_width'  => 45,
            'cat'          => '',
            'tag'          => '',
            'date'         => true,
            'css'          => '',
            'css_id'       => '',
            'css_default'  => true
        );
        
		$instance     = wp_parse_args( (array) $instance, $defaults );
		$title        = strip_tags( $instance['title'] );
		$title_url    = esc_url( $instance['title_url'] );
		$limit        = (int)( $instance['limit'] );
		$excerpt      = $instance['excerpt'];
		$length       = (int)($instance['length']);
		$thumb        = $instance['thumb'];
		$thumb_height = (int)( $instance['thumb_height'] );
		$thumb_width  = (int)( $instance['thumb_width'] );
		$cat          = $instance['cat'];
		$tag          = $instance['tag'];
		$date         = $instance['date'];
		$css          = wp_filter_nohtml_kses( $instance['css'] );
		$css_id       = $instance['css_id'];
		$css_default  = $instance['css_default'];

	?>

	<div class="arpw-columns-3">

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'arpw' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_url' ) ); ?>"><?php _e( 'Title URL:', 'arpw' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_url' ) ); ?>" type="text" value="<?php echo $title_url; ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'css_id' ) ); ?>"><?php _e( 'CSS ID:', 'arpw' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'css_id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'css_id' ) ); ?>" type="text" value="<?php echo $css_id; ?>" />
		</p>
		<p>
			<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'css_default' ) ); ?>"><?php _e( 'Use Default Styles', 'arpw' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'css_default' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'css_default' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $css_default ); ?> />&nbsp;
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'css' ); ?>"><?php _e( 'Custom CSS:', 'arpw' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'css' ); ?>" name="<?php echo $this->get_field_name( 'css' ); ?>" style="height:100px;"><?php echo $css; ?></textarea>
			<small><?php _e( 'If you turn off the default styles, please create your own style.', 'arpw' ); ?></small>
		</p>

	</div><!-- .arpw-columns-3 -->

	<div class="arpw-columns-3">

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php _e( 'Limit:', 'arpw' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" type="text" value="<?php echo $limit; ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>"><?php _e( 'Limit to specific or multiple Category: ', 'arpw' ); ?></label>
		   	<select class="widefat" multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cat' ) ); ?>[]" style="width:100%;">
				<optgroup label="<?php echo esc_attr_e( 'Categories', 'arpw' ); ?>">
					<?php $categories = get_terms( 'category' ); ?>
					<?php foreach( $categories as $category ) { ?>
						<option value="<?php echo $category->term_id; ?>" <?php if ( is_array( $cat ) && in_array( $category->term_id, $cat ) ) echo ' selected="selected"'; ?>><?php echo $category->name; ?></option>
					<?php } ?>
				</optgroup>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>"><?php _e( 'Limit to specific or multiple Tag: ', 'arpw' ); ?></label>
		   	<select class="widefat" multiple="multiple" id="<?php echo esc_attr( $this->get_field_id( 'tag' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tag' ) ); ?>[]" style="width:100%;">
				<optgroup label="Tags">
					<?php $tags = get_terms( 'post_tag' ); ?>
					<?php foreach( $tags as $post_tag ) { ?>
						<option value="<?php echo $post_tag->term_id; ?>" <?php if ( is_array( $tag ) && in_array( $post_tag->term_id, $tag ) ) echo ' selected="selected"'; ?>><?php echo $post_tag->name; ?></option>
					<?php } ?>
				</optgroup>
			</select>
		</p>

	</div><!-- .arpw-columns-3 -->

	<div class="arpw-columns-3 arpw-column-last">

		<?php if( current_theme_supports( 'post-thumbnails' ) ) { ?>

			<p>
				<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'thumb' ) ); ?>"><?php _e( 'Display thumbnail?', 'arpw' ); ?></label>
		      	<input id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" type="checkbox" value="1" <?php checked( '1', $thumb ); ?> />&nbsp;
	        </p>
	        <p>
				<label class="rpwe-block" for="<?php echo esc_attr( $this->get_field_id( 'thumb_height' ) ); ?>"><?php _e( 'Thumbnail size (height x width):', 'arpw' ); ?></label>
				<input class= "small-input" id="<?php echo esc_attr( $this->get_field_id( 'thumb_height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_height' ) ); ?>" type="text" value="<?php echo $thumb_height; ?>" />
				<input class= "small-input" id="<?php echo esc_attr( $this->get_field_id( 'thumb_width' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumb_width' ) ); ?>" type="text" value="<?php echo $thumb_width; ?>" />
			</p>

		<?php } ?>

		<p>
			<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>"><?php _e( 'Display excerpt?', 'arpw' ); ?></label>
	      	<input id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" type="checkbox" value="1" <?php checked( '1', $excerpt ); ?> />&nbsp;
        </p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'length' ) ); ?>"><?php _e( 'Excerpt length:', 'arpw' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'length' ) ); ?>" type="text" value="<?php echo $length; ?>" />
		</p>

		<p>
			<label class="input-checkbox" for="<?php echo esc_attr( $this->get_field_id( 'date' ) ); ?>"><?php _e( 'Display date?', 'arpw' ); ?></label>
	      	<input id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" type="checkbox" value="1" <?php checked( '1', $date ); ?> />&nbsp;
        </p>

	</div><!-- .arpw-columns-3 .arpw-column-last -->

	<div class="clear"></div>

	<?php
	}

}

/**
 * Register widget.
 *
 * @since 1.0
 */
function arpw_register_widget() {
	register_widget( 'arpw_widget' );
}
add_action( 'widgets_init', 'arpw_register_widget' );

/**
 * Print a custom excerpt.
 * http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 *
 * @since 1.0
 */
function arpw_excerpt( $length ) {

	$excerpt = explode( ' ', get_the_excerpt(), $length );
	if ( count( $excerpt )>=$length ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ) . '&hellip;';
	} else {
		$excerpt = implode( " ", $excerpt );
	} 
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

	return $excerpt;

}

/**
 * Custom Styles.
 *
 * @since 1.5
 */
function arpw_custom_styles() {
	?>
<style>
.arpw-block ul{list-style:none!important;margin-left:0!important;padding-left:0!important;}.arpw-block li{border-bottom:1px solid #eee;margin-bottom:10px;padding-bottom:10px;}.arpw-block a{display:inline!important;text-decoration:none;}.arpw-block h3{background:none!important;clear:none;margin-bottom:0!important;font-weight:400;font-size:12px!important;line-height:1.5;}.arpw-alignleft{border:1px solid #eee!important;box-shadow:none!important;display:inline;float:left;margin:2px 10px 0 0;padding:3px!important;}.arpw-summary{font-size:12px;}.arpw-time{color:#bbb;font-size:11px;}.arpw-clearfix:before,.arpw-clearfix:after{content:"";display:table;}.arpw-clearfix:after{clear:both;}.arpw-clearfix{zoom:1;}
</style>
	<?php
}
?>