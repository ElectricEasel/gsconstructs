<?php
/**
 * Template part for displaying portfolio content.
 *
 * @package Terri
 *
 * @since Terri 1.1.4
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'featured-project-wrapper portfolio-item col-xs-12 col-md-4' ); ?>>

	<div class="featured-project">

		<a href="<?php echo esc_url( the_permalink() ); ?>">

			<div class="featured-project-inner">

				<div class="featured-project-overlay"></div><!-- .featured-project-overlay -->

				<div class="featured-project-title">

					<h3><?php the_title(); ?></h3>
					
					<span><?php echo wp_kses_post( get_theme_mod( 'devclick_project_category_link_text', 'View Project' ) ); ?></span>

				</div><!-- .featured-project-title -->

			</div><!-- .featured-project-inner -->

			<?php the_post_thumbnail( 'terri-col-medium' ); ?>

		</a>

	</div><!-- .featured-project -->

</div><!-- .col -->