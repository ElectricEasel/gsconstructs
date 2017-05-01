<?php
/**
 * Template part for page title.
 *
 *
 * @package Terri
 */
?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php

	$page_title                          = '';
	$page_subtitle                       = '';
	$page_title_colour                   = '';
	$page_subtitle_colour                = '';
	$page_title_background_image         = '';
	$page_title_image_type               = '';
	$page_title_background_image_overlay = '';
	$page_title_background_colour        = '';

	if ( is_home() && !is_front_page() ) {

		$page_title                   = get_theme_mod( 'devclick_blog_home_title', 'Blog title' );
		$page_subtitle                = get_theme_mod( 'devclick_blog_home_subtitle', 'Blog subtitle' );
		$page_title_colour            = get_theme_mod( 'devclick_blog_home_title_colour', '#000000' );
		$page_subtitle_colour         = get_theme_mod( 'devclick_blog_home_subtitle_colour', '#FAB709' );
		$page_title_background_image  = get_theme_mod( 'devclick_blog_home_image' );
		$page_title_background_colour = get_theme_mod( 'devclick_blog_home_background_colour' );

		if ( get_theme_mod( 'devclick_blog_home_page_title_image_overlay', 'No' ) != 'no' ) {

			$page_title_background_image_overlay = get_theme_mod( 'devclick_blog_home_page_title_image_overlay' );

		}

		if ( get_theme_mod( 'devclick_blog_home_background_image_type', 'No' ) != 'pattern' ) {

			$page_title_image_type = get_theme_mod( 'devclick_blog_home_background_image_type' );

		}

	} elseif ( is_home() && is_front_page() ) {

		if ( get_theme_mod( 'devclick_blog_home_title' ) ) {

			$page_title = get_theme_mod( 'devclick_blog_home_title', 'Blog' );

		} else {

			$page_title = get_bloginfo( 'name' );

		}

		if ( get_theme_mod( 'devclick_blog_home_subtitle' ) ) {

			$page_subtitle = get_theme_mod( 'devclick_blog_home_subtitle', 'Blog' );

		} else {

			$page_subtitle = get_bloginfo( 'description' );

		}

		$page_title_background_image = get_theme_mod( 'devclick_blog_home_image' );

		if ( get_theme_mod( 'devclick_blog_home_page_title_image_overlay', 'No' ) != 'no' ) {

			$page_title_background_image_overlay = get_theme_mod( 'devclick_blog_home_page_title_image_overlay' );

		}

		if ( get_theme_mod( 'devclick_blog_home_background_image_type' ) != 'pattern' ) {

			$page_title_image_type = get_theme_mod( 'devclick_blog_home_background_image_type' );

		}

		$page_title_colour            = get_theme_mod( 'devclick_blog_home_title_colour', '#000000' );
		$page_subtitle_colour         = get_theme_mod( 'devclick_blog_home_subtitle_colour', '#FAB709' );
		$page_title_background_colour = get_theme_mod( 'devclick_blog_home_background_colour' );

	} elseif ( is_singular( 'post' ) ) {

		if ( get_post_meta( get_the_ID(), 'page_title', true ) ) {

			$page_title = get_post_meta( get_the_ID(), 'page_title', true );

		} else {

			$page_title = get_the_title();

		}

		$page_subtitle                = get_post_meta( get_the_ID(), 'page_subtitle', true );
		$page_title_colour            = get_post_meta( get_the_ID(), 'page_title_colour', true );
		$page_subtitle_colour         = get_post_meta( get_the_ID(), 'page_subtitle_colour', true );
		$page_title_background_image  = get_field( 'page_title_background_image' );
		$page_title_background_colour = get_post_meta( get_the_ID(), 'page_title_background_colour', true );

		if ( true == get_post_meta( get_the_ID(), 'page_title_background_image_overlay', true ) ) {

			$page_title_background_image_overlay = true == get_post_meta( get_the_ID(), 'page_title_background_image_overlay', true );

		}

		if ( 'large_image' == get_post_meta( get_the_ID(), 'page_title_background_image_type', true ) ) {

			$page_title_image_type = 'large_image' == get_post_meta( get_the_ID(), 'page_title_background_image_type', true );

		}

	} elseif ( is_singular( 'project' ) ) {

		if ( get_post_meta( get_the_ID(), 'page_title', true ) ) {

			$page_title = get_post_meta( get_the_ID(), 'page_title', true );

		} else {

			$page_title = get_the_title();

		}

		$page_subtitle                = get_post_meta( get_the_ID(), 'page_subtitle', true );
		$page_title_colour            = get_post_meta( get_the_ID(), 'page_title_colour', true );
		$page_subtitle_colour         = get_post_meta( get_the_ID(), 'page_subtitle_colour', true );
		$page_title_background_image  = get_field( 'page_title_background_image' );
		$page_title_background_colour = get_post_meta( get_the_ID(), 'page_title_background_colour', true );

		if ( true == get_post_meta( get_the_ID(), 'page_title_background_image_overlay', true ) ) {

			$page_title_background_image_overlay = true == get_post_meta( get_the_ID(), 'page_title_background_image_overlay', true );

		}

		if ( 'large_image' == get_post_meta( get_the_ID(), 'page_title_background_image_type', true ) ) {

			$page_title_image_type = 'large_image' == get_post_meta( get_the_ID(), 'page_title_background_image_type', true );

		}

	} elseif ( is_404() ) {

		$page_title                   = get_theme_mod( 'devclick_404_title', 'Error 404' );
		$page_subtitle                = get_theme_mod( 'devclick_404_subtitle', 'Something has gone wrong' );
		$page_title_colour            = get_theme_mod( 'devclick_404_title_colour', '#000000' );
		$page_subtitle_colour         = get_theme_mod( 'devclick_404_subtitle_colour', '#FAB709' );
		$page_title_background_image  = get_theme_mod( 'devclick_404_page_title_background_image' );
		$page_title_background_colour = get_theme_mod( 'devclick_search_page_title_background_colour' );

		if ( get_theme_mod( 'devclick_404_page_title_image_overlay', 'No' ) != 'no' ) {

			$page_title_background_image_overlay = get_theme_mod( 'devclick_404_page_title_image_overlay' );

		}

		if ( get_theme_mod( 'devclick_404_page_title_background_image_type', 'No' ) != 'pattern' ) {

			$page_title_image_type = get_theme_mod( 'devclick_404_page_title_background_image_type' );

		}

	} elseif ( is_search() ) {

		$page_title                   = get_search_query();
		$page_subtitle                = esc_html__( 'Search results for: ', 'terri' );
		$page_title_colour            = get_theme_mod( 'devclick_search_title_colour', '#000000' );
		$page_subtitle_colour         = get_theme_mod( 'devclick_search_subtitle_colour', '#FAB709' );
		$page_title_background_image  = get_theme_mod( 'devclick_search_page_title_background_image' );
		$page_title_background_colour = get_theme_mod( 'devclick_search_page_title_background_colour' );

		if ( get_theme_mod( 'devclick_search_page_title_image_overlay', 'No' ) != 'no' ) {

			$page_title_background_image_overlay = get_theme_mod( 'devclick_search_page_title_image_overlay' );

		}

		if ( get_theme_mod( 'devclick_search_page_title_background_image_type', 'No' ) != 'pattern' ) {

			$page_title_image_type = get_theme_mod( 'devclick_search_page_title_background_image_type' );

		}
		
	} else if ( is_archive() ) {

		$page_title                   = get_the_archive_title();
		$page_title_colour            = get_theme_mod( 'devclick_archive_title_colour', '#000000' );
		$page_title_background_image  = get_theme_mod( 'devclick_archive_page_title_background_image' );
		$page_title_background_colour = get_theme_mod( 'devclick_archive_page_title_background_colour' );

		if ( get_theme_mod( 'devclick_archive_page_title_image_overlay', 'No' ) != 'no' ) {

			$page_title_background_image_overlay = get_theme_mod( 'devclick_archive_page_title_image_overlay' );

		}

		if ( get_theme_mod( 'devclick_archive_page_title_background_image_type', 'No' ) != 'pattern' ) {

			$page_title_image_type = get_theme_mod( 'devclick_archive_page_title_background_image_type' );

		}

	} elseif ( is_attachment() ) {

		$page_title = get_the_title();

	} else {

		if ( get_post_meta( get_the_ID(), 'page_title', true ) ) {

			$page_title = get_post_meta( get_the_ID(), 'page_title', true );

		} else {

			$page_title = get_the_title();

		}

		$page_subtitle                = get_post_meta( get_the_ID(), 'page_subtitle', true );
		$page_title_colour            = get_post_meta( get_the_ID(), 'page_title_colour', true );
		$page_subtitle_colour         = get_post_meta( get_the_ID(), 'page_subtitle_colour', true );
		$page_title_background_image  = get_field( 'page_title_background_image' );
		$page_title_background_colour = get_post_meta( get_the_ID(), 'page_title_background_colour', true );

		if ( true == get_post_meta( get_the_ID(), 'page_title_background_image_overlay', true ) ) {

			$page_title_background_image_overlay = true == get_post_meta( get_the_ID(), 'page_title_background_image_overlay', true );

		}

		if ( 'large_image' == get_post_meta( get_the_ID(), 'page_title_background_image_type', true ) ) {

			$page_title_image_type = 'large_image' == get_post_meta( get_the_ID(), 'page_title_background_image_type', true );

		}

	}
	
	if ( $page_title_background_image && $page_title_background_image_overlay && $page_title_image_type ) : ?>

		<div class="page-header bg-image overlay" style="background-image: url('<?php echo esc_url( $page_title_background_image ); ?>');">

	<?php elseif ( $page_title_background_image && $page_title_background_image_overlay && !$page_title_image_type ) : ?>

		<div class="page-header bg-pattern overlay" style="background-image: url('<?php echo esc_url( $page_title_background_image ); ?>');">

	<?php elseif ( $page_title_background_image && !$page_title_image_type ) : ?>

		<div class="page-header bg-pattern" style="background-image: url('<?php echo esc_url( $page_title_background_image ); ?>');">

	<?php elseif ( $page_title_background_image && $page_title_image_type || $page_title_background_image ) : ?>

		<div class="page-header bg-image" style="background-image: url('<?php echo esc_url( $page_title_background_image ); ?>');">

	<?php elseif ( $page_title_background_colour ) : ?>

		<div class="page-header" style="background-color: <?php echo esc_attr( $page_title_background_colour ); ?>;">

	<?php else : ?>

		<div class="page-header">

	<?php endif; ?>

		<?php if ( get_field( 'page_title_size' ) == 'large' ) : ?>

			<div class="page-header-size page-header-large">

		<?php else : ?>

			<div class="page-header-size">

		<?php endif; ?>

			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<?php if ( get_field( 'page_title_text_align' ) == 'Left' ) : ?>

							<div class="page-header-inner" style="text-align: left;">

						<?php elseif ( get_field( 'page_title_text_align' ) == 'Centre' ) : ?>

							<div class="page-header-inner" style="text-align: center;">

						<?php elseif ( get_field( 'page_title_text_align' ) == 'Right' ) : ?>

							<div class="page-header-inner" style="text-align: right;">

						<?php else : ?>

							<div class="page-header-inner">

						<?php endif; ?>

							<?php if ( $page_subtitle ) : ?>

								<span style="color: <?php echo esc_attr( $page_subtitle_colour ); ?>"><?php echo wp_kses_post( $page_subtitle ); ?></span>

							<?php endif; ?>
							
							<h1 style="color: <?php echo esc_attr( $page_title_colour ); ?>"><?php echo wp_kses_post( $page_title ); ?></h1>

						</div><!-- .page-header-inner -->

					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->

		</div><!-- .page-header-size -->

	</div><!-- .page-header -->

	<?php get_template_part( 'parts/content/content', 'breadcrumbs' ); ?>

	