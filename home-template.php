<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * 
 * Template name: Home Blog
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordWise_Blogs
 */

get_header();
?>


<div class="wrapper no-flex">

	<h2 class="section-title">Artículos destacados</h2>

	<div class="hero-grid">

			<?php
			$args = array(
			'posts_per_page' => 3,
			// 'offset' => 1
			);
			$latest_posts = new WP_Query( $args );
			if ( $latest_posts->have_posts() ) {
			while ( $latest_posts->have_posts() ) {
			$latest_posts->the_post();
			?>

			<div class="hero-grid-card">
					<a class="card-link-container" href="<?php echo get_permalink();?>">
					<div class="image-container">
						<?php the_post_thumbnail(); ?>				
					</div>
					</a>
					
					<div class="card-content">

						<div class="card-post-categories">
							<?php the_category( '', false ); ?>
						</div>

						<div class="post-data">
							<time><?php the_time( 'j F Y' ); ?></time>
						</div>

						<a href="<?php echo get_permalink();?>" class="permalink">
							<?php the_title('<h3 class="grid-post-title">', '</h3>'); ?>
						</a>

					</div>
					
			</div> 

			<?php
			}
			wp_reset_postdata();
			}
			?>
	</div> <!--hero grid-->


</div>



<div class="wrapper">

	<main id="primary" class="site-main">

		<h2 class="section-title">Últimos artículos</h2>

		<div class="last-posts-grid">

			<?php
			$args = array(
			'posts_per_page' => 6,
			// 'offset' => 1
			);
			$latest_posts = new WP_Query( $args );
			if ( $latest_posts->have_posts() ) {
			while ( $latest_posts->have_posts() ) {
			$latest_posts->the_post();
			
				get_template_part( 'template-parts/content', 'post-card' );

			}
			wp_reset_postdata();
			}
			?>

		</div> <!--/last-posts-grid-->

	</main><!-- #main -->

	<?php get_sidebar(); ?>

</div><!--end wrapper-->

<?php
get_footer();
