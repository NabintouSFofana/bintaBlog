<?php

 global $clymene_option;
get_header(); ?>

	<section class="section parallax-section parallax-section-padding-top-bottom-pagetop section-page-top-title section-page-top-title2">
		
		<div class="parallax-blog-2"></div>
	
		<div class="container">

			<div class="twelve columns">
				<h1>
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'clymene' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'clymene' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'clymene' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'clymene' ), get_the_date( _x( 'Y', 'yearly archives date format', 'clymene' ) ) );

						else :
							_e( 'Archives', 'clymene' );

						endif;
					?>
				</h1>
			</div>
			
		</div>
			
	</section>	

	<section class="section white-section section-padding-top-bottom">
		<div class="container">

			<div class="nine columns">
				<?php if(have_posts()) : ?>	
				<?php while (have_posts()): the_post(); ?> 		
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

</main>	

<?php get_footer(); ?>