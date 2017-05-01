<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Terri
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page-wrap" class="page-wrap">

	<div id="mobile-navigation-container" class="mobile-navigation-container">
		
		<div id="mobile-menu-closer" class="mobile-menu-closer">
			<i class="fa fa-long-arrow-right"></i>
		</div><!-- .mobile-menu-closer -->

		<nav class="mobile-navigation">
			<?php
				if ( has_nav_menu( 'mobile' ) ) {
					wp_nav_menu( array( 
						'theme_location' => 'mobile', 
						'menu_id'        => 'mobile-menu',
						'depth'          => 3,
						'walker'         => new Nav_Walker_Nav_Menu(),
					) ); 
				}
			?>
		</nav><!-- mobile-navigation -->

	</div><!-- .mobile-navigation-container -->

	<div class="page-wrap-inner">

		<?php 

			// Topbar widget area
			if ( 'hide' !== get_theme_mod( 'devclick_header_topbar', 'hide' ) ) : ?>

				<div class="topbar">
					
					<div class="container">

						<div class="topbar-widgets">
						
							<?php if ( is_active_sidebar( 'topbar-widgets' ) ) {

								dynamic_sidebar( 'topbar-widgets' );

							} ?>

						</div><!-- .topbar-widgets -->

					</div><!-- .container -->

				</div><!-- .topbar -->

			<?php endif;




			// Header
			if ( get_theme_mod( 'devclick_header_style' ) === '2' ) {

				get_template_part( 'parts/header/header', 'alt' );

			} else {

				get_template_part( 'parts/header/header', 'default' );

			}




			// Front page slider/banner & page title
			if ( function_exists( 'get_field' ) ) {

				if ( is_front_page() && !is_home() && get_field( 'front_page_banner_slider' ) == 'slider' ) {

					get_template_part( 'parts/content/content', 'slider' );

				} elseif ( is_front_page() && !is_home() && get_field( 'front_page_banner_slider' ) == 'banner' ) {

					get_template_part( 'parts/content/content', 'banner' );

				} else {

					get_template_part( 'parts/content/content', 'page-title' );

				}

			}

		?>