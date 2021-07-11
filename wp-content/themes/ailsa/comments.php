<?php
/*
 * The template for displaying comments.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}

$ailsa_previous_comment_text = cs_get_option('previous_comment_text') ? cs_get_option('previous_comment_text') : esc_html__( 'Older Comments', 'ailsa' );
$ailsa_next_comment_text  = cs_get_option('next_comment_text') ? cs_get_option('next_comment_text') : esc_html__( 'Newer Comments', 'ailsa' );
$ailsa_comment_singular_text = cs_get_option('comment_singular_text') ? cs_get_option('comment_singular_text') : esc_html__( 'Comment', 'ailsa' );
$ailsa_comment_plural_text = cs_get_option('comment_plural_text') ? cs_get_option('comment_plural_text') : esc_html__( 'Comments', 'ailsa' );

// You can start editing here -- including this comment!
?>
<div class="aisa-commentbox">
  <div class="aisa-comments-area comments-area" id="comments">

    <?php if ( have_comments() ) : ?>
    <div class="comments-section">
      <h3 class="comments-title">
    	<?php
    		printf( // WPCS: XSS OK.
    			esc_html( _nx( '%1$s '.$ailsa_comment_singular_text, '%1$s '.$ailsa_comment_plural_text, get_comments_number(), 'comments title', 'ailsa' ) ),
    			number_format_i18n( get_comments_number() ),
    			'<span>' . get_the_title() . '</span>'
    		);
    	?>
      </h3>
      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
   	    <nav id="comment-nav-above" class="navigation vt-comment-navigation" role="navigation">
    		<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ailsa' ); ?></h2>
    		<div class="vt-nav-links">
    			<div class="vt-nav-previous"><?php previous_comments_link( $ailsa_previous_comment_text ); ?></div>
    			<div class="vt-nav-next"><?php next_comments_link( $ailsa_next_comment_text ); ?></div>
    		</div><!-- .nav-links -->
    	</nav><!-- #comment-nav-above -->
      <?php endif; // Check for comment navigation. ?>

      <ol class="comments">
        <?php wp_list_comments('type=all&callback=ailsa_comment_modification'); ?>
      </ol><!-- .comment-list -->

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    	<nav id="vt-comment-nav-below" class="navigation vt-comment-navigation" role="navigation">
    		<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ailsa' ); ?></h2>
    		<div class="vt-nav-links">
    			<div class="vt-nav-previous"><?php previous_comments_link( $ailsa_previous_comment_text ); ?></div>
    			<div class="vt-nav-next"><?php next_comments_link( $ailsa_next_comment_text ); ?></div>
    		</div><!-- .nav-links -->
    	</nav><!-- #comment-nav-below -->
      <?php endif; // Check for comment navigation. ?>
    </div>

  <?php
  endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
  <div class="comments-section">
    <p class="vt-no-comments"><?php esc_html_e( 'Comments are closed.', 'ailsa' ); ?></p>
  </div>
	<?php endif;

	/* ==============================================
	  Comment Forms
	=============================================== */
	if ( comments_open() ) { ?>
	<div class="aisa-comment-form">
	  <?php
		$ailsa_form_title_text  = cs_get_option('comment_form_title_text') ? cs_get_option('comment_form_title_text') : esc_html__( 'Leave a reply', 'ailsa' );
    $ailsa_form_reply_to_text = cs_get_option('comment_form_reply_to_text') ? cs_get_option('comment_form_reply_to_text') : esc_html__( 'Leave a Reply to', 'ailsa' );
    $ailsa_form_subtitle_text  = cs_get_option('comment_form_subtitle_text') ? cs_get_option('comment_form_subtitle_text') : esc_html__( 'Your email address will not be published. Required fields are marked *', 'ailsa' );
    $ailsa_comment_field_label = cs_get_option('comment_field_label') ? cs_get_option('comment_field_label') : esc_html__( 'Comment *', 'ailsa' );
    $ailsa_name_field_label  = cs_get_option('name_field_label') ? cs_get_option('name_field_label') : esc_html__( 'Name *', 'ailsa' );
    $ailsa_email_field_label = cs_get_option('email_field_label') ? cs_get_option('email_field_label') : esc_html__( 'Email *', 'ailsa' );
    $ailsa_url_field_label   = cs_get_option('url_field_label') ? cs_get_option('url_field_label') : esc_html__( 'Website', 'ailsa' );
		$ailsa_post_comment_text = cs_get_option('post_comment_text') ? cs_get_option('post_comment_text') : esc_html__( 'Post Comment', 'ailsa' );

		$ailsa_fields = array(
			'author' => '<div class="aisa-form-inputs"><p><label>'.$ailsa_name_field_label.'</label><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="1"/></p>',
			'email' => '<p><label>'.$ailsa_email_field_label.'</label><input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" /></p>',
			'URL' => '<p><label>'.$ailsa_url_field_label.'</label><input type="text" id="url" name="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" tabindex="3" /></p></div>',
		);
    $ailsa_defaults = array(
      'comment_notes_before' => '<p>'.$ailsa_form_subtitle_text.'</p>',
      'comment_notes_after'  => '',
      'fields'               => apply_filters( 'comment_form_default_fields', $ailsa_fields),
      'comment_field' 	   => '<div class="aisa-form-textarea"><p><label>'.$ailsa_comment_field_label.'</label><textarea id="comment" name="comment" tabindex="4" rows="3" cols="30"></textarea></p></div>',
      'id_form'              => 'commentform',
      'class_form'           => 'comment-form aisa-contact',
      'id_submit'            => 'submit',
      'title_reply'          => $ailsa_form_title_text,
      'title_reply_to'       => $ailsa_form_reply_to_text.' %s',
      'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'. '',
      'label_submit'         => $ailsa_post_comment_text,
    );

    comment_form($ailsa_defaults);
?>
	</div>
	<?php } ?>
  </div>
</div><!-- #comments -->
<?php
