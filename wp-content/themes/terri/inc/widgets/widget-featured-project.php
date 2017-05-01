<?php

class DC_Feature_Project extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Featured Project', 'terri'),
			array(
				'description' => esc_html__( 'A featured project widget', 'terri' ),
				'classname'   => 'devclick-featured-project'
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

		$page_id = $instance['page_id'];

		if ( $page_id ) :
			$page = (array) get_post( $page_id );
		endif;

		// Get permalink from page ID
		$page['url'] = get_permalink( $page_id );

		// Get post thumbnail and sizes from page ID
		$image            = get_post_thumbnail_id( $page_id );
		$image_src_small  = wp_get_attachment_image_src( $image, 'terri-col-small' );
		$image_src_medium = wp_get_attachment_image_src( $image, 'terri-col-medium' );
		$image_src_large  = wp_get_attachment_image_src( $image, 'terri-col-large' );

		$project_link     = isset( $instance['project_link'] ) ? $instance['project_link'] : 'View Project';

		// Get image alt
		$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
		if ( !empty( $image_alt ) ) {

			$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
		}
		
		echo $args['before_widget']; ?>

			<?php if ( 'on' == $instance[ 'top_bottom_margin' ] && 'on' == $instance[ 'border_radius' ] ) : ?>

				<div class="featured-project featured-project-margin featured-project-br">

			<?php elseif ( 'on' == $instance[ 'top_bottom_margin' ] ) : ?>

				<div class="featured-project featured-project-margin">

			<?php elseif ( 'on' == $instance[ 'border_radius' ] ) : ?>

				<div class="featured-project featured-project-br">

			<?php else : ?>

				<div class="featured-project">

			<?php endif; ?>

				<a href="<?php echo esc_url_raw( $page['url'] ); ?>">

					<div class="featured-project-inner">

						<div class="featured-project-overlay"></div><!-- .featured-project-overlay -->

						<div class="featured-project-title">

							<h3><?php echo esc_attr( $page['post_title'] ); ?></h3>

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

		$instance['page_id']           = absint( $new_instance['page_id'] );
		$instance['border_radius']     = ! empty( $new_instance['border_radius'] ) ? sanitize_key( $new_instance['border_radius'] ) : '';
		$instance['top_bottom_margin'] = ! empty( $new_instance['top_bottom_margin'] ) ? sanitize_key( $new_instance['top_bottom_margin'] ) : '';
		$instance['project_link']      = sanitize_text_field( $new_instance['project_link'] );

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

		$page_id           = empty( $instance['page_id'] ) ? 0 : (int) $instance['page_id'];
		$border_radius     = empty( $instance['border_radius'] ) ? '' : $instance['border_radius'];
		$top_bottom_margin = empty( $instance['top_bottom_margin'] ) ? '' : $instance['top_bottom_margin'];
		$project_link      = isset( $instance['project_link'] ) ? $instance['project_link'] : 'View Project';

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select a project', 'terri' ); ?></label>

			<select style="min-width: 174px;" id='<?php echo $this->get_field_id( 'page_id' ); ?>' name="<?php echo $this->get_field_name( 'page_id' ); ?>">
				<?php $args=array(
					'post_type' => 'project',
					'posts_per_page' => -1
				);
				$wp_query = new WP_Query($args);

				if($wp_query->have_posts()):

					while($wp_query->have_posts()):$wp_query->the_post(); ?>

						<option value="<?php echo get_the_ID();?>" <?php echo ($instance['page_id']==get_the_ID())?'selected':''; ?>><?php the_title();?></option>

					<?php endwhile;

				endif;?>
			</select>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $border_radius, 'on'); ?> id="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'border_radius' ) ); ?>" value="on" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'border_radius' ) ); ?>"><?php esc_html_e( 'Add border radius for this widget', 'terri' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $top_bottom_margin, 'on'); ?> id="<?php echo esc_attr( $this->get_field_id( 'top_bottom_margin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'top_bottom_margin' ) ); ?>" value="on" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'top_bottom_margin' ) ); ?>"><?php esc_html_e('Top/bottom margin for this widget', 'terri' ); ?></label>
			<div>
				<?php esc_html_e( 'Note: Checking this will only remove the margin on the top and bottom of the widget. If you want to remove the margin on the left and right for all the widgets in the row you need to come out of this edit screen and click on the spanner for this row then select Layout and add 0 to the Gutter field.', 'terri' ); ?>
			</div>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'project_link' ) ); ?>"><?php esc_html_e( 'Project Link Text', 'terri' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'project_link') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'project_link' ) ); ?>" value="<?php echo esc_attr( $project_link ); ?>" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Feature_Project" );' ) );