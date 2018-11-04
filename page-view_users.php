<?php
    /*
        Template Name: Pagina View Users
    */
?>
<?php get_header(); ?>
<?php # Script 9.4 - #4

// This script retrieves all the records from the users table.
// This version paginates the query results.


echo '<div class="registered_users-box">';
echo '<div class="registered_users">';

$page_title = 'View the Current Users';
//include ('includes/header.html');
echo '<h2 class="entry-title">Registered Users</h2>';
echo '<hr>';

//require_once ('/inc/mysqli_connect.php');
require_once dirname( __FILE__ ) . '/inc/mysqli_connect.php';

// Number of records to show per page:
$display = 10;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.

	$pages = $_GET['p'];

} else { // Need to determine.

 	// Count the number of records:
	$q = "SELECT COUNT(user_id) FROM wp_users_friendly";
	$r = @mysqli_query ($dbc, $q);
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];

	// Calculate the number of pages...
	if ($records > $display) { // More than 1 page.
		$pages = ceil ($records/$display);
	} else {
		$pages = 1;
	}
	
} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
} else {
	$start = 0;
}
		
// Make the query:
$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM wp_users_friendly ORDER BY registration_date ASC LIMIT $start, $display";		
$r = @mysqli_query ($dbc, $q);

echo '<div class="caixa-users">';

// Table header:
echo '<table id="lista-users">
<tr>
	<td align="left"><b>Edit</b></td>
	<td align="left"><b>Delete</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>First Name</b></td>
	<td align="left"><b>Date Registered</b></td>
</tr>
';

// Fetch and print all the records....

$bg = '#eeeeee'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.
	


	echo '<tr bgcolor="' . $bg . '">
		<td align="left"><a href="http://photography4all.xyz/edit_user/?id=' . $row['user_id'] . '">Edit</a></td>
		<td align="left"><a href="http://photography4all.xyz/index.php/delete_user/?id=' . $row['user_id'] . '">Delete</a></td>
		<td align="left">' . $row['last_name'] . '</td>
		<td align="left">' . $row['first_name'] . '</td>
		<td align="left">' . $row['dr'] . '</td>
	</tr>
	';
	
} // End of WHILE loop.

echo '</table>';

echo '</div/>';


mysqli_free_result ($r);
mysqli_close($dbc);

// Make the links to other pages, if necessary.
if ($pages > 1) {
	
	// Add some spacing and start a paragraph:
	echo '<br /><p>';
	
	// Determine what page the script is on:	
	$current_page = ($start/$display) + 1;
	
	// If it's not the first page, make a Previous button:
	if ($current_page != 1) {
		echo '<a href="http://photography4all.xyz/index.php/view_users/?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a> ';
	}
	
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="http://photography4all.xyz/index.php/view_users/?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a> ';
		} else {
			echo $i . ' ';
		}
	} // End of FOR loop.
	
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="http://photography4all.xyz/index.php/view_users/?s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';
	}
	
	echo '</p>'; // Close the paragraph.
	
} // End of links section.
	
	echo '</div>';
	echo '</div>';
	
//include ('includes/footer.html');
?>
<?php get_footer(); ?>