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
				<nav class="menu-footer">
					menu
				</nav>
			</div>

			<div class="footer-bottom">
				<div class="copyright">
					<p>2023 © Nombre Blog | Todos los derechos reservados.</p>
				</div>
				<nav class="social-menu">
					<ul class="social-list">
						<li><a href="#">a</a></li>
						<li><a href="#">a</a></li>
						<li><a href="#">a</a></li>
					</ul>
				</nav>
			</div>
		</div> <!--/ft wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
