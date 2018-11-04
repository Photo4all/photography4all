<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package photography4all
 */

get_header(); ?>

<div class="categories-boxTravel">

<!-- Inicio do FLEX CONTAINER, lista não ordenada -->
<ul class="grid-wrapTravel">
   
	<!-- Inicio do Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- Lista um item por cada Post -->
            <li class="grid-itemTravel">
                <!-- Featured imagem do Post -->
                <p>
                    <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large-thumb' ); ?></a>
                    <?php endif; ?>
                </p>
                <!-- Titulo do Post -->
                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <!-- Metadata do Post -->
                <p class="author-text">Posted on <?php echo the_time('F jS, Y');?> by <?php the_author_posts_link(); ?> </p>            
                <!-- Extracto do Post -->
                <?php the_excerpt(); ?>
        <?php endwhile; ?>
        <?php endif; ?>

            <!-- Fim do item listado -->
            </li>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>

<!-- Fim do FLEX CONTAINER -->      
</ul>
</div> 

<div class="grid-navigation">
    <?php photography4all_page_navigation_nosidebar(); ?> 
</div>    

<?php
get_footer();

