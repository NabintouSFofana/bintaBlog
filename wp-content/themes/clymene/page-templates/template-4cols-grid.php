<?php
/**
 * Template Name: Portfolio Grid 4 Cols
 */
  global $clymene_option;

 $page_title = get_post_meta(get_the_ID(),'_cmb_page_title', true);
 $icon1 = get_post_meta(get_the_ID(),'_cmb_icon1', true);
 $icon2 = get_post_meta(get_the_ID(),'_cmb_icon2', true);
 $icon3 = get_post_meta(get_the_ID(),'_cmb_icon3', true);
 $text1 = get_post_meta(get_the_ID(),'_cmb_text1', true);
 $text2 = get_post_meta(get_the_ID(),'_cmb_text2', true);
 $text3 = get_post_meta(get_the_ID(),'_cmb_text3', true);
get_header(); ?>

	<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
		
		<?php
 
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		 
		if ( is_plugin_active('meta-box/meta-box.php') ) { ?>
		<?php $images = rwmb_meta( '_cmb_bg_pagehead', "type=image_advanced" ); ?>
	    <?php if($images) {                                                  
	    foreach ( $images as $image ) {
	    $bg = $image['full_url']; ?>
		<div class="parallax-blog-2" <?php if($bg) { ?>style="background-image: url(<?php echo esc_url($bg); ?>);"<?php } ?>></div>
		<?php } }else{ ?>
		<div class="parallax-blog-2"></div><?php } }else{ ?><div class="parallax-blog-2"></div><?php } ?>
	
		<div class="container">
			<?php if($text1 != '' || $text2 != '' || $text3 != '') { ?>
			<div class="six columns">
				<h1>
					<?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?>
				</h1>
			</div>
			
			<div class="six columns">
				<div id="owl-top-page-slider" class="owl-carousel owl-theme">
					<div class="item">
						<div class="page-top-icon"><i class="fa fa-<?php echo esc_attr($icon1); ?>"></i></div>
						<div class="page-top-text">
							<?php echo htmlspecialchars_decode($text1); ?>
						</div>
					</div>
					<div class="item">
						<div class="page-top-icon"><i class="fa fa-<?php echo esc_attr($icon2); ?>"></i></div>
						<div class="page-top-text">
							<?php echo htmlspecialchars_decode($text2); ?>
						</div>
					</div><div class="item">
						<div class="page-top-icon"><i class="fa fa-<?php echo esc_attr($icon3); ?>"></i></div>
						<div class="page-top-text">
							<?php echo htmlspecialchars_decode($text3); ?>
						</div>
					</div>
				</div>
			</div>
			<?php }else{ ?>
			<div class="twelve columns">
				<h1 class="center">
					<?php if($page_title) { echo htmlspecialchars_decode($page_title); }else{ the_title(); } ?>
				</h1>
			</div>	
			<?php } ?>
		</div>
			
	</section>	

	<section class="section white-section section-padding-top-bottom">

		<div class="container">
			<div class="twelve columns">
				<div id="portfolio-filter">
					<ul id="filter">
						<li><a href="#" class="current" data-filter="*" title=""><?php echo esc_attr($clymene_option['show_all']); ?></a></li>

						<?php 
						$categories = get_terms('categories');   
						foreach( (array)$categories as $categorie){
							$cat_name = $categorie->name;
							$cat_slug = $categorie->slug;
						?>
						<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></a></li>
						<?php } ?>

					</ul>
				</div>
			</div>
		
			<div class="clear"></div>

			<div id="projects-grid">
				<?php if(have_posts()) : ?>	
				<?php 
					if($clymene_option['number_show']){ $num = $clymene_option['number_show']; }else{ $num = 8; }

					$args = array(    
						'paged' => $paged,
						'post_type' => 'portfolio',
						'posts_per_page' => $num
						);
					$wp_query = new WP_Query($args);
					while ($wp_query -> have_posts()): $wp_query -> the_post(); 
					$cates = get_the_terms(get_the_ID(),'categories');
					$cate_name ='';
					$cate_slug = '';
					    foreach((array)$cates as $cate){
							if(count($cates)>0){
								$cate_name .= $cate->name.' ' ;
								$cate_slug .= $cate->slug .' ';     
							} 
					} 

					$exc = get_post_meta(get_the_ID(),'_cmb_excerpt_folio', true);
					$video = get_post_meta(get_the_ID(),'_cmb_folio_video', true);
				?> 		

					<div class="three columns <?php echo esc_attr($cate_slug); ?>">
						<div class="portfolio-box-2 grey-section">
							<a href="<?php the_permalink(); ?>" class="animsition-link"><div class="mask-left">&#xf0c1;</div></a>
							<a class="group1 <?php if($video) echo 'vimeo'; ?>" href="<?php if($video) echo esc_url($video); else echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"><div class="mask-right">&#xf0b2;</div></a>
							<?php $params = array( 'width' => 600, 'height' => 423 );
                  			$image = bfi_thumb( wp_get_attachment_url(get_post_thumbnail_id()), $params ); ?>
                  			<img src="<?php echo esc_url($image); ?>" alt="">
							<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							<p><?php echo htmlspecialchars_decode($exc); ?></p>
						</div>
					</div>

				<?php endwhile;?> 
			
				<?php else: ?>
					<h1><?php _e('Nothing Found Here!','clymene'); ?></h1>
				<?php endif; ?>	
			</div>	
		</div>
	</section>	

</main>	

<?php get_footer(); ?>