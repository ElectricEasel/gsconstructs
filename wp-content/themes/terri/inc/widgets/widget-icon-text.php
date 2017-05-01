<?php

class DC_Icon_Text extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Icon Text', 'terri'),
			array(
				'description' => esc_html__( 'A simple widget to display an icon with text', 'terri' ),
				'classname'   => 'devclick-icon-text'
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

			<div class="icon-text">

				<i class="fa <?php echo esc_attr( $instance['icon'] ); ?>"></i>

				<span><?php echo wp_kses_post( $instance['text'] ); ?></span>
	
			</div><!-- .icon-text -->

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

		$instance['icon'] = sanitize_key( $new_instance['icon'] );
		$instance['text'] = wp_kses_post( $new_instance['text'] );

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

		$icon = empty( $instance['icon'] ) ? '' : $instance['icon'];
		$text = empty( $instance['text'] ) ? '' : $instance['text'];
		
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Icon', 'terri' ); ?>: <?php printf( esc_html__( 'Check out %s for icon classes (example: fa-twitter)', 'terri' ), '<a href="'. esc_url( 'http://fontawesome.io/icons/' ) .'" target="_blank">FontAwesome</a>' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Text', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Icon_Text" );' ) );