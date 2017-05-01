<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terri
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">

					<div class="col-md-8">
						<div class="page-content">
							
							<?php if ( have_posts() ) : ?>

								<?php while ( have_posts() ) : the_post();

									get_template_part( 'parts/content/content', get_post_format() );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'parts/content/content', 'none' );

							endif; ?>

						</div><!-- .page-content -->
					</div><!-- .col -->

					<div class="col-md-4">
						
						<div class="sidebar" role="complementary">

							<?php if ( is_active_sidebar( 'default-sidebar' ) ) {

								dynamic_sidebar( 'default-sidebar' );

							} ?>

						</div><!-- .sidebar -->
						
					</div><!-- .col -->

				</div><!-- .row -->
			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>