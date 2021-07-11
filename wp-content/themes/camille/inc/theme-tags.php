<?php
/**
 * Custom template tags for this theme.
 * @package Camille
 */

if ( ! function_exists( 'camille_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function camille_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation-post' : 'navigation-post navigation-paging';

	?>
	<nav id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo esc_attr($nav_class); ?>">

	<?php if ( is_single() ) : // navigation links for single posts ?>

	<?php
    $prevPost = get_previous_post();

    if($prevPost) {
      $prevthumbnail = get_the_post_thumbnail($prevPost->ID, 'camille-blog-thumb-widget');
    } else {
      $prevthumbnail = false;
    }

    $nextPost = get_next_post();

    if($nextPost) {
      $nextthumbnail = get_the_post_thumbnail($nextPost->ID, 'camille-blog-thumb-widget');
    } else {
      $nextthumbnail = false;
    }
    ?>
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 nav-post-prev">
		<?php
		$prev_post = get_previous_post();
		if ( is_a( $prev_post , 'WP_Post' ) ) { ?>
		  <a class="clearfix" href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><?php echo wp_kses_post($prevthumbnail); ?><div class="nav-post-title"><?php esc_html_e( 'Previous', 'camille' ); ?></div><div class="nav-post-name"><?php echo esc_html(get_the_title( $prev_post->ID )); ?></div></a>
		<?php }
		?>
		</div>
		<div class="col-md-6 nav-post-next">
		<?php
		$next_post = get_next_post();
		if ( is_a( $next_post , 'WP_Post' ) ) { ?>
		  <a class="clearfix" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo wp_kses_post($nextthumbnail); ?><div class="nav-post-title"><?php esc_html_e( 'Next', 'camille' ); ?></div><div class="nav-post-name"><?php echo esc_html(get_the_title( $next_post->ID )); ?></div></a>
		<?php }
		?>
		</div>

	</div>
	</div>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
	<div class="clear"></div>
	<div class="container-fluid">
		<div class="row">
			<?php if ( function_exists( 'wp_pagenavi' ) ): ?>
				<div class="col-md-12 nav-pagenavi">
				<?php wp_pagenavi(); ?>
				</div>
			<?php else: ?>
				<div class="col-md-6 nav-post-prev">
				<?php if ( get_next_posts_link() ) : ?>
				<?php next_posts_link( esc_html__( 'Older posts', 'camille' ) ); ?>
				<?php endif; ?>
				</div>

				<div class="col-md-6 nav-post-next">
				<?php if ( get_previous_posts_link() ) : ?>
				<?php previous_posts_link( esc_html__( 'Newer posts', 'camille' ) ); ?>
				<?php endif; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // camille_content_nav

if ( ! function_exists( 'camille_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function camille_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php esc_html_e( 'Pingback:', 'camille' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'camille' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-meta clearfix">
				<div class="reply">
					<?php edit_comment_link( esc_html__( 'Edit', 'camille' ), '', '' ); ?>
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
				<div class="comment-author vcard">

					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 100 ); ?>

				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<div class="author">
					<?php printf( esc_html__( '%s', 'camille' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div>
					<div class="date"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'camille' ), get_comment_date(), get_comment_time() ); ?></time></a></div>

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'camille' ); ?></p>
					<?php endif; ?>
					<div class="comment-content">
						<?php comment_text(); ?>
					</div>
				</div><!-- .comment-metadata -->


			</div><!-- .comment-meta -->


		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for camille_comment()
