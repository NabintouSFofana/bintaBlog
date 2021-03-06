<?php get_header(); 
global $pmc_data;
wp_enqueue_script('pmc_bxSlider');		
?>
<script type="text/javascript">
jQuery(document).ready(function($){
	jQuery('.bxslider').bxSlider({
	  auto: true,
	  speed: 1000,
	  controls: false,
	  pager :false,
	  easing : 'easeInOutQuint',
	});
});	
</script>	
<!-- main content start -->
<div class="mainwrap blog <?php if(is_front_page()) echo 'home' ?> <?php if(!isset($pmc_data['use_fullwidth'])) echo 'sidebar' ?>">
	<div class="main clearfix">
		<div class="pad"></div>			
		<div class="content blog">
					
			<?php if (have_posts()) : 
			$count_posts = 0; ?>
			<?php 
			while (have_posts()) : the_post();  $count_posts++;

			
			?>
			<?php if(is_sticky(get_the_id())) { ?>
			<div class="pmc_sticky">
			<?php } ?>
			<?php
			$postmeta = get_post_custom(get_the_id()); ?>
				
			
			<?php
			if ( has_post_format( 'gallery' , get_the_id())) { 
			?>
			<div class="slider-category">
				
				<div class="blogpostcategory">
					<div class="topBlog">
						<?php if(isset($pmc_data['display_blog_cats'])) { ?>
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_attr__( ' ', 'zarja' ) ) . '</em>'; ?> </div>
						<?php } ?>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php if(isset($pmc_data['display_comments'])) { ?>
						<div class="blog-date"><a class="post-meta-comments" href="<?php the_permalink() ?>#commentform"><?php comments_number(); ?></a></div>
						<?php } ?>
					</div>	
				<?php
					global $post;
					$attachments = '';
					$post_subtitrare = get_post( get_the_id() );
					$content = $post_subtitrare->post_content;
					$pattern = get_shortcode_regex();
					preg_match( "/$pattern/s", $content, $match );
					if( isset( $match[2] ) && ( "gallery" == $match[2] ) ) {
						$atts = shortcode_parse_atts( $match[3] );
						$attachments = isset( $atts['ids'] ) ? explode( ',', $atts['ids'] ) : get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . get_the_id() .'&order=ASC&orderby=menu_order ID' );
					}
					if ($attachments) {?>
					<div id="slider-category" class="slider-category">
						<ul id="slider" class="bxslider">
							<?php
								foreach ($attachments as $attachment) {
								if(!is_object($attachment)){$attachment = $attachment;} else {
								if(!array_key_exists('ID',$attachment)){$attachment = $attachment;} else {$attachment = $attachment->ID;}}								
									$image =  wp_get_attachment_image_src( $attachment, 'blog' ); ?>	
										<li>
											<img src="<?php echo esc_url($image[0]) ?>"/>							
										</li>
										<?php } ?>
						</ul>
						
					</div>
			  <?php } ?>
			  <div class="bottomborder"></div>
				<?php get_template_part('includes/boxes/loopBlog'); ?>
					<?php if(isset($pmc_data['display_socials'])) { ?>
					<div class="blog_social"> <?php pmc_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
				</div>
			</div>
			<?php } 
			if ( has_post_format( 'video' , get_the_id())) { ?>
			<div class="slider-category">
			
				<div class="blogpostcategory">
				<div class="topBlog">
						<?php if(isset($pmc_data['display_blog_cats'])) { ?>
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_attr__( ' ', 'zarja' ) ) . '</em>'; ?> </div>
					<?php } ?>	
					<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php if(isset($pmc_data['display_comments'])) { ?>
					<div class="blog-date"><a class="post-meta-comments" href="<?php the_permalink() ?>#commentform"><?php comments_number(); ?></a></div>
					<?php } ?>
					</div>	
				<?php
				
				if(!empty($postmeta["video_post_url"][0])) {?>
				<?php  
					echo wp_oembed_get(esc_url( $postmeta["video_post_url"][0]));

				}
				else{ 
					  $image = 'https://placehold.it/1180x650'; 
					  
				?>
					  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo pmc_getImage(get_the_id(),'blog'); ?></a>
					
				<?php } ?>	
				<div class="bottomborder"></div>
				<?php get_template_part('includes/boxes/loopBlog'); ?>
				<?php if(isset($pmc_data['display_socials'])) { ?>
					<div class="blog_social"> <?php pmc_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
				</div>
				
			</div>
			<?php } 
			if ( has_post_format( 'link' , get_the_id())) {?>
			<div class="link-category">
				<div class="blogpostcategory">
				<?php get_template_part('includes/boxes/loopBlogLink'); ?>								
				</div>
			</div>
			
			<?php 
			} 	
			
			if ( has_post_format( 'quote' , get_the_id())) {?>
			<div class="quote-category">
				<div class="blogpostcategory">				
					<?php get_template_part('includes/boxes/loopBlogQuote'); ?>								
				</div>
			</div>
			
			<?php 
			} 			
			 if ( has_post_format( 'audio' , get_the_id())) {?>
			<div class="blogpostcategory">
				<div class="audioPlayerWrap">
					<div class="audioPlayer">
						<?php
						if(isset($postmeta["audio_post_url"][0]))
							echo do_shortcode('[audio file="'. esc_url($postmeta["audio_post_url"][0]) .'"]') ?>
					</div>
				</div>
				<?php get_template_part('includes/boxes/loopBlog'); ?>		
			</div>	
			<?php
			}
			?>					
			
			
			<?php
			if ( !get_post_format() ) {?>
		

			<div class="blogpostcategory">
				<div class="topBlog">
						<?php if(isset($pmc_data['display_blog_cats'])) { ?>
						<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_attr__( ' ', 'zarja' ) ) . '</em>'; ?> </div>
						<?php } ?>
						<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php if(isset($pmc_data['display_comments'])) { ?>
						<div class="blog-date"><a class="post-meta-comments" href="<?php the_permalink() ?>#commentform"><?php comments_number(); ?></a></div>
						<?php } ?>
					</div>	
				<?php if(pmc_getImage(get_the_id(), 'blog') != '') { ?>	

					<a class="overdefultlink" href="<?php the_permalink() ?>">
					<div class="overdefult">
					</div>
					</a>

					<div class="blogimage">	
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo pmc_getImage(get_the_id(), 'blog'); ?></a>
					</div>
					

					<div class="bottomborder"></div>
					<?php } ?>
					<?php get_template_part('includes/boxes/loopBlog'); ?>
					<?php if(isset($pmc_data['display_socials'])) { ?>
					<div class="blog_social"> <?php pmc_socialLinkSingle(get_the_permalink(),get_the_title())  ?></div>
					<?php } ?>
			</div>
			
			<?php } ?>		
			<?php if(is_sticky()) { ?>
				</div>
			<?php } ?>
			<?php 
			if(!empty($pmc_data['block_count'])){
			if((int)$pmc_data['block_count'] == $count_posts && isset($pmc_data['use_advertise'])) { ?>
				<div class="block_advertising">
					<h3><?php echo esc_html($pmc_data['block_advertising_title']) ?></h3>
					<a target="_blank" href="<?php echo esc_url($pmc_data['block_advertising_link']) ?>"><img src="<?php echo esc_url($pmc_data['block_advertising_image']) ?>"></a>
				</div>
			<?php } }?>			
				<?php endwhile; ?>
				
				<div class="pmc-navigation">
					<div class="alignleft"><?php previous_posts_link( '&laquo; Newer Posts' ); ?></div>
					<div class="alignright"><?php next_posts_link( 'Older Posts &raquo;', '' ); ?></div>
				</div>
					
					<?php else : ?>
					
						<div class="postcontent">
							<h1><?php pmc_security($pmc_data['errorpagetitle']) ?></h1>
							<div class="posttext">
								<?php pmc_security($pmc_data['errorpage']) ?>
							</div>
						</div>
						
					<?php endif; ?>
				
		</div>
		<!-- sidebar -->
		<?php if(!isset($pmc_data['use_fullwidth'])) { ?>
			<div class="sidebar">	
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>
		<?php } ?>
	</div>
	
</div>											
<?php get_footer(); ?>