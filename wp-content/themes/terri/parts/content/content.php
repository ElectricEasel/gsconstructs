<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Terri
 */

?>

<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<div class="post-content">
		
		<?php if( has_post_thumbnail() ) : ?>

			<div class="post-thumbnail">

				<?php if ( is_single() ) : ?>

					<?php the_post_thumbnail( 'post-thumbnail' ); ?>

				<?php else : ?>

					<a href="<?php esc_url( the_permalink() ); ?>">

						<?php the_post_thumbnail( 'post-thumbnail' ); ?>

					</a>

				<?php endif; ?>

			</div><!-- .post-thumbnail -->

		<?php endif; ?>

		<h2 class="post-title">

			<?php if ( is_single() ) : ?>

				<?php the_title(); ?>

			<?php else : ?>

				<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>

			<?php endif; ?>

		</h2><!-- .post-title -->

		<div class="post-meta">

			<a href="<?php esc_url( the_permalink() ); ?>">
				<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span><!-- .post-date -->
			</a>

			<?php if ( has_category() ) : ?>

				<span class="post-category"><?php the_category( ', ' ); ?></span><!-- .post-category -->

			<?php endif; ?>

			<span class="post-comment">
				<a href="<?php esc_url( comments_link() ); ?>"><?php echo esc_attr( get_comments_number() ); ?> <?php echo esc_html_e( 'Comments', 'terri' ); ?></a>
			</span><!-- .post-comments -->

		</div><!-- .post-meta -->

		<?php
			the_content( sprintf(
			wp_kses( __( 'Read more %s', 'terri' ), array( 'span' => array( 'class' => array( 'read more' ) ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'terri' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>

		<?php if ( is_single() ) : ?>

			<?php if ( has_tag() ) : ?>

				<div class="entry-tags">

					<i class="fa fa-tags"></i>
					<?php the_tags( '' ); ?>

				</div><!-- .entry-tags -->

			<?php endif; ?>

		<?php endif; ?>

	</div><!-- .post-content -->

</article><!-- #post-## -->

