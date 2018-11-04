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
 */

get_header(); ?>



<section id="responsive-slider"> 
<div id="slider">
    <?php 
    $query = new WP_Query( array( 'post_type' => 'lightbox', 'posts_per_page' => -1) );
        if( $query->have_posts() ){
            echo '<figure>'; 
            while($query->have_posts()){                
                $query->the_post();
                $image_query = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'posts_per_page' => -1, 'post_parent' => get_the_ID() ) );
                while( $image_query->have_posts() ) {
                    $image_query->the_post();
                    // só faz o gets da imagem que foi uploaded para o wordpress, 
                    // a funcao não faz output de uma imagem no conteúdo do post
                    echo wp_get_attachment_image( get_the_ID(),'slider-thumb'); 
                    
                 // INCIO OBRAS    
                 //   echo '<figcaption>';
                 //   echo wp_get_attachment_caption( get_the_ID()); 
                 //   echo '</figcaption>';
                 // FIM DE OBRAS 
                
                    }
            }
            echo '</figure>';
        }       
    ?> 
    </div>           
</section>


<!--chamar o ficheiro fotografias.php com função de 3 Post aleatorios -->
<?php get_template_part('fotografias'); ?>


<?php get_footer();
