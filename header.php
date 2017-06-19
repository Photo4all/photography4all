<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * Este é o modelo que exibe todas as seccoes <head> ate a <div id="content">
 *
 *
 * @package photography4all
 */

// Start output buffering:
// Inicializa o buffer e bloqueia qualquer saída para o navegador
ob_start();

// Initialize a session:
session_start();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

            <!-- vai dizer ao viewport - ao viewport é atribuida uma largura seja qual for o equipamento  e a escala inicial que esta na 
            page load a min. e max. escala são opções mas garantem que em alguns equipamentos que a escala não se modifica orientação 
            por exemplo se rodar de landscape para portland  a esca não se modifica -->
            <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- meu icon logo -->
<link rel="shortcut icon" type="image/ico" href="/wp-content/themes/photography4all/imagens/header//mylogo.ico"> 


<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- E aqui onde os Enqueue scripts e styles vao ser apresentados -->
<?php wp_head(); ?>


<!-- Piwik código de controlo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//photography4all.net/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'photography4all' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		    <!-- se fizer upload de header imagem a mesma e display -->
		    <div class="site-branding header-background-image" style="background-image: url(<?php header_image(); ?>)">
    				<h1 class="site-title">
    				    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				    </h1>
		    </div><!-- .site-branding -->
	

	        <?php
                echo '<div class="dropdown" style="float:right;">';
                if (isset($_SESSION['first_name']) ) {
                        echo "<button class='dropbtn'>Hello, {$_SESSION['first_name']}! </button>";
                }
                if (isset($_SESSION['user_id'])) {
                    echo '<div class="dropdown-content">
                              <a href="https://photography4all.net/index.php/logout/" title="Logout">Logout</a>
                              <a href="https://photography4all.net/index.php/change_password/" title="Change Your Password">Change Password</a>
                          </div>';
               }
               echo '</div>';
            ?>        

	
	</header><!-- #masthead -->
	
    <!-- Menu principal -->
    <nav id="mainNav" class="clearfix">      
         <ul class="clearfix">  
             <li><a href="https://photography4all.net/index.php/" title="Home" >Home</a></li>
             <li><a href="https://photography4all.net/index.php/categorias/" title="My photo galleries" >Portfolios</a></li>
             <li><a href="https://photography4all.net/index.php/news/" title="News" >News</a></li> 
             <li><a href="https://photography4all.net/blog/" title="Travel" >Travel</a></li>
             <li><a href="https://photography4all.net/contact/" title="Contact" >Contact</a></li> 
             <li><a href="https://photography4all.net/index.php/about/" title="About" >About</a></li> 
         </ul> 
        <a href="#" id="pull">Menu</a>
    </nav> 
	
	
	

	<div id="content" class="site-content">
