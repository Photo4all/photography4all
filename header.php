<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photography4all
 */
 
// Start output buffering:
// Inicializa o buffer e bloqueia qualquer saída para o navegador
ob_start();

// Initialize a session:
session_start();

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- E aqui onde os Enqueue scripts e styles vao ser apresentados -->
	<?php wp_head(); ?>
	
	<!-- meu icon logo -->
    <link rel="shortcut icon" type="image/ico" href="/wp-content/themes/photography4all/img/mylogo.ico">         

	
</head>

<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//photography4all.xyz/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->




<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'photography4all' ); ?></a>
	

	<header id="masthead" class="site-header" role="banner">
	    
        <!-- conteudo da imagem -->
        <!-- se existir uma imagem no Header e o texto for blank isto se esconder o titulo do site -->
        <!-- display so da imagem -->
        <?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) : ?>
                <div class="header-image">
                    <!-- cria um link para home_url -->
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <!-- depois exibe a imagem -->
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                    </a>
                </div>
        <?php endif; // Fim da header image check. ?>
	    
        <!-- conteudo que contem o titulo e a descrição -->
        <?php 
            if ( get_header_image() && !('blank' == get_header_textcolor()) ) { 
                echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">'; 
            } else {
                echo '<div class="site-branding">';
            }
        ?>
		    
    	    <!-- caixa com linha branca que contem o titulo e a descrição --> 
            <div class="title-box"> 
    			<?php the_custom_logo();
    			
    			// conteudo do titulo 
    			if ( is_front_page() || is_404() || is_search() || is_home() || is_page_template() || is_archive() || is_single()) :
    				?>
    				<img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logotipo.svg" alt="Logo" width="71" height="71" />
    				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    				<?php
    			else :
    				?>
    				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    				<?php
    			endif;
    			
    			$photography4all_description = get_bloginfo( 'description', 'display' );
    			if ( $photography4all_description || is_customize_preview() ) :
    				?>
    				<p class="site-description"><?php echo $photography4all_description; /* WPCS: xss ok. */ ?></p>
    			<?php endif; ?>
    		</div><!-- .title-box -->    	
		
		</div><!-- .site-branding -->
		
            <?php
                echo '<div class="dropdown" style="float:right;">';
                if (isset($_SESSION['first_name']) ) {
                        echo "<button class='dropbtn'>Hello, {$_SESSION['first_name']}    <i class='fa fa-angle-down'></i></button>";
                         
                }
                if (isset($_SESSION['user_id'])) {
                 ?> 
                    <div class="dropdown-content">
                        <a class="button-portfolio_dropdown" href="http://photography4all.xyz/logout/" title="Logout">Logout</a>
                   <!-- <a href="http://http://photography4all.xyz/change_password/" title="Change Your Password">Change Password</a>-->


    <!--Form do change password -->
    <button class="button-portfolio_dropdown" onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Change Password</button>

    <div id="id04" class="envelope">   
        
        <form class="envelope-content animate" action="http://photography4all.xyz/index.php/change_password/" method="post">    
            
                <div class="img-container">
                  <span onclick="document.getElementById('id04').style.display='none'" class="close_envelope" title="Close"></span>
                  <img src="<?php bloginfo('template_directory'); ?>/img/img_user.svg" alt="Avatar" class="avatar">
                </div> 
            
                <div class="container">              
                    <h1 class="user-form">Change Your Password</h1>
                        <p class="notice-form">Please fill in this form to change your password.</p>
                    <hr> 
                    
                    <label for="name"><b>New Password</b></label>
                    <input type="password" placeholder="Password" name="password1" pattern="(\w){4,20}$" required > 
                    
                    <label for="name"><b>Confirm New Password:</b></label>
                    <input type="password" placeholder="Repeat Password" name="password2" pattern="(\w){4,20}$" required >   
                    
                    <!-- considerado um input faz o action()PHP -->
                    <input class="change-btn" type="submit" name="submit" value="Change My Password" />
            	<input type="hidden" name="submitted" value="TRUE" />
                
                </div>        
                <div class="container">
                    <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancel-btn">Cancel</button>            
                </div> 
         </form>                        
    </div>   
    
     </div>
                <?php
                }
                echo '</div>'; 
            
        ?>      
             
	</header><!-- #masthead --> 
		
                
<!-- Menu principal -->    
    <div class="content-wrapper">
        <div class="navmenu">              
            <div id="search-form"><?php get_search_form(); ?></div>             
            <nav id="mainNav" class="clearfix">      
                <ul class="clearfix">                     
                    <li class="search-item">
                        <div class="search-form-smartphone"><?php get_search_form(); ?></div>  
                    </li>     
                        <li><a href="http://photography4all.xyz/" title="Home" >Home</a></li>
                        <li><a href="http://photography4all.xyz/categorias/" title="My photo galleries" >Portfolios</a></li>                 
                        <li><a href="http://photography4all.xyz/travel/" title="Travel" >Travels</a></li>   
                        <li><a href="http://photography4all.xyz/news/" title="News" >News</a></li> 
                        <li><a href="http://photography4all.xyz/contact/" title="Contact" >Contact</a></li> 
                        <li><a href="http://photography4all.xyz/about/" title="About" >About</a></li>
                    </ul>            
                    <a href="#" id="pull">Menu</a>
                </nav>
            </div>
        </div>
	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
	    
	    

