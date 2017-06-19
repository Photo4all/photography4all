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
		$q = 'SELECT user_id FROM wpby_users_friendly WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
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
		$q = "UPDATE wpby_users_friendly SET pass=SHA1('$p') WHERE user_id=$uid LIMIT 1";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
			// Send an email:
			$body = "Your password to log into <whatever site> has been temporarily changed to '$p'. Please log in using this password and this email address. Then you may change your password to something more familiar.";
			mail ($_POST['email'], 'Your temporary password.', $body, 'From: photograph4all@gmail.com');
			
			// Print a message and wrap up:
			
			echo '<div class="mensagem_form"><i class="fa fa-check"></i>Your password has been changed. You will receive the new, temporary password at the email address with which you registered. Once you have logged in with this password, you may change it by clicking on the "Change Password" link.</div>';
			
			mysqli_close($dbc);
			// include ('includes/footer.html');
            get_footer();
			exit(); // Stop the script.
			
		} else { // If it did not run OK.
			echo '<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
		}

	} else { // Failed the validation test.
		echo '';
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.

?>

    
    <div class="envelope">
        <div id="respond">
            <form action="" method="post">
            <p>Reset your password<br></p>
	        <p><label for="name">Email Address: <span>*</span><br><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /></p>
	        <div align="center"><input type="submit" name="submit" value="Reset My Password" /></div><br>
	        <input type="hidden" name="submitted" value="TRUE" />
	        <?php echo $response; ?>
            </form>
        </div>
    </div>
    
    

<?php
// include ('includes/footer.html');
get_footer();
?>