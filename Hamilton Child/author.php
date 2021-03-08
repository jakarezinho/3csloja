<?php get_header();
$langue = (function_exists('pll')) ? pll_current_language() : '';

$autd = get_the_author_meta('ID');
$nome = get_the_author_meta('display_name', $autd);
$user_url = get_the_author_meta('user_url', $autd);
$user_twitter = get_the_author_meta('twitter', $autd);
//$user_post_count = ceil(count_user_posts($autd) / 3);
$user_post_count = (function_exists('pll')) ? pll_count_posts($langue, ['author' => $autd]) : '';
$link = get_author_posts_url($autd);

$the_query = new WP_Query(array(
	'post_type' => 'post',
	'author' =>  $autd,
	'lang'           => $langue,
	'paged' => get_query_var('paged'),
	'posts_per_page' => 10,
	'order' => 'DESC'
));
///user

?>

<div class="section-inner">

	<header class="page-header section-inner thin">

		<?php if ($autd) : ?>
			<p class="center autor_big"><?php echo get_avatar($autd, 210); ?></p>
			<h1 class="title"><?php echo $nome; ?></h1>
			<hr>


			<?php if ($the_query->have_posts()) : ?>
				<p class="autor-header center">
					<?php
					if (function_exists('pll')) {
						echo pll__('nmobras');
					} else {
						echo "Obras publicadas";
					} ?> (<?php echo $user_post_count; ?>) </p>
				<hr>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<a class="link_post_autor" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<article class="post-autor">
							<div><img src="<?php the_post_thumbnail_url('mini'); ?>" alt=""></div>
							<span class="novo_autor"><?php novo($post->ID);?></span>
							<div class="header_title">
								<?php the_title(); ?>»
							</div>
							<?php if (get_the_tags()) : ?>
								<?php $term_list = wp_get_post_terms($post->ID);
						      //var_dump(is_numeric ($term_list[0]->name));
								echo '<span class="autor_prix">' . $term_list[0]->name . ' €</span>'; ?>

							<?php endif; ?>
							
						</article>
					</a>


				<?php endwhile;
			else : ?>
				<p> Sem obras publicadas</p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>


			<!--/nav/-->
			<p class="nav_cat">
				<?php $big = 999999999; // need an unlikely integer

				echo paginate_links(array(
					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format' => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'total' => $the_query->max_num_pages
				)); ?>
			</p>

			<hr>
			<button id="quero" class="btnc"> + <?php if (function_exists('pll')) {echo pll__('bt_contacter');} else {echo "Contactar";} ?> <?php echo $nome; ?></button>
			<hr>
			<div class="infos_autor">
				<div id="encomendar" class="contact">
					<?php if (function_exists('pll')) : ?>
						<?php if (pll_current_language() == 'en') : ?>
							<p class="center center_avat_mini_1"> Send a message to: <br><?php echo get_avatar($autd, 50);?>" <strong><?php echo $nome; ?></strong>"</p>
							<?php echo do_shortcode('[contact-form-7 id="356" title="artista_en"]'); ?>
						<?php elseif (pll_current_language() == 'fr') : ?>
							<p class="center"> Envoyer un message à: <br>" <strong><?php echo $nome; ?></strong>"</p>
							<?php echo do_shortcode('[contact-form-7 id="365" title="artista_fr"]'); ?>
						<?php else : ?>
							<p class="center center_avat_mini_1">Enviar uma mensagem a: <br> <?php echo get_avatar($autd, 50);?>" <strong><?php echo $nome; ?></strong>" </p>
							<?php echo do_shortcode('[contact-form-7 id="334" title="artista_pt"]'); ?>
						<?php endif; ?>
					<?php else : ?>
						<p class="center center_avat_mini_1">Enviar uma mensagem a: <br> <?php echo get_avatar($autd, 50);?>" <strong><?php echo $nome; ?></strong>" </p>
						<?php echo do_shortcode('[contact-form-7 id="334" title="artista_pt"]'); ?>
					<?php endif; ?>

					<p id="top" class="center"><a href="#quero"> Xclose</a></p>
					<hr>


				</div>
				<?php users_infos($autd);
				users_location($autd); ?>


			</div>
		<?php else : ?>
			<p><?php echo 'SORRY! there are no articles for this artist in your language (' . pll_current_language('name') . ')'; ?></p>
		<?php endif; ?>

	</header>
	<!-- .page-header -->

</div> <!-- .post -->

<?php get_footer(); ?>