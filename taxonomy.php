<?php
/**
 * The template for displaying taxonomy pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package photography4all
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">  

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">				
                <h1 class="page-title">
                <?php
                    $current_term = get_queried_object();
                    $taxonomy = get_taxonomy($current_term->taxonomy);
                    echo $taxonomy->label . ': '. $current_term->name;                                          
                ?>                                    
                </h1>  
            
                <?php
                    the_archive_description( '<div class="archive-description">', '</div>' );
				?>
                                
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
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



if ( 'travel' === get_post_type() ) {
    get_sidebar('travel');
}
if ( 'news' === get_post_type() ) {
    get_sidebar('news');
}


get_footer();
