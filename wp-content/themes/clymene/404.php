<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
global $clymene_option; 
get_header(); ?>

<section class="blog-post-wrapper page404">
	<div class="container">
    	<div class="twelve columns">
			<div class="text-center">
				<h1><?php echo esc_html($clymene_option['404_title']); ?></h1>
				<div class="content_404">
				<?php echo esc_html($clymene_option['404_content']); ?>
				</div>
				<div class="blog-link dark"><a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-long-arrow-left"></i> <?php echo esc_html( $clymene_option['back_404'] ); ?></a></div>
			</div>
       </div> 	
    </div><!-- end container -->
</section><!-- end postwrapper -->

<?php
get_footer();
