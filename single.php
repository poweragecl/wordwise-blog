<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordWise_Blogs
 */

get_header();
?>

<div class="wrapper">

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'wordwise' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Siguiente:', 'wordwise' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->


<?php
get_sidebar(); ?>

</div> <!--/wrapper-->


<section class="recommended-posts">
	<div class="wrapper no-flex">
		<?php 
		$related_posts_query = new WP_Query( 
			array( 
				'category__in' => wp_get_post_categories( $post->ID ), 
				'posts_per_page' => 4, 
				'post__not_in' => array( $post->ID ) 
			) 
		); 
		if ( $related_posts_query->have_posts() ) : ?>
			<h2>También te puede interesar</h2>
			<div class="recommended-posts-grid">
			<?php while ( $related_posts_query->have_posts() ) : $related_posts_query->the_post(); 

			get_template_part( 'template-parts/content', 'post-card' );

			endwhile; ?>
			</div>
		<?php endif; wp_reset_postdata(); ?>
	</div>
</section>



<?php
get_footer();
