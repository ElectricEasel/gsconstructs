<?php
/**
 * The sidebar containing the footer widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Terri
 */
?>

<?php

	$footer_widget_areas = get_theme_mod( 'devclick_footer_widgets', '4' );

	if ( $footer_widget_areas == '4' ) {
		$cols = '3';
	} elseif ( $footer_widget_areas == '3' ) {
		$cols = '4';
	} elseif ( $footer_widget_areas == '2' ) {
		$cols = '6';
	} else {
		$cols = '12';
	}
	
?>

<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
	<div class="col-md-<?php echo esc_attr( $cols ); ?>">
		<?php dynamic_sidebar( 'footer-1'); ?>
	</div>
<?php endif; ?>	

<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
	<div class="col-md-<?php echo esc_attr( $cols ); ?>">
		<?php dynamic_sidebar( 'footer-2'); ?>
	</div>
<?php endif; ?>	

<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
	<div class="col-md-<?php echo esc_attr( $cols ); ?>">
		<?php dynamic_sidebar( 'footer-3'); ?>
	</div>
<?php endif; ?>	

<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
	<div class="col-md-<?php echo esc_attr( $cols ); ?>">
		<?php dynamic_sidebar( 'footer-4'); ?>
	</div>
<?php endif; ?>	