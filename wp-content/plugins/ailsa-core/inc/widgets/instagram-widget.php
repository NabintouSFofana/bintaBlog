<?php
/*
 * Instagram Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

class vtheme_instagram_feed extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'aisa-instagram-feed',
      AILSA_NAME_P . __( ': Instagram Feed', 'ailsa-core' ),
      array(
        'classname'   => 'aisa-instagram-feed',
        'description' => AILSA_NAME_P . __( ' widget that displays instagram images.', 'ailsa-core' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'      => __( 'Instagram Feed', 'ailsa-core' ),
      'style'      => '',
      'user_name'  => '',
      'user_name_link'  => '',
      'userid'     => '',
      'accesstoken'=> '',
      'limit'      => '',
      'sortby'     => 'random',
      'follow_us_text' => '',
    ));

    // Style
    $style_value = esc_attr( $instance['style'] );
    $style_field = array(
      'id'    => $this->get_field_name('style'),
      'name'  => $this->get_field_name('style'),
      'type' => 'select',
      'options'   => array(
        'ONE' => 'Style One (Sidebar)',
        'TWO' => 'Style Two (Footer)',
      ),
      'default_option' => __( 'Select Style', 'ailsa-core' ),
      'title' => __( 'Style :', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $style_field, $style_value );
    }

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
      'dependency' => array($this->get_field_name('style'), '==', 'ONE'),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $title_field, $title_value );
    }

    // Follow Us Text
    $follow_us_text_value = esc_attr( $instance['follow_us_text'] );
    $follow_us_text_field = array(
      'id'    => $this->get_field_name('follow_us_text'),
      'name'  => $this->get_field_name('follow_us_text'),
      'type'  => 'text',
      'title' => __( 'Follow Us Text :', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
      'dependency' => array($this->get_field_name('style'), '==', 'TWO'),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $follow_us_text_field, $follow_us_text_value );
    }

    // User Name
    $user_name_value = esc_attr( $instance['user_name'] );
    $user_name_field = array(
      'id'    => $this->get_field_name('user_name'),
      'name'  => $this->get_field_name('user_name'),
      'type'  => 'text',
      'title' => __( 'User Name @:', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
      'dependency' => array($this->get_field_name('style'), '==', 'TWO'),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $user_name_field, $user_name_value );
    }

    // User Name Link
    $user_name_link_value = esc_attr( $instance['user_name_link'] );
    $user_name_link_field = array(
      'id'    => $this->get_field_name('user_name_link'),
      'name'  => $this->get_field_name('user_name_link'),
      'type'  => 'text',
      'title' => __( 'User Name Link (Optional):', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
      'dependency' => array($this->get_field_name('style'), '==', 'TWO'),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $user_name_link_field, $user_name_link_value );
    }

    // User ID
    $userid_value = esc_attr( $instance['userid'] );
    $userid_field = array(
      'id'    => $this->get_field_name('userid'),
      'name'  => $this->get_field_name('userid'),
      'type'  => 'text',
      'title' => __( 'User ID :', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $userid_field, $userid_value );
    }

    // Access Token
    $accesstoken_value = esc_attr( $instance['accesstoken'] );
    $accesstoken_field = array(
      'id'    => $this->get_field_name('accesstoken'),
      'name'  => $this->get_field_name('accesstoken'),
      'type'  => 'text',
      'title' => __( 'Access Token :', 'ailsa-core' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $accesstoken_field, $accesstoken_value );
    }

    // Limit
    $limit_value = esc_attr( $instance['limit'] );
    $limit_field = array(
      'id'    => $this->get_field_name('limit'),
      'name'  => $this->get_field_name('limit'),
      'type'  => 'text',
      'title' => __( 'Limit :', 'ailsa-core' ),
      'help' => __( 'How many images want to show?', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $limit_field, $limit_value );
    }

    // SortBy
    $sortby_value = esc_attr( $instance['sortby'] );
    $sortby_field = array(
      'id'    => $this->get_field_name('sortby'),
      'name'  => $this->get_field_name('sortby'),
      'type' => 'select',
      'options'   => array(
        'most-recent' => __('Most Recent', 'ailsa-core'),
        'least-recent' => __('Least Recent', 'ailsa-core'),
        'most-liked' => __('Most Liked', 'ailsa-core'),
        'least-liked' => __('Least Liked', 'ailsa-core'),
        'most-commented' => __('Most Commented', 'ailsa-core'),
        'least-commented' => __('Least Commented', 'ailsa-core'),
        'random' => __('Random', 'ailsa-core'),
        'none' => __('None', 'ailsa-core')
      ),
      'default_option' => __( 'Select SortBy', 'ailsa-core' ),
      'title' => __( 'SortBy :', 'ailsa-core' ),
    );
    if (is_cs_framework_active()) {
      echo cs_add_element( $sortby_field, $sortby_value );
    }

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']           = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['follow_us_text']  = strip_tags( stripslashes( $new_instance['follow_us_text'] ) );
    $instance['user_name']       = strip_tags( stripslashes( $new_instance['user_name'] ) );
    $instance['user_name_link']  = strip_tags( stripslashes( $new_instance['user_name_link'] ) );
    $instance['userid']          = strip_tags( stripslashes( $new_instance['userid'] ) );
    $instance['accesstoken']     = strip_tags( stripslashes( $new_instance['accesstoken'] ) );
    $instance['limit']           = strip_tags( stripslashes( $new_instance['limit'] ) );
    $instance['sortby']          = strip_tags( stripslashes( $new_instance['sortby'] ) );
    $instance['style']           = strip_tags( stripslashes( $new_instance['style'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title             = apply_filters( 'widget_title', $instance['title'] );
    $userid            = $instance['userid'];
    $follow_us_text    = $instance['follow_us_text'];
    $user_name         = $instance['user_name'];
    $user_name_link    = $instance['user_name_link'];
    $accesstoken       = $instance['accesstoken'];
    $limit             = $instance['limit'] ? $instance['limit'] : '9' ;
    $sortby            = $instance['sortby'] ? $instance['sortby'] : 'random';
    $style             = $instance['style'];

    // Display the markup before the widget
    echo $before_widget;

    if ( $title && $style === 'ONE' ) {
      echo $before_title . $title . $after_title;
    }

    if ($style === 'ONE') {
      if ($userid && $accesstoken) {
        $e_uniqid = uniqid();
        $id_name = 'aisa-sidebar-instagram-'. $e_uniqid; ?>
        <div class="row" id="<?php echo $id_name; ?>"></div>
        <script type="text/javascript">
          var instaFeed_<?php echo $e_uniqid; ?> = new Instafeed({
            get: 'user',
            userId: <?php echo $userid; ?>,
            accessToken: '<?php echo $accesstoken; ?>',
            target: '<?php echo $id_name; ?>',
            limit: <?php echo $limit; ?>,
            sortBy: '<?php echo $sortby; ?>',
            resolution: 'thumbnail',
            template: '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 box"><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></div>',
          });
          window.addEventListener('load', instaFeed_<?php echo $e_uniqid; ?>.run(), false);
        </script><?php
      } else {
        echo '<p>No value found for <strong>User ID</strong> or <strong>AccessToken</strong>.</p>';
      }
    } else {
      if ($userid && $accesstoken) {
        $e_uniqid = uniqid();
        $id_name = 'aisa-footer-instagram-'. $e_uniqid; ?>
        <!-- instagramWrap -->
        <div class="aisa-instagramWrap">
          <div class="aisa-titlebar">
            <?php
              if ($user_name && $user_name_link) {
                echo $follow_us_text.' <a href="'. $user_name_link .'" target="_blank">@'.$user_name.'</a>';
              } elseif($user_name) {
                echo $follow_us_text.' <a href="https://www.instagram.com/'.$user_name.'" target="_blank">@'.$user_name.'</a>';
              }
            ?>
          </div>
          <div class="aisa-images">
             <ul id="<?php echo $id_name; ?>"></ul>
          </div>
        </div>
        <!-- instagramWrap -->
        <script type="text/javascript">
          var instaFeed_<?php echo $e_uniqid; ?> = new Instafeed({
            get: 'user',
            userId: <?php echo $userid; ?>,
            accessToken: '<?php echo $accesstoken; ?>',
            target: '<?php echo $id_name; ?>',
            limit: <?php echo $limit; ?>,
            sortBy: '<?php echo $sortby; ?>',
            resolution: 'low_resolution',
            template: '<li><a href="{{link}}" target="_blank"><img src="{{image}}" width="{{width}}" height="{{height}}" /></a></li>',
          });
          window.addEventListener('load', instaFeed_<?php echo $e_uniqid; ?>.run(), false);
        </script>
    <?php
      } else {
        echo '<p>No value found for <strong>User ID</strong> or <strong>AccessToken</strong>.</p>';
      }
    }
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function vtheme_instagram_feed_function() {
  register_widget( "vtheme_instagram_feed" );
}
add_action( 'widgets_init', 'vtheme_instagram_feed_function' );

