<?php
/**
 * Template part for front page banner.
 *
 *
 * @package Terri
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="front-page-banner">

	<?php

		$banner_overlay_colour = '';
		$banner_overlay_opacity = '';
		$banner_image = '';
		$banner_one_link_style = '';
		$banner_two_link_style = '';

	?>

	<div class="banner-container">
		
		<div class="banner-wrapper">

			<?php

				// Banner image
				if ( get_field( 'banner_background_image' ) ) {
					$banner_image = 'background-image: url(' . get_field( 'banner_background_image' ) . ');';
				}

				// Banner overlay
				if ( get_field( 'banner_overlay' ) ) {

					if ( get_field( 'banner_overlay_colour' ) ) {
						$banner_overlay_colour = 'background-color:' . get_field( 'banner_overlay_colour' ) . ';';
					}

					if ( get_field( 'banner_overlay_opacity' ) ) {
						$banner_overlay_opacity = 'opacity:' . get_field( 'banner_overlay_opacity' ) . ';';
					}
				}

			?>

			<div class="banner-slide" style="<?php echo esc_attr( $banner_image ); ?>">
			
				<div class="banner-overlay" style="<?php echo esc_attr( $banner_overlay_colour ); ?> <?php echo esc_attr( $banner_overlay_opacity ); ?>"></div><!-- .banner-overlay -->

				<div class="banner-content" style="transform: translate3d(0px, 0px, 0px);">
					<div class="banner-inner clear">
						
						<div class="banner-inner-content">
							
							<?php if ( get_field( 'banner_sub_title' ) ) : ?>
								<span class="subtitle"><?php echo esc_attr( the_field( 'banner_sub_title' ) ); ?></span>
							<?php endif; ?>

							<?php if ( get_field( 'banner_title' ) ) : ?>
								<h1><?php echo wp_kses_post( the_field( 'banner_title' ) ); ?></h1>
							<?php endif; ?>

							<?php
								if ( get_field( 'banner_link_one_style' ) == 'Colour' ) {
									$button_one_link_style = 'btn-colour';
								} elseif ( get_field( 'banner_link_one_style' ) == 'Border' ) {
									$button_one_link_style = 'btn-border';
								}
							?>

							<?php if ( get_field( 'banner_show_buttons' ) == 'One Button' || get_field( 'banner_show_buttons' ) == 'Two Buttons' ) : ?>
								<?php if ( get_field( 'banner_link_one_internal_link' ) ) : ?>
									<a href="<?php echo esc_url( get_field( 'banner_link_one_internal_link' ) ); ?>" class="<?php echo esc_attr( $button_one_link_style ); ?>" title="<?php echo esc_attr( get_field( 'banner_link_one_text' ) ); ?>"><?php echo esc_attr( get_field( 'banner_link_one_text' ) ); ?></a>
								<?php elseif ( get_field( 'banner_link_one_external_link' ) ) : ?>
									<a href="<?php echo esc_url( get_field( 'banner_link_one_external_link' ) ); ?>" class="<?php echo esc_attr( $button_one_link_style ); ?>" title="<?php echo esc_attr( get_field( 'banner_link_one_text' ) ); ?>" target="_blank"><?php echo esc_attr( get_field( 'banner_link_one_text' ) ); ?></a>
								<?php endif; ?>
							<?php endif; ?>

							<?php
								if ( get_field( 'banner_link_two_style' ) == 'Colour' ) {
									$button_two_link_style = 'btn-colour';
								} elseif ( get_field( 'banner_link_two_style' ) == 'Border' ) {
									$button_two_link_style = 'btn-border';
								}
							?>

							<?php if ( get_field( 'banner_show_buttons' ) == 'Two Buttons' ) : ?>
								<?php if ( get_field( 'banner_link_two_internal_link' ) ) : ?>
									<a href="<?php echo esc_url( get_field( 'banner_link_two_internal_link' ) ); ?>" class="<?php echo esc_attr( $button_two_link_style ); ?>" title="<?php echo esc_attr( get_field( 'banner_link_two_text' ) ); ?>"><?php echo esc_attr( get_field( 'banner_link_two_text' ) ); ?></a>
								<?php elseif ( get_field( 'banner_link_two_external_link' ) ) : ?>
									<a href="<?php echo esc_url( get_field( 'banner_link_two_external_link' ) ); ?>" class="<?php echo esc_attr( $button_two_link_style ); ?>" title="<?php echo esc_attr( get_field( 'banner_link_two_text' ) ); ?>" target="_blank"><?php echo esc_attr( get_field( 'banner_link_two_text' ) ); ?></a>
								<?php endif; ?>
							<?php endif; ?>

						</div><!-- .banner-inner-content -->

						<?php if ( get_field( 'banner_show_form' ) ) : ?>

							<?php if ( get_field( 'banner_callback_form' ) ) : ?>

								<div class="banner-inner-form">
							
									<?php echo wp_kses_post( the_field( 'banner_callback_form' ) ); ?>

								</div><!-- .banner-inner-form -->

							<?php endif; ?>

						<?php endif; ?>

					</div><!-- .banner-inner -->
				</div><!-- .banner-content -->

			</div><!-- .banner-slide -->

		</div><!-- .banner-wrapper -->

	</div><!-- .banner-container -->

</div><!-- .front-page-banner -->