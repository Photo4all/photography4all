<?php
    /*
        Template Name: Pagina Forgot Password
    */
?>

<?php
//response generation function

  $response = "";

  //funcao de preenchimento do formulario
  function forgot_password_form_errors($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //mensagens possiveis da resposta 
  $missing_content = "Please supply all information.";
  $not_match = "The submitted email address does not match !";
  
  
  
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






<?php # Script 16.10 - forgot_password.php
// This page allows a user to reset their password, if forgotten.

require_once ('inc/config.inc.php'); 
$page_title = 'Forgot Your Password';
//include ('includes/header.html');



if (isset($_POST['submitted'])) {
	// require_once (MYSQL);
           require_once ('inc/mysqli_connect.php'); 

	// Assume nothing:
	$uid = FALSE;

	// Validate the email address...
	if (!empty($_POST['email'])) {
	
		// Check for the existence of that email address...
		$q = 'SELECT user_id FROM wp_users_friendly WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 1) { // Retrieve the user ID:
			list($uid) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { // No database match made.
			forgot_password_form_errors("error", $not_match);
		}
		
	} else { // No email!
		forgot_password_form_errors("error", $missing_content);
		
		
		
		
	} // End of empty($_POST['email']) IF.
	
	if ($uid) { // If everything's OK.

		// Create a new, random password:
		$p = substr ( md5(uniqid(rand(), true)), 3, 10);

		// Update the database:
		$q = "UPDATE wp_users_friendly SET pass=SHA1('$p') WHERE user_id=$uid LIMIT 1";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
			// Send an email:
			$body = "Your password to log into <whatever site> has been temporarily changed to '$p'. Please log in using this password and this email address. Then you may change your password to something more familiar.";
			mail ($_POST['email'], 'Your temporary password.', $body, 'From: photograph4all@gmail.com');
			
			// Print a message and wrap up:
			
			//echo '<div class="mensagem_form"><i class="fa fa-check"></i>Your password has been changed. You will receive the new, temporary password at the email address with which you registered. Once you have logged in with this password, you may change it by clicking on the "Change Password" link.</div>';
                        
                        ?>
            <!-- Inicio da mensagem not login -->
            <div class="envelope_popup">
                <div class="envelope-content_popupOK animate">    
                    <div class="img-container">
                        <a href="http://photography4all.xyz/categorias/"><span class="close_envelope" title="Close"></span></a>
                        <img src="<?php bloginfo('template_directory'); ?>/img/img_ok.svg" alt="Password changed" class="popup">
                    </div>          
                    <div class="container_popup">         
                        <h1>Password reset successful</h1>
                        <p class="notice-popup">Your password has been reset</p>
                        <hr>   
                        <p class="notice-popup">You will receive the new, temporary password at the email address with which you registered</p>             
                        <p class="notice-popup">Once you have logged in with this password, you may change it by clicking on the "Change Password" link</p>
                        <hr>
                    </div>         
                </div>
            </div>
            <!-- Fim da mensagem not login -->                               
            <?php   
                        
                        
                        
			
			mysqli_close($dbc);
			// include ('includes/footer.html');
            get_footer();
			exit(); // Stop the script.
			
		} else { // If it did not run OK.
		
		
		?>
            <!-- Inicio da mensagem system error -->
            <div class="envelope_popup">
                <div class="envelope-content_popup animate">    
                    <div class="img-container">
                        <a href="http://photography4all.xyz/categorias/"><span class="close_envelope" title="Close"></span></a>
                        <img src="<?php bloginfo('template_directory'); ?>/img/img_nok.svg" alt="Password changed" class="popup">
                    </div>          
                    <div class="container_popup">         
                        <h1>System error</h1>
                        <p class="notice-popup">Your password has not been reset due to a system error</p>
                        <hr>   
                        <p class="notice-popup">We apologize for any inconvenience</p>             
                        <p class="notice-popup">Please <a href="http://photography4all.xyz/contact/"><u><strong>contact us</strong></u></a> if you continue to have trouble accessing your account</p> 
                        <hr>
                    </div>         
                </div>
            </div>
            <!-- Fim da mensagem system error -->                               
            <?php   
		
			 
			
			
		}

	} else { // Failed the validation test.
		 ?>
            <div class="envelope_popup">
                <div class="envelope-content_popup animate">      
                        <div class="img-container">
                            <a href="http://photography4all.xyz/categorias/"><span class="close_envelope" title="Close"></span></a>
                            <img src="<?php bloginfo('template_directory'); ?>/img/img_nok.svg" alt="Not Login" class="popup">
                        </div>          
                        <div class="container_popup">         
                            <h1 class="user-popup">Password reset failed</h1>
                            <p class="notice-popup">Your password has not been reset</p>
                            <hr>   
                            <p class="notice-popup">Please verify your email and try again.</p>             
                            <hr>
                        </div>         
                    </div>
                </div>                           
            <?php   
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.

?>

<script>
// Quando se clica <span> (x), fecha a janela
span.onclick = function() {
    envelope_popup.style.display = "none";
}
</script>    

    
    

<?php
// include ('includes/footer.html');
get_footer();
?>