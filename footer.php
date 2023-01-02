<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordWise_Blogs
 */

?>

	<footer id="colophon" class="site-footer">

		<div class="footer-wrapper">


			<div class="footer-top">
				<div class="logo-footer"><a href="<?php home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/img/vitabalance-logo-blanco.svg'; ?>" alt="logo"></a></div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'container_class' => 'menu-footer',
						'items_wrap' => '<ul>%3$s</ul>',
					) );
					?>
			</div>

			<div class="footer-bottom">
				<div class="copyright">
					<p><?php echo date('Y'); ?> © <?php echo get_bloginfo('name'); ?> | Todos los derechos reservados.</p>
				</div>
				<nav class="social-menu">
					<ul class="social-list">
						<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
					</ul>
				</nav>
			</div>
		</div> <!--/ft wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
