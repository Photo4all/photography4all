
<?php
/**
 * The news sidebar
 *
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<div id="supplementary">
	<div id="news-widgets" class="news-widgets widget-area clear" role="complementary">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #news-sidebar -->
</div><!-- #supplementary -->
