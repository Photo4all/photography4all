<?php
    /*
        Template Name: Pagina About
    */
?>

<?php get_header(); ?>  
    <div id="main-content">
        <main id="main" class="site-main" role="main">
            <?php
            	if ( have_posts() ) :
            	while ( have_posts() ) : the_post();    
            ?>
            <div class="entry-content">
                <h1>About</h1>
                <p><?php the_content(); ?></p>
                <?php
                    endwhile;
                    else :
                	echo 'no post';
                	endif; 
                ?>
            </div><!-- .entry-content -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>