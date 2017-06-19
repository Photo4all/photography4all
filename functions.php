<?php
/**
 * photography4all functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package photography4all
 */




/**
 * A condição faz com que neste tema possam ser criados Child Themes e permitindo desativar algumas 
 * das funções basta aplicar a condição. 
 */
if ( ! function_exists( 'photography4all_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * 
 * Funcao principal do tema photography4all.
 */
function photography4all_setup() {
	/*
	 * Disponibilizar o tema para tradução.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on photography4all, use a find and replace
	 * to change 'photography4all' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'photography4all', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	

	/*
	 * Activar o suporte para Post Thumbnails nos posts e pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	/* tamanho da imagem com opcao true automatizacao crop */
	add_image_size('large-thumb', 1060, 650, true);
	/* tamanho da imagem para as paginas index com opcao true automatizacao crop */
    add_image_size('index-thumb', 780, 250, true);
	
	
	

	// Nao foi utilizado o menu principal menu-1 do WP theme que usa a funcao wp_nav_menu() 
	// o mesmo foi substituido por RWD menu com funcoes do PHP.
	// Foi criado o menu social do WP theme que usa a funcao wp_nav_menu().
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'photography4all' ),
		'social' => esc_html__( 'Social Menu', 'photography4all' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
	 * Vai injectar tags do HTML5
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'photography4all_setup' );



/**
 * Definir a largura do conteúdo em pixels, com base no design do tema e na folha de estilos
 * qualquer contedudo de um POST ou de uma PAGE não pode ser mais do que 600px seja um video ou uma imagem. 
 * 
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function photography4all_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'photography4all_content_width', 600 );
}
add_action( 'after_setup_theme', 'photography4all_content_width', 0 );





/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * 
 * Criado o sidebar-1 para o Sidebar.
 * Criado o sidebar-2 para o Footer.
 * Criado o sidebar-3 para o News.
 * 
 */
function photography4all_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'photography4all' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Sidebar Widget area que aparece no na pagina de travel.', 'photography4all' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'photography4all' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Footer Widget area que aparece no footer em todas as paginas.', 'photography4all' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Page News Widgets', 'photography4all' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Page News Widget area que aparece nas News paginas.', 'photography4all' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'photography4all_widgets_init' );



/**
 * A funcao Enqueue scripts e styles fornece um metodo sistemática de carregar JavaScripts e estilos.
 */
function photography4all_scripts() {
    
    // Carrego o Style principal
	wp_enqueue_style( 'photography4all-style', get_stylesheet_uri() );
	
	// Carregar o Style do sidebar que define o Layout com ou sem sidebar
    // o sidebar aplica-se so aos post's e post index
    if (is_page_template('page-templates/page-portfolio.php' || 'page-login.php' || 'page-evento.php' )) {
    // Carregar o Style do no sidebar que define o Layout sem o sidebar
        wp_enqueue_style( 'photography4all-no-sidebar-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
    } else {
    // Carregar o Style do sidebar que define o Layout
       wp_enqueue_style( 'photography4all-sidebar-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
    } 
        
    // Carregar o Style do slider da front page. 
    if (is_front_page()) {
       wp_enqueue_style('photography4all-slider-style',get_template_directory_uri().'/css/slider.css');
    }
        
    // Carregar os Styles do plugin lightbox para o portfolio
    if (is_page_template('page-templates/page-portfolio.php')) {
	    wp_enqueue_style( 'photography4all-slider-lightbox-style' , get_template_directory_uri() . '/css/lightbox.css');
        wp_enqueue_style( 'photography4all-slider-gallery-style' , get_template_directory_uri() . '/css/gallery.css');
    } 
        
    // Carregar os Styles do grid e o efeito de Hover da categorias page. 
    if (is_page_template('page-templates/page-categorias.php')) {
        wp_enqueue_style('photography4all-categorias-style',get_template_directory_uri().'/css/categorias.css');
        //wp_enqueue_style('photography4all-hover-style',get_template_directory_uri().'/css/categorias-hover.css');
    }
    
     // Carregar os Styles do grid e o efeito de Hover da categorias page. 
    if (is_page_template('page-templates/page-news.php')) {
        wp_enqueue_style('photography4all-categorias-style',get_template_directory_uri().'/css/news.css');
    }
    
    // Carregar o Style dos forms do registo e login page. 
    // Carregar o Style do forma da contact page. 
    if (is_page_template('page-templates/page-contact.php' || 'page-register.php' || 'page-login.php' || 'page-forgot_password.php' || 'page-change_password.php')) {
        wp_enqueue_style('photography4all-contact-style',get_template_directory_uri().'/css/forms.css');
    }

	// Carregar as fontes do Google Fonts
    wp_enqueue_style('photography4all-google-fonts', 'https://fonts.googleapis.com/css?family=Marvel' );    

    // Carregar os icons do FontAwesome
    wp_enqueue_style('photography4all-fontawesome', 'https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'); 
    
    // Carregar os script do Menu Principal    
    wp_enqueue_script('photography4all-menu-principal-script', get_template_directory_uri().'/js/menu.js', array('jquery'),'20170514',false);
    
    // O superfish permite usar as keys do teclado para o menu drop
    wp_enqueue_script( 'photography4all-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20170514', true );
    // com o array('photography4all-superfish') fica dependente do superfish.min.js
    wp_enqueue_script( 'photography4all-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('photography4all-superfish'), '20170514', true );
    
    // Carregar os Styles do plugin lightbox para o portfolio
    if (is_page_template('page-templates/page-portfolio.php')) {
        wp_enqueue_script( 'photography4all-slider-lightbox', get_template_directory_uri() . '/js/lightbox-2.6.min.js', array('jquery'), '20170412', false);
        wp_enqueue_script( 'photography4all-slider-custom', get_template_directory_uri() . '/js/gallery.js', array('jquery'), '20170412', false);
    }
    
   
        
	// para desativar !
	wp_enqueue_script( 'photography4all-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'photography4all-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photography4all_scripts' );




/**
 * Implementar o recurso do Header (cabecalho) personalizado.
 * Permite ao administrador modificar i.e. personalidar o display do Header 
 * Menu do Dashdoard -> Customize tem opcao de mudar aparencia do Site Title & Tagline e das Colors.
 */
require get_template_directory() . '/inc/custom-header.php'; 

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * Funcao para implementar a leitura das especificacoes EXIF dos ficheiros de fotografia.
 * 
 */

function geo_frac2dec($str) {
	@list( $n, $d ) = explode( '/', $str );
	if ( !empty($d) )
		return $n / $d;
	return $str;
}

function geo_pretty_fracs2dec($fracs) {
	return geo_frac2dec($fracs[0]) . '&deg; ' .
		   geo_frac2dec($fracs[1]) . '&prime; ' .
		   geo_frac2dec($fracs[2]) . '&Prime; ';
}

function geo_single_fracs2dec($fracs) {
	return geo_frac2dec($fracs[0]) +
		   geo_frac2dec($fracs[1]) / 60 +
		   geo_frac2dec($fracs[2]) / 3600;
}

function insert_exif() {
    echo '<div class="title-metadata"><i class="fa fa-camera-retro fa-lg"></i> Photo Metadata</div>';
	if (is_single() && in_category('Categoria3') || is_attachment()) {
		global $post;
		$args = array(
			'post_type' => 'attachment',
			'numberposts' => -1,
			'post_status' => null,
			'post_parent' => $post->ID
		);
		$attachments = get_posts($args);
		foreach ($attachments AS $attachment) {
			$imgid = $attachment->ID;
			$imgmeta = wp_get_attachment_metadata( $imgid );
			
			$latitude = $imgmeta['image_meta']['latitude'];
			$longitude = $imgmeta['image_meta']['longitude'];
			$lat_ref = $imgmeta['image_meta']['latitude_ref'];
			$lng_ref = $imgmeta['image_meta']['longitude_ref'];
			$lat = geo_single_fracs2dec($latitude);
			$lng = geo_single_fracs2dec($longitude);
			if ($lat_ref == 'S') { $neg_lat = '-'; } else { $neg_lat = ''; }
			if ($lng_ref == 'W') { $neg_lng = '-'; } else { $neg_lng = ''; }                        
            
                echo '<div class="exifCaixa">';
			
				echo "<ul class='exif'>";
				if (!empty($imgmeta['image_meta']['aperture'])) echo "<li>Aperture: f/" . $imgmeta['image_meta']['aperture']."</li>";
				if (!empty($imgmeta['image_meta']['iso'])) echo "<li>ISO: " . $imgmeta['image_meta']['iso']."</li>";

				if (!empty($imgmeta['image_meta']['shutter_speed']))
				{
				echo "<li>Shutter Speed: ";
					if ((1 / $imgmeta['image_meta']['shutter_speed']) > 1)
					{
					echo "1/";
						if ((number_format((1 / $imgmeta['image_meta']['shutter_speed']), 1)) == 1.3
						or number_format((1 / $imgmeta['image_meta']['shutter_speed']), 1) == 1.5
						or number_format((1 / $imgmeta['image_meta']['shutter_speed']), 1) == 1.6
						or number_format((1 / $imgmeta['image_meta']['shutter_speed']), 1) == 2.5)
						{
						echo number_format((1 / $imgmeta['image_meta']['shutter_speed']), 1, '.', '') . " s</li>";
						}
						else{
						echo number_format((1 / $imgmeta['image_meta']['shutter_speed']), 0, '.', '') . " s</li>";
						}
					}
					else{
					echo $imgmeta['image_meta']['shutter_speed']." s</li>";
					}
				}
				if (!empty($imgmeta['image_meta']['focal_length'])) 
                                    echo "<li>Focal Length: " . $imgmeta['image_meta']['focal_length']."mm</li>";
				if (!empty($imgmeta['image_meta']['camera'])) 
                                    echo "<li>Camera: " . $imgmeta['image_meta']['camera']."</li>";
				if ($latitude != 0 && $longitude != 0) 
                                    //echo '<li><i class="fa fa-map-marker" aria-hidden="true"></i> Location: <a href="http://maps.google.com/maps?q=' . $neg_lat . number_format($lat,6) . '+' . $neg_lng . number_format($lng, 6) . '&z=11" target="_blank">' . geo_pretty_fracs2dec($latitude). $lat_ref . ' ' . geo_pretty_fracs2dec($longitude) . $lng_ref . '</a></li>';
                                    echo '<li>Location: <a href="http://maps.google.com/maps?q=' . $neg_lat . number_format($lat,6) . '+' . $neg_lng . number_format($lng, 6) . '&z=11 &t=h" target="_blank" >' . geo_pretty_fracs2dec($latitude). $lat_ref . ' ' . geo_pretty_fracs2dec($longitude) . $lng_ref . '</a></li>';
                                    
				echo "</ul>";
                                
                               echo "</div>";
			}
	}
}


// funcao do nucleo do WP modificada
// objectivo quando mover este tema para outro WP o mesmo nao tem alteracoes

// desativar a funcao do nucleo do WP 
remove_shortcode('gallery', 'gallery_shortcode');

// activar a funcao modificada
add_shortcode('gallery', 'mygallery_shortcode');

/**
 * Builds the Gallery shortcode output.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @staticvar int $instance
 *
 * @param array $attr {
 *     Attributes of the gallery shortcode.
 *
 *     @type string       $order      Order of the images in the gallery. Default 'ASC'. Accepts 'ASC', 'DESC'.
 *     @type string       $orderby    The field to use when ordering the images. Default 'menu_order ID'.
 *                                    Accepts any valid SQL ORDERBY statement.
 *     @type int          $id         Post ID.
 *     @type string       $itemtag    HTML tag to use for each image in the gallery.
 *                                    Default 'dl', or 'figure' when the theme registers HTML5 gallery support.
 *     @type string       $icontag    HTML tag to use for each image's icon.
 *                                    Default 'dt', or 'div' when the theme registers HTML5 gallery support.
 *     @type string       $captiontag HTML tag to use for each image's caption.
 *                                    Default 'dd', or 'figcaption' when the theme registers HTML5 gallery support.
 *     @type int          $columns    Number of columns of images to display. Default 3.
 *     @type string|array $size       Size of the images to display. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'thumbnail'.
 *     @type string       $ids        A comma-separated list of IDs of attachments to display. Default empty.
 *     @type string       $include    A comma-separated list of IDs of attachments to include. Default empty.
 *     @type string       $exclude    A comma-separated list of IDs of attachments to exclude. Default empty.
 *     @type string       $link       What to link each image to. Default empty (links to the attachment page).
 *                                    Accepts 'file', 'none'.
 * }
 * @return string HTML content to display gallery.
 */
function mygallery_shortcode( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	/**
	 * Filters the default gallery shortcode output.
	 *
	 * If the filtered output isn't empty, it will be used instead of generating
	 * the default gallery template.
	 *
	 * @since 2.5.0
	 * @since 4.2.0 The `$instance` parameter was added.
	 *
	 * @see gallery_shortcode()
	 *
	 * @param string $output   The gallery output. Default empty.
	 * @param array  $attr     Attributes of the gallery shortcode.
	 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
	 */
	$output = apply_filters( 'post_gallery', '', $attr, $instance );
	if ( $output != '' ) {
		return $output;
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	$itemtag = tag_escape( $atts['itemtag'] );
	$captiontag = tag_escape( $atts['captiontag'] );
	$icontag = tag_escape( $atts['icontag'] );
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ) {
		$itemtag = 'dl';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ) {
		$captiontag = 'dd';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ) {
		$icontag = 'dt';
	}

	$columns = intval( $atts['columns'] );
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = '';

	/**
	 * Filters whether to print default gallery styles.
	 *
	 * @since 3.1.0
	 *
	 * @param bool $print Whether to print default gallery styles.
	 *                    Defaults to false if the theme supports HTML5 galleries.
	 *                    Otherwise, defaults to true.
	 */
	if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>\n\t\t";
	}

	$size_class = sanitize_html_class( $atts['size'] );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

	/**
	 * Filters the default gallery shortcode CSS styles.
	 *
	 * @since 2.5.0
	 *
	 * @param string $gallery_style Default CSS styles and opening HTML div container
	 *                              for the gallery shortcode output.
	 */
	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {

		$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
		if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
		} else {
			$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
		}
		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}
		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
			$output .= '<br style="clear: both" />';
		}
	}

	if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
		$output .= "
			<br style='clear: both' />";
	}

	$output .= "
		</div>\n";

	return $output;
}



/**
 * Criar Custom Post types 
 * https://codex.wordpress.org/Function_Reference/register_post_type
 * 
 */
 
function create_custom_post_types() {
    /* Custom Post Types - Fotografias */
    $labels = array(
        'name'               => 'Fotografias',
        'singular_name'      => 'Fotografia',
        'menu_name'          => 'Fotografias',
        'name_admin_bar'     => 'Fotografia',
        'add_new'            => 'Adicionar nova',
        'add_new_item'       => 'Adicionar nova fotografia',
        'new_item'           => 'Nova fotografia',
        'edit_item'          => 'Editar fotografia',
        'view_item'          => 'Ver fotografia',
        'all_items'          => 'Todas fotografias',
        'search_items'       => 'Pesquisa fotografia',
        'parent_item_colon'  => 'Parent fotografias:',
        'not_found'          => 'Nao foram encontrados fotografias.',
        'not_found_in_trash' => 'Nao foram encontrados fotografias no lixo.',
    );    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,       
        'menu_icon'          => 'dashicons-camera',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'fotografias' ),
        'capability_type'    => 'post',  /* post ou page */
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag')
    ); 
    
        register_post_type( 'Fotografias', $args );
}


add_action( 'init', 'create_custom_post_types' );

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
   create_custom_post_types();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );


/**
 * Criar Taxonomies
 * https://codex.wordpress.org/Function_Reference/register_taxonomy    
 * 
 */


function create_custom__taxonomies() {    
    // Localizacao da Fotografia
    $labels = array(
        'name'              => 'Local da fotografia',
        'singular_name'     => 'Local da fotografia',
        'search_items'      => 'Procurar por local',
        'all_items'         => 'Todos os locais',
        'parent_item'       => 'Parent Type of Localizacao',
        'parent_item_colon' => 'Parent Type of Localizacao:',
        'edit_item'         => 'Edit Type of Localizacao',
        'update_item'       => 'Update Type of Localizacao',
        'add_new_item'      => 'Add New Type of Localizacao',
        'new_item_name'     => 'New Type of Localizacao Name',
        'menu_name'         => 'Localizacao',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'local-fotografia' ),
    );
    register_taxonomy( 'local-fotografia', array( 'fotografias' ), $args );
    
    // Motivo da Fotografia
    $labels = array(
        'name'                       => 'Motivo da fotografia',
        'singular_name'              => 'Motivo da fotografia',
        'search_items'               => 'Procurar por motivo',
        'popular_items'              => 'Popular por motivo',
        'all_items'                  => 'Todos os motivos',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Type of Motivo',
        'update_item'                => 'Update Type of Motivo',
        'add_new_item'               => 'Add New Type of Motivo',
        'new_item_name'              => 'New Type of Motivo',
        'separate_items_with_commas' => 'Separado motivo com comas',
        'choose_from_most_used'      => 'Choose from most used Motivo',
        'not_found'                  => 'NÃ£o Motivo encontrado',        
        'menu_name'                  => 'Motivo',
    );
    $args = array(
        'hierarchical'          => false, /* nao hierarquico !*/
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'motivo-fotografia' ),
    );
    register_taxonomy( 'motivo-fotografia', array( 'fotografias','post' ), $args );
    
    // Tecnica da Fotografia
    $labels = array(
        'name'              => 'Tecnica da fotografia',
        'singular_name'     => 'Tecnica da fotografia',
        'search_items'      => 'Procurar por Tecnica',
        'all_items'         => 'Todos os Tecnica',
        'parent_item'       => 'Parent Type of Tecnica',
        'parent_item_colon' => 'Parent Type of Tecnica:',
        'edit_item'         => 'Edit Type of Tecnica',
        'update_item'       => 'Update Type of Tecnica',
        'add_new_item'      => 'Add New Type of Tecnica',
        'new_item_name'     => 'New Type of Tecnica Name',
        'menu_name'         => 'Tecnica',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tecnica-fotografia' ),
    );
    register_taxonomy( 'tecnica-fotografia', array( 'fotografias' ), $args );
}
add_action( 'init', 'create_custom__taxonomies' );







