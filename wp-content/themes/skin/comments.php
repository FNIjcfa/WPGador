<?php if ( post_password_required() ) {
return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
		 <?php _e('Share your comments','skin');?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'skin' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'skin' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'skin' ) ); ?></div>
		</nav>
	<?php endif; // Check for comment navigation. ?>
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
			'style'      => 'ol',
			'short_ping' => true,
			'avatar_size'=> 65,
			) );
		?>
	</ol>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'skin' ); ?></h3>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'skin' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'skin' ) ); ?></div>
		</nav>
	<?php endif; // Check for comment navigation. ?>
	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'skin' ); ?></p>
	<?php endif; ?>
<?php endif; // have_comments() ?>
<?php comment_form(); ?>
</div>