<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Camille
 */

get_header();

$camille_theme_options = camille_get_theme_options();

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['blog_layout']) ) {
    $camille_theme_options['blog_layout'] = $_GET['blog_layout'];
}

$search_sidebarposition = esc_html($camille_theme_options['search_sidebar_position']);

if(is_active_sidebar( 'main-sidebar' ) && ($search_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12';
}

// Blog layout
if(isset($camille_theme_options['blog_layout'])) {
	$blog_layout = $camille_theme_options['blog_layout'];
} else {
	$blog_layout = 'layout_default';
}

if($blog_layout == 'layout_masonry') {
	wp_register_script('masonry', get_template_directory_uri() . '/js/query.masonry.min.js');
	wp_enqueue_script('masonry');

	$blog_enable_masonry_design = true;
	$blog_masonry_class = ' blog-masonry-layout';
} else {
	$blog_enable_masonry_design = false;
	$blog_masonry_class = '';
}

?>
<?php if($blog_layout == 'layout_masonry'): ?>
<?php
wp_add_inline_script( 'masonry', '(function($){
$(document).ready(function() {
	"use strict";
	var $container = $(".blog-masonry-layout");
	$container.imagesLoaded(function(){
	  $container.masonry({
	    itemSelector : ".blog-masonry-layout .blog-post"
	  });
	});

});})(jQuery);');
?>
<?php endif; ?>
<div class="content-block">
	<div class="container-fluid container-page-item-title">
		<div class="row">
		<div class="col-md-12">
			<div class="page-item-title-archive">
			<?php
				echo '<p>'.esc_html__( 'Search Results', 'camille' ).'</p>';
				echo ( '<h1>' . get_search_query() . '</h1>' );
			?>
			</div>
		</div>
		</div>
	</div>
<div class="container page-container">
<div class="row">

<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $search_sidebarposition == 'left')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($span_class); ?>">
		<div class="blog-posts-list clearfix<?php echo esc_attr($blog_masonry_class);?>">
<?php /* Start the Loop */ ?>
				<?php if ( have_posts() ) : ?>
					<?php /* Start the Loop */
					$post_loop_id = 1;
					?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						$post_loop_details['post_loop_id'] = $post_loop_id;
						$post_loop_details['span_class'] = $span_class;

						camille_set_post_details($post_loop_details);

						?>

						<?php get_template_part( 'content', 'search' );

						$post_loop_id++;
						?>

					<?php endwhile; ?>



				<?php else : ?>

					<?php get_template_part( 'no-results', 'search' ); ?>

				<?php endif; ?>
		</div>
		<?php
		// Post Loops Bottom Banner
		camille_banner_show('posts_loop_bottom');
		?>
		<?php camille_content_nav( 'nav-below' ); ?>
		</div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $search_sidebarposition == 'right')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
</div>
</div>
<?php get_footer(); ?>
