<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dashti
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>


<div id="comments" class="comments-area px-4 md:px-0 grid grid-flow-row gap-y-5 my-2">



	<h2 class="font-bold text-color-base-alt">
	<?php
				$dashti_theme_comment_count = get_comments_number();
				if ( '0' === $dashti_theme_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'be First to comment On &ldquo;%1$s&rdquo;', 'dtech' ),
						 wp_kses_post( get_the_title() ) 
					);
				} elseif('1'===$dashti_theme_comment_count) {
					printf( 
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( 'There are currently only 1 comments On  &ldquo;%2$s&rdquo;', 'There are (%1$s) comments  On &ldquo;%2$s&rdquo;', $dashti_theme_comment_count, 'comments title', 'dtech' ) ),
						number_format_i18n( $dashti_theme_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						 wp_kses_post( get_the_title() ) 
					);
				}
				else{
					printf( 
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( 'There are (%1$s) comments On  &ldquo;%2$s&rdquo;', 'There are (%1$s) comments  On &ldquo;%2$s&rdquo;', $dashti_theme_comment_count, 'comments title', 'dtech' ) ),
						number_format_i18n( $dashti_theme_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						 wp_kses_post( get_the_title() ) 
					);

				}
				?>
			</h2><!-- .comments-title -->
			<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
	
		<ol class="comments-list w-full grid grid-flow-row gap-2">
				<?php
				wp_list_comments(
					array(
						'style'      => 'li',
						'callback'=>'dashti_theme_comment',
						'max_depth'         => 3,
						'reverse_top_level' =>true,
						'reverse_children'=>true,
					)
				);
				?>
	</ol><!-- #comments -->

<?php	

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dashti_theme' ); ?></p>
		<?php
	endif;
endif;//check have comments

?>


		</div>

<?php


	


 
$post_id       = $post->ID;
$commenter     = wp_get_current_commenter();
$user          = wp_get_current_user();
$user_identity = $user->exists() ? $user->display_name : '';
$req   = get_option( 'require_name_email' );
$html5 = 'html5' === 'html5';

// Define attributes in HTML5 or XHTML syntax.
$required_attribute = ' required';
$checked_attribute  = ' checked';
// Identify required fields visually and create a message about the indicator.
$required_indicator = ' ' . wp_required_field_indicator();
$required_text      = ' ' . wp_required_field_message();


 $defaults = array(


'must_log_in'=> sprintf(
	  '<div class="col-span-full">%s</div>',
	  sprintf(
		/* translators: %s: Login URL. */
		__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		/** This filter is documented in wp-includes/link-template.php */
		wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
	  )
	),
	'logged_in_as'    => sprintf(
	  '<div class="col-span-full">%s%s</div>',
	  sprintf(
		/* translators: 1: User name, 2: Edit user link, 3: Logout URL. */
		__( 'Logged in as %1$s. <a href="%2$s">Edit your profile</a>. <a href="%3$s">Log out?</a>' ),
		$user_identity,
		get_edit_user_link(),
		/** This filter is documented in wp-includes/link-template.php */
		wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
	  ),
	  $required_text
	),
	'comment_notes_before' => sprintf(
	  '<div class="col-span-full">%s%s</div>',
	  sprintf(
		'<div id="col-span-full">%s</div>',
		__( 'Your email address will not be published.' )
	  ),
	  $required_text
	),



  	'comment_notes_before' => '<!-- comments notes before --><div class="col-span-full text-sm block my-2"> ' . __( 'Your email address will not be published.','text-domain' ) .'</div><!-- comments notes before ends -->',
	'comment_notes_after'  => '',
	'action'               => site_url( '/wp-comments-post.php' ),
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
 	'class_container'      => 'flex justify-between flex-col w-full bg-white dark:bg-opacity-5 rounded-md border border-gray-200 border-indigo-500/20 shadow-sm items-center gap-2 my-2',
  	'class_form'           => 'w-full',
	'class_submit'         => 'submit',
	'name_submit'          => 'submit',
	'title_reply'          => __( 'Leave a Reply' ),
	/* translators: %s: Author of the comment being replied to. */
	'title_reply_to'       => __( 'Leave a Reply to %s' ),
  	'title_reply_before'   => '<div
  	class="self-start w-full border-b border-gray-200 border-indigo-500/20 px-4 py-1"><h2 class="text-base font-extrabold leading-loose">',
  	'title_reply_after'    => '</h2></div>',
	'cancel_reply_before'  => ' <small>',
	'cancel_reply_after'   => '</small>',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Post Comment' ),
    'submit_button'        => '<input name="%1$s" type="submit" class="bg-primary text-muted hover:shadow-primary/50 shadow-md focus:outline-none block cursor-pointer font-medium rounded-md text-sm px-6 py-1 mr-2" />',
    'submit_field'         => '</div><div
	class="self-end w-full border-t border-gray-200 border-indigo-500/20 py-2 flex justify-end items-center mt-2"
  >
<!-- submit-field start --> %1$s %2$s <!-- submit-field ends --></div>',
  );
  
  
  
  
  




comment_form($defaults);


?>