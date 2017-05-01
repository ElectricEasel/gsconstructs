<?php
/**
 * Template Name: Full Width
 *
 * @package Terri
 *
 * @since Terri 1.0.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<div class="page-content page-builder">
							
							<?php if ( have_posts() ) :

								while ( have_posts() ) : the_post();

									the_content();

								endwhile; 

							endif; ?>
							
						</div><!-- .page-content -->
					</div><!-- .col -->

				</div><!-- .row -->
			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>