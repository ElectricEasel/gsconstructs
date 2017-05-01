<?php

class DC_Section_Title extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(

			false,
			esc_html__('Devclick Section Title', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display a section title with sub title', 'terri' ),
				'classname'   => 'devclick-section-title'
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

		$page_id = '';
		$page_id = $instance['page_id'];

		if ( $page_id ) :
			$page = (array) get_post( $page_id );
		endif;

		$page['url'] = get_permalink( $page_id );

		echo $args['before_widget']; ?>

			<div class="section-title">

				<div class="section-title-content">

					<?php if ( ! empty ( $instance['sub_title'] ) ) : ?>

						<span><?php echo wp_kses_post( $instance['sub_title'] ); ?></span>

					<?php endif; ?>

					<?php if ( ! empty ( $instance['title'] ) ) : ?>

						<h2><?php echo wp_kses_post( $instance['title'] ); ?></h2>

					<?php endif; ?>

				</div><!-- .section-title-content -->

				<?php if ( ! empty ( $instance['page_link_text'] ) ) : ?>

					<div class="section-title-link">

						<a href="<?php echo esc_url_raw( $page['url'] ); ?>" class="btn-colour"><?php echo esc_attr( $instance['page_link_text'] ); ?></a>

					</div><!-- .section-title-link -->

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

		$instance['sub_title']      = wp_kses_post( $new_instance['sub_title'] );
		$instance['title']          = wp_kses_post( $new_instance['title'] );
		$instance['page_id']        = absint( $new_instance['page_id'] );
		$instance['page_link_text'] = wp_kses_post( $new_instance['page_link_text'] );

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

		$sub_title      = empty( $instance['sub_title'] ) ? '' : $instance['sub_title'];
		$title          = empty( $instance['title'] ) ? '' : $instance['title'];
		$page_id        = empty( $instance['page_id'] ) ? 0 : (int) $instance['page_id'];
		$page_link_text = empty( $instance['page_link_text'] ) ? '' : $instance['page_link_text'];

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><?php esc_html_e( 'Sub title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>" type="text" value="<?php echo esc_attr( $sub_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'page_link_text' ) ); ?>"><?php esc_html_e( 'Page link text', 'terri' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'page_link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'page_link_text' ) ); ?>" type="text" value="<?php echo esc_attr( $page_link_text ); ?>" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Section_Title" );' ) );