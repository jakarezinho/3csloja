<?php 

get_header();

if ( have_posts() )  : 

	while ( have_posts() ) : the_post(); 

      $author = get_the_author();
	   $user_description = get_the_author_meta( 'description', $post->post_author);
	  $link = get_author_posts_url($post->post_author);
	  $date_post =  "<small> - ".get_the_date('', $post->ID)."</small>";
	  $mini = get_avatar($post->post_author,80);

		?>

	<div <?php post_class( 'section-inner' ); ?>>
		
		<header class="page-header section-inner thin<?php if ( has_post_thumbnail() ) echo ' fade-block'; ?>">
			
			<div>

				<?php 
				the_title( '<h1 class="title">', '</h2>' );

					// Make sure we have a custom excerpt
				if ( has_excerpt() ) the_excerpt();

					// Only output post meta data on single
				if ( is_single() ) : ?>
				<div class="meta">

					<?php 
					echo __( 'In', 'hamilton' ) . ' '; the_category( ', ' ); 

					if ( comments_open() ) : ?>
					<span>&bull;</span>
					<?php comments_popup_link( 
						__( 'Add Comment', 'hamilton' ), 
						__( '1 Comment', 'hamilton' ), 
						sprintf( __('%s Comments', 'hamilton' ), '%' ), 
						'' 
						); ?>
					<?php endif; ?>
                <p class="center center_avat_mini_2"><a href="<?=$link;?>"> <?= get_avatar($post->post_author,100);?><br>By- <?=$author;?> </a> </p>
					<p class="center"> +<small> <a href="<?=$link;?>"><?php echo pll__('falar_com');?> "<?=$author;?>"</a></small></p>
                <p> <span class="novo"><?php novo($post->ID);?></span></p>
             
				</div>

			<?php endif; ?>

		</div>

	</header><!-- .page-header -->
	<hr>

	<div class="entry-content section-inner thin">

		<?php the_content(); ?>

	</div> <!-- .content -->

	<?php 

	wp_link_pages( array(
		'before' => '<p class="section-inner thin linked-pages">' . __( 'Pages:', 'hamilton' ),
	) ); 

	if ( get_post_type() == 'post' ) : ?>

	<div class="meta bottom section-inner thin group">

		<?php if ( get_the_tags() ) : ?>

			<p class="tags"><?php //the_tags( ' #', ' #', ' ' ); ?></p>

		<?php endif; ?>
		<!--encomenda boton-->
			
		</div> <!-- .meta -->
          <!--.command -->
			<div class="section-inner thin">
				 <hr class="clear">
			<button id="quero" class="btnc"><span class="dashicons dashicons-cart"></span> <?php if (function_exists('pll')) { echo pll__('enviar_pedido');}else {echo "Enviar pedido"; }?></button> 
			 <p class="center center_avat_mini_1 "> <?php if (function_exists('pll')) { echo pll__('encomendar');}else {echo "Encomendar"; }?> <br>" <strong><?php the_title(); ?></strong> " a </p><p class="center center_avat_mini_1 "> <a href="<?=$link;?>"> <?= get_avatar($post->post_author,50);?><span class="autor_im"> <?=$author;?></span></a></p>
				<p class="falarcom"> + <a href="<?=$link;?>"><?php echo pll__('falar_com');?> "<?=$author;?>"</a></p>
			 <hr>
			</div>
        
		<!--encomenda-->
		<div id="encomendar" class="contact">
				
				<?php if (function_exists('pll')) : ?>
					<?php  if(pll_current_language()=='en'):?>
						<p class="center center_avat_mini_0">Your order " <strong><?php the_title(); ?></strong> "  will be sent to <br> <a href="<?=$link;?>"> <?= get_avatar($post->post_author,35);?><i> <?=$author;?></i></a></p>
							<?php echo do_shortcode( '[contact-form-7 id="235" title="loja_en"]');?>
					<?php elseif(pll_current_language()=='fr'):?>
						<p class="center center_avat_mini_0"> Votre commande " <strong><?php the_title(); ?></strong> " va être envoyé à<br> <a href="<?=$link;?>"> <?= get_avatar($post->post_author,35);?><i> <?=$author;?></i></a></p>
						<?php echo do_shortcode( '[contact-form-7 id="234" title="loja_fr"]');?>
					<?php else:?>
						<p class="center center_avat_mini_0"> O seu pedido  "<strong><?php the_title(); ?></strong>" <br>vai ser enviado a <br><a href="<?=$link;?>"> <?= get_avatar($post->post_author,35);?> <i> <?=$author;?></i></a></p>
						<?php echo do_shortcode( '[contact-form-7 id="65" title="loja_pt"]');?>
					<?php endif;?>
				<?php else:?>
					<p class="center center_avat_mini_0"> O seu pedido " <strong><?php the_title(); ?></strong> "vai ser enviado a <br><a href="<?=$link;?>"> <?= get_avatar($post->post_author,35);?> <i> <?=$author;?></i></a></p>
				<?php echo do_shortcode( '[contact-form-7 id="65" title="loja_pt"]');?>
				<?php endif;?>
			<p id="top" class="center"><a href="#quero"> Xclose</a></p>
				<hr>
			
			</div>
		<!--//encomenda-->
		<div class="social">
			<p class="center"><span class="dashicons dashicons-share"> </span> Share </p>
			<ul class="social center list-inline">

				<li class=""> <a class="btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">Facebook</a> </li>
				<li class="">
					<a class="btn-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_permalink();?>&media=<?php the_post_thumbnail_url( 'hamilton_preview-image' );?>">Pinterest</a>
				</li>
				<li class=""> <a  class=" btn-tweet" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title();?>&url=<?php the_permalink();?>&via=COLECTIVO3CS #ceramica #ceramic #clay">Tweet</a></li>
			</ul>

		</div>

	<?php endif; ?>

	<?php 

			// If comments are open, or there are at least one comment
	if ( get_comments_number() || comments_open() ) : ?>

	<div class="section-inner thin">
		<?php comments_template(); ?>
	</div>

<?php endif; ?>

</div> <!-- .post -->

<?php 

if ( get_post_type() == 'post' ) get_template_part( 'related-posts' );

endwhile;

endif; 

get_footer(); ?>
