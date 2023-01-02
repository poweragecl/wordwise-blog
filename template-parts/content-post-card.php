<?php
/**
 * Template part for displaying post cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordWise_Blogs
 */

?>

<?php
// Obtener el ID del usuario
$user_id = get_the_author_meta( 'ID' );
?>


<article class="post-card">
				
		<div class="card-header">
			<a href="<?php echo get_permalink();?>" class="permalink">
				<?php the_post_thumbnail('thumbnail-cards'); ?>
			</a>
			<div class="card-post-categories">
				<?php the_category( '', false ); ?>
			</div>
		</div>
		
		<div class="card-footer">
			<a href="<?php echo get_permalink();?>" class="permalink">
			<?php the_title('<h3 class="post-card-title">', '</h3>'); ?>
			</a>
			<div class="post-data">
				<span><?php // Mostrar el avatar del usuario
echo get_avatar( $user_id ); ?> por <strong class="autor"><?php the_author(); ?></strong></span> <time><?php the_time( 'j F Y' ); ?></time>
			</div>
			
			<div class="card-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>
	
</article>
