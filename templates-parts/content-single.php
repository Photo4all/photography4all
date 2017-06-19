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
    			
    			
    		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'photography4all' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'photography4all' ),
				'after'  => '</div>',
			) );
		?>
		
		 <?php insert_exif() ?>
		
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
		<!-- Listagem das Tags -->
		<?php echo get_the_tag_list( '<ul><li><i class="fa fa-tags"></i>', '</li><li><i class="fa fa-tags"></i>', '</li></ul>' ); ?>
        
        <?php
        	edit_post_link(
    		sprintf(
    			/* Tradutores: %s: Nome do post actual */
    			esc_html__( 'Edit %s', 'photography4all' ),
    			the_title( '<span class="screen-reader-text">"', '"</span>', false )
    		),
    		'<span class="edit-link">',
    		'</span>'
        	);
    	?>
    	
	</footer><!-- .entry-footer -->
	
	</div><!-- .index-box -->
	
</article><!-- #post-## -->
