<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<header class="site-header header-style-one">
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


		<nav id="main-nav" class="main-navigation">
			<?php 
				wp_nav_menu( array( 
					'theme_location' => 'main',
					'depth'          => 3,
				) ); 
			?>
		</nav><!-- .main-nav -->

		
		<div class="mobile-controls">
			<a href="#" id="search-opener" class="search-toggle">
				<i class="fa fa-search"></i>
			</a>

			<a href="#" id="mobile-menu-opener" class="nav-toggle">
				<i class="fa fa-reorder"></i>
			</a>
		</div><!-- .mobile-controls -->

	</div><!-- .head-container -->

	<div class="header-search-form">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
			
					<?php get_search_form(); ?>
					<span class="fa fa-close" id="search-closer"></span>

				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .header-search-form -->

</header><!-- .site-header -->