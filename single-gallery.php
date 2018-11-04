<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package photography4all
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <!--Inicio do Loop-->
		<?php while ( have_posts() ) : the_post();
                   
            // criado o ficheiro content-gallery.php com base no ficheiro content.php
            // com tem o conteudo do post
            get_template_part( 'template-parts/content-gallery', get_post_type() );

            // função criada de raiz substitui a função the_post_navigation();
            // permite navegar para o anterior ou proximo post
            photography4all_post_nav(); 			

            // Se os comentarios estiverem abertos ou tiver pelo menos um comentario
            // carrega a template comentario
            if ( comments_open() || get_comments_number() ) :
                    comments_template();
            endif;

		endwhile; // Fim do loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
