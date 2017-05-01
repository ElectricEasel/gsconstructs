<?php

function terri_widgets_init() {

	// Default sidebar/widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'terri' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widget area for default sidebar', 'terri' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	// Blog sidebar/widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'terri' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Widget area for blog sidebar', 'terri' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	// Team sidebar/widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Team Sidebar', 'terri' ),
		'id'            => 'team-sidebar',
		'description'   => esc_html__( 'Widget area for team sidebar', 'terri' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	// Topbar sidebar/widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Topbar Widget Area', 'terri' ),
		'id'            => 'topbar-widgets',
		'description'   => esc_html__( 'Widget area for topbar', 'terri' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	) );

	// Header sidebar/widget area
	if ( get_theme_mod( 'devclick_header_style' ) === '2' ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Header Widget Area', 'terri' ),
			'id'            => 'header-widgets',
			'description'   => esc_html__( 'Widget area for the header', 'terri' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		) );
	} 

	// Navigation sidebar/widget area
	if ( get_theme_mod( 'devclick_header_style' ) === '2' ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Navigation Widget Area', 'terri' ),
			'id'            => 'navigation-widgets',
			'description'   => esc_html__( 'Widget area for the navigation, used for adding social icons widget.', 'terri' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		) );
	} 

	// Footer widget area
	$footer_widget_areas = get_theme_mod( 'devclick_footer_widgets', '4' );
	for ( $i=1; $i<=$footer_widget_areas; $i++ ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer ', 'terri' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add up to 4 footer widget areas at: Customize &gt; Theme Options &gt; Footer Settings.', 'terri' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'terri_widgets_init' );