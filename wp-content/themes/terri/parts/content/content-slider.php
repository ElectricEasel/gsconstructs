<?php
/**
 * Template part for front page slider.
 *
 *
 * @package Terri
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="front-page-slider">

	<?php
	
		$rtl_slider = '';
		$slider_overlay_colour = '';
		$slider_overlay_opacity = '';
		$slider_image = '';
		$button_one_link_style = '';
		$button_two_link_style = '';

		// RTL slider
		if ( get_field( 'rtl_slider' ) ) {
			$rtl_slider = 'dir=rtl';
		}

	?>


	<div class="swiper-container" <?php echo esc_attr( $rtl_slider ); ?>>
		
		<div class="swiper-wrapper">

			<?php

				if ( have_rows( 'slider_slide' ) ) :

					while ( have_rows('slider_slide') ) : the_row();

						// Slider image
						if ( get_sub_field( 'slider_background_image' ) ) {
							$slider_image = 'background-image: url(' . get_sub_field( 'slider_background_image' ) . ');';
						}

						// Slider overlay
						if ( get_field( 'slider_overlay' ) ) {

							if ( get_field( 'slider_overlay_colour' ) ) {
								$slider_overlay_colour = 'background-color:' . get_field( 'slider_overlay_colour' ) . ';';
							}

							if ( get_field( 'slider_overlay_opacity' ) ) {
								$slider_overlay_opacity = 'opacity:' . get_field( 'slider_overlay_opacity' ) . ';';
							}
						} ?>

						<div class="swiper-slide" style="<?php echo esc_attr( $slider_image ); ?>">

							<div class="slider-overlay" style="<?php echo esc_attr( $slider_overlay_colour ); ?> <?php echo esc_attr( $slider_overlay_opacity ); ?>"></div><!-- .slider-overlay -->

							<div class="slider-content" data-swiper-parallax="-1000">
								<div class="slider-inner clear">

									<div class="slider-inner-content">

										<?php if ( get_sub_field( 'slider_sub_title' ) ) : ?>
											<span class="subtitle"><?php echo esc_attr( the_sub_field( 'slider_sub_title' ) ); ?></span>
										<?php endif; ?>

										<?php if ( get_sub_field( 'slider_title' ) ) : ?>
											<h1><?php echo wp_kses_post( the_sub_field( 'slider_title' ) ); ?></h1>
										<?php endif; ?>

										<?php
											if ( get_sub_field( 'slider_link_one_style' ) == 'Colour' ) {
												$button_one_link_style = 'btn-colour';
											} elseif ( get_sub_field( 'slider_link_one_style' ) == 'Border' ) {
												$button_one_link_style = 'btn-border';
											}
										?>

										<?php if ( get_sub_field( 'slider_show_buttons' ) == 'One Button' || get_sub_field( 'slider_show_buttons' ) == 'Two Buttons' ) : ?>
											<?php if ( get_sub_field( 'slider_link_one_internal_link' ) ) : ?>
												<a href="<?php echo esc_url( get_sub_field( 'slider_link_one_internal_link' ) ); ?>" class="<?php echo esc_attr( $button_one_link_style ); ?>" title="<?php echo esc_attr( get_sub_field( 'slider_link_one_text' ) ); ?>"><?php echo esc_attr( get_sub_field( 'slider_link_one_text' ) ); ?></a>
											<?php elseif ( get_sub_field( 'slider_link_one_external_link' ) ) : ?>
												<a href="<?php echo esc_url( get_sub_field( 'slider_link_one_external_link' ) ); ?>" class="<?php echo esc_attr( $button_one_link_style ); ?>" title="<?php echo esc_attr( get_sub_field( 'slider_link_one_text' ) ); ?>" target="_blank"><?php echo esc_attr( get_sub_field( 'slider_link_one_text' ) ); ?></a>
											<?php endif; ?>
										<?php endif; ?>

										<?php
											if ( get_sub_field( 'slider_link_two_style' ) == 'Colour' ) {
												$button_two_link_style = 'btn-colour';
											} elseif ( get_sub_field( 'slider_link_two_style' ) == 'Border' ) {
												$button_two_link_style = 'btn-border';
											}
										?>

										<?php if ( get_sub_field( 'slider_show_buttons' ) == 'Two Buttons' ) : ?>
											<?php if ( get_sub_field( 'slider_link_two_internal_link' ) ) : ?>
												<a href="<?php echo esc_url( get_sub_field( 'slider_link_two_internal_link' ) ); ?>" class="<?php echo esc_attr( $button_two_link_style ); ?>" title="<?php echo esc_attr( get_sub_field( 'slider_link_two_text' ) ); ?>"><?php echo esc_attr( get_sub_field( 'slider_link_two_text' ) ); ?></a>
											<?php elseif ( get_sub_field( 'slider_link_two_external_link' ) ) : ?>
												<a href="<?php echo esc_url( get_sub_field( 'slider_link_two_external_link' ) ); ?>" class="<?php echo esc_attr( $button_two_link_style ); ?>" title="<?php echo esc_attr( get_sub_field( 'slider_link_two_text' ) ); ?>" target="_blank"><?php echo esc_attr( get_sub_field( 'slider_link_two_text' ) ); ?></a>
											<?php endif; ?>
										<?php endif; ?>

									</div><!-- .slider-inner-content -->

									<?php if ( get_sub_field( 'slider_show_form' ) ) : ?>

										<?php if ( get_sub_field( 'slider_callback_form' ) ) : ?>

											<div class="slider-inner-form">
										
												<?php echo wp_kses_post( the_sub_field( 'slider_callback_form' ) ); ?>

											</div><!-- .slider-inner-form -->

										<?php endif; ?>

									<?php endif; ?>

								</div><!-- .slider-inner -->
							</div><!-- .slider-content -->

						</div><!-- .swiper-slide -->

				<?php endwhile;

				else :

					// No rows found

				endif;

			?>

		</div><!-- .swiper-wrapper -->


		<?php $count_slides = count( get_field( 'slider_slide' ) );
		if ( $count_slides > 1 ) : ?>
			<div class="swiper-pagination"></div><!-- .swiper-pagination -->
			<div class="swiper-button-prev"></div><!-- .swiper-button-prev -->
			<div class="swiper-button-next"></div><!-- .swiper-button-next -->
		<?php endif; ?>

	</div><!-- .swiper-container -->

	<?php
		$slider_effect = get_field( 'slider_effect' );
		if ( $slider_effect ) { 
			$slider_effect = get_field( 'slider_effect' );
		} else {
			$slider_effect = 'slide';
		}

		$slider_speed = get_field( 'slider_transition_speed' );
		if ( $slider_speed ) { 
			$slider_speed = get_field( 'slider_transition_speed' );
		} else {
			$slider_speed = '700';
		}

		$slider_autocycle = get_field( 'slider_auto_cycle' );
		if ( $slider_autocycle === false ) { 
			$slider_autocycle = get_field( 'slider_auto_cycle' );
		} else {
			$slider_autocycle = true;
		}

		$slider_interval = get_field( 'slider_cycle_interval' );
		if ( $slider_interval ) { 
			$slider_interval = get_field( 'slider_cycle_interval' );
		} else {
			$slider_interval = '3000';
		}
	?>

	<script>
		jQuery(document).ready(function ($) {

			"use strict"

			var mySwiper = new Swiper ('.swiper-container', {
				direction: 'horizontal',
				loop: false,
				pagination: '.swiper-pagination',
				paginationType: 'progress',
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				parallax: true,
				effect: '<?php echo esc_attr( $slider_effect ); ?>',
				speed: <?php echo esc_attr( $slider_speed ); ?>,
				<?php if ( $slider_autocycle === true ) : ?>autoplay: <?php echo esc_attr( $slider_interval ); ?>, <?php endif; ?>
			});
		});
	</script>

</div><!-- .front-page-slider -->