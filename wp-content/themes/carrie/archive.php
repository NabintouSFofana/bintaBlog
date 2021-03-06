<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Carrie
 */

get_header();

$carrie_theme_options = carrie_get_theme_options();

$archive_sidebarposition = $carrie_theme_options['archive_sidebar_position'];

if(is_active_sidebar( 'main-sidebar' ) && ($archive_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12';
}

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['blog_layout']) ) {
    $carrie_theme_options['blog_layout'] = $_GET['blog_layout'];
}

// Blog layout
if(isset($carrie_theme_options['blog_layout'])) {
	$blog_layout = $carrie_theme_options['blog_layout'];
} else {
	$blog_layout = 'layout_default';
}

if($blog_layout == 'layout_masonry') {
	wp_register_script('masonry', get_template_directory_uri() . '/js/query.masonry.min.js');
	wp_enqueue_script('masonry');

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

	$blog_enable_masonry_design = true;
	$blog_masonry_class = ' blog-masonry-layout';
} else {
	$blog_enable_masonry_design = false;
	$blog_masonry_class = '';
}

?>
<div class="content-block">
<div class="container-fluid container-page-item-title">
	<div class="row">
	<div class="col-md-12">
	<div class="page-item-title-archive">

	      <?php
			if ( is_category() ) :
				echo '<p>'.esc_html__( 'Category', 'carrie' ).'</p>';
				echo ( '<h1>' . single_cat_title( '', false ) . '</h1>' );

			elseif ( is_tag() ) :

				echo '<p>'.esc_html__( 'Tag', 'carrie' ).'</p>';
				echo ( '<h1>' . single_tag_title( '', false ) . '</h1>' );

			elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
				echo '<p>'.esc_html__( 'Author', 'carrie' ).'</p>';
				echo ( '<h1>' . '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' . '</h1>' );
				//printf( esc_html__( 'Author Archives: %s', 'carrie' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
				//printf( esc_html__( 'Daily Archives: %s', 'carrie' ), '<span>' . get_the_date() . '</span>' );
				echo '<p>'.esc_html__( 'Daily Archives', 'carrie' ).'</p>';
				echo ( '<h1>' . get_the_date() . '</h1>' );

			elseif ( is_month() ) :
				//printf( esc_html__( 'Monthly Archives: %s', 'carrie' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
				echo '<p>'.esc_html__( 'Monthly Archives', 'carrie' ).'</p>';
				echo ( '<h1>' . get_the_date( 'F Y' ) . '</h1>' );

			elseif ( is_year() ) :
				//printf( esc_html__( 'Yearly Archives: %s', 'carrie' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
				echo '<p>'.esc_html__( 'Yearly Archives', 'carrie' ).'</p>';
				echo ( '<h1>' . get_the_date( 'Y' ) . '</h1>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				//esc_html_e( 'Asides', 'carrie' );
				echo '<p>'.esc_html__( 'Post format', 'carrie' ).'</p>';
				echo ( '<h1>' . esc_html_e( 'Aside', 'carrie' ) . '</h1>' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				//esc_html_e( 'Images', 'carrie');
				echo '<p>'.esc_html__( 'Post format', 'carrie' ).'</p>';
				echo ( '<h1>' . esc_html_e( 'Images', 'carrie' ) . '</h1>' );

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				//esc_html_e( 'Videos', 'carrie' );
				echo '<p>'.esc_html__( 'Post format', 'carrie' ).'</p>';
				echo ( '<h1>' . esc_html_e( 'Videos', 'carrie' ) . '</h1>' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				//esc_html_e( 'Quotes', 'carrie' );
				echo '<p>'.esc_html__( 'Post format', 'carrie' ).'</p>';
				echo ( '<h1>' . esc_html_e( 'Quotes', 'carrie' ) . '</h1>' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				//esc_html_e( 'Links', 'carrie' );
				echo '<p>'.esc_html__( 'Post format', 'carrie' ).'</p>';
				echo ( '<h1>' . esc_html_e( 'Links', 'carrie' ) . '</h1>' );

			else :
				//esc_html_e( 'Archives', 'carrie' );
				echo '<p>'.esc_html__( 'Posts', 'carrie' ).'</p>';
				echo ( '<h1>' . esc_html_e( 'Archives', 'carrie' ) . '</h1>' );

			endif;
		?>

	</div>
	</div>
	</div>
</div>
<div class="container page-container">
	<div class="row">
<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $archive_sidebarposition == 'left')) : ?>
		<div class="col-md-3 main-sidebar sidebar">
		<ul id="main-sidebar">
		  <?php dynamic_sidebar( 'main-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($span_class); ?>">
		<?php
			if ( is_category() ) :
				// show an optional category description
				$category_description = category_description();
				if ( ! empty( $category_description ) ) :
					echo '<div class="container-fluid taxonomy-description-container">
			'.apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . wp_kses_post($category_description) . '</div>' ).'
				</div>';
				endif;

			elseif ( is_tag() ) :
				// show an optional tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) ) :
					echo '<div class="container-fluid category-description-container">
			'.apply_filters( 'tag_archive_meta', '<div class="category-description">' . wp_kses_post($tag_description) . '</div>' ).'
				</div>';
				endif;

			endif;
		?>
		<div class="blog-posts-list clearfix<?php echo esc_attr($blog_masonry_class);?>">

			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */
				$post_loop_id = 1;
				?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						$post_loop_details['post_loop_id'] = $post_loop_id;
						$post_loop_details['span_class'] = $span_class;

						carrie_set_post_details($post_loop_details);

						get_template_part( 'content', get_post_format() );

						$post_loop_id++;
					?>

				<?php endwhile; ?>



			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>
		</div>
		<?php
		// Post Loops Bottom Banner
		carrie_banner_show('posts_loop_bottom');
		?>
		<?php carrie_content_nav( 'nav-below' ); ?>
		</div>
		<?php if ( is_active_sidebar( 'main-sidebar' ) && ( $archive_sidebarposition == 'right')) : ?>
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
