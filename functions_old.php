<?php
/**
 * photography4all functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package photography4all
 */
 
 
 /**
 * --------------------------------------------------------------
 * TABELA DO CONTEUDO:
 * --------------------------------------------------------------
 * 
 *  1.0 Funcao definir a largura do conteúdo em pixels 
 *  2.0 Funcao principal do tema photography4all
 *  3.0 Funcao register Sidebar definir a area widget
 *      Criado o sidebar-1 para o Sidebar.
 *      Criado o sidebar-2 para o Footer.
 *      Criado o sidebar-3 para o News.
 *      Criado o sidebar-4 para o Travel.
 *      Criado o sidebar-5 para o Contact.
 *  4.0 Funcao de enqueue scripts e styles
 *  5.0 Lista de ficheiros template requeridos  
 *  6.0 Featured Images
 *  7.0 Ativado o suporte para Post Formats
 *  8.0 Funcao criar Custom Post types
 *  8.1 Custom Post Types - Lightbox
 *      8.1.1 Localizacao da Fotografia 
 *      8.1.2 Motivo da Fotografia
 *  8.2 Custom Post Types - Gallery
 *      8.2.1 Localizacao da Fotografia 
 *      8.2.2 Motivo da Fotografia
 *  8.3 Custom Post Types - Travel
 *      8.3.1 Localizacao da Fotografia 
 *      8.3.2 Motivo da Fotografia
 *  8.4 Custom Post Types - News
 *      8.4.1 Localizacao da Fotografia 
 *      8.4.2 Motivo da Fotografia
 *      8.4.3 Tipo de evento
 *      8.4.4 Tipo de noticia
 *  8.8 Custom Post Types - Mensagens
 * 
 *  8.5 Funcao rewrite flush * 
 *  8.6 Funcao display default Categories dos cpt Lightbox, Gallery, Travel e News
 *  8.7 Funcao display default Tags dos cpt Lightbox, Gallery, Travel e News 
 * 
 * 
 *  OBRAS !!!
 *  9.0 Funcao misturar varios tipos de posts 
 * 
 * 
 * 10.0 Funcao navegação secundária - Breadcrumbs
 * 11.0 Funcao modificar o numero posts por pagina - News
 * 12.0 Funcao EXIF
 * 13.0 Funcao Modify recent post sidebar to show post thumbs with out plugins
 * 
 * 14.0 Funcao para display de Custom Post Types do News
 * 15.0 Funcao para display de Custom Post Types do Travel
 * 16.0 Funcao para display de Custom Post Types da Message
 * 
 * 17.0 Funcao para display recentes Custom Post Types no Footer
 * 18.0 Funcao para display recentes Custom Post Types no Footer
 * 19.0 Funcao para display recentes Custom Post Types no Footer
 * 
 * 20.0 Funcao para display arquivos no Footer
 * 
 */
 
 
 
 

if ( ! function_exists( 'photography4all_setup' ) ) :
	/**
	 * 2.0 Funcao principal do tema photography4all
	 * 
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function photography4all_setup() {
		/*
		 * Make theme available for translation.
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
		 * 6.0 Featured Images
         * Featured Images
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        /* o wordpress vai ajustar a imagem !!*/
        add_image_size('large-thumb', 1060, 650, true);
        add_image_size('index-thumb', 780, 250, true);  
        
        /* imagens para o slider da pagina home */
        add_image_size('slider-thumb', 780, 250, true);  
        
        
        // Nao foi utilizado o menu principal menu-1 do WP theme que usa a funcao wp_nav_menu() 
        // o mesmo foi substituido por RWD menu com funcoes do PHP.
        // Foi criado o menu social do WP theme que usa a funcao wp_nav_menu().
        register_nav_menus( array(  
                'social' => esc_html__( 'Social Menu', 'photography4all' ),
        ) );
        
		
		// 7.0 Ativado o suporte para Post Formats
        add_theme_support( 'post-formats', array( 'aside','image', 'gallery','link' ) );
        

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
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

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'photography4all_setup' );



/**
 * 1.0 Funcao define a largura do conteúdo em pixels
 *     limita a informação de 600px aquando inserida no conteudo 
 * 
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function photography4all_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'photography4all_content_width', 600 );
}
add_action( 'after_setup_theme', 'photography4all_content_width', 0 );






/**
 * 3.0 Funcao register Sidebar definir a area widget
 * 
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * 
 * Criado o sidebar-1 para o Sidebar.
 * Criado o sidebar-2 para o Footer.
 * Criado o sidebar-3 para o News.
 * Criado o sidebar-4 para o Travel.
 * Criado o sidebar-5 para o Contact.
 * 
 */
function photography4all_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widgets', 'photography4all' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'photography4all' ),
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
		'name'          => esc_html__( 'News Widgets', 'photography4all' ),                
		'id'            => 'sidebar-3',
        'description'   => esc_html__( 'News Widget area que aparece no news em todas as paginas.', 'photography4all' ),	
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	 register_sidebar( array(
		'name'          => esc_html__( 'Travel Widgets', 'photography4all' ),                
		'id'            => 'sidebar-4',
        'description'   => esc_html__( 'Travel Widget area que aparece no footer em todas as paginas.', 'photography4all' ),	
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Contact Widgets', 'photography4all' ),                
		'id'            => 'sidebar-5',
        'description'   => esc_html__( 'Contact Widget area que aparece no footer em todas as paginas.', 'photography4all' ),	
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'photography4all_widgets_init' );










/**
 * 4.0 Funcao de enqueue scripts e styles
 * 
 * Enqueue scripts and styles.
 */
function photography4all_scripts() {
    
    // Carregar o Style principal.
	wp_enqueue_style( 'photography4all-style', get_stylesheet_uri() );
	
	// Carregar o Style do sidebar que define o Layout com ou sem sidebar
    // Primeiro testa se estamos a usar a template.
    if (is_page_template('page-templates/page-portfolio.php' || 'page-templates/page-nosidebar.php')) {
        // Se sim carregar o Style do no sidebar que define o Layout sem o sidebar
        wp_enqueue_style( 'photography4all-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
    } else {
        // Se não carregar o Style do sidebar que define o Layout
        wp_enqueue_style( 'photography4all-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
    } 
    
    
	// Carregar o Style do sidebar que define o Layout com sidebar
    if (is_page_template('page-templates/page-contact.php' )) {
        wp_enqueue_style('photography4all-contact-style',get_template_directory_uri().'/layouts/content-sidebar.css');
    }
	
    // Carregar o Style dos forms do registo e login page. 
    // Carregar o Style do forma da contact page. 
    if (is_page_template('page-templates/page-contact.php' || 'page-register.php' || 'page-login.php' || 'page-forgot_password.php' || 'page-change_password.php' || 'page-change_activate.php')) {
        wp_enqueue_style('photography4all-control-style',get_template_directory_uri().'/css/forms.css');
    }
	
	// Carregar as fontes do Google Fonts
    wp_enqueue_style('photography4all-google-fonts', 'https://fonts.googleapis.com/css?family=Marvel');    
    // Carregar os icons do FontAwesome
    wp_enqueue_style('photography4all-fontawesome', 'https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');        
    // Carregar os icons do FontAwesome - fa fa-quote-left
    wp_enqueue_style('photography4all-fontawesomeIcons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');         
      
    // Carregar os script do CAPTCHA   
    wp_enqueue_script('photography4all-captcha-script', 'https://www.google.com/recaptcha/api.js');  
    
	
	// Carregar os script do Menu Principal RWD    
    wp_enqueue_script('photography4all-menu-principal-script', get_template_directory_uri().'/js/menu.js', array('jquery'),'20180412',false);
        
	// Carregar os Styles do plugin lightbox para o portfolio
    if (is_page_template('page-templates/page-portfolio.php')) {
        wp_enqueue_script( 'photography4all-slider-lightbox', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '20180523', false);
        }

	wp_enqueue_script( 'photography4all-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180409', true );

	wp_enqueue_script( 'photography4all-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20180409', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photography4all_scripts' );




/**
 * 5.0 Lista de ficheiros template requeridos
*/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * -------------------------------------------------------------- 
 * 8.0 Funcao criar Custom Post types 
 * https://codex.wordpress.org/Function_Reference/register_post_type  
 * 
 * 
 */ 
function create_custom_post_types() {
    
/* 8.1 Custom Post Types - Lightbox */
$labels = array(
        'name'               => 'Lightbox',
        'singular_name'      => 'Lightbox',
        'menu_name'          => 'Lightbox',
        'name_admin_bar'     => 'Lightbox',
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
        'menu_icon'          => 'dashicons-slides',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'lightbox' ), /* motivo da necessidade da function my_rewrite_flush()  */
        'capability_type'    => 'post',  /* importante porque neste caso e um post mas pode ser post ou page */
        'has_archive'        => true,    /* importante porque neste caso e um post se page false */
        'hierarchical'       => false,   /* importante porque neste caso e um post se page true */
        'menu_position'      => 5,       /* 5 - below Posts */
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag')
    ); 
    register_post_type( 'Lightbox', $args );

/* 8.2 Custom Post Types - Gallery */
$labels = array(
        'name'               => 'Gallery',
        'singular_name'      => 'Gallery',
        'menu_name'          => 'Gallery',
        'name_admin_bar'     => 'Gallery',
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
        'menu_icon'          => 'dashicons-format-gallery',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'gallery' ), /* motivo da necessidade da function my_rewrite_flush()  */
        'capability_type'    => 'post',  /* importante porque neste caso e um post mas pode ser post ou page */
        'has_archive'        => true,    /* importante porque neste caso e um post se page false */
        'hierarchical'       => false,   /* importante porque neste caso e um post se page true */
        'menu_position'      => 5,       /* 5 - below Posts */
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag')
    ); 
    register_post_type( 'Gallery', $args );

/* 8.3 Custom Post Types - Travel */
$labels = array(
        'name'               => 'Travel',
        'singular_name'      => 'Travel',
        'menu_name'          => 'Travel',
        'name_admin_bar'     => 'Travel',
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
        'menu_icon'          => 'dashicons-palmtree',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'travel' ), /* motivo da necessidade da function my_rewrite_flush()  */
        'capability_type'    => 'post',  /* importante porque neste caso e um post mas pode ser post ou page */
        'has_archive'        => true,    /* importante porque neste caso e um post se page false */
        'hierarchical'       => false,   /* importante porque neste caso e um post se page true */
        'menu_position'      => 5,       /* 5 - below Posts */
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag')
    ); 
    register_post_type( 'Travel', $args );

/* 8.4 Custom Post Types - News */
$labels = array(
        'name'               => 'News',
        'singular_name'      => 'News',
        'menu_name'          => 'News',
        'name_admin_bar'     => 'News',
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
        'menu_icon'          => 'dashicons-clipboard',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ), /* motivo da necessidade da function my_rewrite_flush()  */
        'capability_type'    => 'post',  /* importante porque neste caso e um post mas pode ser post ou page */
        'has_archive'        => true,    /* importante porque neste caso e um post se page false */
        'hierarchical'       => false,   /* importante porque neste caso e um post se page true */
        'menu_position'      => 5,       /* 5 - below Posts */
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag')
    ); 
    register_post_type( 'News', $args );

/* 8.8 Custom Post Types - Mensagens */
$labels = array(
        'name'               => 'Mensagens',
        'singular_name'      => 'Mensagens',
        'menu_name'          => 'Message',
        'name_admin_bar'     => 'Mensagens',
        'add_new'            => 'Adicionar nova',
        'add_new_item'       => 'Adicionar nova mensagem',
        'new_item'           => 'Nova mensagem',
        'edit_item'          => 'Editar mensagem',
        'view_item'          => 'Ver mensagem',
        'all_items'          => 'Todas mensagem',
        'search_items'       => 'Pesquisa mensagem',
        'parent_item_colon'  => 'Parent mensagem:',
        'not_found'          => 'Nao foram encontrados mensagem.',
        'not_found_in_trash' => 'Nao foram encontrados mensagem no lixo.',
    );    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,       
        'menu_icon'          => 'dashicons-email-alt',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'message' ), /* motivo da necessidade da function my_rewrite_flush()  */
        'capability_type'    => 'post',  /* importante porque neste caso e um post mas pode ser post ou page */
        'has_archive'        => true,    /* importante porque neste caso e um post se page false */
        'hierarchical'       => false,   /* importante porque neste caso e um post se page true */
        'menu_position'      => 5,       /* 5 - below Posts */
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag')
    ); 
    register_post_type( 'Message', $args );

}

add_action( 'init', 'create_custom_post_types' );

/**
 * -------------------------------------------------------------- 
 * 8.5 Funcao rewrite flush 
 * https://codex.wordpress.org/Function_Reference/register_post_type  
 * 
 */
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

/* taxonomies */

function create_custom__taxonomies() {    
    // 8.1.1 Localizacao da Fotografia
    // 8.2.1 Localizacao da Fotografia
    // 8.3.1 Localizacao da Fotografia
    // 8.4.1 Localizacao da Fotografia
    
    $labels = array(
        'name'              => 'The photo location',
        'singular_name'     => 'The photo location',
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
    register_taxonomy( 'local-fotografia', array( 'lightbox','gallery','travel','news' ),$args );

    // 8.1.2 Motivo da Fotografia
    // 8.2.2 Motivo da Fotografia
    // 8.3.2 Motivo da Fotografia
    // 8.4.2 Motivo da Fotografia
    $labels = array(
        'name'                       => 'The photo subject',
        'singular_name'              => 'The photo subject',
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
    register_taxonomy( 'motivo-fotografia', array( 'lightbox','gallery','travel','news' ),$args );

    // 8.4.3 Tipo de evento
    $labels = array(
        'name'              => 'Eventos fotograficos',
        'singular_name'     => 'Evento fotografico',
        'search_items'      => 'Procurar por evento',
        'all_items'         => 'Todos os eventos',
        'parent_item'       => 'Parent Type of evento',
        'parent_item_colon' => 'Parent Type of evento:',
        'edit_item'         => 'Edit Type of evento',
        'update_item'       => 'Update Type of evento',
        'add_new_item'      => 'Add New Type of evento',
        'new_item_name'     => 'New Type of Tecnica Name',
        'menu_name'         => 'Evento',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tipo-evento' ),
    );
    register_taxonomy( 'tipo-evento', array( 'news' ), $args );
    
    // 8.4.4 Tipo de noticia
    $labels = array(
        'name'              => 'Noticias fotograficos',
        'singular_name'     => 'Noticia fotografico',
        'search_items'      => 'Procurar por noticia',
        'all_items'         => 'Todos os noticias',
        'parent_item'       => 'Parent Type of noticia',
        'parent_item_colon' => 'Parent Type of noticia:',
        'edit_item'         => 'Edit Type of noticia',
        'update_item'       => 'Update Type of noticia',
        'add_new_item'      => 'Add New Type of noticia',
        'new_item_name'     => 'New Type of Tecnica Name',
        'menu_name'         => 'Noticia',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tipo-noticia' ),
    );
    register_taxonomy( 'tipo-noticia', array( 'news' ), $args );

}
add_action( 'init', 'create_custom__taxonomies' );

/* display Categories e Tags nas Customs Post Types */

/**
 *  8.6 Funcao display default Categories dos cpt Lightbox, Gallery, Travel e News 
 */
function cpt_add_category($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'lightbox','news','travel','gallery'); 
    $query->set('post_type',$post_type);
    return $query;
    }
}
add_filter('pre_get_posts', 'cpt_add_category');

/**
 *  8.7 Funcao display default Tags dos cpt Lightbox, Gallery, Travel e News 
 */
function cpt_add_tag($query) {
  if( is_tag() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'lightbox','news','travel','gallery'); 
    $query->set('post_type',$post_type);
    return $query;
    }
}
add_filter('pre_get_posts', 'cpt_add_tag');

/**
 *  9.0 Funcao misturar varios tipos de posts
 */


/**
 *  10.0 Funcao navegação secundária - Breadcrumbs
 */
 

function photography4all_breadcrumbs() {
       
    // Settings
    $separator          = '&#8260;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

/**
 * 
 * 13.0 Funcao Modify recent post sidebar to show post thumbs with out plugins
 * 
 */

 



/**
 * 11.0 Funcao modificar o numero posts por pagina - News
 *
 */

function photography4all_change_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }
    if ( is_post_type_archive( 'news' ) ) {
       $query->set( 'posts_per_page', 2 );
    }
}
add_filter( 'pre_get_posts', 'photography4all_change_posts_per_page' );


/*
add_action( 'pre_get_posts', 'photography4all_category_query' );
function photography4all_category_query( $query ) {
  
	if ( $query->is_main_query() && ! $query->is_feed() && ! is_admin() && is_category() ) {
		$query->set( 'posts_per_page', '2' ); 
	}
}
*/


/**
 * 12.0 Funcao EXIF
 *
 */
 
function geo_frac2dec($str) {
	@list( $n, $d ) = explode( '/', $str );
	if ( !empty($d) )
		return $n / $d;
	return $str;
}

function geo_pretty_fracs2dec($fracs) {
	return	geo_frac2dec($fracs[0]) . '&deg; ' .
		geo_frac2dec($fracs[1]) . '&prime; ' .
		geo_frac2dec($fracs[2]) . '&Prime; ';
}

function geo_single_fracs2dec($fracs) {
	return	geo_frac2dec($fracs[0]) +
		geo_frac2dec($fracs[1]) / 60 +
		geo_frac2dec($fracs[2]) / 3600;
}
function photography4all_exif() {
	if (is_single() && in_category('Moments') || has_post_thumbnail()) {
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
			
                                echo '<h4><i class="fa fa-camera" aria-hidden="true"></i> Camera information</h4>';
				echo "<ul class='exif'>";
				if (!empty($imgmeta['image_meta']['aperture'])) echo '<li> Aperture: f/' . $imgmeta['image_meta']['aperture']."</li>";
				if (!empty($imgmeta['image_meta']['iso'])) echo '<li> ISO: ' . $imgmeta['image_meta']['iso']."</li>";

				if (!empty($imgmeta['image_meta']['shutter_speed']))
				{
				echo '<li> Shutter Speed: ';
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

				if (!empty($imgmeta['image_meta']['focal_length'])) echo '<li> Focal Length: ' . $imgmeta['image_meta']['focal_length']."mm</li>";
				if (!empty($imgmeta['image_meta']['camera'])) echo '<li> Camera: ' . $imgmeta['image_meta']['camera']."</li>";
                               
                              
				if ($latitude != 0 && $longitude != 0) 
                                    echo '<li><i class="fa fa-map-marker" aria-hidden="true"></i> Location: <a href="http://maps.google.com/maps?q=' . $neg_lat . number_format($lat,6) . '+' . $neg_lng . number_format($lng, 6) . '&z=11" target="_blank">' . geo_pretty_fracs2dec($latitude). $lat_ref . ' ' . geo_pretty_fracs2dec($longitude) . $lng_ref . '</a></li>';
                                    //echo '<li>Location: <a href="http://maps.google.com/maps?q=' . $neg_lat . number_format($lat,6) . '+' . $neg_lng . number_format($lng, 6) . '&z=11 &t=h" target="_blank" >' . geo_pretty_fracs2dec($latitude). $lat_ref . ' ' . geo_pretty_fracs2dec($longitude) . $lng_ref . '</a></li>';
                                    
                                
				echo "</ul>";
			}
	}
}




/**
 * 
 * 14.0 Funcao para display de Custom Post Types do News
 * 
 */

function photography4all_sidebarNews() {
     $args = array(
        'post_type' => 'News',
        'posts_per_page' => 3,
        'orderby' => 'rand', // Post's aleatórios
        'post_status' => 'publish'
    );
    
    $query = new WP_query ( $args );
    if ( $query->have_posts() ) { ?>
    
    
    <?php while ( $query->have_posts() ) : $query->the_post(); /* inicio do loop */ ?>
    
            <aside id="post-<?php the_ID(); ?>" <?php post_class( 'sidebar-post' ); ?>>
            <h3 class="sidebar-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
      
            <?php if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'medium', array(
                        'class' => 'aligncenter',
                        'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt ))
                    ) ); ?>
                </a>
            <?php } ?>
             
            <section class="sidebar-content">
                <?php the_excerpt(); ?>  <!-- excerto de texto -->
            </section><!-- .entry-content -->
             
        </aside>
      
        <?php endwhile; /* fim do loop*/ ?>
      
        <?php rewind_posts();
    }
}
    
/**
 * 
 * 15.0 Funcao para display de Custom Post Types do Travel
 * 
 */

function photography4all_sidebarTravel() {
     $args = array(
        'post_type' => 'Travel',
        'posts_per_page' => 3,
        'orderby' => 'rand', // Post's aleatórios
        'post_status' => 'publish'
    );
    
    $query = new WP_query ( $args );
    if ( $query->have_posts() ) { ?>
    
    
    <?php while ( $query->have_posts() ) : $query->the_post(); /* inicio do loop */ ?>
    
            <aside id="post-<?php the_ID(); ?>" <?php post_class( 'sidebar-post' ); ?>>
            <h3 class="sidebar-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
      
            <?php if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'medium', array(
                        'class' => 'aligncenter',
                        'alt'   => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt ))
                    ) ); ?>
                </a>
            <?php } ?>

            
            <section class="sidebar-content">
                <?php the_excerpt(); ?>  <!-- excerto de texto -->
            </section><!-- .entry-content -->
             
        </aside>
      
        <?php endwhile; /* fim do loop*/ ?>
      
        <?php rewind_posts();
    }
}  


/**
 * 
 * 16.0 Funcao para display de Custom Post Types da Message
 * 
 */

function photography4all_sidebarMessage() {
  
     $args = array(
        'post_type' => 'Message',
        'posts_per_page' => 2,
        'orderby' => 'rand', // Post's aleatórios
        'status' => 'approve',
        'number' => '5',
        'post_status' => 'publish'
    );
    
    $query = new WP_query ( $args );
    // Inicio do Loop
    if ( $query->have_posts() ) { ?>
    
    <?php while ( $query->have_posts() ) : $query->the_post(); /* inicio do loop */ ?>
     <div class="message-container">
      
           <?php the_post_thumbnail( array(90, 90)); ?>
			
            <p><span><?php the_title(); ?></span> </p>
            
            <p><i class="fa fa-quote-left"></i><?php the_content(''); ?></p>
            
            <?php
                $comments = get_comments( $args );
                if ( !empty( $comments ) ) :
                    echo '<ul>';
                    foreach( $comments as $comment ) :
                         echo '<li class="recentcomments"><a href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">' . $comment->comment_author . ' on ' . get_the_title( $comment->comment_post_ID ) . '</a></li>';
                    endforeach;
                    echo '</ul>';
                endif;
            ?>
  
      </div>  
    <?php endwhile; /* fim do loop*/ ?>
      
        <?php wp_reset_postdata();
    }
} 
    
/**
 * 
 * 17.0 Funcao para display recentes Custom Post Types no Footer
 * 
 */
    
  function photography4all_sidebarTravelFooter() {
      
    $args = array(
        'post_type' => 'travel',
        'posts_per_page' => 2,
        'post_status' => 'publish',
        'order' => 'DESC'
    );
     
    $query = new WP_query ( $args );
    if ( $query->have_posts() ) { ?>
    
    <h2 class="widget-title">Recent Travel Photos</h2> 
    <ul>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */ ?>
        <li>
        <aside id="post-<?php the_ID(); ?>" <?php post_class( 'footer-listBox' ); ?>>
            <h3 class="footer-listPosts">
                <span class="entry-date"><?php echo get_the_date(); ?></span>
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
                </a>
            </h3>
        </aside>
        </li>
        <?php endwhile; /* end the loop*/ ?>
    </ul>  
        <?php rewind_posts();
    }
}

function photography4all_sidebarGalleryFooter() {
      
    $args = array(
        'post_type' => 'gallery',
        'posts_per_page' => 2,
        'post_status' => 'publish',
        'order' => 'DESC'
    );
     
    $query = new WP_query ( $args );
    if ( $query->have_posts() ) { ?>
    
    <h2 class="widget-title">Recent Gallery Photos</h2> 
    <ul>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */ ?>
        <li>
        <aside id="post-<?php the_ID(); ?>" <?php post_class( 'footer-listBox' ); ?>>
            <h3 class="footer-listPosts">
                <span class="entry-date"><?php echo get_the_date(); ?></span>
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
                </a>
            </h3>
        </aside>
        </li>
        <?php endwhile; /* end the loop*/ ?>
    </ul> 
    
        <?php rewind_posts();
         
    }
    
}

function photography4all_sidebarNewsFooter() {
      
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => 2,
        'post_status' => 'publish',
        'order' => 'DESC'
    );
     
    $query = new WP_query ( $args );
    if ( $query->have_posts() ) { ?>
    
    <h2 class="widget-title">Recent News Photos</h2> 
    <ul>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */ ?>
        <li>
        <aside id="post-<?php the_ID(); ?>" <?php post_class( 'footer-listBox' ); ?>>
            <h3 class="footer-listPosts">
                <span class="entry-date"><?php echo get_the_date(); ?></span>
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'compass' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?>
                </a>
            </h3>
        </aside>
        </li>
        <?php endwhile; /* end the loop*/ ?>
    </ul> 
    
        <?php rewind_posts();
        
       
    }
}
    
/**
 * 
 * 20.0 Funcao para display arquivos no Footer
 * 
 */
 
function photography4all_sidebarArchiveFooter() {
    
    ?>
        <h2 class="widget-title">Archive Photos</h2> 
        <ul>
            <li><a href="<?php echo get_post_type_archive_link('news'); ?>">Archive News</a></li>
            <li><a href="<?php echo get_post_type_archive_link('travel'); ?>">Archive Travel</a></li>
        </ul>
    <?php 

}





