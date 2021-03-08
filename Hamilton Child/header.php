<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="https://www.ceramica3cs.com/loja/wp-content/uploads/2020/04/favicon.ico" type="image/x-icon">
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
		
					<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NKWBZXR');</script>
		<!-- End Google Tag Manager -->

	
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>

			 <!-- Google Tag Manager (noscript) -->
			<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKWBZXR"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
			<!-- End Google Tag Manager (noscript) -->
		
		<!--MESSENGER-->

			<?php if (function_exists('pll') && pll_current_language() == 'pt' && is_page( 'contactos' )) : ?>
		<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pt_PT/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="105941191095359"
  logged_in_greeting="Olá, como posso ajudar ?"
  logged_out_greeting="Olá, como posso ajudar ?">
      </div>
		
		<?php endif;?>

		<!--MINI MENU-->
		<?php if (function_exists('pll')) : ?>
		<div id="top_menu" class="top_menu">
			<div id="top_content" class="top_content">
				<p id="close"> close X </p>
				<ul>
					<?php pll_the_languages(array('show_flags' => 1, 'show_names' => 1, 'hide_if_no_translation' => 0)); ?>
				</ul>

			</div>
			<p id="boton_top" class="mini_menu"> <span>Language (<?= pll_current_language('name'); ?>)</span> </p>
		</div>
	<?php endif; ?>
		
      <!--//mini menu-->
        <header class="section-inner site-header group" id="haut">
			 <div><a id="cRetour" class="cInvisible" href="#haut"></a></div>
		
			<?php if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) :
				$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
				$logo_url = $logo[0];
				
				$width = $logo[1];
				$height = $logo[2];

				// Determine which height logo we need the mobile nav to adjust for
				$adjusted_height = $height < 100 ? $height : 100;
				?>

				<style>
					.site-nav {
						padding-top: <?php echo $adjusted_height + 160; ?>px;
					}
					@media ( max-width: 620px ) {
						.site-nav {
							padding-top: <?php echo $adjusted_height + 100; ?>px;
						}
					}
				</style>
				
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>" class="custom-logo" style="background-image: url( <?php echo $logo_url; ?> );">
					<img src="<?php echo $logo_url; ?>" />
				</a>
				
			<?php elseif ( is_singular() ) : ?>

            	<h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" class="site-name"><?php bloginfo( 'name' ); ?></a></h1>
            		<p class="description"> <?php bloginfo('description');?></p>
			
			<?php else : ?>
			
				<h2 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" class="site-name"><?php bloginfo( 'name' ); ?></a></h2>
				<p class="description"> <?php bloginfo('description');?></p>
			
			<?php endif; ?>
			
			<div class="nav-toggle">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
			
			<ul class="alt-nav">
				<?php 
				if ( has_nav_menu( 'primary-menu' ) ) : 
					wp_nav_menu( array( 
						'container' 		=> '',
						'items_wrap' 		=> '%3$s',
						'theme_location' 	=> 'primary-menu',
					) ); 
				else :
					wp_list_pages( array(
						'container' => '',
						'title_li' 	=> ''
					) );
				endif;
				?>
			</ul>

        </header> <!-- header -->
		
		<?php 
		$bg_declaration = "";
		if ( get_background_color() && get_background_color() != 'ffffff' ) {
			$bg_declaration = ' style="background-color: #' . get_background_color() . ';"';
		}
		?>
		
		<nav class="site-nav"<?php echo $bg_declaration; ?>>
		
			<div class="section-inner menus group">

				<?php
				  list_users (true); 
				if ( has_nav_menu( 'primary-menu' ) ) :
					wp_nav_menu( array( 
						'container' 		=> '',
						'theme_location' 	=> 'primary-menu'
					) ); 
				
				endif;
				
				if ( has_nav_menu( 'secondary-menu' ) ) {
					wp_nav_menu( array( 
						'container' 		=> '',
						'theme_location' 	=> 'secondary-menu'
					) ); 
				}
				
		?>
					<ul>
					<?php
				if ( is_active_sidebar( 'sidebar-1' ) ) {
				dynamic_sidebar( 'sidebar-1' );
			} 
					?>
				</ul>
				
			</div>
			
			<footer<?php echo $bg_declaration; ?>>
			
				<div class="section-inner">
					
					<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>" class="site-name"><?php bloginfo( 'name' ); ?></a> Cerâmica contemporânea de Autor</p>
					
				
				</div>

			</footer>
			
		</nav>