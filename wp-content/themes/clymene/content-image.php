<?php 
global $clymene_option;
?>

<div class="blog-big-wrapper grey-section">
	<?php
 
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	 
	if ( is_plugin_active('meta-box/meta-box.php') ) { ?>
	<?php $images = rwmb_meta( '_cmb_image', "type=image_advanced" ); ?>
    <?php                                                        
    foreach ( $images as $image ) {                      
    ?>
    <?php $img = $image['full_url']; ?>
	<div class="item">
		<img src="<?php echo esc_url($img); ?>" alt="">
	</div>
	<?php } } ?>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><h5><?php the_title(); ?></h5></a>
	<p><?php echo clymene_excerpt(); ?></p>
	<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="link-to-post"><?php if($clymene_option['read_more']) { echo esc_attr($clymene_option['read_more']); }else{ echo 'read more'; }?> <span>&#xf178;</span></div></a>
	<div class="bottom-autor-text"><span>&#xf040;</span><?php the_author(); ?> / <span>&#xf086;</span><?php comments_number( '0', '1', '%' ); ?> / <span>&#xf073;</span> <?php the_time('dS M Y'); ?></div>
</div>
	