<?php
/**
 * The template for displaying all single projects.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Terri
 */
?>

<?php get_header(); ?>

<?php

	// Get post thumbnail and sizes from page ID
	$image            = get_post_thumbnail_id( $page_id );
	$image_src_small  = wp_get_attachment_image_src( $image, 'terri-col-small' );
	$image_src_medium = wp_get_attachment_image_src( $image, 'terri-col-medium' );
	$image_src_large  = wp_get_attachment_image_src( $image, 'terri-col-large' );

	if ( function_exists( 'get_field' ) ) {

		$images = get_field( 'project_gallery_images' );

		$cols = get_field( 'project_gallery_columns' );

		if ( $cols ) :

			$count = round( 12 / $cols );

		endif;

	}

?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">

				<div class="page-content clear">

					<div class="row">

						<div class="col-md-6 col-md-push-6">
							
							<?php if ( $images ) : ?>

								<?php $counter = 0; ?>

								<div class="project-gallery">

									<div class="row">
											
										<?php foreach ( $images as $image ) :

											$counter++; ?>

											<div class="col-xs-12 col-sm-6 col-md-<?php echo esc_attr( $count ); ?>">

												<a href="<?php echo esc_url( $image['url'] ); ?>" rel="gallery">

													<img src="<?php echo esc_url( $image['sizes']['terri-col-medium'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">

												</a>

											</div><!-- .col -->

											<?php if ( $counter % $cols == 0 ) : ?>

												</div><!-- .row -->

												<div class="row">

											<?php endif; ?>

										<?php endforeach; ?>

									</div><!-- .row -->

								</div><!-- .project-gallery -->

								<?php if ( get_field( 'show_project_gallery_content' ) === true ) : ?>

									<div class="project-content-area">
										
										<div class="row">
											
											<div class="col-xs-12">
												
												<?php echo wp_kses_post( the_field( 'project_gallery_content' ) ); ?>

											</div><!-- .col -->

										</div><!-- .row -->

									</div><!-- .project-content-area -->

								<?php endif; ?>

							<?php endif; ?>

						</div><!-- .col -->

						<div class="col-md-6 col-md-pull-6">

							<div class="project-desc">

								<?php if ( have_posts() ) :

									while ( have_posts() ) : the_post();

										the_content();

									endwhile; ?>

								<?php else :

									get_template_part( 'parts/content/content', 'none' );

								endif; ?>

							</div><!-- .project-desc -->

						</div><!-- .col -->

					</div><!-- .row -->

					<div class="row">
						
						<div class="col-md-12">
								
							<nav class="project-navigation" role="navigation">
	
								<?php previous_post_link( '%link', wp_kses_post( '<i class="fa fa-caret-left"></i> Previous', 'terri' ) ); ?>

								<span></span>
		
								<?php next_post_link( '%link', wp_kses_post( 'Next <i class="fa fa-caret-right"></i>', 'terri' ) ); ?>

							</nav><!-- .project-navigation -->

						</div><!-- .col -->

					</div><!-- .row -->

				</div><!-- .page-content -->

			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
