<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Camille
 */

get_header();

$camille_theme_options = camille_get_theme_options();

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['blog_sidebar_position']) ) {
  $camille_theme_options['blog_sidebar_position'] = $_GET['blog_sidebar_position'];
}

if ( defined('DEMO_MODE') && isset($_GET['blog_homepage_slider_fullwidth']) ) {
  if($_GET['blog_homepage_slider_fullwidth'] == 1) {
    $camille_theme_options['blog_homepage_slider_fullwidth'] = true;
  }
  if($_GET['blog_homepage_slider_fullwidth'] == 0) {
    $camille_theme_options['blog_homepage_slider_fullwidth'] = false;
  }
}

if ( defined('DEMO_MODE') && isset($_GET['blog_layout']) ) {
    $camille_theme_options['blog_layout'] = $_GET['blog_layout'];
}

if(!isset($camille_theme_options['blog_sidebar_position'])) {
	$camille_theme_options['blog_sidebar_position'] = 'disable';
}

$blog_sidebarposition = $camille_theme_options['blog_sidebar_position'];

if(is_active_sidebar( 'main-sidebar' ) && ($blog_sidebarposition <> 'disable') ) {
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

$temp_query = $wp_query;

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
	<?php if(isset($camille_theme_options['blog_enable_homepage_slider']) && $camille_theme_options['blog_enable_homepage_slider']): ?>
	<?php if(isset($camille_theme_options['blog_homepage_slider_fullwidth']) && ($camille_theme_options['blog_homepage_slider_fullwidth'] == 1)) {
		$slider_container_class = 'container-fluid camille-blog-posts-slider';
	} else {
		$slider_container_class = 'container camille-blog-posts-slider';
	}
	?>
	<div class="<?php echo esc_attr($slider_container_class); ?>">
		<div class="row">

			<div class="col-md-12">
				<?php camille_blog_slider_show(); ?>
			</div>

		</div>
	</div>
	<?php endif; ?>

	<?php camille_welcome_block_show(); ?>

	<?php
	// Site Header Banner
	camille_banner_show('below_homepage_popular_posts');
	?>
	<?php
	// Disable blog posts loop
	if(!isset($camille_theme_options['blog_disable_posts_loop'])) {
		$camille_theme_options['blog_disable_posts_loop'] = false;
	}

	if(!$camille_theme_options['blog_disable_posts_loop']):
	?>
	<div class="page-container container">
		<div class="row">
			<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $blog_sidebarposition == 'left')) : ?>
			<div class="col-md-3 main-sidebar sidebar">
			<ul id="main-sidebar">
			  <?php dynamic_sidebar( 'main-sidebar' ); ?>
			</ul>
			</div>
			<?php endif; ?>

			<div class="<?php echo esc_attr($span_class);?>">
			<div class="blog-posts-list clearfix<?php echo esc_attr($blog_masonry_class);?>" id="content">
			<?php

			$wp_query = $temp_query;

			?>
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */
				$post_loop_id = 1;
				?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

						$post_loop_details['post_loop_id'] = $post_loop_id;
						$post_loop_details['span_class'] = $span_class;

						camille_set_post_details($post_loop_details);

						get_template_part( 'content', get_post_format() );

						$post_loop_id++;
					?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>
			</div>
			<?php
			// Post Loops Bottom Banner
			camille_banner_show('posts_loop_bottom');
			?>
			<?php camille_content_nav( 'nav-below' ); ?>

			</div>
			<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $blog_sidebarposition == 'right')) : ?>
			<div class="col-md-3 main-sidebar sidebar">
			<ul id="main-sidebar">
			  <?php dynamic_sidebar( 'main-sidebar' ); ?>
			</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if(isset($camille_theme_options['blog_enable_homepage_editorspick_posts']) && $camille_theme_options['blog_enable_homepage_editorspick_posts']): ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php camille_blog_editorspick_posts_show(); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
