<?php

class DC_Featured_Page extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Featured Page', 'terri'),
			array(
				'description' => esc_html__( 'A featured page widget', 'terri' ),
				'classname'   => 'devclick-featured-page'
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

		// If excerpt, else content
		$excerpt = ! empty( $page['post_excerpt'] ) ? strip_tags( $page['post_excerpt'] ) : strip_tags( $page['post_content'] );

		// If content is longer than excerpt length trim the content
		if ( strlen( $excerpt ) > 120 ) :
			$excerpt = substr( $excerpt, 0, strpos( $excerpt , ' ', 120) ) . '...';
		endif;

		// Get the treated content
		$page['post_excerpt'] = $excerpt;

		// Get permalink from page ID
		$page['url'] = get_permalink( $page_id );

		// Get post thumbnail and sizes from page ID
		$image            = get_post_thumbnail_id( $page_id );
		$image_src_small  = wp_get_attachment_image_src( $image, 'terri-col-small' );
		$image_src_medium = wp_get_attachment_image_src( $image, 'terri-col-medium' );
		$image_src_large  = wp_get_attachment_image_src( $image, 'terri-col-large' );

		// Get image alt
		$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
		if ( !empty( $image_alt ) ) {

			$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
		}
		
		echo $args['before_widget']; ?>

			<article class="featured-page <?php echo esc_attr( $instance['style'] ); ?>">

				<?php if ( $image ) : ?>
					<a href="<?php echo esc_url_raw( $page['url'] ); ?>" class="featured-page-image">
						<img src="<?php echo esc_url( $image_src_small[0] ); ?>" srcset="<?php echo esc_url( $image_src_large[0] ); ?> 1024w, <?php echo esc_url( $image_src_medium[0] ); ?> 640w, <?php echo esc_url( $image_src_small[0] ); ?> 320w" sizes="(min-width: 992px) 40vw, 110vw" alt="<?php echo esc_attr( $image_alt ); ?>">
					</a>
				<?php endif; ?>

				<div class="featured-page-inner <?php echo esc_attr( $instance['content_align'] ); ?>">

					<h3>
						<a href="<?php echo esc_url_raw( $page['url'] ); ?>"><?php echo esc_attr( $page['post_title'] ); ?></a>
					</h3>

					<?php if ( $page['post_excerpt'] ) : ?>
						<p><?php echo esc_html( $page['post_excerpt'] ); ?></p>
					<?php endif; ?>

					<?php if( $instance['link_text'] ) : ?>
						<a href="<?php echo esc_url_raw( $page['url'] ); ?>" class="featured-page-link"><?php echo esc_attr( $instance['link_text'] ); ?></a>
					<?php endif; ?>

				</div><!-- .featured-page-inner -->

			</article><!-- .featured-page -->

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

		$instance['page_id']       = absint( $new_instance['page_id'] );
		$instance['link_text']     = sanitize_text_field( $new_instance['link_text'] );
		$instance['content_align'] = sanitize_key( $new_instance['content_align'] );
		$instance['style']         = sanitize_key( $new_instance['style'] );

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

		$page_id       = empty( $instance['page_id'] ) ? 0 : (int) $instance['page_id'];
		$link_text     = isset( $instance['link_text'] ) ? $instance['link_text'] : 'Read More';
		$content_align = empty( $instance['content_align'] ) ? '' : $instance['content_align'];
		$style         = empty( $instance['style'] ) ? '' : $instance['style'];

		?>

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Link text', 'terri' ); ?></label><br />
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'link_text') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" value="<?php echo esc_attr( $link_text ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'content_align' ) ); ?>"><?php esc_html_e( 'Align content:', 'terri' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'content_align' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'content_align' ) ); ?>">
				<option value="text-left" <?php selected( $content_align, 'text-left' ); ?>><?php esc_html_e( 'Align left', 'terri' ); ?></option>
				<option value="text-centre" <?php selected( $content_align, 'text-centre' ); ?>><?php esc_html_e( 'Align centre', 'terri' ); ?></option>
				<option value="text-right" <?php selected( $content_align, 'text-right' ); ?>><?php esc_html_e( 'Align right', 'terri' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Style:', 'terri' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
				<option value="featured-page-style-one" <?php selected( $style, 'featured-page-style-one' ); ?>><?php esc_html_e( 'Style 1', 'terri' ); ?></option>
				<option value="featured-page-style-two" <?php selected( $style, 'featured-page-style-two' ); ?>><?php esc_html_e( 'Style 2', 'terri' ); ?></option>
			</select>
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Featured_Page" );' ) );