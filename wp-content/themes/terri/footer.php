<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Terri
 */

?>

<?php

	$devclick_footer_background_colour   = get_theme_mod( 'devclick_footer_background_colour', '#000000' );
	$devclick_footer_background_pattern  = get_theme_mod( 'devclick_footer_background_pattern' );
	$devclick_footer_background_image    = get_theme_mod( 'devclick_footer_background_image' );
	$devclick_footer_overlay             = get_theme_mod( 'devclick_footer_overlay', 'yes' );

	if ( $devclick_footer_background_image && $devclick_footer_overlay == 'yes' ) : ?>

		<footer class="site-footer bg-image overlay" style="background-image: url('<?php echo esc_url( $devclick_footer_background_image ); ?>');">

	<?php elseif ( $devclick_footer_background_image ) : ?>

		<footer class="site-footer bg-image" style="background-image: url('<?php echo esc_url( $devclick_footer_background_image ); ?>');">

	<?php elseif ( $devclick_footer_background_pattern ) : ?>

		<footer class="site-footer bg-pattern" style="background-image: url('<?php echo esc_url( $devclick_footer_background_pattern ); ?>');">

	<?php elseif ( $devclick_footer_background_colour ) : ?>

		<footer class="site-footer" style="background-color: <?php echo esc_attr( $devclick_footer_background_colour ); ?>;">

	<?php else : ?>

		<footer class="site-footer">

	<?php endif; ?>

			<div class="top-footer">
				<div class="container">
					<div class="row">
						
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<?php get_sidebar('footer'); ?>
						<?php endif; ?>

					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .top-footer -->

			<div class="bottom-footer">
				<div class="container">
					<div class="row">
						
						<div class="col-md-6">
							<div class="footer-bottom-left">

								<p><?php echo wp_kses_post( get_theme_mod( 'devclick_footer_bottom_left' ) ); ?></p>

							</div><!-- .footer-bottom-left -->
						</div><!-- .col -->

						<div class="col-md-6">
							<div class="footer-bottom-right">

								<p><?php echo wp_kses_post( get_theme_mod( 'devclick_footer_bottom_right' ) ); ?></p>

							</div><!-- .footer-bottom-right -->
						</div><!-- .col -->

					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .bottom-footer -->

		</footer><!-- .site-footer -->

	</div><!-- .page-wrap-inner -->
	
</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>