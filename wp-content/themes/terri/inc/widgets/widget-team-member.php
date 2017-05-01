<?php

class DC_Team_Member extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Team Member', 'terri'),
			array(
				'description' => esc_html__( 'A team member widget', 'terri' ),
				'classname'   => 'devclick-team-member'
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

		$team_link = isset( $instance['team_link'] ) ? $instance['team_link'] : 'View Team Member';

		// Get image alt
		$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
		if ( !empty( $image_alt ) ) {

			$image_alt = get_post_meta($image , '_wp_attachment_image_alt', true);
		}

		$twitter   = $instance['twitter'];
		$facebook  = $instance['facebook'];
		$google    = $instance['google'];
		$linkedin  = $instance['linkedin'];
		$instagram = $instance['instagram'];
		
		echo $args['before_widget']; ?>

			<div class="team-member <?php echo esc_attr( $instance['content_align'] ); ?> <?php echo esc_attr( $instance['style'] ); ?>">

				<?php if ( $image ) : ?>

					<div class="team-member-image">

						<img src="<?php echo esc_url( $image_src_small[0] ); ?>" srcset="<?php echo esc_url( $image_src_large[0] ); ?> 1024w, <?php echo esc_url( $image_src_medium[0] ); ?> 640w, <?php echo esc_url( $image_src_small[0] ); ?> 320w" sizes="(min-width: 992px) 40vw, 110vw" alt="<?php echo esc_attr( $image_alt ); ?>">

						<?php if ( $facebook || $twitter || $google || $linkedin || $instagram ) : ?>

							<div class="team-social-icons">

								<?php if ( $facebook ) : ?>
									<a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>

								<?php if ( $twitter ) : ?>
									<a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>

								<?php if ( $google ) : ?>
									<a href="<?php echo esc_url( $instance['google'] ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>

								<?php if ( $linkedin ) : ?>
									<a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
								<?php endif; ?>

								<?php if ( $instagram ) : ?>
									<a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
								<?php endif; ?>
								
							</div><!-- .team-social-icons -->

						<?php endif; ?>

					</div><!-- .team-member-image -->

				<?php endif; ?>

				<div class="team-member-inner">

					<?php if ( ! empty ( $instance['job_title'] ) ) : ?>

						<span><?php echo esc_attr( $instance['job_title'] ); ?></span>

					<?php endif; ?>

					<h3><?php echo esc_attr( $page['post_title'] ); ?></h3>

					<?php if ( $page['post_excerpt'] ) : ?>
						<p><?php echo esc_html( $page['post_excerpt'] ); ?></p>
					<?php endif; ?>

					<?php if ( isset ( $instance[ 'link_member' ] ) && 'on' == $instance[ 'link_member' ] ) : ?>
						<a href="<?php echo esc_url_raw( $page['url'] ); ?>" class="team-member-link">
							<?php echo esc_attr( $team_link ); ?>
						</a>
					<?php endif; ?>

				</div><!-- .team-member-inner -->

			</div><!-- .team-member -->

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
		$instance['job_title']     = sanitize_text_field( $new_instance['job_title'] );
		$instance['facebook']      = strip_tags( $new_instance['facebook'] );
		$instance['twitter']       = strip_tags( $new_instance['twitter'] );
		$instance['google']        = strip_tags( $new_instance['google'] );
		$instance['linkedin']      = strip_tags( $new_instance['linkedin'] );
		$instance['instagram']     = strip_tags( $new_instance['instagram'] );
		$instance['content_align'] = sanitize_key( $new_instance['content_align'] );
		$instance['style']         = sanitize_key( $new_instance['style'] );
		$instance['link_member']   = ! empty( $new_instance['link_member'] ) ? sanitize_key( $new_instance['link_member'] ) : '';
		$instance['team_link']     = sanitize_text_field( $new_instance['team_link'] );

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
		$job_title     = empty( $instance['job_title'] ) ? '' : $instance['job_title'];
		$facebook      = isset( $instance['facebook']) ? $instance['facebook'] : '';
		$twitter       = isset( $instance['twitter']) ? $instance['twitter'] : '';
		$google        = isset( $instance['google']) ? $instance['google'] : '';
		$linkedin      = isset( $instance['linkedin']) ? $instance['linkedin'] : '';
		$instagram     = isset( $instance['instagram']) ? $instance['instagram'] : '';
		$content_align = empty( $instance['content_align'] ) ? '' : $instance['content_align'];
		$style         = empty( $instance['style'] ) ? '' : $instance['style'];
		$link_member   = empty( $instance['link_member'] ) ? '' : $instance['link_member'];
		$team_link     = isset( $instance['team_link'] ) ? $instance['team_link'] : 'View Team Member';

		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Select a team member', 'terri' ); ?></label>

			<select style="min-width: 174px;" id='<?php echo $this->get_field_id( 'page_id' ); ?>' name="<?php echo $this->get_field_name( 'page_id' ); ?>">
				<?php $args=array(
					'post_type' => 'team',
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'job_title' ) ); ?>"><?php esc_html_e( 'Job title', 'terri' ); ?></label><br />
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'job_title') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'job_title' ) ); ?>" value="<?php echo esc_attr( $job_title ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' ) )?>">Facebook:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'facebook' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' ) )?>" value="<?php echo esc_attr($facebook)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' ) )?>">Twitter:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'twitter' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' ) )?>" value="<?php echo esc_attr($twitter)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'google' ) )?>">Google Plus:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'google' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'google' ) )?>" value="<?php echo esc_attr($google)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'linkedin' ) )?>">LinkedIn:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'linkedin' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' ) )?>" value="<?php echo esc_attr($linkedin)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'instagram' ) )?>">Instagram:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'instagram' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' ) )?>" value="<?php echo esc_attr($instagram)?>">
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
				<option value="team-member-style-one" <?php selected( $style, 'team-member-style-one' ); ?>><?php esc_html_e( 'Style 1', 'terri' ); ?></option>
				<option value="team-member-style-two" <?php selected( $style, 'team-member-style-two' ); ?>><?php esc_html_e( 'Style 2', 'terri' ); ?></option>
			</select>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $link_member, 'on'); ?> id="<?php echo esc_attr( $this->get_field_id( 'link_member' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_member' ) ); ?>" value="on" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'link_member' ) ); ?>"><?php esc_html_e('Link to single team member page', 'terri' ); ?></label>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'team_link' ) ); ?>"><?php esc_html_e( 'Team Member Link Text', 'terri' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'team_link') ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'team_link' ) ); ?>" value="<?php echo esc_attr( $team_link ); ?>" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Team_Member" );' ) );