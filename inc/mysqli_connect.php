<?php # Script 16.4 - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
// DEFINE ('DB_USER', 'username');
// DEFINE ('DB_USER', 'id1514936_wp_e2569dcec6e2fc56bcf96e2a804d1c06');
// DEFINE ('DB_PASSWORD', '');
// DEFINE ('DB_HOST', 'localhost');
// DEFINE ('DB_NAME', 'id1514936_wp_e2569dcec6e2fc56bcf96e2a804d1c06');

// Make the connection:
 $dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//$dbc = @mysqli_connect (DB_HOST, DB_USER,"", DB_NAME);
if (!$dbc) {
	trigger_error ('Could not connect to MySQL: ' . mysqli_connect_error() );
}

?>