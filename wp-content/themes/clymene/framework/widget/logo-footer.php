<?php 

// Creating the widget 

class clymene_logo_widget extends WP_Widget {



function __construct() {

parent::__construct(

// Base ID of your widget

'clymene_logo_widget',


// Widget name will appear in UI

__('Clymene Logo Footer', 'clymene'), 


// Widget description

array( 'description' => __( 'Clymene Logo Footer', 'clymene' ), ) 

);

}


// Creating widget front-end

// This is where the action happens

public function widget( $args, $instance ) {

	// these are the widget options

	$image = esc_attr($instance['image']);

	$link = esc_attr($instance['link']);


// before and after widget arguments are defined by themes

echo htmlspecialchars_decode($args['before_widget']);

?>

	
<a href="<?php if($link) echo esc_url($link); else echo esc_url(home_url('/')); ?>" class="animsition-link"><div class="logo-footer" style=" background-image: url(<?php echo esc_attr($image); ?>);"></div></a>
</div>
<?php 

echo htmlspecialchars_decode($after_widget);
}

		

// Widget Backend 

public function form( $instance ) {

// Check values

     $image = esc_attr($instance['image']);

	$link = esc_attr($instance['link']);
 

// Widget admin form

?>

<p>

<label for="<?php echo esc_attr($this->get_field_id( 'image' )); ?>"><?php _e( 'Link Logo Image:', 'clymene' ); ?></label> 

<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />

</p>


<p>

<label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php _e('Link Logo Click:', 'clymene'); ?></label>

<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" />

</p>


<?php 

}

	

// Updating widget replacing old instances with new

public function update( $new_instance, $old_instance ) {

$instance = array();

$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? strip_tags( $new_instance['image'] ) : '';

$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

return $instance;

}

} // Class wpb_widget ends here


// Register and load the widget

function clymene_wpb_clymene_logo_widget() {

	register_widget( 'clymene_logo_widget' );

}

add_action( 'widgets_init', 'clymene_wpb_clymene_logo_widget' );

