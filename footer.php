<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photography4all
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	    
	   
        <?php get_sidebar('footer'); ?>
	    
	    
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'photography4all' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'photography4all' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'photography4all' ), 'photography4all', '<a href="https://photography4all.net/" rel="designer">photography4all.net</a>' ); ?>
		</div><!-- .site-info -->
		
		<div class="menu-social">
		    <?php photography4all_social_menu(); ?>
		</div><!-- .menu-social -->

		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php // Flush the buffered output.
ob_end_flush();
?>



