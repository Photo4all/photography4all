<?php
    /*
        Template Name: Pagina Login
    */
?>
<?php get_header(); ?>


<div class="categories-boxPortfolio">

<!-- Inicio do FLEX CONTAINER, lista não ordenada -->
<ul class="grid-wrapPortfolio">

<!-- Grid sub-menu -->
<!--<div id="contentNews"> -->

    <li class="grid-itemPortfolio">  
    <!-- quadrado 1 -->
    <a href="<?php echo get_post_meta($post->ID, 'Gallery_NY', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_NY', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_NY', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_NY', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>
    </li>  
    
    <li class="grid-itemPortfolio">  
    <!-- quadrado 2 -->    
    <a href="<?php echo get_post_meta($post->ID, 'Gallery_Seoul', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Seoul', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Seoul', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Seoul_Korea', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?> 
    </li> 
    
    <li class="grid-itemPortfolio">
    <!-- quadrado 3 -->
    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_3', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Portrait', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Portrait', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Portrait', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>
    </li>
    
    <li class="grid-itemPortfolio">
    <!-- quadrado 4 -->    
    <a href="<?php echo get_post_meta($post->ID, 'Gallery_Art', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Art', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Art', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Art', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>  
    </li>    
    
    <li class="grid-itemPortfolio">
    <!-- quadrado 5 --> 
    <a href="<?php echo get_post_meta($post->ID, 'Gallery_b&w', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Black_and_White', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Black_and_White', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Black_and_White', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>
    </li>
    
    <li class="grid-itemPortfolio">
    <!-- quadrado 6 -->    
    <a href="<?php echo get_post_meta($post->ID, 'Gallery_Shanghai', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Shanghai', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Shanghai', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Shanghai', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>
    </li>

    <li class="grid-itemPortfolio">
    <!-- quadrado 7 -->    
    <a href="<?php echo get_post_meta($post->ID, 'Gallery_Sports', true); ?>" class="info">
        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Sports', true); ?>' /> 
    </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Sports', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Sports', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>   
     </li>
     
     <li class="grid-itemPortfolio">
    <!-- quadrado 8 -->
        <a href="<?php echo get_post_meta($post->ID, 'Gallery_Moments', true); ?>" class="</div>">
            <img class="rs" src='<?php echo get_post_meta($post->ID, 'Categorie_Moments', true); ?>' /> 
        </a>
        Portfolio: <?php echo get_post_meta($post->ID, 'Name_Moments', true); ?><br>
        Date: <?php echo get_post_meta($post->ID, 'Date_Moments', true); ?>
        <?php if(have_posts() ) :
           while ( have_posts() ) : the_post(); 
                   the_content(); 
           endwhile; // Fim do loop
           else :
            echo '<p>No content found</p>';
           endif;			
        ?>
     </li>
     
     <li class="grid-itemPortfolio">
    <!-- quadrado 9 --> 
        <div class="container-img">
            
              
             
                    <img class="rs" src='<?php echo get_post_meta($post->ID, 'Privado', true); ?>' />                   
                    
                        <?php
                            if (isset($_SESSION['user_id'])) {
                                echo '<div class="centered-img">This gallery is now unblock content please choose option:</div>';
                                echo '<br>';
                                echo '<div class="unlocked">';
                                echo '<a class="button-portfolio" href="http://photography4all.xyz/index.php/gallery-private/" class="navlink" title="View gallery">View gallery</a>';
                                echo '<a class="button-portfolio" href="http://photography4all.xyz/index.php/fotografias/" class="navlink" title="View photos">View photos</a>';

                            /* Adiciona os links se o utilizador user for o administrator: */
                                if ($_SESSION['user_level'] == 1) {
                                    echo '<a class="button-portfolio" href="http://photography4all.xyz/view_users/" class="navlink" title="View All Users">View Users</a>
                                          <a class="button-portfolio" href="http://photography4all.xyz/wp-admin/" class="navlink" target="_blank">Wordpress</a>';
                                }
                        echo '</div>';
                        } else { //  Not logged in.
                        ?> 
            
            <div class="centered-img">This gallery is locked in order to unblock content please choose option:</div>
            
            <div class="locked">        
            <!--Form do Sign Up -->
            <button class="button-portfolio" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
            <div id="id01" class="envelope">
                
                <form class="envelope-content animate" action="http://photography4all.xyz/index.php/register/" method="post">
                    
                <div class="img-container">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close_envelope" title="Close"></span>     
                   <img src="<?php bloginfo('template_directory'); ?>/img/img_user.svg" alt="Avatar" class="avatar">
                </div>
                    
                    <div class="container">
                        <h1 class="user-form">Sign Up</h1>
                        <p class="notice-form">Please fill in this form to create an account.</p>
                        <hr>
                       
                        <label for="name"><b>First name</b></label>
                        <input type="text" placeholder="First name" name="first_name" pattern="[A-Za-z '.\-]{2,20}" required value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" >
                        <label for="name"><b>Last name</b></label>
                        <input type="text" placeholder="Last name" name="last_name" pattern="[A-Za-z '.\-]{2,40}" required value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" >
                        <label for="name"><b>E-email</b></label>
                        <input type="text" placeholder="E-email" name="email" pattern="[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$" required value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" >
                        <label for="name"><b>Password</b></label>
                        <input type="password" placeholder="Password" name="password1" pattern="\w{4,20}$" required >
                        <label for="name"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="password2" pattern="\w{4,20}$" required >
                                 
                        <input class="signup-btn" type="submit" name="submit" value="Register" >
                        <input type="hidden" name="submitted" value="TRUE" >
                        
                         <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>    
                    
                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancel-btn">Cancel</button>           
                            <span class="psw">Already registered? <a class="registered" onclick="myFunctionLogin()">Login</a></span>
                        </div>  
                    </div>
                    
                </form>
            </div>
            <!--fim Form do Sign Up --> 
                    
            <!--Form do Login -->
            <button class="button-portfolio" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</button>
            
            <div id="id02" class="envelope">
                
                <form class="envelope-content animate" action="http://photography4all.xyz/index.php/login/" method="post">        
                
                    <div class="img-container">
                      <span onclick="document.getElementById('id02').style.display='none'" class="close_envelope" title="Close"></span>
                      <img src="<?php bloginfo('template_directory'); ?>/img/img_user.svg" alt="Avatar" class="avatar">
                    </div> 
            
                    <div class="container">              
                        <h1 class="user-form">Login</h1>
                        <p class="notice-form">Please fill in this form to login.</p><hr>
                        
                        <label for="name"><b>Email Address</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required > 
            
                        <label for="name"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="pass" required >  
            
                        <!-- considerado um input faz o action()PHP -->
                        <input class="login-btn" type="submit" name="submit" value="Login" />
                        <input type="hidden" name="submitted" value="TRUE" />   
            
                    </div>  
            
                    <div class="container">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancel-btn">Cancel</button>        
                        <span class="psw">Not registered?  <a class="registered" onclick="myFunctionRegister()">Create an account</a></span>        
                    </div> 
                    
                </form>
            </div>
            <!--fim Form do registo--> 

            <!--Form do Forgot password -->
            <button class="button-portfolio" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Reset password</button>
            <div id="id03" class="envelope">  
                
                <form class="envelope-content animate" action="http://photography4all.xyz/index.php/forgot_password/" method="post">        
                
                <div class="img-container">
                  <span onclick="document.getElementById('id03').style.display='none'" class="close_envelope" title="Close"></span>      
                   <img src="<?php bloginfo('template_directory'); ?>/img/img_user.svg" alt="Avatar" class="avatar">
                </div>  
                    
                <div class="container"> 
                    
                    <h1 class="user-form">Reset your password</h1>
                    <p class="notice-form">Please fill in this form to reset.</p>
                    <hr>
               
                    <label for="name"><b>Email Address</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
            	        
                    <input class="reset-btn" type="submit" name="submit" value="Reset My Password" />	       
                    <input type="hidden" name="submitted" value="TRUE" />        
                    
                </div>         
                    
                <div class="container">
                    <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancel-btn">Cancel</button>       
                </div> 
                    
                </form>
            </div>
            <!--fim Form do Forgot password-->    
            </div> 
                         <?php
                                
                        }
                        ?>
</div>   <!--container-img-->
   
   </li> 
    
<!--</div> Grid sub-menu -->

 <!-- Fim do item listado -->
            
<!-- Fim do FLEX CONTAINER -->      
</ul>

 </div> <!--categories-boxPortfolio-->






    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php 
    require_once ('inc/config.inc.php'); 

        
    if (isset($_POST['submitted'])) {
	    // Codigo para o localhost require_once (MYSQL);
	    require_once ('inc/mysqli_connect.php'); 
   
    	// Valida o preenchimento do endereco de e-mail:
    	if (!empty($_POST['email'])) {
    		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
    	} else {
    		$e = FALSE;
    		echo '<p class="error">You forgot to enter your email address!</p>';
    	}
	
    	// Valida o preenchimento da palavra-passe:
    	if (!empty($_POST['pass'])) {
    		$p = mysqli_real_escape_string ($dbc, $_POST['pass']);
    	} else {
    		$p = FALSE;
    		echo '<p class="error">You forgot to enter your password!</p>';
    	}
	
	
	
    	if ($e && $p) // Verifica se campos estao preenchidos !
    	{ 
    	    // Faz a pesquisa na base de dados email e pass:
    		$q = "SELECT user_id, first_name, user_level FROM wp_users_friendly WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL";			
    		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
    	
    	    if (@mysqli_num_rows($r) == 1) { // Se uma correspondencia foi feita.
        		      
                		// Registrar os valores e redirecionar:
                			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
                			mysqli_free_result($r);
                			mysqli_close($dbc);
                                        
                			$url = BASE_URL . 'index.php'; // Definir o URL:
                			ob_end_clean(); // Apagar o buffer.
                			// Codigo para o localhost header("Location: $url");
                            // Codigo para o localhost 
                			header("Location: http://photography4all.xyz/index.php/categorias/");
                			exit(); // Sair do script.
                			
    		    } else { ?>
    		    
                        <div class="envelope_popup">
                            <div class="envelope-content_popup animate">     
                                <div class="img-container">
                                    <a href="http://photography4all.xyz/categorias/">
                                        <span class="close_envelope" title="Close"></span>
                                    </a>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/img_nok.svg" alt="Try again Login" class="popup">
                                </div>          
                                <div class="container_popup">         
                                    <h1 class="user-popup">Your account is not activated</h1>
                                    <p class="notice-popup">To activate your account check your email addres.</p>
                                    <hr>   
                                    <p class="notice-popup">Please verify your email and try again.</p>             
                                    <hr>
                                </div>         
                            </div>
                        </div>
                    <!-- Fim da mensagem not login -->                               
                    <?php   
                    }
                    
    		    }else // Se NAO for feita correspondencia foi feita par o email e pass
		          { ?>
                    <div class="envelope_popup">
                        <div class="envelope-content_popup animate">      
                                <div class="img-container">
                                    <a href="http://photography4all.xyz/categorias/"><span onclick="this.parentElement.style.display='none'" class="close_envelope" title="Close"></span></a>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/img_nok.svg" alt="Not Login" class="popup">
                                </div>          
                                <div class="container_popup">         
                                    <h1 class="user-popup">Authentication failed</h1>
                                    <p class="notice-popup">Either the email address and password entered do not match those on file</p>
                                    <hr>   
                                    <p class="notice-popup">Please verify your email and try again</p>             
                                    <hr>
                                </div>         
                            </div>
                        </div>
                  <?php   
                  } 
    
	
	mysqli_close($dbc);

} // Fim de SUBMIT condicional.
?>
            
		</main><!-- #main -->
	</div><!-- #primary -->
	
<script>
// Quando se clica <span> (x), fecha a janela
span.onclick = function() {
    envelope_popup.style.display = "none";
}
</script>

<?php get_footer(); ?>