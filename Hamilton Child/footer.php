		<footer class="site-footer section-inner">
		<?php 
          if(!is_home() || $paged >0){
          	  list_users ();
          }
          
			if ( has_nav_menu( 'thri-menu' ) ) {
					wp_nav_menu( array( 
						'container' 		=> false,
						'theme_location' 	=> 'thri-menu',
						'items_wrap' => '<ul class="list-inline_infos">%3$s</ul>',
					) ); 
				} ?>
			
			<!--//search-->
			<hr>
			<div class="section-inner thin">
				<h5 class="center">
				<span class="dashicons dashicons-search"></span> Pesquisar/ Search
			</h5>
			<?php get_search_form();?>
			</div>
			

			<!--//newsletter-->
			<hr>
			<?php if (function_exists('pll')) : ?>
				<?php if (pll_current_language() == 'en') : ?>
					<h3> NEWSLETTER</h3>
					<h5>Receive exhibition updates</h5>
					<p> <a class="btnews" href="https://www.ceramica3cs.com/loja/en/newsletter-2/"> Subscribe</a> </p>

				<?php elseif (pll_current_language() == 'fr') : ?>

				<?php else : ?>
					<h3> NEWSLETTER</h3>

					<h5> Receber actualizações da exposição</h5>
					<p> <a class="btnews" href="https://www.ceramica3cs.com/loja/newsletter/"> Subscrever</a> </p>

				<?php endif; ?>

			<?php else : ?>
				<h3> NEWSLETTER</h3>

				<h5> Receber actualizações da exposição</h5>
				<p> <a class="btnews" href="https://www.ceramica3cs.com/loja/newsletter/"> Subscrever</a> </p>
			<?php endif; ?>
			<hr>
			<!--//nwes//-->
			
			

			<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>" class="site-name"><?php bloginfo( 'name' ); ?></a></p>
			<p class="center"><a href="https://www.ceramica3cs.com/"> <img class="icon_share" src="<?php echo get_stylesheet_directory_uri();?>/images/logo.gif"></a></p>
			<p><?php  bloginfo('name');?>-  promovido pelo associação de cerâmica contemporânea colectivo3cs</a></p>
			<p><small>Tema sobre base/Anders Nor&eacute;n</small></p>
    <p> Follow</p>
<a href="https://www.facebook.com/colectivo3cs/" target="blank" title="facebook"><svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M11.344,5.71c0-0.73,0.074-1.122,1.199-1.122h1.502V1.871h-2.404c-2.886,0-3.903,1.36-3.903,3.646v1.765h-1.8V10h1.8v8.128h3.601V10h2.403l0.32-2.718h-2.724L11.344,5.71z"></path>
						</svg>
</a>
<a href="https://www.instagram.com/ceramica3cs/" target="blank" title="instagram">
						<svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M14.52,2.469H5.482c-1.664,0-3.013,1.349-3.013,3.013v9.038c0,1.662,1.349,3.012,3.013,3.012h9.038c1.662,0,3.012-1.35,3.012-3.012V5.482C17.531,3.818,16.182,2.469,14.52,2.469 M13.012,4.729h2.26v2.259h-2.26V4.729z M10,6.988c1.664,0,3.012,1.349,3.012,3.012c0,1.664-1.348,3.013-3.012,3.013c-1.664,0-3.012-1.349-3.012-3.013C6.988,8.336,8.336,6.988,10,6.988 M16.025,14.52c0,0.831-0.676,1.506-1.506,1.506H5.482c-0.831,0-1.507-0.675-1.507-1.506V9.247h1.583C5.516,9.494,5.482,9.743,5.482,10c0,2.497,2.023,4.52,4.518,4.52c2.494,0,4.52-2.022,4.52-4.52c0-0.257-0.035-0.506-0.076-0.753h1.582V14.52z"></path>
						</svg>
<a href="https://twitter.com/Colectivo3cs" target="blank" title="twitter">
						<svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M18.258,3.266c-0.693,0.405-1.46,0.698-2.277,0.857c-0.653-0.686-1.586-1.115-2.618-1.115c-1.98,0-3.586,1.581-3.586,3.53c0,0.276,0.031,0.545,0.092,0.805C6.888,7.195,4.245,5.79,2.476,3.654C2.167,4.176,1.99,4.781,1.99,5.429c0,1.224,0.633,2.305,1.596,2.938C2.999,8.349,2.445,8.19,1.961,7.925C1.96,7.94,1.96,7.954,1.96,7.97c0,1.71,1.237,3.138,2.877,3.462c-0.301,0.08-0.617,0.123-0.945,0.123c-0.23,0-0.456-0.021-0.674-0.062c0.456,1.402,1.781,2.422,3.35,2.451c-1.228,0.947-2.773,1.512-4.454,1.512c-0.291,0-0.575-0.016-0.855-0.049c1.588,1,3.473,1.586,5.498,1.586c6.598,0,10.205-5.379,10.205-10.045c0-0.153-0.003-0.305-0.01-0.456c0.7-0.499,1.308-1.12,1.789-1.827c-0.644,0.28-1.334,0.469-2.06,0.555C17.422,4.782,17.99,4.091,18.258,3.266"></path>
						</svg>

</a>
	<a href="https://www.pinterest.pt/ceramica3cs/" target="blank" title="Pinterest">
	
	<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" fill-rule="evenodd" clip-rule="evenodd"/></svg>
	
</a>

		</footer> <!-- footer -->
	  
	    <?php wp_footer(); ?>
	        
	</body>
</html>