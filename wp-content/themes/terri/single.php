<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Terri
 */
?>

<?php get_header(); ?>

<?php

	if ( function_exists( 'get_field' ) ) {

		$sidebar = get_field( 'show_hide_sidebar' );

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
							
							<?php 

								while ( have_posts() ) : the_post();

									get_template_part( 'parts/content/content', get_post_format() ); 


									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile;

							?>

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
