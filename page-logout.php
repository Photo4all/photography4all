<?php
    /*
        Template Name: Pagina Logout
    */
?>
<?php get_header(); ?>

<?php # Script 16.9 - logout.php
// This is the logout page for the site.

require_once ('inc/config.inc.php');  
$page_title = 'Logout';
//include ('includes/header.html');

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['first_name'])) {
    
	//$url = BASE_URL . 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	//header("Location: $url");
        // header("Location: http://localhost/wordpress/");
           header("Location: https://photography4all.net/index.php/");
	exit(); // Quit the script.
	
} else { // Log out the user.

	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-300); // Destroy the cookie.
}

// Print a customized message:
// echo '<h3>You are now logged out.</h3>';

      echo '<div class="mensagem_form"><i class="fa fa-check"></i>
            You have successfully logged out!<br>
            Thank you for your visiting this site.<br>
            <a href="https://photography4all.net/index.php/">Return Home</a>';
      echo '</div>';


?>
<?php get_footer(); ?>