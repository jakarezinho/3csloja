<?php get_header(); ?>

	<div class="section-inner">
	
		<?php if ( is_home() && $paged== 1 && get_theme_mod( 'hamilton_home_title' ) ) : ?>
		
			<header class=" fade-block home_title">
				<div>
					<!--title index aqui-->
					
					<h2 class="title"> <?php 
					if (function_exists('pll')) { echo pll__('titulo_intro');}else {echo esc_html( get_theme_mod('hamilton_home_title' ) ); }?>

					</h2>
					<?php  list_users ();?>
				</div>
				<hr>
			</header>
		
		<?php elseif ( is_archive() ) : ?>
		
			<header class="page-header fade-block">
				<div>
					<h2 class="title"><?php the_archive_title(); ?></h2>
					<?php the_archive_description(); ?>
				</div>
			</header>
		<?php elseif ( is_search() && have_posts() ) : ?>
		
			<header class="page-header fade-block">
				<div>
					<h2 class="title"><?php printf( __( 'Search: %s', 'hamilton' ), '&ldquo;' . get_search_query() . '&rdquo;' ); ?></h2>
					<p><?php global $found_posts; printf( __( 'We found %s results matching your search.', 'hamilton' ), $wp_query->found_posts ); ?></p>
				</div>
			</header>
		
		<?php elseif ( is_search() ) : ?>

			<div class="section-inner">

				<header class="page-header fade-block">
					<div>
						<h2 class="title"><?php _e( 'No results found', 'hamilton' ); ?></h2>
						<p><?php global $found_posts; printf( __( 'We could not find any results for the search query "%s".', 'hamilton' ), get_search_query() ); ?></p>
					</div>
				</header>

			</div>

		<?php endif;
		
		if ( have_posts() ) : ?>
		

			<div class="posts" id="posts">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content' );

				endwhile; ?>

			</div><!-- .posts -->
		<?php else :?>
		<h2 class="center">
			Vazio / Vide / empty
		</h2>
		
		<?php endif; ?>
	
	</div><!-- .section-inner -->

<?php 
 fim ();
//get_template_part( 'pagination' ); 
get_footer(); ?>