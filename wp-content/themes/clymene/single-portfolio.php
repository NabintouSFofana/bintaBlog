<?php
 global $clymene_option;
 get_header(); 
?>

	<?php while (have_posts()) : the_post()?>
		<?php the_content(); ?>
	<?php endwhile; ?>

	<section class="section grey-section section-padding-top-bottom">
		
		<div class="container">
			<div class="twelve columns">
				<div class="blog-left-right-links">
					<div class="blog-left-link"><?php echo previous_post_link('%link', 'prev'); ?></div>
					<div class="blog-right-link"><?php echo next_post_link('%link', 'next'); ?></div>
				</div>
			</div>
		</div>
		
	</section>

<?php get_footer(); ?>