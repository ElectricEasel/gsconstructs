<?php

class DC_Projects_List extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(

			false,
			esc_html__('Devclick Projects List', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display all projects in a list', 'terri' ),
				'classname'   => 'devclick-projects-list'
			)

		);
	}





	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$columns      = absint( $instance['columns'] );
		$calc_columns = round( 12 / $columns );

		$project_link = isset( $instance['project_link'] ) ? $instance['project_link'] : 'View Project';

		$recent_projects_args = array(
			'posts_per_page' => -1,
			'orderby'	     => 'post_date',
			'order'			 => 'DESC',
			'post_type'      => 'project',
			'post_status'    => 'publish'
		);
		
		$recent_projects = new WP_Query( $recent_projects_args );

		echo $args['before_widget']; ?>

			<div class="row">

				<div class="col-md-12">
					
					<div class="project-filter-menu">
						
						<div id="filter" class="project-filter clearfix">

							<a href="#" data-filter="*" class="current"><?php esc_html_e( 'All', 'terri' ); ?></a>

							<?php

								$terms = get_terms( 'project-category' );

								foreach ( $terms as $term ) {
									echo '<a href="#" data-filter=".project-category-' . $term->slug . '">' . $term->name . '</a>';
								}

							?>

						</div><!-- #filter -->

					</div><!-- .project-filter-menu -->

				</div><!-- .col -->

			</div><!-- .row -->

			<div class="row">

				<div id="portfolio">
				

					<?php 

						$counter = $columns;
						$counter++;

						if ( $recent_projects->have_posts() ) : while ( $recent_projects->have_posts() ) : $recent_projects->the_post();

						// Get post thumbnail
						$image            = get_post_thumbnail_id();
						$image_src_small  = wp_get_attachment_image_src( $image, 'terri-col-small' );
						$image_src_medium = wp_get_attachment_image_src( $image, 'terri-col-medium' );
						$image_src_large  = wp_get_attachment_image_src( $image, 'terri-col-large' );

						// Get image alt
						$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
						if ( !empty( $image_alt ) ) {

							$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
						}

					?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( "featured-project-wrapper portfolio-item col-xs-12 col-md-$calc_columns" ); ?>>

						<div class="featured-project">

							<a href="<?php echo esc_url( the_permalink() ); ?>">

								<div class="featured-project-inner">

									<div class="featured-project-overlay"></div><!-- .featured-project-overlay -->

									<div class="featured-project-title">

										<h3><?php the_title(); ?></h3>
										
										<?php if( $project_link ) : ?>
											<span><?php echo esc_attr( $project_link ); ?></span>
										<?php endif; ?>
										
									</div><!-- .featured-project-title -->

								</div><!-- .featured-project-inner -->

								<?php if ( $image ) : ?>
									<img src="<?php echo esc_url( $image_src_small[0] ); ?>" srcset="<?php echo esc_url( $image_src_large[0] ); ?> 1024w, <?php echo esc_url( $image_src_medium[0] ); ?> 640w, <?php echo esc_url( $image_src_small[0] ); ?> 320w" sizes="(min-width: 992px) 40vw, 110vw" alt="<?php echo esc_attr( $image_alt ); ?>">
								<?php endif; ?>

							</a>

						</div><!-- .featured-project -->

					</div><!-- .col -->

					<?php endwhile;

						wp_reset_postdata();

					else : ?>

						<div class="col-md-12">
							<h3><?php esc_html_e( 'No Projects Found', 'terri'  ); ?></h3>
						</div><!-- .col -->

					<?php endif; ?>

				</div><!-- #portfolio -->

			</div><!-- .row -->

		<?php echo $args['after_widget'];

	}





	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['columns']      = absint( $new_instance['columns'] );
		$instance['project_link'] = sanitize_text_field( $new_instance['project_link'] );

		return $instance;
	}




	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$columns      = empty( $instance['columns'] ) ? '3' : $instance['columns'];
		$project_link = isset( $instance['project_link'] ) ? $instance['project_link'] : 'View Project';

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Column in a row', 'terri'  ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>">
			<?php for ( $i=1; $i < 5; $i++ ) : ?>
				<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $columns, $i ); ?>><?php echo esc_attr( $i ); ?></option>
			<?php endfor; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'project_link' ) ); ?>"><?php esc_html_e( 'Project Link Text', 'terri' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'project_link') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'project_link' ) ); ?>" value="<?php echo esc_attr( $project_link ); ?>" />
		</p>


		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Projects_List" );' ) );