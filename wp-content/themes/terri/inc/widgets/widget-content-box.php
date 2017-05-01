<?php

class DC_Content_Box extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Content Box', 'terri'),
			array(
				'description' => esc_html__( 'A content box widget', 'terri' ),
				'classname'   => 'devclick-content-box'
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

		echo $args['before_widget']; ?>

			<?php if ( 'on' == $instance[ 'show_border' ] ) : ?>

				<div class="content-box content-box-border">

			<?php else : ?>

				<div class="content-box">

			<?php endif; ?>

				<span class="subtitle"><?php echo wp_kses_post( $instance['sub_title'] ); ?></span>

				<h2><?php echo wp_kses_post( $instance['title'] ); ?></h2>

				<p><?php echo wp_kses_post( $instance['text'] ); ?></p>

				<?php if ( ! empty ( $instance['link_text'] ) ) : ?>

					<a href="<?php echo esc_url_raw( $page['url'] ); ?>" title="<?php echo wp_kses_post( $instance['title'] ); ?>">

						<?php echo wp_kses_post( $instance['link_text'] ); ?>

					</a>

				<?php endif; ?>

			</div><!-- .content-box -->

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

		$instance['sub_title']   = wp_kses_post( $new_instance['sub_title'] );
		$instance['title']       = wp_kses_post( $new_instance['title'] );
		$instance['text']        = wp_kses_post( $new_instance['text'] );
		$instance['page_id']     = absint( $new_instance['page_id'] );
		$instance['link_text']   = wp_kses_post( $new_instance['link_text'] );
		$instance['show_border'] = ! empty( $new_instance['show_border'] ) ? sanitize_key( $new_instance['show_border'] ) : '';

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

		$sub_title   = empty( $instance['sub_title'] ) ? '' : $instance['sub_title'];
		$title       = empty( $instance['title'] ) ? '' : $instance['title'];
		$text        = empty( $instance['text'] ) ? '' : $instance['text'];
		$page_id     = empty( $instance['page_id'] ) ? 0 : (int) $instance['page_id'];
		$link_text   = empty( $instance['link_text'] ) ? '' : $instance['link_text'];
		$show_border = empty( $instance['show_border'] ) ? '' : $instance['show_border'];
		
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><?php esc_html_e( 'Sub Title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>" type="text" value="<?php echo esc_attr( $sub_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Text', 'terri' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" rows="5"><?php echo esc_html( $text ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select a page', 'terri' ); ?></label>
			<?php
				wp_dropdown_pages( array(
					'selected' => $page_id,
					'id'       => $this->get_field_id( 'page_id' ),
					'name'     => $this->get_field_name( 'page_id' ),
				));
			?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Link Text', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="link_text" value="<?php echo esc_attr( $link_text ); ?>" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_border, 'on'); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_border' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_border' ) ); ?>" value="on" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_border' ) ); ?>"><?php esc_html_e('Show a border around this content box', 'terri' ); ?></label>
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Content_Box" );' ) );