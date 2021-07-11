<?php
/**
 * @package Camille
 */

$camille_theme_options = camille_get_theme_options();

$post_classes = get_post_class();

$current_post_format = $post_classes[4];

$post_formats_media = array('format-audio', 'format-video', 'format-gallery');

if(!isset($camille_theme_options['blog_post_hide_featured_image'])) {
	$camille_theme_options['blog_post_hide_featured_image'] = false;
}

$post_sidebarposition = get_post_meta( get_the_ID(), '_post_sidebarposition_value', true );
$post_socialshare_disable = get_post_meta( get_the_ID(), '_post_socialshare_disable_value', true );
$post_disable_featured_image = get_post_meta( get_the_ID(), '_post_disable_featured_image_value', true );

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['post_sidebar_position']) ) {
  $camille_theme_options['post_sidebar_position'] = $_GET['post_sidebar_position'];
}

if(!isset($camille_theme_options['post_sidebar_position'])) {
	$camille_theme_options['post_sidebar_position'] = 'disable';
}

if(!isset($post_sidebarposition)||($post_sidebarposition == '')) {
	$post_sidebarposition = 0;
}

if($post_sidebarposition == "0") {
	$post_sidebarposition = $camille_theme_options['post_sidebar_position'];
}

if(is_active_sidebar( 'post-sidebar' ) && ($post_sidebarposition <> 'disable') ) {
	$span_class = 'col-md-9';
}
else {
	$span_class = 'col-md-12 post-single-content';
}

// Post media
$post_embed_video = get_post_meta( get_the_ID(), '_camille_video_embed', true );

if($post_embed_video !== '') {

	$post_embed_video_output = wp_oembed_get($post_embed_video);
} else {
	$post_embed_video_output = '';
}

$post_embed_audio = get_post_meta( get_the_ID(), '_camille_audio_embed', true );

if($post_embed_audio !== '') {

	$post_embed_audio_output = wp_oembed_get($post_embed_audio);

} else {
	$post_embed_audio_output = '';
}

$gallery_images_data = camille_cmb2_get_images_src( get_the_ID(), '_camille_gallery_file_list', 'camille-blog-thumb' );

$header_background_image = get_post_meta( get_the_ID(), '_camille_header_image', true );

if(isset($header_background_image) && ($header_background_image!== '')) {
	$header_background_image_style = 'background-image: url('.$header_background_image.');';
	$header_background_class = ' with-bg';
} else {
	$header_background_image_style = '';
	$header_background_class = '';
}

if($gallery_images_data !== '') {

	$post_gallery_id = 'blog-post-gallery-'.get_the_ID();
	$post_embed_gallery_output = '<div class="blog-post-gallery-wrapper owl-carousel" id="'.esc_attr($post_gallery_id).'" style="display: none;">';

	foreach ($gallery_images_data as $gallery_image) {
		$post_embed_gallery_output .= '<div class="blog-post-gallery-image"><a href="'.esc_url($gallery_image).'" rel="lightbox" title="'.the_title_attribute(array('echo'=>false)).'"><img src="'.esc_url($gallery_image).'" alt="'.the_title_attribute(array('echo'=>false)).'"/></a></div>';
	}

	$post_embed_gallery_output .= '</div>';

	wp_add_inline_script( 'camille-script', '(function($){
	            $(document).ready(function() {
					"use strict";
	                $("#'.esc_js($post_gallery_id).'").owlCarousel({
	                    items: 1,
	                    autoplay: true,
	                    autowidth: false,
	                    autoplayTimeout:2000,
	                    autoplaySpeed: 1000,
	                    navSpeed: 1000,
	                    nav: true,
	                    dots: false,
	                    loop: true,
	                    navText: false,
	                    responsive: {
	                        1199:{
	                            items:1
	                        },
	                        979:{
	                            items:1
	                        },
	                        768:{
	                            items:1
	                        },
	                        479:{
	                            items:1
	                        },
	                        0:{
	                            items:1
	                        }
	                    }
	                });

	            });})(jQuery);');

} else {
	$post_embed_gallery_output = '';
}
?>

<div class="content-block">
<div class="container-fluid container-page-item-title<?php echo esc_attr($header_background_class); ?>" data-style="<?php echo esc_attr($header_background_image_style); ?>">
	<div class="row">
	<div class="col-md-12">
	<div class="page-item-title-single">
		<div class="post-date"><?php the_time(get_option( 'date_format' ));  ?></div>
	    <h1><?php the_title(); ?></h1>
	    <?php if(isset($camille_theme_options['blog_post_show_author'])&&($camille_theme_options['blog_post_show_author'])): ?>
				<div class="post-author"><?php esc_html_e('by','camille'); ?> <?php the_author_posts_link();?></div>
				<?php endif; ?>
	    <?php
		$categories_list = get_the_category_list(  ', '  );
		if ( $categories_list ) :
		?>
	    <div class="post-categories"><?php esc_html_e('in','camille'); ?> <?php printf( esc_html__( '%1$s', 'camille' ), $categories_list ); ?></div>
	    <?php endif; // End if categories ?>

	    <?php if(isset($camille_theme_options['blog_enable_singlepost_header_info'])&&($camille_theme_options['blog_enable_singlepost_header_info'])): ?>
	    <div class="post-info clearfix">
			<?php if(!isset($post_socialshare_disable) || !$post_socialshare_disable): ?>
			<div class="post-info-share">
					<?php do_action('camille_social_share'); // this action called from plugin ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	</div>
	</div>
</div>
<div class="post-container container">
	<div class="row">
<?php if ( is_active_sidebar( 'post-sidebar' ) && ( $post_sidebarposition == 'left')) : ?>
		<div class="col-md-3 post-sidebar sidebar">
		<ul id="post-sidebar">
		  <?php dynamic_sidebar( 'post-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($span_class); ?>">
			<div class="blog-post blog-post-single clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="post-content-wrapper">

								<div class="post-content">
									<?php
									if ( has_post_thumbnail()&&!in_array($current_post_format, $post_formats_media)&&(!$post_disable_featured_image ) && (!$camille_theme_options['blog_post_hide_featured_image']) ): // check if the post has a Post Thumbnail assigned to it.
									?>
									<div class="blog-post-thumb">

										<?php the_post_thumbnail('camille-blog-thumb'); ?>

									</div>
									<?php endif; ?>
									<?php

									if(in_array($current_post_format, $post_formats_media)) {
										echo '<div class="blog-post-thumb">';

									// Post media
									if($current_post_format == 'format-video') {
										echo '<div class="blog-post-media blog-post-media-video">';
										echo camille_wp_kses_data($post_embed_video_output);// escaping does not needed here, wordpress OEMBED function used for this var
										echo '</div>';
									}
									elseif($current_post_format == 'format-audio') {
										echo '<div class="blog-post-media blog-post-media-audio">';
										echo camille_wp_kses_data($post_embed_audio_output);// escaping does not needed here, wordpress OEMBED function used for this var
										echo '</div>';
									}
									elseif($current_post_format == 'format-gallery') {
										echo '<div class="blog-post-media blog-post-media-gallery">';
										echo wp_kses_post($post_embed_gallery_output);
										echo '</div>';
									}
										echo '</div>';
									}
									?>
									<?php
									// Single Blog Post page Top banner
									camille_banner_show('single_post_top');
									?>
									<?php if ( is_search() ) : // Only display Excerpts for Search ?>
									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->
									<?php else : ?>
									<div class="entry-content">
										<?php the_content('<div class="more-link">'.esc_html__( 'Continue reading...', 'camille' ).'</div>' ); ?>
										<?php
											wp_link_pages( array(
												'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'camille' ),
												'after'  => '</div>',
											) );
										?>
									</div><!-- .entry-content -->

									<?php
									// Single Blog Post page Bottom banner
									camille_banner_show('single_post_bottom');
									?>


									<?php
										/* translators: used between list items, there is a space after the comma */
										$tags_list = get_the_tag_list( '', ''  );
										if ( $tags_list ) :
									?>
									<div class="clear"></div>
									<div class="tags clearfix">
										<div class="tags-icon"><i class="fa fa-tags"></i></div>
										<?php echo wp_kses_post($tags_list); ?>
									</div>
									<?php endif; // End if $tags_list ?>

									<div class="post-info-wrapper clearfix">

									<div class="post-date-wrapper">
										<div class="post-info-date"><i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format' ));  ?></div>
									</div>

									<?php
									if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
						                echo '<div class="comments-count" title="'.esc_html__('Post comments', 'camille').'"><i class="fa fa-comment-o"></i>';

						                comments_popup_link( esc_html__( 'Leave a comment', 'camille' ), esc_html__( '1 Comment', 'camille' ), esc_html__( '% Comments', 'camille' ) );

						                echo '</div>';
					            	}
					            	?>

									<?php
									// Post views
							        if(isset($camille_theme_options['blog_enable_post_views_counter_sp']) && $camille_theme_options['blog_enable_post_views_counter_sp']) {
						                do_action('camille_post_views');
						            }

									?>

									<?php if(!isset($post_socialshare_disable) || !$post_socialshare_disable): ?>
										<div class="post-info-share">
											<?php do_action('camille_social_share'); // this action called from plugin ?>
										</div>
									<?php endif; ?>
									</div>



									<?php endif; ?>
									</div>

							</div>


				</article>


			</div>

			<?php if(isset($camille_theme_options['blog_enable_author_info'])&&($camille_theme_options['blog_enable_author_info'])): ?>
				<?php if ( is_single() && get_the_author_meta( 'description' ) ) : ?>
					<?php get_template_part( 'author-bio' ); ?>
				<?php endif; ?>
			<?php endif; ?>

			<?php
			if(isset($camille_theme_options['blog_post_navigation']) && $camille_theme_options['blog_post_navigation']) {
				camille_content_nav( 'nav-below' );
			}
			?>

			<?php if(isset($camille_theme_options['blog_post_show_related'])&&($camille_theme_options['blog_post_show_related'])): ?>
			<?php get_template_part( 'related-posts-loop' ); ?>
			<?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )

					comments_template();
			?>

		</div>
		<?php if ( is_active_sidebar( 'post-sidebar' ) && ( $post_sidebarposition == 'right')) : ?>
		<div class="col-md-3 post-sidebar sidebar">
		<ul id="post-sidebar">
		  <?php dynamic_sidebar( 'post-sidebar' ); ?>
		</ul>
		</div>
		<?php endif; ?>
	</div>
	</div>
</div>
