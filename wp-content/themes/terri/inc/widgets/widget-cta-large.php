<?php

class DC_CTA_Large extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(

			false,
			esc_html__('Devclick Call To Action Large', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display a large call to action', 'terri' ),
				'classname'   => 'devclick-cta-large'
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

			<div class="cta cta-large clear <?php echo esc_attr( $instance['content_align'] ); ?>">

				<?php if ( ! empty ( $instance['sub_title'] ) ) : ?>

					<span style="color: <?php echo esc_attr( $instance['sub_title_colour'] ); ?>;"><?php echo wp_kses_post( $instance['sub_title'] ); ?></span>

				<?php endif; ?>

				<?php if ( ! empty ( $instance['title'] ) ) : ?>

					<h2 style="color: <?php echo esc_attr( $instance['title_colour'] ); ?>;"><?php echo wp_kses_post( $instance['title'] ); ?></h2>

				<?php endif; ?>

				<?php if ( ! empty ( $instance['link'] ) && ! empty ( $instance['link_text'] ) ) : ?>

					<a href="<?php echo esc_url( $instance['link'] ); ?>" class="btn-colour" style="background: <?php echo esc_attr( $instance['button_colour'] ); ?>;"><?php echo esc_attr( $instance['link_text'] ); ?></a>

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

		$instance['sub_title']        = wp_kses_post( $new_instance['sub_title'] );
		$instance['sub_title_colour'] = esc_attr( $new_instance['sub_title_colour'] );
		$instance['title']            = wp_kses_post( $new_instance['title'] );
		$instance['title_colour']     = esc_attr( $new_instance['title_colour'] );
		$instance['link']             = esc_url_raw( $new_instance['link'] );
		$instance['link_text']        = sanitize_text_field( $new_instance['link_text'] );
		$instance['button_colour']    = esc_attr( $new_instance['button_colour'] );
		$instance['content_align']    = sanitize_key( $new_instance['content_align'] );

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

		$sub_title        = empty( $instance['sub_title'] ) ? '' : $instance['sub_title'];
		$sub_title_colour = empty( $instance['sub_title_colour'] ) ? '' : $instance['sub_title_colour'];
		$title            = empty( $instance['title'] ) ? '' : $instance['title'];
		$title_colour     = empty( $instance['title_colour'] ) ? '' : $instance['title_colour'];
		$link             = empty( $instance['link'] ) ? '' : $instance['link'];
		$link_text        = empty( $instance['link_text'] ) ? '' : $instance['link_text'];
		$button_colour    = empty( $instance['button_colour'] ) ? '' : $instance['button_colour'];
		$content_align    = empty( $instance['content_align'] ) ? '' : $instance['content_align'];

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><?php esc_html_e( 'Sub title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>" type="text" value="<?php echo esc_attr( $sub_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sub_title_colour' ) ); ?>"><?php esc_html_e( 'Sub title colour:', 'terri' ); ?></label><br>
			<input class="devclick-colour-picker" id="<?php echo esc_attr( $this->get_field_id( 'sub_title_colour' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_title_colour' ) ); ?>" type="text" value="<?php echo esc_attr( $sub_title_colour ); ?>" data-default-color="#FAB709" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title_colour' ) ); ?>"><?php esc_html_e( 'Title colour:', 'terri' ); ?></label><br>
			<input class="devclick-colour-picker" id="<?php echo esc_attr( $this->get_field_id( 'title_colour' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title_colour' ) ); ?>" type="text" value="<?php echo esc_attr( $title_colour ); ?>" data-default-color="#ffffff" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_html_e( 'Link', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Link text', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_colour' ) ); ?>"><?php esc_html_e( 'Button colour:', 'terri' ); ?></label><br>
			<input class="devclick-colour-picker" id="<?php echo esc_attr( $this->get_field_id( 'button_colour' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_colour' ) ); ?>" type="text" value="<?php echo esc_attr( $button_colour ); ?>" data-default-color="#FAB709" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content_align' ) ); ?>"><?php esc_html_e( 'Align content:', 'terri' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'content_align' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_align' ) ); ?>">
				<option value="text-left" <?php selected( $content_align, 'text-left' ); ?>><?php esc_html_e( 'Align left', 'terri' ); ?></option>
				<option value="text-centre" <?php selected( $content_align, 'text-centre' ); ?>><?php esc_html_e( 'Align centre', 'terri' ); ?></option>
				<option value="text-right" <?php selected( $content_align, 'text-right' ); ?>><?php esc_html_e( 'Align right', 'terri' ); ?></option>
			</select>
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_CTA_Large" );' ) );