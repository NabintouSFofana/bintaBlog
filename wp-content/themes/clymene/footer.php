<?php
/**
 * The template for displaying the footer
 */
 global $clymene_option; 
?>

	<section class="section footer-1 section-padding-top-bottom">	
		<div class="container">
			<?php get_sidebar('footer'); ?>
		</div></div>
	</section>		
	
	<?php if($clymene_option['footer_text']) { ?>
	<section class="section footer-bottom">	
		<div class="container">
			<div class="twelve columns">
				<p><?php echo htmlspecialchars_decode($clymene_option['footer_text']); ?></p>
			</div>
		</div>
	</section>
	<?php } ?>

	</main>		

	<div class="scroll-to-top">&#xf106;</div>
<?php if($clymene_option['show_pre'] == 'yes') {?>
	</div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>