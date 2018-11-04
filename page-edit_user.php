<?php
    /*
        Template Name: Pagina Edit user
    */
?>
<?php get_header(); ?>
<?php # Script 9.3 - edit_user.php

// This page is for editing a user record.
// This page is accessed through view_users.php.

echo '<div class="edit_user-box">';

echo '<div class="edit_user">';

$page_title = 'Edit a User';
//include ('includes/header.html');
get_header(); 

echo '<h2 class="entry-title">Edit a User</h2>';
echo '<hr>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<div class="error">This page has been accessed in error.</div>';
	//include ('includes/footer.html'); 
        get_footer(); 
	exit();
}

//require_once ('/inc/mysqli_connect.php'); 
require_once dirname( __FILE__ ) . '/inc/mysqli_connect.php';


// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	
	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT user_id FROM wp_users_friendly WHERE email='$e' AND user_id != $id";
		$r = @mysqli_query($dbc, $q);
		if (mysqli_num_rows($r) == 0) {

			// Make the query:
			$q = "UPDATE wp_users_friendly SET first_name='$fn', last_name='$ln', email='$e' WHERE user_id=$id LIMIT 1";
			$r = @mysqli_query ($dbc, $q);
			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
			
				// Print a message:
				echo '<div class="error">The user has been edited.</div>';	
							
			} else { // If it did not run OK.
				echo '<div class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</div>'; // Public message.
				echo '<div class="error">' . mysqli_error($dbc) . '<br />Query: ' . $q . '</div>'; // Debugging message.
			}
				
		} else { // Already registered.
			echo '<div class="error">The email address has already been registered.</div>';
		}
		
	} else { // Report the errors.
	
		echo '<div class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</div><div class="error">Please try again.</div>';
		
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT first_name, last_name, email FROM wp_users_friendly WHERE user_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="" method="post">
                <p class="edit-first_name">First Name: <input type="text" name="first_name" value="' . $row[0] . '" /></p>
                <p class="edit-last_name">Last Name: <input type="text" name="last_name" value="' . $row[1] . '" /></p>
                <p class="edit-email_address">Email Address: <input type="text" name="email" value="' . $row[2] . '"  /> </p>
                <p><input class="message-btn" type="submit" name="submit" value="Atualizar dados" /></p>
                <input type="hidden" name="submitted" value="TRUE" />
                <input type="hidden" name="id" value="' . $id . '" />
            </form>';

} else { // Not a valid user ID.
	echo '<div class="error">This page has been accessed in error.</div>';
}

echo '</div/>';
echo '</div/>';

mysqli_close($dbc);
		
//include ('includes/footer.html');
?>
<?php get_footer(); ?>