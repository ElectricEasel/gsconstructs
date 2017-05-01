<?php

class DC_Recent_Posts extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(

			false,
			esc_html__('Devclick Recent Posts', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display recent blog posts', 'terri' ),
				'classname'   => 'devclick-recent-posts'
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

		$post_count = absint( $instance['count'] );

		$sticky_post = empty( $instance['sticky'] ) ? '' : get_option( 'sticky_posts' );

		$categories = empty( $instance['categories'] ) ? '' : $instance['categories'];

		$columns = absint( $instance['columns'] );

		$calc_columns = round( 12 / $columns );

		$post_link_text = empty( $instance['link_text'] ) ? esc_html__( 'Read More', 'terri'  ) : $instance['link_text'];

		$recent_posts_args = array(
			'posts_per_page' => $post_count,
			'cat' 		     => $categories,
			'orderby'	     => 'post_date',
			'order'			 => 'DESC',
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'post__not_in'	 => $sticky_post
		);
		$recent_posts = new WP_Query( $recent_posts_args );

		echo $args['before_widget']; ?>

			<div class="row">

				<div class="col-md-12">
					
					<div class="section-title section-title-margin">

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

				</div><!-- .col -->

			</div><!-- .row -->

			<div class="row">

				<?php 

					$counter = $columns;

					if ( $recent_posts->have_posts() ) : while ( $recent_posts->have_posts() ) : $recent_posts->the_post();

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

					$counter++;

				?>

				<div class="recent-post-wrapper col-sm-12 col-md-<?php echo esc_attr( $calc_columns ); ?> <?php echo esc_attr( $instance['content_align'] ); ?> <?php echo esc_attr( $instance['style'] ); ?>">

					<article class="recent-post">

						<?php if ( $image ) : ?>
							<a href="<?php echo esc_url( the_permalink() ); ?>" class="recent-post-image">
								<img src="<?php echo esc_url( $image_src_small[0] ); ?>" srcset="<?php echo esc_url( $image_src_large[0] ); ?> 1024w, <?php echo esc_url( $image_src_medium[0] ); ?> 640w, <?php echo esc_url( $image_src_small[0] ); ?> 320w" sizes="(min-width: 992px) 40vw, 110vw" alt="<?php echo esc_attr( $image_alt ); ?>">

								<div class="post-meta">
									<span><?php the_time( get_option( 'date_format' ) ); ?></span>
								</div><!-- .post-meta -->
							</a>
						<?php endif; ?>

						<div class="recent-post-inner">

							<h3>
								<a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
							</h3>

							<p>
		                        <?php
		                        	// Get the excerpt
		                            $excerpt = get_the_excerpt();

		                            // If content is longer than excerpt length trim the content
		                            if ( strlen( $excerpt ) > 115 ) :
		                                $excerpt = substr( $excerpt, 0, strpos( $excerpt , ' ', 115 ) ) . '...';
		                            endif;

		                            // Display the content
		                            echo esc_html( $excerpt );
		                        ?>
		                    </p>

							<a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_attr( $post_link_text ); ?></a>

						</div><!-- .recent-post-inner -->

					</article><!-- .recent-post -->

				</div><!-- .col -->

				<?php endwhile;

					wp_reset_postdata();

				else : ?>

					<div class="col-md-12">
						<h3><?php esc_html_e( 'No Posts Found', 'terri'  ); ?></h3>
					</div><!-- .col -->

				<?php endif; ?>

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

		$instance['sub_title']      = wp_kses_post( $new_instance['sub_title'] );
		$instance['title']          = wp_kses_post( $new_instance['title'] );
		$instance['page_id']        = absint( $new_instance['page_id'] );
		$instance['page_link_text'] = sanitize_text_field( $new_instance['page_link_text'] );
		$instance['categories']     = sanitize_key( $new_instance['categories'] );
		$instance['count'] 	        = absint( $new_instance['count'] );
		$instance['sticky']		    = sanitize_key( $new_instance['sticky'] );
		$instance['columns']        = absint( $new_instance['columns'] );
		$instance['link_text']      = sanitize_text_field( $new_instance['link_text'] );
		$instance['content_align']  = sanitize_key( $new_instance['content_align'] );
		$instance['style']          = sanitize_key( $new_instance['style'] );

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
		$categories     = empty( $instance['categories'] ) ? '' : $instance['categories'];
		$count 		    = empty( $instance['count'] ) ? '' : $instance['count'];
		$sticky 	    = empty( $instance['sticky'] ) ? '' : $instance['sticky'];
		$columns 	    = empty( $instance['columns'] ) ? '3' : $instance['columns'];
		$link_text      = empty( $instance['link_text'] ) ? 'Read More' : $instance['link_text'];
		$content_align  = empty( $instance['content_align'] ) ? '' : $instance['content_align'];
		$style          = empty( $instance['style'] ) ? '' : $instance['style'];

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

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php esc_html_e( 'Filter by Category', 'terri'  ); ?>:</label> 
			<?php
				wp_dropdown_categories( array(
					'orderby' => 'name',
					'name' => $this->get_field_name( 'categories' ),
					'selected' => $categories,
					'hierarchical' => true,
					'show_option_none' => esc_html__( 'All Categories', 'terri'  ),
				) );
			?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Display number of posts:', 'terri'  ); ?></label><br>
			<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="number" value="<?php echo esc_attr( $count ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'sticky' ) ); ?>"><?php esc_html_e( 'Hide Sticky Posts?', 'terri'  ); ?></label>
			<input class="checkbox" type="checkbox" <?php checked( $sticky, 'on' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'sticky' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sticky' ) ); ?>" value="on" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>"><?php esc_html_e( 'Column in a row', 'terri'  ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'columns' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'columns' ) ); ?>">
			<?php for ( $i=1; $i < 5; $i++ ) : ?>
				<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $columns, $i ); ?>><?php echo esc_attr( $i ); ?></option>
			<?php endfor; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"><?php esc_html_e( 'Post link text', 'terri' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>" />
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
				<option value="recent-post-style-one" <?php selected( $style, 'recent-post-style-one' ); ?>><?php esc_html_e( 'Style 1', 'terri' ); ?></option>
				<option value="recent-post-style-two" <?php selected( $style, 'recent-post-style-two' ); ?>><?php esc_html_e( 'Style 2', 'terri' ); ?></option>
			</select>
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Recent_Posts" );' ) );