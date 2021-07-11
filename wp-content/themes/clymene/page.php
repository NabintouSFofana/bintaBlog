<?php
/**
 * The template for displaying all pages
 */
  global $clymene_option;
 $page_title = get_post_meta(get_the_ID(),'_cmb_page_title', true);
get_header(); ?>
	
	<section class="section parallax-section section-pagetop section-page-top-title">
		<?php
 
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		 
		if ( is_plugin_active('meta-box/meta-box.php') ) { ?>
		<?php $images = rwmb_meta( '_cmb_bg_pagehead', "type=image_advanced" ); ?>
	    <?php if($images) {                                                  
	    foreach ( $images as $image ) {
	    $bg = $image['full_url']; ?>
		<div class="parallax-blog-2" <?php if($bg) { ?>style="background-image: url(<?php echo esc_url($bg); ?>);"<?php } ?>></div>
		<?php } } } ?>
	
		<div class="container">
			<div class="twelve columns">
				<h1 class="center"><?php if($page_title) { echo esc_html($page_title); }else{ the_title(); } ?></h1>
			</div>
		</div>
	</section>					
	
	<section class="section white-section">
		<div class="container">
			<div class="nine columns">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
				<div class="blog-post" id="blog-single">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content();?>
						
						<?php wp_link_pages(); ?>
						<?php 
						 // If comments are open or we have at least one comment, load up the comment template.
						 if ( comments_open() || get_comments_number() ) :
						  comments_template();
						 endif; 
						?>
					</div>
				</div>
				<?php endwhile; ?>					
			</div>
			<div class="three columns">
				<div class="post-sidebar">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>	
	</section>		
<?php
get_footer();
