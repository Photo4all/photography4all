<?php
    /*
        Template Name: Pagina Register
    */
?>

<?php
    
  //funcao de preenchimento do formulario
  $response = "";
  function register_form_errors($type, $message){
        global $response;
        if($type == "success") $response = "<div class='success'>{$message}</div>";
        else $response = "<div class='error'>{$message}</div>";
  }

  //mensagens possiveis da resposta 
   $missing_content = "Please supply all information.";
   $not_match = "Your password did not match the confirmed password.";
  
?>

<?php get_header(); ?>

<?php 

    require_once ('inc/config.inc.php');

    if (isset($_POST['submitted'])) { 
        require_once dirname( __FILE__ ) . '/inc/mysqli_connect.php';
        // require_once (MYSQL);  
        // require_once(__DIR__.'/../inc/mysqli_connect.php');
	
	// Faz o trim dos dados:
	$trimmed = array_map('trim', $_POST);
	
	// Atrubuir valores invalidos por defeito:
	$fn = $ln = $e = $p = FALSE;
	
    	// Faz o Check para o primeiro nome:
    	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
    		$fn = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
    	} else {
    		register_form_errors("error", $missing_content);
    	}
    	// Faz o Check para o ultimo nome:
    	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name'])) {
    		$ln = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
    	} else {
    		register_form_errors("error", $missing_content);
    	}
    	// Faz o Check para do email:
    	if (preg_match ('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $trimmed['email'])) {
    		$e = mysqli_real_escape_string ($dbc, $trimmed['email']);
    	} else {
    		register_form_errors("error", $missing_content);
    	}
    	
    	// Faz o Check da password isto e confirma se ambas sao iguais:
    	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
    		if ($trimmed['password1'] == $trimmed['password2']) {
    			$p = mysqli_real_escape_string ($dbc, $trimmed['password1']);
    		} else {
    			register_form_errors("error", $not_match);
    		}
    	} else {
    		register_form_errors("error", $not_match);
    	}
    
	
	if ($fn && $ln && $e && $p) { // Se todo estiver OK entao ...

		// Confirmacao da disponibilidade do emmail na base de dados:
		$q = "SELECT user_id FROM wpby_users_friendly WHERE email='$e'";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 0) { // Available.
		
			// Criacao do codigo de activacao:
			$a = md5(uniqid(rand(), true));
		
			// Adiciona o usar a base de dados:
			$q = "INSERT INTO wpby_users_friendly (email, pass, first_name, last_name, active, registration_date) VALUES ('$e', SHA1('$p'), '$fn', '$ln', '$a', NOW() )";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
			
				// Envia o email:
				$body = "Thank you for registering at https://photography4all.net. To activate your account, please click on this link:\n\n";
				// $body .= BASE_URL . 'page-activate.php?x=' . urlencode($e) . "&y=$a";  
                $body .= 'https://photography4all.net/index.php/activate/?x=' . urlencode($e) . "&y=$a";  
                              
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: photograph4all@gmail.com');
				
				// Termina a pagina:
				// sucesso
				echo '<div class="mensagem_form"><i class="fa fa-check"></i>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account.</div>';
				
                get_footer(); 
				exit(); // Faz o exit da pagina
				
			} else { // Se existir erro.
			    
				echo '<div class="mensagem_form"><i class="fa fa-times-circle"></i>You could not be registered due to a system error. We apologize for any inconvenience.</div>';
				
			}
			
		} else { // Se email for repetido o mesmo nao esta disponivel.
		    
			echo '<div class="mensagem_form"><i class="fa fa-times-circle"></i>That email address has already been registered. If you have forgotten your password, use the link at right to have your password sent to you.</div>';
			
		}
		
	} else { // If one of the data tests failed.
		echo '';
			
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
?>
        <div class="envelope">
            <div id="respond">
            <form class="register-form" action="" method="post">
                <p>Register New Account<br></p>
                <p><?php echo $response; ?></p>
                <p><label for="name">First name: <span>*</span><br><input type="text" name="first_name" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></label></p>
                <p><label for="name">Last name: <span>*</span><br><input type="text" name="last_name" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></label></p>
                <p><label for="name">E-email: <span>*</span><br><input type="text" name="email" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" /></label></p> 
                <p><label for="name">Password: <span>*</span><br><input type="password" name="password1" /></label></p> 
                <p><label for="name">Reenter passord for verification: <span>*</span><br><input type="password" name="password2"  /></label></p>
                <input type="submit" name="submit" value="Register" />
                <input type="hidden" name="submitted" value="TRUE" />
                <p class="message">Already registered? <a href="https://photography4all.net/index.php/login/" title="Login">Sign In</a></p>
                
            </form>
            </div>
        </div>

<?php get_footer(); ?>