<?php
    /*
        Template Name: Pagina Delete user
    */
?>
<?php get_header(); ?>
<?php # Script 9.2 - delete_user.php

// This page is for deleting a user record.
// This page is accessed through view_users.php.

echo '<div class="delete_user-box">';
echo '<div class="delete_user">';

$page_title = 'Delete a User';
get_header();


echo '<h2 class="entry-title">Delete a User</h2>';
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

//require_once ('mysqli_connect.php');
require_once dirname( __FILE__ ) . '/inc/mysqli_connect.php';

// Check if the form has been submitted:
if (isset($_POST['submitted'])) {

	if ($_POST['sure'] == 'Yes') { // Delete the record.

		// Make the query:
		$q = "DELETE FROM wp_users_friendly WHERE user_id=$id LIMIT 1";		
		$r = @mysqli_query ($dbc, $q);
		if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
			// Print a message:
			echo '<div class="error">The user has been deleted.</div>';	
		
		} else { // If the query did not run OK.
			echo '<div class="error">The user could not be deleted due to a system error.</div>'; // Public message.
			echo '<div class="error">' . mysqli_error($dbc) . '<br />Query: ' . $q . '</div>'; // Debugging message.
		}
	
	} else { // No confirmation of deletion.
		echo '<div class="error">The user has NOT been deleted.</div>';	
	}

 } else { // Show the form.

	// Retrieve the user's information:
	$q = "SELECT CONCAT(last_name, ', ', first_name) FROM wp_users_friendly WHERE user_id=$id";
	$r = @mysqli_query ($dbc, $q);
	
	if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
// Create the form:
echo '<form action="" method="post">
        	<h3 class="delete_name">Name: ' . $row[0] . '</h3>
        	<p class="delete_note">Are you sure you want to delete this user?<br /></p>
        	<input type="radio" name="sure" value="Yes" /> Yes 
        	<input type="radio" name="sure" value="No" checked="checked" /> No</p>
        	<p class="delete_botao">
        	    <input class="message-btn" type="submit" name="submit" value="Apagar utilizador" />
        	</p>
        	<input type="hidden" name="submitted" value="TRUE" />
        	<input type="hidden" name="id" value="' . $id . '" />
    	</form>';
	
	} else { // Not a valid user ID.
		echo '<div class="error">This page has been accessed in error.</div>';
	}

} // End of the main submission conditional.

echo '</div/>';
echo '</div/>';

mysqli_close($dbc);
		
get_footer();
?>