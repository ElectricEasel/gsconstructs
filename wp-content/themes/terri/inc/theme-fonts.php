<?php

if ( get_theme_mod( 'devclick_google_fonts' ) === 'font_set_2' ) {

	function terri_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Dosis, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'terri' ) ) {
			$fonts[] = 'Oswald:400,700,300';
		}

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'terri' ) ) {
			$fonts[] = 'Roboto:400,400i,700,700i';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'http://fonts.googleapis.com/css' );
		}

		return $fonts_url; 
	}

} elseif ( get_theme_mod( 'devclick_google_fonts' ) === 'font_set_3' ) {

	function terri_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Dosis, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Hind font: on or off', 'terri' ) ) {
			$fonts[] = 'Hind:300,500,700';
		}

		/* translators: If there are characters in your language that are not supported by Dosis, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'terri' ) ) {
			$fonts[] = 'Merriweather:400,300,300italic,400italic,700,700italic';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'http://fonts.googleapis.com/css' );
		}

		return $fonts_url; 
	}

} else { 

	function terri_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'terri' ) ) {
			$fonts[] = 'Oswald:400,700,300';
		}

		/* translators: If there are characters in your language that are not supported by Dosis, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'terri' ) ) {
			$fonts[] = 'Merriweather:400,300,300italic,400italic,700,700italic';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'http://fonts.googleapis.com/css' );
		}

		return $fonts_url; 
	}

}