<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordWise_Blogs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">
		<div class="header-wrapper">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<?php
				endif;
				$wordwise_description = get_bloginfo( 'description', 'display' );
				if ( $wordwise_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $wordwise_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>




			</div><!-- .site-branding -->
			<!--
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wordwise' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>-->

			<form role="search" method="get" id="searchform-header" action="<?php echo home_url( '/' ); ?>">
					<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Buscar" />
			</form>

		</div>	<!--wrapper-->

		<div class="header-wrapper categories-menu-wrapper">
			<div id="categories-menu">
				<?php
				wp_nav_menu( array(
				'theme_location' => 'categories-menu',
				'container' => 'nav',
				'container_class' => 'menu-secundario',
				'items_wrap' => '<ul>%3$s</ul>',
				) );
				?>
			</div>
		</div> <!--wrapper-->

	</header><!-- #masthead -->



