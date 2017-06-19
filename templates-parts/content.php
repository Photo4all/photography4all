<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package photography4all
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
    <!-- class para permitir criar uma caixa de fundo branco para cada Post na index page -->
    <div class="index-box">
        
        <!-- Imagens em destaque i.e. featured image -->
        <?php
        if (has_post_thumbnail()) {
            echo '<div class="small-index-thumbnail clear">';
            echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail('index-thumb');
            echo '</a>';
            echo '</div>';
        }
        ?>
        
    
	<header class="entry-header"><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	    
	    
	   <!-- Listagem das Categorias -->
	   <?php 
    	    /* Tradutores: Usado entre os itens da lista, ha um espaco apos a virgula */
    	    /* A variavel guarda a lista das categorias */
    		$categories_list = get_the_category_list( esc_html__( ', ', 'photography4all' ) );
    		/* Verifica se existe mais do que uma categoria, porque se existir so uma categoria nao faz sentido listar */
    		/* Se exister mais do que uma categoria lista as mesmas */
    		if ( $categories_list && photography4all_categorized_blog() ) {
    			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'photography4all' ) . '</span>', $categories_list ); 
    		}
	    ?>
	    
	    <!-- Titulo -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		/* Meta */
		if ( 'post' === get_post_type() ) : ?>
    		<div class="entry-meta">
    		    <!-- Este funcao esta definida no ficheiro template-tags.php -->
    			<?php photography4all_posted_on(); ?>
    			
    			<!-- Adicionar o link para os comentarios -->
    			<?php 
    			    /* Verifica se necessaria password e se os comentarios estao abertos e se existem comentarios */
    			    /* necessario abrir comentarios Allow comments */
                    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
                        echo '<span class="comments-link">';
                        comments_popup_link( __( 'Leave a comment', 'photography4all' ), __( '1 Comment', 'photography4all' ), __( '% Comments', 'photography4all' ) );
                        echo '</span>';
                    }
                ?>
    			<!-- display o botao de editar -->
                <?php edit_post_link( __( ' | Edit', 'photography4all' ), '<span class="edit-link">', '</span>' ); ?>
    			
    		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer continue-reading">
		<?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'photography4all') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-right" aria-hidden="true"></i></a>'; ?>
	</footer><!-- .entry-footer -->
	
	</div><!-- .index-box -->
	
</article><!-- #post-## -->
