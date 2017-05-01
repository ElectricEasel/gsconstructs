<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Terri
 */
?>

<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">

					<div class="col-md-8">
						<div class="page-content">
							
							<?php if ( have_posts() ) : ?>

								<div class="search-results-list">

									<ul>

										<?php while ( have_posts() ) : the_post() ; ?>

											<?php get_template_part( 'parts/content/content', 'search' );

										endwhile; ?>

									</ul>

								</div><!-- .search-results-list -->

								<?php get_template_part( 'parts/content/content', 'pagination' ); ?>

							<?php else :

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
	</section><!-- #primary -->

<?php get_footer(); ?>
