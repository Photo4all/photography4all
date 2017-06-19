<?php
    /*
        Template Name: Pagina Change Password
    */
?>
<?php 

    require_once ('inc/config.inc.php'); 
    get_header();

  // Funcao de preenchimento do formulario de resposta
  $response = "";
  function change_password_form_errors($type, $message){
        global $response;
        if($type == "success") $response = "<div class='success'>{$message}</div>";
        else $response = "<div class='error'>{$message}</div>";
  }

  // Mensagens possiveis da resposta 
  $missing_content = "Please supply all information.";
  $not_match = "Your password did not match the confirmed password !";
  $not_different = "Your password was not changed. Make sure your new password is different than the current password.";
  $message_change = "Your password has been changed.";

    // Se nao existir a varialvel da sessao do first_name faz o redirect do user:
    if (!isset($_SESSION['first_name'])) {
        	$url = BASE_URL . 'index.php'; // Define o URL.
        	ob_end_clean(); // Delete o buffer.
        	header("Location: $url");
        	exit(); // Quit do script.
    }

    if (isset($_POST['submitted'])) {
    	// Para o localhost usar o codigo require_once (MYSQL);
    	require_once ('inc/mysqli_connect.php'); 
		
	// Verificar se ambas as passwords sao igias isto a nova e a confirmed:
	$p = FALSE;
	if (preg_match ('/^(\w){4,20}$/', $_POST['password1']) ) {
		if ($_POST['password1'] == $_POST['password2']) {
			$p = mysqli_real_escape_string ($dbc, $_POST['password1']);
		} else {
			change_password_form_errors("error", $message_change); // erro nao sao iguais!
		}
	} else {
		echo '';  // tem que inserir novamente !
	}
	
	if ($p) { // Se forem iguais OK.

		// Faz o query.
		$q = "UPDATE wpby_users_friendly SET pass=SHA1('$p') WHERE user_id={$_SESSION['user_id']} LIMIT 1";	
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		if (mysqli_affected_rows($dbc) == 1) { // Se correr bem OK.
			
			
			// Informa que a password foi modificada
			echo '<div class="mensagem_form">Your password has been changed.</div>';
			
			
			mysqli_close($dbc); // Fecha a ligacao a base de dados
			get_footer();
			exit();
			
		} else { // If it did not run OK.
			change_password_form_errors("error", $not_different); // erro nao sao iguais!
		}

	} else { // Failed the validation test.
		echo '';		
	}
	mysqli_close($dbc); // Fecha a ligacao a base de dados
} // Fim da condicao principal Submit

?>

    <div class="envelope">
        <div id="respond">
        <form action="" method="post">
        	<div align="center"><p>Change Your Password<br></p></div>
        	<div align="center"><?php echo $response; ?></p></div>
        	<p><label for="name">New Password:<span>*</span> <br><input type="password" name="password1" size="20" maxlength="20" /> 
        	<br><small>Use only letters, numbers, and the underscore. Must be between 4 and 20 characters long.</small></p>
        	<p><label for="name">Confirm New Password:<span>*</span> <br> <input type="password" name="password2" size="20" maxlength="20" /></p>
        	<input type="submit" name="submit" value="Change My Password" />
        	<input type="hidden" name="submitted" value="TRUE" />
        </form>
        </div>
    </div>

<?php
get_footer();
?>