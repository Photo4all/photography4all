<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="supplementary">
	<div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
	    
	   <section class="widget widget_recent_entries">
		    <?php photography4all_sidebarTravelFooter(); ?>
	   </section>
	   
	   <section class="widget widget_recent_entries">
		    <?php photography4all_sidebarNewsFooter(); ?>
	   </section> 
	   
	   <section class="widget widget_archive">
		    <?php photography4all_sidebarArchiveFooter(); ?>
	   </section> 
		
	</div><!-- #footer-sidebar -->
</div><!-- #supplementary -->
