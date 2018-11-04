<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package photography4all
 */

/*
 * Verificacao se a post atual estiver protegido com uma paswword e o 
 * visitante ainda não tiver digitado a paswword, 
 * faz o return sem carregar os comentários.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php 
	
        if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment:', 'photography4all' )
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment:', '%1$s comments:', $comment_count,'photography4all' ) ),
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h2><!-- .comments-title -->

		

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
                    'avatar_size'=> 50, // por defeito é o 32px
				) );
			?>
		</ol><!-- .comment-list -->
                
                
                
        
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // há comentários para navegar ?>
            <nav id="comment-nav-below" class="comment-navigation clear" role="navigation">
                <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'photography4all' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '<i class="fa fa-arrow-circle-o-left"></i> Older Comments', 'photography4all' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-arrow-circle-o-right"></i>', 'photography4all' ) ); ?></div>
            </nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
                
                
                
                

		<?php 
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'photography4all' ); ?></p>
		<?php endif;

	endif; // Check for have_comments().

	comment_form(); ?>

</div><!-- #comments -->

