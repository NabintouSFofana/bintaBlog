<?php
/*
 * All Front-End Helper Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* Exclude category from blog */
if( ! function_exists( 'ailsa_excludeCat' ) ) {
  function ailsa_excludeCat($query) {
    if ( $query->is_home ) {

      $exclude_cat_ids = cs_get_option('theme_exclude_categories');
      if($exclude_cat_ids) {
        foreach( $exclude_cat_ids as $exclude_cat_id ) {
          $exclude_from_blog[] = '-'. $exclude_cat_id;
        }
        $query->set('cat', implode(',', $exclude_from_blog));
      }

    }
    return $query;
  }
  add_filter('pre_get_posts', 'ailsa_excludeCat');
}

/* Tag Cloud Widget - Remove Inline Font Size */
if( ! function_exists( 'ailsa_tag_cloud' ) ) {
  function ailsa_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
  add_filter('wp_generate_tag_cloud', 'ailsa_tag_cloud', 10, 3);
}

/* Password Form */
if( ! function_exists( 'ailsa_password_form' ) ) {
  function ailsa_password_form( $output ) {
    $output = str_replace( 'type="submit"', 'type="submit" class=""', $output );
    return $output;
  }
  add_filter('the_password_form' , 'ailsa_password_form');
}

/* Maintenance Mode */
if( ! function_exists( 'ailsa_maintenance_mode' ) ) {
  function ailsa_maintenance_mode(){
    $enable_maintenance_mode = cs_get_option( 'enable_maintenance_mode' );
    $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    if ( isset($enable_maintenance_mode) && ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('layouts/post/content', 'maintenance');
      exit;
    }
  }
  add_action( 'wp', 'ailsa_maintenance_mode', 1 );
}

/* Widget Layouts */
if ( ! function_exists( 'ailsa_footer_widgets' ) ) {
  function ailsa_footer_widgets() {

    $output = '';
    $footer_widget_layout = cs_get_option('footer_widget_layout');

    if( $footer_widget_layout ) {

      switch ( $footer_widget_layout ) {
        case 1: $widget = array('piece' => 1, 'class' => 'col-lg-12 col-md-12 col-sm-12 col-xs-12'); break;
        case 2: $widget = array('piece' => 2, 'class' => 'col-lg-6 col-md-6 col-sm-6 col-xs-12'); break;
        case 3: $widget = array('piece' => 3, 'class' => 'col-lg-4 col-md-4 col-sm-4 col-xs-12'); break;
        case 4: $widget = array('piece' => 4, 'class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12'); break;
        case 5: $widget = array('piece' => 3, 'class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12', 'layout' => 'col-lg-6 col-md-6 col-sm-6 col-xs-12', 'queue' => 1); break;
        case 6: $widget = array('piece' => 3, 'class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12', 'layout' => 'col-lg-6 col-md-6 col-sm-6 col-xs-12', 'queue' => 2); break;
        case 7: $widget = array('piece' => 3, 'class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12', 'layout' => 'col-lg-6 col-md-6 col-sm-6 col-xs-12', 'queue' => 3); break;
        case 8: $widget = array('piece' => 4, 'class' => 'col-lg-2 col-md-3 col-sm-3 col-xs-12', 'layout' => 'col-lg-6 col-md-3 col-sm-3 col-xs-12', 'queue' => 1); break;
        case 9: $widget = array('piece' => 4, 'class' => 'col-lg-2 col-md-3 col-sm-3 col-xs-12', 'layout' => 'col-lg-6 col-md-3 col-sm-3 col-xs-12', 'queue' => 4); break;
        default : $widget = array('piece' => 4, 'class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12'); break;
      }

      for( $i = 1; $i < $widget["piece"]+1; $i++ ) {

        $widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];

        $output .= '<div class="'. $widget_class .'">';
        ob_start();
        if (is_active_sidebar('footer-'. $i)) {
          dynamic_sidebar( 'footer-'. $i );
        }
        $output .= ob_get_clean();
        $output .= '</div>';

      }
    }

    return $output;

  }
}

/* Title Area */
if ( ! function_exists( 'ailsa_title_area' ) ) {
  function ailsa_title_area() {

    global $post, $wp_query;

    if ( is_home() ) {
      bloginfo('');
    } elseif ( is_search() ) {
      printf( esc_html__( 'Search Results for %s', 'ailsa' ), '<mark class="dark">' . get_search_query() . '</mark>' );
    } elseif ( is_category() ){
      echo esc_html__( 'Posts for', 'ailsa' ); ?>
        <mark class="dark">
          <?php echo single_cat_title("", false); ?>
        </mark>
      <?php echo esc_html__( 'Category', 'ailsa' );
    } elseif ( is_tag() ){
        echo esc_html__( 'Posts Tagged', 'ailsa' ); ?>
         <mark class="dark">
           <?php echo single_tag_title("", false); ?>
         </mark><?php
    } elseif ( is_archive() ){
      if ( is_day() ) {
        printf( esc_html__( 'Archive for %s', 'ailsa' ), '<mark class="dark">' . get_the_date() . '</mark>' );
      } elseif ( is_month() ) {
        printf( esc_html__( 'Archive for %s', 'ailsa' ), '<mark class="dark">' . get_the_date( 'F, Y' ) . '</mark>' );
      } elseif ( is_year() ) {
        printf( esc_html__( 'Archive for %s', 'ailsa' ), '<mark class="dark">' . get_the_date( 'Y' ) . '</mark>' );
      } elseif ( is_author() ) {
        printf( esc_html__( 'Posts by %s', 'ailsa' ), '<mark class="dark">' . get_the_author_meta( 'display_name', $wp_query->post->post_author ) . '</mark>');
      } elseif ( is_post_type_archive() ) {
        post_type_archive_title();
      } else {
        esc_html_e( 'Archives', 'ailsa' );
      }
    } elseif( is_404() ) {
      esc_html_e('404 Error', 'ailsa');
    } else {
      the_title();
    }

  }
}

/* Excerpt Length Change */
if ( ! function_exists( 'ailsa_trim_excerpt' ) ) {

  function ailsa_trim_excerpt($text) {
    global $post;

    if ( '' == $text ) {
      $text = get_the_content('');
      $text = apply_filters('the_content', $text);
      $text = str_replace('\]\]\>', ']]>', $text);
      $text = strip_tags($text, '<br>,<em>,<i>,<p>');
    }
    return $text;
  }

  remove_filter('get_the_excerpt', 'wp_trim_excerpt');
  add_filter('get_the_excerpt', 'ailsa_trim_excerpt');
}

class AILSA_Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  public static function length($new_length) {
    AILSA_Excerpt::$length = $new_length;
    AILSA_Excerpt::output();
  }

  // Echoes out the excerpt
  public static function output() {
    $text = get_the_excerpt();
    $words = explode(' ', $text, AILSA_Excerpt::$length + 1);
    if (count($words)> AILSA_Excerpt::$length) {
      array_pop($words);
      $text = implode(' ', $words);
    }
    echo $text .'...';
  }

}

// Custom Excerpt Length
function ailsa_my_excerpt($length) {
  AILSA_Excerpt::length($length);
}

/* Excerpt More Change */
if ( ! function_exists( 'ailsa_new_excerpt_more' ) ) {
  function ailsa_new_excerpt_more( $more ) {
    return '...';
  }
  add_filter('excerpt_more', 'ailsa_new_excerpt_more');
}

/* WP Link Pages */
if ( ! function_exists( 'ailsa_wp_link_pages' ) ) {
  function ailsa_wp_link_pages() {
    $defaults = array(
      'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'ailsa' ),
      'after'            => '</div>',
      'link_before'      => '<span>',
      'link_after'       => '</span>',
      'next_or_number'   => 'number',
      'separator'        => ' ',
      'pagelink'         => '%',
      'echo'             => 1
    );
    wp_link_pages( $defaults );
  }
}

/* Get Comments Number */
if ( ! function_exists( 'ailsa_comment_number' ) ) {
  function ailsa_comment_number() {
    global $post;
    $comment_singular_text = cs_get_option('comment_singular_text') ? cs_get_option('comment_singular_text') : esc_html__( 'Comment', 'ailsa' );
    $comment_plural_text = cs_get_option('comment_plural_text') ? cs_get_option('comment_plural_text') : esc_html__( 'Comments', 'ailsa' );
    $no_comments_text = cs_get_option('no_comments_text') ? cs_get_option('no_comments_text') : esc_html__( 'No Comments', 'ailsa' );
    $num_comments = get_comments_number( $post->ID );

    if ( comments_open($post->ID) ) {
  	  if ( $num_comments == 0 ) {
    		$comments = $no_comments_text;
  	  } elseif ( $num_comments > 1 ) {
    		$comments = $num_comments .' '.$comment_plural_text;
  	  } else {
    		$comments = $num_comments .' '.$comment_singular_text;
  	  }
  	  $write_comments = '<a href="'. esc_url(get_comments_link()) .'">'. $comments .'</a>';
    } else {
  	  $write_comments = esc_html__('Comments Off', 'ailsa');
    }

    return $write_comments;
  }
}

/* Share Options */
if ( ! function_exists( 'ailsa_wp_share_option' ) ) {
  function ailsa_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID);
    $title = $post->post_title;
    $share_text = cs_get_option('share_text') ? cs_get_option('share_text') : esc_html__( 'Share', 'ailsa' );
    $share_on_text = cs_get_option('share_on_text') ? cs_get_option('share_on_text') : esc_html__( 'Share On', 'ailsa' );
    ?>
    <div class="collapse">
      <a class="aisa-share" href="javascript:void(0);"><?php echo esc_attr($share_text); ?><span>:</span></a>
      <ul>
        <li>
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" target="_blank" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'ailsa'); ?>"><i class="fa fa-facebook-official"></i></a>
        </li>
        <li>
          <a href="//twitter.com/intent/tweet?text=<?php print(urlencode($title)); ?>&url=<?php print(urlencode($page_url)); ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'ailsa'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
          <a href="//pinterest.com/pin/create/button/?url=<?php print(urlencode($page_url)); ?>&amp;description=<?php print(urlencode($title)); ?>" target="_blank" class="icon-fa-pinterest" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Pinterest', 'ailsa'); ?>"><i class="fa fa-pinterest"></i></a>
        </li>
        <li>
          <a href="mailto:?subject=<?php print($title); ?>&body=<?php print($title); ?>%20%3A%20%0A<?php print($page_url); ?>" target="_blank" class="icon-fa-email" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Email', 'ailsa'); ?>"><i class="fa fa-envelope-square"></i></a>
        </li>
      </ul>
    </div>
<?php
  }
}

/* Author Info */
if ( ! function_exists( 'ailsa_author_info' ) ) {
  function ailsa_author_info() {

    if (get_the_author_meta( 'url' )) {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_the_author_meta( 'url' );
      $target = 'target="_blank"';
    } else {
      $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $website_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
      $target = '';
    }

  $author_content = get_the_author_meta( 'description' );
if ($author_content) {
?>
<div class="aisa-author">
  <div class="aisa-author-info">
    <div class="author-avatar">
      <a href="<?php echo esc_url($website_url); ?>" <?php echo esc_attr($target); ?>>
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 91 ); ?>
      </a>
    </div>
    <div class="author-content">
      <a href="<?php echo esc_url($author_url); ?>" class="author-name"><?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?></a>
      <p><?php echo get_the_author_meta( 'description' ); ?></p>
    </div>
  </div>
  <ul class="social">
    <?php if (get_the_author_meta( 'twitter' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
    <?php }
    if (get_the_author_meta( 'facebook' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
    <?php }
    if (get_the_author_meta( 'instagram' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    <?php }
    if (get_the_author_meta( 'vimeo' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'vimeo' ) ); ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
    <?php }
    if (get_the_author_meta( 'pinterest' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
    <?php }
    if (get_the_author_meta( 'linkedin' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    <?php }
    if (get_the_author_meta( 'youtube' )) { ?>
      <li><a href="<?php echo esc_url(get_the_author_meta( 'youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
    <?php } ?>
  </ul>
</div>
<?php
} // if $author_content
  }
}

/* Custom Comment Area Modification */
if ( ! function_exists( 'ailsa_comment_modification' ) ) {
  function ailsa_comment_modification($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
    $comment_class = empty( $args['has_children'] ) ? '' : 'parent';
    $reply_comment_text = cs_get_option('reply_comment_text') ? cs_get_option('reply_comment_text') : esc_html__( 'Reply', 'ailsa' );
  ?>

  <<?php echo esc_attr($tag) .' '. comment_class('item ' . $comment_class .' ' ); ?> id="comment-<?php comment_ID() ?>">

    <?php if ( 'div' != $args['style'] ) : ?>

    <div id="div-comment-<?php comment_ID() ?>" class="">
    <?php endif; ?>

    <div class="comment-theme">
      <div class="comment-image">
        <?php if ( $args['avatar_size'] != 0 ) {
          echo get_avatar( $comment, 80 );
        } ?>
      </div>
    </div>

    <div class="comment-main-area">
      <div class="comment-wrapper">

        <div class="aisa-comments-meta">
          <h4><?php printf( '%s', get_comment_author() ); ?></h4>
          <span class="comments-date">
            <?php echo get_comment_date('jS M Y'); echo ' - '; ?>
            <span class="caps"><?php echo get_comment_time(); ?></span>
          </span>
          <div class="comments-reply">
            <?php
              comment_reply_link( array_merge( $args, array(
                'reply_text' => '<span class="comment-reply-link">'. $reply_comment_text .'</span>',
                'before' => '',
                'class'  => '',
                'depth' => $depth,
                'max_depth' => $args['max_depth']
              ) ) );
            ?>
          </div>
        </div>
        <?php if ( $comment->comment_approved == '0' ) : ?>
          <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'ailsa' ); ?></em>
        <?php endif; ?>
        <div class="comment-area"><?php comment_text(); ?></div>
      </div>
    </div>

    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif;
  }
}

/* Pagination Function */
if ( ! function_exists( 'ailsa_paging_nav' ) ) {
  function ailsa_paging_nav() {
    $blog_pagination_style = cs_get_option('blog_pagination_style');
    $older_post = cs_get_option('older_post');
    $newer_post = cs_get_option('newer_post');
    $older_post = $older_post ? $older_post : esc_html__( 'OLDER POSTS', 'ailsa' );
    $newer_post = $newer_post ? $newer_post : esc_html__( 'NEWER POSTS', 'ailsa' );
    if($blog_pagination_style === 'pagination_number'){
      if ( function_exists('wp_pagenavi')) {
        wp_pagenavi();
      } else {
        global $wp_query;
        $big = 999999999;
        echo paginate_links( array(
          'base'   => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'total'  => $wp_query->max_num_pages,
          'show_all'  => false,
          'current'   => max( 1, get_query_var('paged') ),
          'prev_text' => $older_post,
          'next_text' => $newer_post,
       	  'mid_size'  => 1,
          'type' => 'list'
        ) );
      }
    } else {
    global $wp_query; ?>
    <div class="aisa-pagination text row">
      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 newer">
        <?php next_posts_link( '<i class="fa fa-angle-double-left" aria-hidden="true"></i> '. $older_post, $wp_query->max_num_pages ); ?>
      </div>
      <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12 older">
        <?php previous_posts_link( $newer_post . ' <i class="fa fa-angle-double-right" aria-hidden="true"></i>', $wp_query->max_num_pages ); ?>
      </div>
    </div>
<?php
    }
  }
}