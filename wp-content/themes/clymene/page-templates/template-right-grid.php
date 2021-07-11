<?php
/**
 * Template Name: Blog Grid Right Sidebar
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
			<div class="nine columns remove-top">
				<div id="portfolio-filter">
					<ul id="filter">
						<li><a href="#" class="current" data-filter="*" title=""><?php echo esc_attr($clymene_option['show_all']); ?></a></li>

						<?php 
						$categories = get_categories();   
						foreach( (array)$categories as $categorie){
							$cat_name = $categorie->name;
							$cat_slug = $categorie->slug;
						?>
						<li><a href="#" data-filter=".<?php echo esc_attr($cat_slug); ?>"><?php echo esc_attr($cat_name); ?></a></li>
						<?php } ?>

					</ul>
				</div>

				<div class="blog-wrapper">
					<div id="blog-grid-masonry">
						<?php if(have_posts()) : ?>	
						<?php 
							$args = array(    
								'paged' => $paged,
								'post_type' => 'post',
								);
							$wp_query = new WP_Query($args);
							while ($wp_query -> have_posts()): $wp_query -> the_post(); 
							$cates = get_the_category(get_the_ID());
							$cate_name ='';
							$cate_slug = '';
							    foreach((array)$cates as $cate){
									if(count($cates)>0){
										$cate_name .= $cate->name.' ' ;
										$cate_slug .= $cate->slug .' ';     
									} 
							} 
						?> 		
							
							<a href="<?php the_permalink(); ?>" class="animsition-link">
								<div class="blog-box-3 half-blog-width <?php echo esc_attr($cate_slug); ?>">
									<div class="blog-box-1 grey-section">
										<?php the_post_thumbnail(); ?>
										<div class="blog-date-1"><?php the_time('d.m.y'); ?></div>
										<div class="blog-comm-1"><?php comments_number( '0', '1', '%' ); ?> <span>&#xf086;</span></div>
										<h6><?php the_title(); ?></h6>
										<p><?php echo clymene_blog_excerpt(10); ?></p>
										<div class="link">&#xf178;</div>
									</div>	
								</div>
							</a>

						<?php endwhile;?> 
					
						<?php else: ?>
							<h1><?php _e('Nothing Found Here!','clymene'); ?></h1>
						<?php endif; ?>	
					</div>
				</div>
			</div>
			
			<div class="three columns">
				<div class="post-sidebar">
					<?php get_sidebar();?>
				</div>	
			</div>
		</div>			
	</section>	

	<?php if(get_next_posts_link() || get_previous_posts_link()) { ?>
	<section class="section grey-section section-padding-top-bottom">
		
		<div class="container">
			<div class="twelve columns">
				<div class="blog-left-right-links">
					<?php if(get_next_posts_link()) { ?><div class="blog-left-link"><p><?php next_posts_link( 'Older' ); ?></p></div><?php } ?>
					<?php if(get_previous_posts_link()) { ?><div class="blog-right-link"><p><?php previous_posts_link( 'Newer', 0 ); ?></p></div><?php } ?>
				</div>
			</div>
		</div>
		
	</section>
	<?php } ?>

</main>	

<?php get_footer(); ?>