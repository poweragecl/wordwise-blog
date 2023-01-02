<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordWise_Blogs
 */

get_header();
?>
<div class="wrapper">
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">


			<?php
			// Obtener la cadena de búsqueda del usuario
			$search_query = get_search_query();

			// Realizar una búsqueda de publicaciones
			$search_results = wp_count_posts( 'post', array( 's' => $search_query ) );

			// Mostrar la cantidad de resultados
			echo $search_results->publish . ' resultados encontrados para la búsqueda "' . $search_query . '"';
			?>






				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados para: %s', 'wordwise' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->


			<div class="last-posts-grid">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', 'search' );
				get_template_part( 'template-parts/content', 'post-card' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div> <!--post grid -->

	</main><!-- #main -->

	<?php get_sidebar(); ?>
</div> <!-- /wrapper -->
<?php

get_footer();
