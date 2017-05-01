<?php

class DC_Icon_Box extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Icon Box', 'terri'),
			array(
				'description' => esc_html__( 'An icon box widget', 'terri' ),
				'classname'   => 'devclick-icon-box'
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

		echo $args['before_widget']; ?>

			<div class="icon-box <?php echo esc_attr( $instance['style'] ); ?>">

				<?php if ( ! empty ( $instance['link'] ) ) : ?>

					<a href="<?php echo esc_url_raw( $instance['link'] ); ?>" title="<?php echo wp_kses_post( $instance['title'] ); ?>">

				<?php endif; ?>

				<div class="icon-box-icon">
					<i class="fa <?php echo esc_attr( $instance['icon'] ); ?>"></i>
				</div><!-- .icon-box-icon -->

				<div class="icon-box-content">
					<h4><?php echo wp_kses_post( $instance['title'] ); ?></h4>

					<p><?php echo wp_kses_post( $instance['text'] ); ?></p>
				</div><!-- .icon-box-content -->

				<?php if ( ! empty ( $instance['link'] ) ) : ?>

					</a>

				<?php endif; ?>

			</div><!-- .icon-box -->

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

		$instance['icon']  = sanitize_key( $new_instance['icon'] );
		$instance['title'] = wp_kses_post( $new_instance['title'] );
		$instance['text']  = wp_kses_post( $new_instance['text'] );
		$instance['link']  = esc_url_raw( $new_instance['link'] );
		$instance['style'] = sanitize_key( $new_instance['style'] );

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

		$icon  = empty( $instance['icon'] ) ? '' : $instance['icon'];
		$title = empty( $instance['title'] ) ? '' : $instance['title'];
		$text  = empty( $instance['text'] ) ? '' : $instance['text'];
		$link  = empty( $instance['link'] ) ? '' : $instance['link'];
		$style = empty( $instance['style'] ) ? '' : $instance['style'];
		
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Icon', 'terri' ); ?>: <?php printf( esc_html__( 'Check out %s for icon classes (example: fa-twitter)', 'terri' ), '<a href="'. esc_url( 'http://fontawesome.io/icons/' ) .'" target="_blank">FontAwesome</a>' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Text', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Style:', 'terri' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
				<option value="icon-box-style-one" <?php selected( $style, 'icon-box-style-one' ); ?>><?php esc_html_e( 'Style 1', 'terri' ); ?></option>
				<option value="icon-box-style-two" <?php selected( $style, 'icon-box-style-two' ); ?>><?php esc_html_e( 'Style 2', 'terri' ); ?></option>
				<option value="icon-box-style-three" <?php selected( $style, 'icon-box-style-three' ); ?>><?php esc_html_e( 'Style 3', 'terri' ); ?></option>
			</select>
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Icon_Box" );' ) );