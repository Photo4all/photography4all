<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * variavel aleatoria
 */

$args = array( 
    'post_type' => 'news', 
    'posts_per_page' => 3,  // definido 3
    'orderby' => 'rand' // Post's aleatórios
);
$fotografias = new WP_Query( $args );
echo '<aside id="fotografias" class="clear">';

    while ( $fotografias->have_posts() ) : $fotografias->the_post();
        echo '<div class="fotografia">';   

            echo '<figure class="fotografia-thumb">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'photography4all') . get_the_title() . '" rel="bookmark">';
                 the_post_thumbnail('index-thumb');
            echo '</a>';
            echo '</figure>';  
            
            echo '<h2 class="title"><a href="' . get_permalink() . '" rel="bookmark">' . get_the_title() . '</a></h2>';  
            
            echo '<p class="entry-content">';            
                the_excerpt(); // quando o conteudo é maior do que 55 palavras aplica-se
                echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'photography4all') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>';                
            echo '</p>'; 
            
        echo '</div>';
    endwhile;
echo '</aside>';