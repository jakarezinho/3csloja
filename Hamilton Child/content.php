<?php 

$extra_classes = 'post-preview tracker';

// Determine whether a fallback is needed for sizing
if ( has_post_thumbnail() ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hamilton_preview-image' );
	if ( $image ) {
		$aspect_ratio = $image[2] / $image[1];
		// Guaranteee a mininum aspect ratio of 3/4
		if ( $aspect_ratio <= 0.75 ) {
			$extra_classes .= ' fallback-image';
		}
	}
} else {
	$extra_classes .= ' fallback-image';
}


?>

<a <?php post_class( $extra_classes ); ?> id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	
	<div class="preview-image" style="background-image: url( <?php the_post_thumbnail_url( 'hamilton_preview-image' ); ?> );">
		<?php the_post_thumbnail( 'hamilton_preview-image' ); ?>
	</div>
	
	<header class="preview-header">
	 <?php echo autor_content($feed=true);?>
		<?php if ( is_sticky() ) : ?>
			<span class="sticky-post"><svg class="svg-icon styck" viewBox="0 0 20 20">
							<path d="M14.38,3.467l0.232-0.633c0.086-0.226-0.031-0.477-0.264-0.559c-0.229-0.081-0.48,0.033-0.562,0.262l-0.234,0.631C10.695,2.38,7.648,3.89,6.616,6.689l-1.447,3.93l-2.664,1.227c-0.354,0.166-0.337,0.672,0.035,0.805l4.811,1.729c-0.19,1.119,0.445,2.25,1.561,2.65c1.119,0.402,2.341-0.059,2.923-1.039l4.811,1.73c0,0.002,0.002,0.002,0.002,0.002c0.23,0.082,0.484-0.033,0.568-0.262c0.049-0.129,0.029-0.266-0.041-0.377l-1.219-2.586l1.447-3.932C18.435,7.768,17.085,4.676,14.38,3.467 M9.215,16.211c-0.658-0.234-1.054-0.869-1.014-1.523l2.784,0.998C10.588,16.215,9.871,16.447,9.215,16.211 M16.573,10.27l-1.51,4.1c-0.041,0.107-0.037,0.227,0.012,0.33l0.871,1.844l-4.184-1.506l-3.734-1.342l-4.185-1.504l1.864-0.857c0.104-0.049,0.188-0.139,0.229-0.248l1.51-4.098c0.916-2.487,3.708-3.773,6.222-2.868C16.187,5.024,17.489,7.783,16.573,10.27"></path>
						</svg></span>
		<?php endif; ?>
	
		<?php the_title( '<h2 class="title">', '</h2>' ); ?>
		
	<p class="center"><span class="novo"><?php novo($post->ID);?></span></p>
	<?php if ( get_the_tags() ) : ?>

			<?php $term_list = wp_get_post_terms($post->ID);
echo '<span class="prix">'. $term_list[0]->name.' €</span>'; ?>

		<?php endif; ?>
	</header>
</a>

		