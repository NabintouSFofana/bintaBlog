<?php
/**
 * @package Camille
 */

$post_loop_details = camille_get_post_details();
$post_loop_id = $post_loop_details['post_loop_id'];
$span_class = $post_loop_details['span_class'];

$camille_theme_options = camille_get_theme_options();

// Demo settings
if ( defined('DEMO_MODE') && isset($_GET['blog_post_show_author']) ) {
  if($_GET['blog_post_show_author'] == 1) {
    $camille_theme_options['blog_post_show_author'] = true;
  }
  if($_GET['blog_post_show_author'] == 0) {
    $camille_theme_options['blog_post_show_author'] = false;
  }
}

if ( defined('DEMO_MODE') && isset($_GET['blog_layout']) ) {
    $camille_theme_options['blog_layout'] = $_GET['blog_layout'];
}

$post_classes = get_post_class();

$current_post_format = $post_classes[4];

$post_formats_media = array('format-audio', 'format-video', 'format-gallery');
$post_formats_hidereadmore = array('format-quote', 'format-link', 'format-status');

$post_socialshare_disable = get_post_meta( get_the_ID(), '_post_socialshare_disable_value', true );

// Blog layout
if(isset($camille_theme_options['blog_layout'])) {
	$blog_layout = $camille_theme_options['blog_layout'];
} else {
	$blog_layout = 'layout_default';
}

if($blog_layout == 'layout_vertical_design') {
	$blog_enable_vertical_post_design = true;
} else {
	$blog_enable_vertical_post_design = false;
}

if($blog_layout == 'layout_text') {
	$blog_enable_layout_text = true;
} else {
	$blog_enable_layout_text = false;
}

if($blog_layout == 'layout_list_advanced') {
	$blog_enable_advanced_list_post_design = true;
	$blog_layout = 'layout_list';
} else {
	$blog_enable_advanced_list_post_design = false;
}

if($blog_layout == 'layout_2column_design') {
	$blog_enable_2_column_design = true;
} else {
	$blog_enable_2_column_design = false;
}

if($blog_layout == 'layout_masonry') {
	$blog_enable_masonry_design = true;
} else {
	$blog_enable_masonry_design = false;
}

if(!isset($post_loop_id)) {
	$post_loop_id = 1;
}

$current_post_vertical = false;

if(($post_loop_id % 3 == 0)&&has_post_thumbnail( get_the_ID() )&&$blog_enable_vertical_post_design&&!in_array($current_post_format, $post_formats_media)) {
	$current_post_vertical = true;
} else {
	$current_post_vertical = false;
}

$current_post_advanced_list = false;

if(($post_loop_id % 3 == 0)&&$blog_enable_advanced_list_post_design) {
	$current_post_advanced_list = true;
} else {
	$current_post_advanced_list = false;
}

if($blog_layout == 'layout_list') {
	$current_post_list = true;
} else {
	$current_post_list = false;
}

if(is_sticky(get_the_ID())) {
	$current_post_sticky = true;
	$sticky_post_class = 'sticky';
} else {
	$current_post_sticky = false;
	$sticky_post_class = '';
}

$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'camille-blog-thumb');

if(has_post_thumbnail( get_the_ID() )) {
    $image_bg ='background-image: url('.$image[0].');';
}
else {
    $image_bg = '';
}

// Post Format options
// $current_post_format:
// format-gallery
// format-video
// format-audio

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

if(sizeof($gallery_images_data) > 0) {

	$post_gallery_id = 'blog-post-gallery-'.get_the_ID();
	$post_embed_gallery_output = '<div class="blog-post-gallery-wrapper owl-carousel" id="'.$post_gallery_id.'" style="display: none;">';

	foreach ($gallery_images_data as $gallery_image) {
		$post_embed_gallery_output .= '<div class="blog-post-gallery-image"><a href="'.esc_url(get_the_permalink()).'"><img src="'.esc_url($gallery_image).'" alt="'.the_title_attribute(array('echo'=>false)).'"/></a></div>';
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

// Post Loops Middle Banner
if(($post_loop_id - 1 == floor(get_option('posts_per_page')/2))&&(!$blog_enable_2_column_design)&&(!$blog_enable_masonry_design)) {
	camille_banner_show('posts_loop_middle');
}

?>
<?php if(!has_post_thumbnail( get_the_ID() )) { $sticky_post_class .= ' sticky-post-without-image'; } else { $sticky_post_class .= ''; } ?>
<div class="content-block blog-post clearfix<?php if($current_post_vertical) { echo ' blog-post-vertical';} if($current_post_advanced_list) { echo ' blog-post-advanced-list';} if($blog_enable_layout_text) { echo ' blog-post-text-layout';} if($current_post_list) { echo ' blog-post-list-layout';} if($blog_enable_2_column_design) { echo ' blog-post-2-column-layout';}?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class($sticky_post_class); ?>>

		<div class="post-content-wrapper"<?php if(($current_post_sticky)&&($blog_enable_masonry_design)&&($image_bg !== '')&&(!in_array($current_post_format, $post_formats_media))) { echo ' data-style="'.esc_attr($image_bg).'"'; } ?>>
			<?php if(($current_post_sticky)&&($blog_enable_masonry_design)&&($image_bg !== '')): ?>
				<div class="sticky-post-badge<?php if(!has_post_thumbnail( get_the_ID() )) { echo ' sticky-post-without-image'; } ?>"><?php esc_html_e('Featured', 'camille'); ?></div>
			<?php endif; ?>
			<?php
			// Vertical post thumb
			if($current_post_vertical):
			?>
			<div class="blog-post-thumb hover-effect-block">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php the_post_thumbnail('camille-blog-thumb-vertical'); ?>
				</a>
			</div>
			<?php endif;?>
			<?php
			// List post thumb
			if(($current_post_list)&&!$current_post_vertical&&!$blog_enable_masonry_design&&!$blog_enable_layout_text):
			?>
				<?php
	          	if(($image_bg !== '')&&(!in_array($current_post_format, $post_formats_media))):
				?>

				<a class="blog-post-thumb" href="<?php the_permalink(); ?>" rel="bookmark" data-style="<?php echo esc_attr($image_bg); ?>"></a>

				<?php endif;?>
				<?php
					if(in_array($current_post_format, $post_formats_media)) {

						if( ($post_embed_video_output !== '')||($post_embed_audio_output !== '')||($post_embed_gallery_output !== '') ) {

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
								echo '<div class="blog-post-media blog-post-media-gallery clearfix">';
								echo wp_kses_post($post_embed_gallery_output);
								echo '</div>';
							}

							echo '</div>';

						}
					}

				?>
			<?php endif;?>

			<?php
			// Masonry thumbnail
			if($blog_enable_masonry_design) {

				if ( has_post_thumbnail() && (!$current_post_sticky)&&!in_array($current_post_format, $post_formats_media) ):
				?>

				<div class="blog-post-thumb hover-effect-block">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail('camille-blog-thumb'); ?>
					</a>
				</div>
				<?php
				endif;

				// Masonry media posts
				if(in_array($current_post_format, $post_formats_media)) {

					if( ($post_embed_video_output !== '')||($post_embed_audio_output !== '')||($post_embed_gallery_output !== '') ) {

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
							echo '<div class="blog-post-media blog-post-media-gallery clearfix">';
							echo wp_kses_post($post_embed_gallery_output);
							echo '</div>';
						}

						echo '</div>';

					}
				}
			}
			?>
			<?php
			// Regular post thumb
			if((!$current_post_vertical)&&(!$current_post_list)&&(!$blog_enable_masonry_design)&&(!$blog_enable_layout_text)) {

				// Post media
				if(($current_post_format == 'format-video')&&($post_embed_video_output !== '')) {
					echo '<div class="blog-post-thumb">';
					echo '<div class="blog-post-media blog-post-media-video">';
					echo camille_wp_kses_data($post_embed_video_output);// escaping does not needed here, wordpress OEMBED function used for this var
					echo '</div>';
					echo '</div>';
				}
				elseif(($current_post_format == 'format-audio')&&($post_embed_audio_output !== '')) {
					echo '<div class="blog-post-thumb">';
					echo '<div class="blog-post-media blog-post-media-audio">';
					echo camille_wp_kses_data($post_embed_audio_output);// escaping does not needed here, wordpress OEMBED function used for this var
					echo '</div>';
					echo '</div>';
				}
				elseif(($current_post_format == 'format-gallery')&&($post_embed_gallery_output !== '')) {
					echo '<div class="blog-post-thumb">';
					echo '<div class="blog-post-media blog-post-media-gallery clearfix">';
					echo wp_kses_post($post_embed_gallery_output);
					echo '</div>';
					echo '</div>';
				} else {
					// Post thumbnail
					if ( has_post_thumbnail() ):

						$blog_thumb_size = 'camille-blog-thumb';

						if($blog_enable_2_column_design && $span_class == 'col-md-9') {
							$blog_thumb_size = 'camille-blog-thumb-2column-sidebar';
						}

					?>
						<div class="blog-post-thumb hover-effect-block">
						<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php if($current_post_sticky&&!$blog_enable_masonry_design) { echo '<div class="blog-post-thumb-sticky-badge">'.esc_html__('Featured', 'camille').'</div>'; } ?>
						<?php the_post_thumbnail($blog_thumb_size); ?>
						</a>
						</div>

					<?php
					endif;
				}


			}
			?>
			<div class="post-content">

				<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list(  ', '  );
				if ( $categories_list ) :
				?>
				<div class="post-categories"><?php echo esc_html__('in', 'camille'); ?> <?php printf( esc_html__( '%1$s', 'camille' ), $categories_list ); ?></div>
				<?php endif; // End if categories ?>
				<h2 class="entry-title post-header-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?><?php if( $current_post_sticky&&!$blog_enable_masonry_design ) { echo '<sup>'.esc_html__('Featured', 'camille').'</sup>'; } ?></a></h2>

				<div class="post-info-wrapper clearfix">
				<?php if(isset($camille_theme_options['blog_post_show_author'])&&($camille_theme_options['blog_post_show_author'])): ?>
				<div class="post-author-wrapper">
					<div class="post-author-image">
						<?php echo get_avatar( get_the_author_meta('email'), '30' ); ?>
					</div>
					<div class="post-author-details">
						<div class="post-author"><?php esc_html_e('by','camille'); ?> <?php the_author_posts_link(); ?></div>
						<div class="post-info-date"><?php the_time(get_option( 'date_format' ));  ?></div>
					</div>
				</div>
				<?php else: ?>
				<div class="post-date-wrapper">
					<div class="post-info-date"><i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format' ));  ?></div>
				</div>
				<?php endif; ?>

				<?php
				if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
	                echo '<div class="comments-count" title="'.esc_html__('Post comments', 'camille').'"><i class="fa fa-comment-o"></i>';

	                comments_popup_link( esc_html__( 'Leave a comment', 'camille' ), esc_html__( '1 Comment', 'camille' ), esc_html__( '% Comments', 'camille' ) );

	                echo '</div>';
            	}
            	?>

				<?php
				// Views counter
				if(isset($camille_theme_options['blog_enable_post_views_counter']) && $camille_theme_options['blog_enable_post_views_counter']) {
	                do_action('camille_post_views');
	            }
				?>

				<?php if(!isset($post_socialshare_disable) || !$post_socialshare_disable): ?>
					<div class="post-info-share">
						<?php do_action('camille_social_share'); // this action called from plugin ?>
					</div>
				<?php endif; ?>
				</div>

				<div class="entry-content">
					<?php

					// Post content
					if($blog_enable_masonry_design) {
						if(in_array($current_post_format, $post_formats_hidereadmore)) {
							the_content('');
						} else {
							the_excerpt();
						}
						?>
						<?php

					} else {

						if(isset($camille_theme_options['blog_post_loop_type']) && $camille_theme_options['blog_post_loop_type']=='excerpt') {
							if(in_array($current_post_format, $post_formats_hidereadmore)) {
								the_content(esc_html__('Continue reading', 'camille'));

							} else {
								the_excerpt();

								echo '<a class="more-link btn alt" href="'.get_permalink().'">'.esc_html__('Continue reading', 'camille').'</a>';

							}
						} else {
							the_content(esc_html__('Continue reading', 'camille'));
						}

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'camille' ),
							'after'  => '</div>',
						) );
					}

					?>
				</div><!-- .entry-content -->


			</div>
			<div class="clear"></div>


		</div>

	</article>
	<?php if(isset($camille_theme_options['blog_list_show_related'])&&($camille_theme_options['blog_list_show_related'])&&!$blog_enable_masonry_design&&!$blog_enable_layout_text&&!$blog_enable_2_column_design): ?>
		<?php get_template_part( 'related-posts-loop' ); ?>
	<?php endif; ?>
</div>

