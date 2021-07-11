<?php
/*
 * Recent Post Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

class vtheme_recent_posts extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'aisa-recent-blog',
      AILSA_NAME_P . __( ': Recent Posts', 'ailsa-core' ),
      array(
        'classname'   => 'aisa-recent-blog',
        'description' => AILSA_NAME_P . __( ' widget that displays recent posts.', 'ailsa-core' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'     => __( 'Recent Posts', 'ailsa-core' ),
      'ptypes'    => 'post',
      'limit'     => '3',
      'date'      => true,
      'category'  => '',
      'order'     => '',
      'orderby'   => '',
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $title_field, $title_value );
    }

    // Post Type
    $ptypes_value = esc_attr( $instance['ptypes'] );
    $ptypes_field = array(
      'id'    => $this->get_field_name('ptypes'),
      'name'  => $this->get_field_name('ptypes'),
      'type' => 'select',
      'options' => 'post_types',
      'default_option' => __( 'Select Post Type', 'ailsa-core' ),
      'title' => __( 'Post Type :', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $ptypes_field, $ptypes_value );
    }

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'ailsa-core' ),
      'help' => __( 'How many posts want to show?', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $limit_field, $limit_value );
    }

    // Date
    $date_value = esc_attr( $instance['date'] );
    $date_field = array(
      'id'    => $this->get_field_name('date'),
      'name'  => $this->get_field_name('date'),
      'type'  => 'switcher',
      'on_text'  => __( 'Yes', 'ailsa-core' ),
      'off_text'  => __( 'No', 'ailsa-core' ),
      'title' => __( 'Display Date :', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $date_field, $date_value );
    }

    // Category
    $category_value = esc_attr( $instance['category'] );
    $category_field = array(
      'id'    => $this->get_field_name('category'),
      'name'  => $this->get_field_name('category'),
      'type'  => 'text',
      'title' => __( 'Category :', 'ailsa-core' ),
      'help' => __( 'Enter category slugs with comma(,) for multiple items', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $category_field, $category_value );
    }

    // Order
    $order_value = esc_attr( $instance['order'] );
    $order_field = array(
      'id'    => $this->get_field_name('order'),
      'name'  => $this->get_field_name('order'),
      'type' => 'select',
      'options'   => array(
        'ASC' => 'Ascending',
        'DESC' => 'Descending',
      ),
      'default_option' => __( 'Select Order', 'ailsa-core' ),
      'title' => __( 'Order :', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $order_field, $order_value );
    }

    // Orderby
    $orderby_value = esc_attr( $instance['orderby'] );
    $orderby_field = array(
      'id'    => $this->get_field_name('orderby'),
      'name'  => $this->get_field_name('orderby'),
      'type' => 'select',
      'options'   => array(
        'none' => __('None', 'ailsa-core'),
        'ID' => __('ID', 'ailsa-core'),
        'author' => __('Author', 'ailsa-core'),
        'title' => __('Title', 'ailsa-core'),
        'name' => __('Name', 'ailsa-core'),
        'type' => __('Type', 'ailsa-core'),
        'date' => __('Date', 'ailsa-core'),
        'modified' => __('Modified', 'ailsa-core'),
        'rand' => __('Random', 'ailsa-core'),
      ),
      'default_option' => __( 'Select OrderBy', 'ailsa-core' ),
      'title' => __( 'OrderBy :', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $orderby_field, $orderby_value );
    }

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['ptypes']       = strip_tags( stripslashes( $new_instance['ptypes'] ) );
    $instance['limit']        = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['date']         = strip_tags( stripslashes( $new_instance['date'] ) );
    $instance['category']     = strip_tags( stripslashes( $new_instance['category'] ) );
    $instance['order']        = strip_tags( stripslashes( $new_instance['order'] ) );
    $instance['orderby']      = strip_tags( stripslashes( $new_instance['orderby'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title             = apply_filters( 'widget_title', $instance['title'] );
    $ptypes            = $instance['ptypes'];
    $limit             = $instance['limit'];
    $display_date      = $instance['date'];
    $category          = $instance['category'];
    $order             = $instance['order'];
    $orderby           = $instance['orderby'];

    $args = array(
      // other query params here,
      'post_type' => esc_attr($ptypes),
      'posts_per_page' => (int)$limit,
      'orderby' => esc_attr($orderby),
      'order' => esc_attr($order),
      'category_name' => esc_attr($category),
      'ignore_sticky_posts' => 1,
     );

    $vtheme_rpw = new WP_Query( $args );
    global $post;

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    if ($vtheme_rpw->have_posts()) : while ($vtheme_rpw->have_posts()) : $vtheme_rpw->the_post();

      if(has_post_thumbnail(get_the_ID())) {
        $layout_class_rp = 'col-lg-7 col-md-7 col-sm-12 col-xs-12 boxright';
      } else {
        $layout_class_rp = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
      } ?>
      <div class="row">
        <?php if(has_post_thumbnail(get_the_ID())) { ?>
        <div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12 box">
          <a href="<?php esc_url(the_permalink()) ?>"><?php the_post_thumbnail(  array(80, 80) ); ?></a>
        </div>
        <?php } ?>
        <div class="<?php echo $layout_class_rp; ?>">
          <h4>
            <a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a>
          </h4>
          <?php if ($display_date === '1') { ?>
            <label>
              <?php echo get_the_date('M'). ' ' .get_the_date('d'). ', ' .get_the_date('Y'); ?>
            </label>
          <?php } ?>
        </div>
      </div>
      <hr /><?php
    endwhile; endif;
    wp_reset_postdata();
    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function vtheme_recent_posts_function() {
  register_widget( "vtheme_recent_posts" );
}
add_action( 'widgets_init', 'vtheme_recent_posts_function' );


