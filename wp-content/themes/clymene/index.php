<?php

 global $clymene_option;
get_header(); ?>


	<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title">
		
		<div class="parallax-blog-2"></div>
	
		<div class="container">
			<div class="six columns">
				<h1><?php _e('Blog', 'clymene'); ?></h1>
			</div>
			<div class="six columns">
				<div id="owl-top-page-slider" class="owl-carousel owl-theme">
					<div class="item">
						<div class="page-top-icon">&#xf0a1;</div>
						<div class="page-top-text">
						<?php
							$count_posts = wp_count_posts();
							echo esc_html($count_posts->publish);
							_e( ' posts' , 'clymene' );
						?>
						</div>
					</div>
					<div class="item">
						<div class="page-top-icon">&#xf007;</div>
						<div class="page-top-text">
						<?php
							$count_users = count_users();
							echo esc_html($count_users['total_users']);
							_e( ' authors' , 'clymene' );
						?>	
						</div>
					</div>
					<div class="item">
						<div class="page-top-icon">&#xf086;</div>
						<div class="page-top-text">
						<?php
							$count_comments = wp_count_comments();
							echo esc_html($count_comments->approved);
							_e( ' comments' , 'clymene' );
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
			
	</section>	

	<section class="section white-section section-padding-top-bottom">
		<div class="container">
			<div class="nine columns">
				<?php if(have_posts()) : ?>	
				<?php while(have_posts()) : the_post(); ?>	
					<?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
				<?php endwhile;?> 
			
				<?php else: ?>
					<h1><?php _e('Nothing Found Here!','clymene'); ?></h1>
				<?php endif; ?>
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

<?php get_footer(); ?>
