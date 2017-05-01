<?php

class DC_CTA_Small extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(

			false,
			esc_html__('Devclick Call To Action Small', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display a small call to action', 'terri' ),
				'classname'   => 'devclick-cta-small'
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

			<div class="cta cta-small clear">

				<?php if ( ! empty ( $instance['text'] ) ) : ?>

					<p style="color: <?php echo esc_attr( $instance['text_colour'] ); ?>;">
						<?php echo wp_kses_post( $instance['text'] ); ?>
					</p>

				<?php endif; ?>

				<?php if ( ! empty ( $instance['link'] ) && ! empty ( $instance['link_text'] ) ) : ?>

					<div class="cta-link">
						<a href="<?php echo esc_url( $instance['link'] ); ?>" class="btn-border"><?php echo esc_attr( $instance['link_text'] ); ?></a>
					</div><!-- .cta-link -->

				<?php endif; ?>

			</div><!-- .section-title -->

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

		$instance['text']        = wp_kses_post( $new_instance['text'] );
		$instance['text_colour'] = esc_attr( $new_instance['text_colour'] );
		$instance['link']        = esc_url_raw( $new_instance['link'] );
		$instance['link_text']   = sanitize_text_field( $new_instance['link_text'] );

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

		$text        = empty( $instance['text'] ) ? '' : $instance['text'];
		$text_colour = empty( $instance['text_colour'] ) ? '' : $instance['text_colour'];
		$link        = empty( $instance['link'] ) ? '' : $instance['link'];
		$link_text   = empty( $instance['link_text'] ) ? '' : $instance['link_text'];

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Text', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text_colour' ) ); ?>"><?php esc_html_e( 'Text colour:', 'terri' ); ?></label><br>
			<input class="devclick-colour-picker" id="<?php echo esc_attr( $this->get_field_id( 'text_colour' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_colour' ) ); ?>" type="text" value="<?php echo esc_attr( $text_colour ); ?>" data-default-color="#ffffff" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Link Text', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_CTA_Small" );' ) );