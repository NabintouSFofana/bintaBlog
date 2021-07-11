<?php
/*
*	Related posts
*/
?>
<?php

$camille_theme_options = camille_get_theme_options();

//for use in the loop, list post titles related to first tag on current post
$tags = wp_get_post_tags(get_the_ID ());

$original_post = $post;

if ($tags) {

	$intags = array();

	foreach ($tags as $tag) {
		$intags[] = $tag->term_id;
	}

	$args=array(
	'tag__in' => $intags,
	'post__not_in' => array(get_the_ID ()),
	'posts_per_page'=> 3
	);

	$my_query = new WP_Query($args);

	if( $my_query->have_posts() ) {

		echo '<div class="blog-post-related blog-post-related-loop clearfix">';
		echo '<h5>'.esc_html__('Related posts','camille').'</h5>';

		while ($my_query->have_posts()) : $my_query->the_post();
			$post_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'camille-blog-thumb');

			if(has_post_thumbnail( $post->ID )) {
			    $post_image = 'background-image: url('.$post_image_data[0].');';
			    $post_class = '';
			    $has_image = true;
			}
			else {
			    $post_image = '';
			    $post_class = ' blog-post-related-no-image';
			    $has_image = false;
			}

		?>
		<div class="blog-post-related-item">
		<?php if($has_image): ?>
		<a href="<?php the_permalink() ?>" class="hover-effect-block blog-post-related-image-wrapper">
			<div class="blog-post-related-image" data-style="<?php echo esc_attr($post_image);?>"></div>
		</a>
		<?php endif; ?>
		<div class="blog-post-related-item-inside">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list(  ', '  );
		if ( $categories_list ) :
		?>

		<div class="blog-post-related-category"><?php echo esc_html__('in', 'camille'); ?> <?php printf( esc_html__( '%1$s', 'camille' ), $categories_list); ?></div>

		<?php endif; // End if categories ?>
		<div class="blog-post-related-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		<div class="blog-post-related-date"><?php echo get_the_time( get_option( 'date_format' ), get_the_ID() );?></div>

		</div>



		</div>
		<?php
		endwhile;

		echo '<div class="blog-post-related-separator clearfix"></div>';
		echo '</div>';

	}

	$post = $original_post;
	wp_reset_query();

}

?>
