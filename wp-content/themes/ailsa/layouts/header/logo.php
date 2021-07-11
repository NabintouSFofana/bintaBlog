<?php
// Metabox
$ailsa_id    = ( isset( $post ) ) ? $post->ID : 0;
$ailsa_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $ailsa_id;
$ailsa_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() ) ? $ailsa_id : false;
$ailsa_meta  = get_post_meta( $ailsa_id, 'page_type_metabox', true );

if ($ailsa_meta) {
  $ailsa_logo_area = $ailsa_meta['logo_area'];
} else {
  $ailsa_logo_area = true;
}
// Logo Image
$ailsa_brand_logo_default = cs_get_option('brand_logo_default');
$ailsa_brand_logo_retina  = cs_get_option('brand_logo_retina');

// Have retina or not
if ($ailsa_brand_logo_retina){
  $ailsa_have_retina = 'have-retina';
} else {
  $ailsa_have_retina = 'dnt-have-retina';
}

// Retina Size
$ailsa_retina_width  = cs_get_option('retina_width');
$ailsa_retina_height = cs_get_option('retina_height');

// Logo Spacings
$ailsa_brand_logo_top = cs_get_option('brand_logo_top');
$ailsa_brand_logo_bottom = cs_get_option('brand_logo_bottom');

// Slogan
$ailsa_slogan_text = cs_get_option('slogan_text');

if ($ailsa_brand_logo_top) {
	$ailsa_brand_logo_top = 'padding-top:'. ailsa_check_px($ailsa_brand_logo_top) .';';
} else {
  $ailsa_brand_logo_top = '';
}
if ($ailsa_brand_logo_bottom) {
	$ailsa_brand_logo_bottom = 'padding-bottom:'. ailsa_check_px($ailsa_brand_logo_bottom) .';';
} else {
  $ailsa_brand_logo_bottom = '';
}

if ($ailsa_logo_area) {
?>

<div class="aisa-logowrap">
  <div class="container aisa-logobar">
    <div class="aisa-logo <?php echo esc_attr($ailsa_have_retina); ?>" style="<?php echo esc_attr($ailsa_brand_logo_top); echo esc_attr($ailsa_brand_logo_bottom); ?>">
    <?php
    // Text logo h1 open
    if (!$ailsa_brand_logo_default) { ?>
      <h1>
    <?php } ?>
      <a href="<?php echo esc_url(home_url('/')); ?>">
	  <?php
      if ($ailsa_brand_logo_default != '') {
    		if ($ailsa_brand_logo_retina){
    			echo '<img src="'. esc_attr(wp_get_attachment_url($ailsa_brand_logo_default)) .'" width="'. esc_attr($ailsa_retina_width) .'" height="'. esc_attr($ailsa_retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="default-logo" />
    			      <img src="'. esc_attr(wp_get_attachment_url($ailsa_brand_logo_retina)) .'"  width="'. esc_attr($ailsa_retina_width) .'" height="'. esc_attr($ailsa_retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="retina-logo" />';
    		} else {
    			echo '<img src="'. esc_attr(wp_get_attachment_url($ailsa_brand_logo_default)) .'" width="'. esc_attr($ailsa_retina_width) .'" height="'. esc_attr($ailsa_retina_height) .'" alt="', esc_attr(bloginfo('name')) .'" class="default-logo" />';
    		}
    	} else {
    		echo  get_bloginfo('name');
    	}
    	echo '</a>';
    // Text logo h1 close
    if (!$ailsa_brand_logo_default) { ?>
      </h1>
    <?php } ?>
    </div>
    <?php if ($ailsa_slogan_text) { ?>
        <?php echo do_shortcode($ailsa_slogan_text); ?>
    <?php } ?>
  </div>
</div>

<?php } ?>
