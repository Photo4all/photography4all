<?php
/**
 * Esta template faz o displaying de todos os single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package photography4all
 */

get_header(); ?>

  
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

            // Vai carregar o content.php
			get_template_part( 'template-parts/content-single', get_post_format() );

            // A funcao que cria a navegacao das fotos
			photography4all_post_navigation();

			// Se os comentários estiverem abertos ou tivermos pelo menos um comentário, carregue o modelo de comentário.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // Fim loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
