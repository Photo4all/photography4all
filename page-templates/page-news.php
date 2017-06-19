<?php
    /*
        Template Name: Pagina News
    */
?>

<?php get_header(); ?>  

<div id="main-content">
    
    
    	<div class="breadcrumb">
    		<?php
    			if (function_exists('bcn_display')) {
    				bcn_display();
    			}
    		?>
	    </div>

	<?php
        // a Page news tem template page-news.php
        // retornar os id das pages
        // O news é o nome do Custom Field onde está armazenada o valor da informação
        // exemplo do valor = "Desporto|107,Cultura|117,Arte|109,Natureza|115,Tradicoes|113,Romarias|120"
        // os id das paginas
        $newsCustomFields = get_post_meta($post->ID,"news", true);                
	
        // função php para fazer o explode com base no caracter virgula
        // converter todas as news num array que tem dois valores
        // $newsCustomFields[0] = "Desporto|107"
        // $newsCustomFields[1] = "Cultura|117"
        // $newsCustomFields[2] = "Arte|109"
        // $newsCustomFields[3] = "Natureza|115"
        // $newsCustomFields[4] = "Tradicoes|113"
        // $newsCustomFields[5] = "Romarias|120"
        $allNews = explode(",", $newsCustomFields);

        // devido ao facto que todas as news são um array fazemos um loop                
    	foreach ($allNews as $subNew) {
            
        // função php para fazer o explode com base no caracter |
        // por cada sub news
        // $pieces[0] = "Desporto"
        // $pieces[1] = "107"
        $pieces = explode("|", $subNew);
	
        // agora que já tenho acesso a page id=107 e ou titulo=Desporto
        // crio a variavel $link com permalink da page com o id=107
        $link = get_permalink($pieces[1]);
        echo "<div class='product-group group'>";
        
        // autput da variavel $pieces[0] que é o titulo da news
    	echo "<h3><a href='$link'>" . $pieces[0] . "</a></h3>";

        // inicio do wordpress loop
        // faço um query de quantas paginas por post
        // o valor -1 significa que quero todos os resultados se faço 1 era só um resultado
        // o post_type=page porque quero que todos as news resultados sejam pages
        // o post_parent=[1] é o id=107
        // esta linha retorna todas as paginas filhos do evento indicado 
        // listar todos os tipos de eventos Desporto, Arquitectura, Cultura, etc... e importante que o tipo seja paginas i.e post_type=page
           query_posts("posts_per_page=-1&post_type=page&post_parent=$pieces[1]");

        // inicio do loop
        // todos os eventos encontrados repete-se o html que esta dentro
		while (have_posts()) : the_post(); ?>
	
            <a href="<?php the_permalink(); ?>" class="product-jump" title="<?php echo "" . get_post_meta($post->ID, "Link", true); ?>" data-large="<?php get_post_meta($post->ID, "product_image", true); ?>">
                        
                <?php echo "<img src='" . get_post_meta($post->ID, "Imagem", true) . "' class='rs'  />"; ?>
                <span class="product-title"><?php the_title(); ?></span>
                <span class="product-code"><?php echo get_post_meta($post->ID, "Local", true); ?></span>

            </a>
        
        <!-- fim do loop -->
		<?php endwhile; wp_reset_query();
		
		echo "</div>";
		
	    };
	    ?>
	    
</div>    <!-- .quadrado -->

<?php get_footer(); ?>