<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terri
 */
?>

<?php get_header(); ?>

<?php

	if ( function_exists( 'get_field' ) ) {

		$sidebar = get_field( 'show_hide_sidebar', (int) get_option( 'page_for_posts' ) );

		if ( !$sidebar ) {

			$sidebar = 'right';

		}

	} else {

		$sidebar = 'right';

	}

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					
					<div class="col-sm-12 <?php echo 'left' === $sidebar ? ' col-md-8 col-md-push-4' : ''; echo 'right' === $sidebar ? ' col-md-8' : ''; ?>">
						<div class="page-content">
							
							<?php if ( have_posts() ) :

								while ( have_posts() ) : the_post();

									get_template_part( 'parts/content/content', get_post_format() );

								endwhile; 

								get_template_part( 'parts/content/content', 'pagination' ); ?>

							<?php else :

								get_template_part( 'parts/content/content', 'none' );

							endif; ?>
							
						</div><!-- .page-content -->
					</div><!-- .col -->
					
					<?php if ( 'hide' !== $sidebar ) : ?>

						<div class="col-md-4 <?php echo 'left' === $sidebar ? 'col-md-pull-8' : ''; ?>">

							<div class="sidebar" role="complementary">

								<?php if ( is_active_sidebar( 'blog-sidebar' ) ) {

									dynamic_sidebar( 'blog-sidebar' );

								} ?>

							</div><!-- .sidebar -->

						</div><!-- .col -->

					<?php endif; ?>

				</div><!-- .row -->
			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
