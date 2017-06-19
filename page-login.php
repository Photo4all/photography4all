<?php
    /*
        Template Name: Pagina Login
    */
?>
<?php get_header(); ?>

    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php 
    require_once ('inc/config.inc.php'); 

    //funcao de preenchimento do formulario
    $response = "";
    function login_form_errors($type, $message){
        global $response;
        if($type == "success") $response = "<div class='success'>{$message}</div>";
        else $response = "<div class='error'>{$message}</div>";
    }

    // Mensagens possiveis da resposta 
    $missing_content = "Please supply all information.";
    $not_match = "Either the email address and password entered do not match those on file or you have not yet activated your account.";
    
    
    if (isset($_POST['submitted'])) {
	    // Codigo para o localhost require_once (MYSQL);
	    require_once ('inc/mysqli_connect.php'); 
   
    	// Valida o preenchimento do endereco de e-mail:
    	if (!empty($_POST['email'])) {
    		$e = mysqli_real_escape_string ($dbc, $_POST['email']);
    	} else {
    		$e = FALSE;
    		login_form_errors("error", $missing_content);
    	}
	
    	// Valida o preenchimento da palavra-passe:
    	if (!empty($_POST['pass'])) {
    		$p = mysqli_real_escape_string ($dbc, $_POST['pass']);
    	} else {
    		$p = FALSE;
    		login_form_errors("error", $missing_content);
    	}
	
    	if ($e && $p) { // E se tudo estiver bem
    	
    		// Faz a pesquisa na base de dados:
    		$q = "SELECT user_id, first_name, user_level FROM wpby_users_friendly WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL";		
    		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
    		
        		if (@mysqli_num_rows($r) == 1) { // Se uma correspondencia foi feita.
        
        			// Registrar os valores e redirecionar:
        			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
        			mysqli_free_result($r);
        			mysqli_close($dbc);
                                
        			$url = BASE_URL . 'index.php'; // Definir o URL:
        			ob_end_clean(); // Apagar o buffer.
        			// Codigo para o localhost header("Location: $url");
                    // Codigo para o localhost header("Location: http://localhost/wordpress/categorias/");
                    header("Location: https://photography4all.net/index.php/categorias/");
        			exit(); // Sair do script.
        				
        		} else { // Se nenhuma correspondencia for feita.
        		    login_form_errors("error", $not_match);
        		}
    		
    	} else { // Se email e a senha incorrectas.
    		echo '';
	    }
	
	mysqli_close($dbc);

} // Fim de SUBMIT condicional.
?>

        <div class="envelope">
            <div id="respond">
            <form class="login-form" action="" method="post">
                <p>Login Account<br></p>
                <p><?php echo $response; ?></p>
                <p><label for="name">Email Address: <span>*</span><br><input type="text" name="email" size="20" maxlength="40" /></label></p>
                <p><label for="name">Password: <span>*</span> <br><input type="password" name="pass" size="20" maxlength="20" /></label></p>
                <input type="submit" name="submit" value="Login" />
                <input type="hidden" name="submitted" value="TRUE" /><br>
                <p class="message">Not registered? <a href="https://photography4all.net/register/">Create an account</a></p>
            </form>
            </div>
        </div>
            
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>