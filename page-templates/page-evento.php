<?php
    /*
        Template Name: Pagina Evento
    */
?>

<?php get_header(); ?>
    
    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main"> 

			<?php
			while ( have_posts() ) : the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <!-- class para permitir criar uma caixa de fundo branco para cada Post na index page -->
                <div class="index-box">
                
                
                
                <?php 
                if (has_post_thumbnail()) {
                    echo '<div class="single-post-thumbnail clear">';
                    echo '<div class="image-shifter">';
                    echo the_post_thumbnail('large-thumb');
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                
              	<header class="entry-header">
		            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            	</header><!-- .entry-header -->
	
                <div class="entry-content">
	            	<?php the_content(); ?>
                    <img src='<?php echo get_post_meta($post->ID, 'Imagem', true); ?>' /> 
                        <ul>
                            <li><h5>Data:</h5> <?php echo get_post_meta($post->ID, 'Data', true); ?></li>
                            <li><h5>Descricao:</h5> <?php echo get_post_meta($post->ID, 'Descrição', true); ?></li>
                            <li><h5>Local:</h5> <?php echo get_post_meta($post->ID, 'Local', true); ?></li>
                            <li><h5>Link:</h5> <?php echo get_post_meta($post->ID, 'Link', true); ?></li>
                        </ul>
            	</div><!-- .entry-content --> 
            	
            	</div><!-- .index-box --> 
            </article><!-- #post-## -->            
                            
            <?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(news);
get_footer();
