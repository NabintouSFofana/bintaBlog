<?php global $pmc_data; ?>
	
	<div class="entry">
		<div class = "meta">
			<div class="topLeftBlog">	
				
				<div class = "post-meta">
					<?php 
					$day = get_the_time('d');
					$month= get_the_time('m');
					$year= get_the_time('Y');
					?>
				
						
				</div>	
				
			</div>
			
			<div class="blogContent">
				<div class="blogcontent"><?php the_excerpt() ?></div>
			</div>
			
			<?php if(isset($pmc_data['display_post_meta'])) { ?>
			<div class="pmc-read-more">
				<a  href="<?php echo get_permalink( get_the_id() ) ?>"><?php esc_attr_e('Continue reading','zarja') ?></a>
			</div>
			<?php } else { ?>
			<div class="pmc-read-more end">
				<a  href="<?php echo get_permalink( get_the_id() ) ?>"><?php esc_attr_e('Continue reading','zarja') ?></a>
			</div>
			<?php } ?>
			
			<?php if(isset($pmc_data['display_post_meta'])) { ?>
			<div class = "post-time">
				<a class="post-meta-time" href="<?php echo get_day_link( $year, $month, $day ) ?>"><?php the_time('F j, Y') ?></a>
			</div>
			<div class = "post-author">
					<a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_attr_e('Written by: ','zarja'); echo get_the_author(); ?></a>
			</div>
			<?php } ?>
		</div>		
	</div>