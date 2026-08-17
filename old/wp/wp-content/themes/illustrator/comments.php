<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number()) : ?>
	<div class="edgtf-comment-holder clearfix" id="comments">
		<div class="edgtf-comment-number">
			<div class="edgtf-comment-number-inner">
				<h5><?php comments_number( esc_html__('No Comments','illustrator'), esc_html__('Comment: ','illustrator').' 1', esc_html__('Comments: ','illustrator').' %'); ?></h5>
			</div>
		</div>
		<div class="edgtf-comments">

			<?php if ( have_comments() ) : ?>
				<ul class="edgtf-comment-list">
					<?php wp_list_comments(array( 'callback' => 'illustrator_edge_comment')); ?>
				</ul>
			<?php endif; ?>

			<?php if( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' )) : ?>
				<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'illustrator'); ?></p>
			<?php endif; ?>

		</div>
	</div>
	<?php
		$illustrator_edge_commenter = wp_get_current_commenter();
		$illustrator_edge_req = get_option( 'require_name_email' );
		$illustrator_edge_aria_req = ( $illustrator_edge_req ? " aria-required='true'" : '' );

		$illustrator_edge_args = array(
			'id_form' => 'commentform',
			'id_submit' => 'submit_comment',
			'title_reply'=> esc_html__( 'Post a Comment','illustrator' ),
			'title_reply_to' => esc_html__( 'Post a Reply to %s','illustrator' ),
			'cancel_reply_link' => esc_html__( 'Cancel Reply','illustrator' ),
			'label_submit' => esc_html__( 'Submit','illustrator' ),
			'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Write your comment here...','illustrator' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="edgtf-two-columns-50-50 clearfix"><div class="edgtf-two-columns-50-50-inner clearfix"><div class="edgtf-column"><div class="edgtf-column-inner"><input id="author" name="author" placeholder="'. esc_html__( 'Your full name','illustrator' ) .'" type="text" value="' . esc_attr( $illustrator_edge_commenter['comment_author'] ) . '"' . $illustrator_edge_aria_req . ' /></div></div>',
				'url' => '<div class="edgtf-column"><div class="edgtf-column-inner"><input id="email" name="email" placeholder="'. esc_html__( 'E-mail address','illustrator' ) .'" type="text" value="' . esc_attr(  $illustrator_edge_commenter['comment_author_email'] ) . '"' . $illustrator_edge_aria_req . ' /></div></div></div></div>'
				 ) )
			);

		if(is_user_logged_in()){
			$illustrator_edge_args['class_form'] = 'edgtf-comment-registered-user';
			$illustrator_edge_args['title_reply_before'] = '<h5 id="reply-title" class="comment-reply-title edgtf-comment-reply-title-registered">';
			$illustrator_edge_args['title_reply_after'] = '</h5>';
		}
	?>
	<?php if(get_comment_pages_count() > 1) : ?>
		<div class="edgtf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php endif; ?>
	<div class="edgtf-comment-form">
		<?php comment_form($illustrator_edge_args); ?>
	</div>
<?php endif; ?>