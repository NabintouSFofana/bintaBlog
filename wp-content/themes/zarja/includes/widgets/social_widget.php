<?php
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'social_widget' );
/* Function that registers our widget. */
function social_widget() {
	register_widget( 'socials' );
}
class socials extends WP_Widget {
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'socials', 'description' => 'Displays the post image and title.'.'zarja' );
		/* Create the widget. */
		parent::__construct( 'socials-widget','Zarya - Premium Social Widget', $widget_ops, '' );
	}
	function widget( $args, $instance ) {
		global $pmc_data;
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] ); 
		pmc_security($before_widget); 
		if ( $title ) pmc_security($before_title . $title . $after_title); 	?>
		<div class="widgett">		
			<div class="social_icons">
				<div><?php pmc_socialLink() ?></div>
			</div>
		</div>	
		<?php
		echo pmc_security($after_widget);
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		/* Strip tags (if needed) and update the widget settings. */

		$instance['title'] = strip_tags( $new_instance['title'] );
		
		return $instance;
	}
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Social');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">Title:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr(esc_attr($instance['title'])); ?>" />
		</p>
		
		<p>
			You can put social icons via Theme options.
		</p>
		<?php
	}
	
	

}
?>
