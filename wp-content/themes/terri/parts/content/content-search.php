<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terri
 */

?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>


<li>
		
	<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<a href="<?php the_permalink(); ?>">
		<i class="fa fa-link"></i>
	</a>

</li>

