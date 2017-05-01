<?php
/**
 * Template part for breadcrumbs.
 *
 * @package Terri
 */

?>

<?php if( function_exists('bcn_display') && ! is_front_page() ) : ?>

	<div class="breadcrumbs">
		<div class="container">	

			<?php bcn_display(); ?>

		</div><!-- .container -->
	</div><!-- .breadcrumbs -->

<?php endif; ?>
