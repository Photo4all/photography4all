<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package photography4all
 */

/*
 * Se Post atual estiver protegida por uma senha e
 * o utilizador ainda não inseriu a senha
 * sai sem carregar os comentarios.
 * Assim se for a um Post com password nem se quer ve os comentarios
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// Se tiveres comentarios !
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			    // Mostrar o numero de comentarios
				printf( 
					esc_html( _nx( 'One comment:', '%1$s comments:', get_comments_number(), 'comments title', 'photography4all' ) ),
					number_format_i18n( get_comments_number() )	);
			?>
		</h2><!-- .comments-title -->


        <!-- Gravatar -->
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 50,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?> // Are there comments to navigate through? 
            <nav id="comment-nav-below" class="comment-navigation clear" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'photography4all' ); ?></h1>
                <!-- anterior -->
                <div class="nav-previous"><?php previous_comments_link( __( '<i class="fa fa-arrow-left" aria-hidden="true"></i> Older Comments', 'photography4all' ) ); ?></div>
                <!-- proximo -->
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-arrow-right" aria-hidden="true"></i>', 'photography4all' ) ); ?></div>
                
            </nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().



	// Se os comentários estiverem fechados e houver comentários, vamos deixar uma pequena nota devemos?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'photography4all' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
