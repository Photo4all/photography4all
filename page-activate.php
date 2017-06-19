<?php
    /*
        Template Name: Pagina Activate
    */
?>
<?php get_header(); ?>

<?php 

require_once ('inc/config.inc.php'); 


// Validate $_GET['x'] and $_GET['y']:
$x = $y = FALSE;
if (isset($_GET['x']) && preg_match ('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $_GET['x']) ) {
	$x = $_GET['x'];
}
if (isset($_GET['y']) && (strlen($_GET['y']) == 32 ) ) {
	$y = $_GET['y'];
}

// Se $x e $y nao estiveram correctas faz o redirect do utilizador.
if ($x && $y) {

	// Update da database...
	// require_once (MYSQL);
        require_once ('inc/mysqli_connect.php'); 

	$q = "UPDATE wpby_users_friendly SET active=NULL WHERE (email='" . mysqli_real_escape_string($dbc, $x) . "' AND active='" . mysqli_real_escape_string($dbc, $y) . "') LIMIT 1";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	// Mostra a mensagen 
	if (mysqli_affected_rows($dbc) == 1) {
		echo '<div class="mensagem_form"><i class="fa fa-check"></i>Your account is now active. <br>You may now log in.</div>';
	} else {
		echo '<div class="mensagem_form"><i class="fa fa-times-circle"></i>Your account could not be activated. Please re-check the link or contact the system administrator.</div>'; 
	}

	mysqli_close($dbc);

} else { // Redirect.

	$url = BASE_URL . 'index.php'; // Define o URL:
	ob_end_clean(); // Delete o buffer.
	header("Location: $url");
	exit(); // Sai do script.

} // Sai do main IF-ELSE.

get_footer(); 
?>