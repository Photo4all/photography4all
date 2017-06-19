<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package photography4all
 */


if ( ! function_exists( 'photography4all_posted_on' ) ) :
/**
 * Funcao que mostra o HTML a informações Meta da data, hora e o autor do Post actual. 
 */
function photography4all_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
    
    // Retirar o Posted on.
	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'photography4all' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

    // Colocar o Written by seguido do nome do autor.
	$byline = sprintf(
		esc_html_x( 'Taken by %s', 'post author', 'photography4all' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'photography4all_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function photography4all_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'photography4all' ) );
		if ( $categories_list && photography4all_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'photography4all' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'photography4all' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'photography4all' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'photography4all' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'photography4all' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function photography4all_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'photography4all_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'photography4all_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so photography4all_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so photography4all_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in photography4all_categorized_blog.
 */
function photography4all_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'photography4all_categories' );
}
add_action( 'edit_category', 'photography4all_category_transient_flusher' );
add_action( 'save_post',     'photography4all_category_transient_flusher' );



/*
 * Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
 */

function photography4all_social_menu() {
    if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'container'       => 'div',
			'container_id'    => 'menu-social',
			'container_class' => 'menu-social',
			'menu_id'         => 'menu-social-items',
			'menu_class'      => 'menu-items',
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
			'depth'           => 1,
			'fallback_cb'     => '',
		)
	);
    }
}


if ( ! function_exists( 'photography4all_post_navigation' ) ) :
/**
 * Função do Single Post para exibir navigation do next/previous post quando aplicavel.
 * A função procura o anterior e proximo Post e coloca-os nas variaveis $previous e $next
 * 
 */
function photography4all_post_navigation() {
	// Não exibe markup vazia se não existir em lugar algum navegar
    // injecta html tags.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
        <nav class="navigation post-navigation" role="navigation">
            <div class="post-nav-box clear"> 
                <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'photography4all' ); ?></h1>
                <div class="nav-links">
                    <?php
                         previous_post_link( '<div class="nav-previous"><div class="nav-indicator">' . _x( 'Previous Page:', 'Previous post', 'photography4all' ) . '</div><h1>%link</h1></div>', '%title' );
                         next_post_link(     '<div class="nav-next"><div class="nav-indicator">' . _x( 'Next Page:', 'Next post', 'photography4all' ) . '</div><h1>%link</h1></div>', '%title' );
                    ?>
                </div>
            </div>
        </nav>
	<?php
}
endif;





if ( ! function_exists( 'photography4all_page_navigation' ) ) :
/**
 * Função do Index Post para exibir navigation do next/previous post quando aplicavel.
 * A função procura o anterior e proximo Post e coloca-os nas variaveis $previous e $next
 * Aplica-se as pages index i.e. listagem de posts
 */
function photography4all_page_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '← Previous', 'photography4all' ),
		'next_text' => __( 'Next →', 'photography4all' ),
        'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'photography4all' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
 endif;   







