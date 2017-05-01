<?php
/**
 * The template for displaying project archive pages.
 *
 * @package Terri
 *
 * @since Terri 1.1.4
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<div class="row">
					
					<div class="page-content">
						
						<div id="portfolio">
					
							<?php

								$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

								$tax = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => -1, 'project-category' => $term->slug ) );

								while ( $tax->have_posts() ) : $tax->the_post();

									get_template_part( 'parts/content/content', 'portfolio' );

								endwhile;

								wp_reset_postdata();
								
							?>

						</div><!-- #portfolio -->
						
					</div><!-- .page-content -->

				</div><!-- .row -->
			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>