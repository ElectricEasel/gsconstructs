<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terri
 */

?>

<?php

if ( paginate_links() ) :

	global $wp_query; ?>

	<nav class="pagination clear">

		<?php	

			$big = 999999999;

			echo paginate_links( array(
				'base' 		=> str_replace( $big, '%#%', get_pagenum_link( $big ) ),
				'format' 	=> '?paged=%#%',
				'current' 	=> max( 1, get_query_var( 'paged' ) ),
				'total' 	=> $wp_query->max_num_pages,
				'type' 		=> '',
				'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
				'next_text' => '<i class="fa fa-long-arrow-right"></i>'
			) );
		?>

	</nav>

<?php endif; ?>
