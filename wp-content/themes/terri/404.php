<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Terri
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="page-content">

							<section class="error-404 not-found text-centre">

							<?php 

								$error_page_image  = get_theme_mod( 'devclick_404_page_image' );

								if ( $error_page_image ) : ?>

									<img src="<?php echo esc_attr( $error_page_image ); ?>" alt="<?php esc_html_e( 'Error 404', 'terri' ); ?>">

								<?php else: ?>

									<h1><?php esc_html_e( '404', 'terri' ); ?></h1>

								<?php endif; ?>

								<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'terri' ); ?> <br>

								<?php esc_html_e( 'Maybe try one of the links in the header above or a search?', 'terri' ); ?></p>

								<?php get_search_form(); ?>

							</section><!-- .error-404 -->
							
						</div><!-- .page-content -->
					</div><!-- .col -->

				</div><!-- .row -->
			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>