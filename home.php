<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package photography4all
 * Copia da pagina Index
 */

get_header(); ?>

		<div id="primary" class="content-area">
		<main id="main" class="site-main">

                <!-- Existem Post's disponiveis ? -->
		<?php if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
  				</header>
			<?php
			endif;

			/* Inicio do Loop faz o display dos Post's */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 * se criar uma template content-aside.php com o get_post_format() vai chamar a mesma
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;

//			the_posts_navigation();
            photography4all_page_navigation();


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
