<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package LuisRamirez
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

<div id="comments" class="comments-area">
 <div class="entry-comments">
		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) : ?>
		<div class="notice-comments">
			<?php comments_number(__('No hay comentarios aún','luisramirezblog'),__('1 Comentario','luisramirezblog'),__('% Comentarios','luisramirezblog')); ?>
		</div>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
							<h2 class="screen-reader-text"><?php esc_html_e( 'Existen varios comentarios, navega por las páginas de comentarios.', 'luisramirezblog' ); ?></h2>
							<div class="nav-links">
								<div class="col-md-6 alignleft">
									<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentarios viejos', 'luisramirezblog' ) ); ?></div>
								</div>
								<div class="col-md-6 alignright">
									<div class="nav-next"><?php next_comments_link( esc_html__( 'Comentarios nuevos', 'luisramirezblog' ) ); ?></div>
								</div>

							</div><!-- .nav-links -->
						</nav><!-- #comment-nav-above -->
					<?php endif; // Check for comment navigation. ?>

				

						<ul class="comment-list">
							<?php wp_list_comments('callback=luisramirez_comment&end-callback=luisramirez_comment_close'); ?>
						</ul>

						<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
							<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
								<h2 class="screen-reader-text"><?php esc_html_e( 'Comentarios antiguos', 'luisramirezblog' ); ?></h2>
								<div class="nav-links">
								<div class="col-md-6 alignleft">
									<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Comentarios viejos', 'luisramirezblog' ) ); ?></div>
								</div>
								<div class="col-md-6 alignright">
									<div class="nav-next"><?php next_comments_link( esc_html__( 'Comentarios nuevos', 'luisramirezblog' ) ); ?></div>
								</div>

								</div><!-- .nav-links -->
							</nav><!-- #comment-nav-below -->
							<?php
			endif; // Check for comment navigation.

		endif; // Check for have_comments().


		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'luisramirezblog' ); ?></p>
		<?php
		endif;

		comment_form();
		?>

		
	</div>
</div><!-- #comments -->
