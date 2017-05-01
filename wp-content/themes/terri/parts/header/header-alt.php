<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<header class="site-header header-style-two">

	<div class="header-top clear">
		<div class="head-container clear">
			
			<?php if ( get_theme_mod( 'devclick_logo' ) ) : ?>

				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_theme_mod( 'devclick_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div><!-- .site-branding -->

			<?php else : ?>

				<div class="site-branding font-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				</div><!-- .site-branding -->
				
			<?php endif; ?>

			<div class="mobile-controls">
				<a href="#" id="mobile-menu-opener" class="nav-toggle">
					<i class="fa fa-reorder"></i>
				</a>
			</div><!-- .mobile-controls -->

			<?php if ( get_theme_mod( 'devclick_header_style' ) === '2' ) : ?>

				<?php if ( is_active_sidebar( 'header-widgets' ) ) : ?>

					<div class="header-widgets clear">

						<?php dynamic_sidebar( 'header-widgets' ); ?>

					</div><!-- .header-widgets -->

				<?php endif; ?>

			<?php endif; ?>

		</div><!-- .head-container -->
	</div><!-- .header-top -->

	<nav id="main-nav" class="main-navigation">
		<div class="navigation-inner clear">

			<?php 
				wp_nav_menu( array( 
					'theme_location' => 'main',
					'depth'          => 3,
				) ); 
			?>

			<?php if ( get_theme_mod( 'devclick_header_style' ) === '2' ) : ?>

				<?php if ( is_active_sidebar( 'navigation-widgets' ) ) : ?>

					<div class="navigation-widgets clear">

						<?php dynamic_sidebar( 'navigation-widgets' ); ?>

					</div><!-- .header-widgets -->

				<?php endif; ?>

			<?php endif; ?>

		</div><!-- .navigation-inner -->
	</nav><!-- .main-nav -->

</header><!-- .site-header -->