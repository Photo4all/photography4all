<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* verifica se foi definida a area widget */
if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php photography4all_sidebarNews(); ?>
</aside><!-- #secondary -->

       