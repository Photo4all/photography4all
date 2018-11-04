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

	<footer id="colophon" class="site-footer">
	    
	    <!-- chamar o ficheiro sidebar-footer.php -->
        <?php get_sidebar( 'footer' ); ?>
	    
		<div class="site-info">
		 
            <!--Social media icon menu-->
            <?php photography4all_social_menu(); ?>
            
		    <div class="site-copyright">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'photography4all' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'photography4all' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'photography4all' ), 'photography4all', '<a href="http://photography4all.xyz/">&copy; 2018 José Monteiro</a>' );
				?>
			</div><!-- .site-copyright -->
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php // Flush the buffered output.
    ob_end_flush();
?>

