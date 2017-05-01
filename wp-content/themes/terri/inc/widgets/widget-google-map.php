<?php

class DC_Google_Map extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(

			false,
			esc_html__('Devclick Google Map', 'terri'),
			array(
				'description' => esc_html__( 'A widget to display a Google map', 'terri' ),
				'classname'   => 'devclick-google-map'
			)

		);
	}




	/**
	 * Custom Map Styles
	 * @see snazzymaps.com
	 */
	private $map_styles = array(
		'Default'             => '[]',
    	'Greyscale'           => '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]',
    	'Grey and Blue'       => '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":40}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-10},{"lightness":30}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":60}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]}]',
    	'Light Grey and Blue' => '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#dde6e8"},{"visibility":"on"}]}]',
    	'Green and Blue'          => '[{"featureType":"landscape","elementType":"geometry","stylers":[{"saturation":"-100"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"color":"#545454"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"saturation":"-87"},{"lightness":"-40"},{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#f0f0f0"},{"saturation":"-22"},{"lightness":"-16"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"saturation":"-52"},{"hue":"#00e4ff"},{"lightness":"-16"}]}]'
	);





	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		extract( $args );
		extract( $instance );

		echo $before_widget; ?>

			<div class="google-map" 
			     data-lat="<?php echo esc_attr( $lat ); ?>" data-lng="<?php echo esc_attr( $lng ); ?>"
			     data-zoom="<?php echo absint( $zoom ); ?>" data-style="<?php echo esc_attr( $this->map_styles[$style] ); ?>"
			     <?php if( $instance['marker'] ) : ?>
					data-pin="<?php echo esc_url( $marker ); ?>"
				 <?php endif; ?>
				 style="height: <?php echo absint( $height ); ?>px;">
			</div><!-- .google-map -->

		<?php echo $after_widget;
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

		$instance['lat']    = sanitize_text_field( $new_instance['lat'] );
		$instance['lng']    = sanitize_text_field( $new_instance['lng'] );
		$instance['zoom']   = absint( $new_instance['zoom'] );
		$instance['style']  = sanitize_text_field( $new_instance['style'] );
		$instance['marker'] = esc_url( $new_instance['marker'] );
		$instance['height'] = absint( $new_instance['height'] );

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

		$lat    = isset( $instance['lat'] ) ? $instance['lat'] : '51.510357';
		$lng    = isset( $instance['lng'] ) ? $instance['lng'] : '-0.116773';
		// $title  = isset( $instance['title'] ) ? $instance['title'] : '';
		$zoom   = isset( $instance['zoom'] ) ? $instance['zoom'] : 12;
		$style  = isset( $instance['style'] ) ? $instance['style'] : 'Grayscale';
		$marker = isset( $instance['marker'] ) ? $instance['marker'] : '';
		$height = isset( $instance['height'] ) ? $instance['height'] : 400;

		?>

		<p>
			<p>
				<?php printf( esc_html__( "Obtain latitude and longitude for your chosen location from %s ", 'terri'  ), '<a href="'. esc_url( 'http://www.latlong.net/' ) .'" target="_blank">here</a>' ); ?>
			</p><br>
			<label for="<?php echo esc_attr( $this->get_field_id( 'lat' ) ); ?>"><?php esc_html_e( 'Latitude:', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lat' ) ); ?>" value="<?php echo esc_attr( $lat ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'lng' ) ); ?>"><?php esc_html_e( 'Longitude:', 'terri' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'lng' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lng' ) ); ?>" value="<?php echo esc_attr( $lng ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'zoom' ) ); ?>"><?php esc_html_e( 'Map Zoom:', 'terri' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'zoom' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'zoom' ) ); ?>">
			<?php for ( $i=1; $i < 25; $i++ ) : ?>
				<option value="<?php echo esc_attr( $i ); ?>" <?php selected( $zoom, $i ); ?>><?php echo esc_html( $i ); ?></option>
			<?php endfor; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Map Style:', 'terri'  ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
			<?php foreach ( $this->map_styles as $style_name => $map_style ) : ?>
				<option value="<?php echo esc_attr( $style_name ); ?>" <?php selected( $style, $style_name ); ?>><?php echo esc_html( $style_name ); ?></option>
			<?php endforeach; ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php esc_html_e( 'Height of map:', 'terri'  ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" type="number" value="<?php echo esc_attr( $height ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'marker' ) ); ?>"><?php esc_html_e( 'Custom Marker URL (If you want to use the default marker leave this field empty)', 'terri'  ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'marker' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'marker' ) ); ?>" value="<?php echo esc_url( $marker ); ?>" />
		</p>

		<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "DC_Google_Map" );' ) );