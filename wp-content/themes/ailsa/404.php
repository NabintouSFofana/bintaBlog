<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

// Theme Options
$ailsa_error_heading = cs_get_option('error_heading');
$ailsa_error_page_content = cs_get_option('error_page_content');
$ailsa_error_btn_text = cs_get_option('error_btn_text');

$ailsa_error_heading = ( $ailsa_error_heading ) ? $ailsa_error_heading : esc_html__( 'Sorry! The Page Not Found', 'ailsa' );
$ailsa_error_page_content = ( $ailsa_error_page_content ) ? $ailsa_error_page_content : esc_html__( 'The Link You Followed Probably Broken, Or The Page Has Been Removed From Website.', 'ailsa' );
$ailsa_error_btn_text = ( $ailsa_error_btn_text ) ? $ailsa_error_btn_text : esc_html__( 'BACK TO HOME', 'ailsa' );

get_header(); ?>
<!-- Content 404 Start-->
<div class="container">
  <div class="row">
    <div class="error-content">
   	  <h3><?php echo esc_attr($ailsa_error_heading); ?></h3>
   	  <p><?php echo esc_attr($ailsa_error_page_content); ?></p>
   	  <a href="<?php echo esc_url(home_url('/')); ?>" class="aisa-btn btn-fourth"><?php echo esc_attr($ailsa_error_btn_text); ?></a>
    </div>
  </div>
</div>
<!-- Content 404 End-->
<?php
get_footer();
