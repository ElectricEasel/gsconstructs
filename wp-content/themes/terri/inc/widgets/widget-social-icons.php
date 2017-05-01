<?php

class DC_Social_Icons extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false,
			esc_html__('Devclick Social Icons', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display social icons', 'terri' ),
				'classname'   => 'devclick-social-icons'
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

		$twitter     = $instance['twitter'];
		$facebook    = $instance['facebook'];
		$google      = $instance['google'];
		$linkedin    = $instance['linkedin'];
		$instagram   = $instance['instagram'];
		$pinterest   = $instance['pinterest'];
		$skype       = $instance['skype'];
		$dribbble    = $instance['dribbble'];
		$stumbleupon = $instance['stumbleupon'];
		$behance     = $instance['behance'];
		$youtube     = $instance['youtube'];
		$flickr      = $instance['flickr'];
		$tumblr      = $instance['tumblr'];
		$yelp        = $instance['yelp'];

		echo $args['before_widget'];

		?>

		<div class="social-icons">
			
			<?php if ( $facebook) : ?>
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

			<?php if ( $pinterest ) : ?>
				<a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php endif; ?>

			<?php if ( $skype ) : ?>
				<a href="<?php echo esc_url( $instance['skype'] ); ?>" target="_blank"><i class="fa fa-skype"></i></a>
			<?php endif; ?>

			<?php if ( $dribbble ) : ?>
				<a href="<?php echo esc_url( $instance['dribbble'] ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
			<?php endif; ?>

			<?php if ( $stumbleupon ) : ?>
				<a href="<?php echo esc_url( $instance['stumbleupon'] ); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
			<?php endif; ?>

			<?php if ( $behance ) : ?>
				<a href="<?php echo esc_url( $instance['behance'] ); ?>" target="_blank"><i class="fa fa-behance"></i></a>
			<?php endif; ?>

			<?php if ( $youtube ) : ?>
				<a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php endif; ?>

			<?php if ( $flickr ) : ?>
				<a href="<?php echo esc_url( $instance['flickr'] ); ?>" target="_blank"><i class="fa fa-flickr"></i></a>
			<?php endif; ?>

			<?php if ( $tumblr ) : ?>
				<a href="<?php echo esc_url( $instance['tumblr'] ); ?>" target="_blank"><i class="fa fa-tumblr"></i></a>
			<?php endif; ?>

			<?php if ( $yelp ) : ?>
				<a href="<?php echo esc_url( $instance['yelp'] ); ?>" target="_blank"><i class="fa fa-yelp"></i></a>
			<?php endif; ?>

		</div><!-- .social-icons -->

		<?php

		echo $args['after_widget'];

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

		$instance['facebook']	 = strip_tags( $new_instance['facebook'] );
		$instance['twitter']	 = strip_tags( $new_instance['twitter'] );
		$instance['google']		 = strip_tags( $new_instance['google'] );
		$instance['linkedin']	 = strip_tags( $new_instance['linkedin'] );
		$instance['instagram']	 = strip_tags( $new_instance['instagram'] );
		$instance['pinterest']	 = strip_tags( $new_instance['pinterest'] );
		$instance['skype']		 = strip_tags( $new_instance['skype'] );
		$instance['dribbble']	 = strip_tags( $new_instance['dribbble'] );
		$instance['stumbleupon'] = strip_tags( $new_instance['stumbleupon'] );
		$instance['behance']	 = strip_tags( $new_instance['behance'] );
		$instance['youtube']	 = strip_tags( $new_instance['youtube'] );
		$instance['flickr']		 = strip_tags( $new_instance['flickr'] );
		$instance['tumblr']		 = strip_tags( $new_instance['tumblr'] );
		$instance['yelp']		 = strip_tags( $new_instance['yelp'] );

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

		$facebook    = isset( $instance['facebook']) ? $instance['facebook'] : '';
		$twitter     = isset( $instance['twitter']) ? $instance['twitter'] : '';
		$google      = isset( $instance['google']) ? $instance['google'] : '';
		$linkedin    = isset( $instance['linkedin']) ? $instance['linkedin'] : '';
		$instagram   = isset( $instance['instagram']) ? $instance['instagram'] : '';
		$pinterest   = isset( $instance['pinterest']) ? $instance['pinterest'] : '';
		$skype       = isset( $instance['skype']) ? $instance['skype'] : '';
		$dribbble    = isset( $instance['dribbble']) ? $instance['dribbble'] : '';
		$stumbleupon = isset( $instance['stumbleupon']) ? $instance['stumbleupon'] : '';
		$behance     = isset( $instance['behance']) ? $instance['behance'] : '';
		$youtube     = isset( $instance['youtube']) ? $instance['youtube'] : '';
		$flickr      = isset( $instance['flickr']) ? $instance['flickr'] : '';
		$tumblr      = isset( $instance['tumblr']) ? $instance['tumblr'] : '';
		$yelp        = isset( $instance['yelp']) ? $instance['yelp'] : '';

		?>

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
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest' ) )?>">Pinterest:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'pinterest' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' ) )?>" value="<?php echo esc_attr($pinterest)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'skype' ) )?>">Skype:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'skype' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'skype' ) )?>" value="<?php echo esc_attr($skype)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'dribbble' ) )?>">Dribbble:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'dribbble' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble' ) )?>" value="<?php echo esc_attr($dribbble)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'stumbleupon' ) )?>">StumbleUpon:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'stumbleupon' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'stumbleupon' ) )?>" value="<?php echo esc_attr($stumbleupon)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'behance' ) )?>">Behance:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'behance' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'behance' ) )?>" value="<?php echo esc_attr($behance)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube' ) )?>">YouTube:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'youtube' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' ) )?>" value="<?php echo esc_attr($youtube)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'flickr' ) )?>">Flickr:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'flickr' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'flickr' ) )?>" value="<?php echo esc_attr($flickr)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'tumblr' ) )?>">Tumblr:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'tumblr' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' ) )?>" value="<?php echo esc_attr($tumblr)?>">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'yelp' ) )?>">Yelp:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'yelp' ) )?>" name="<?php echo esc_attr($this->get_field_name( 'yelp' ) )?>" value="<?php echo esc_attr($yelp)?>">
		</p>

		<?php

	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Social_Icons" );' ) );