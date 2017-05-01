<?php

/**
 * Remove references to SiteOrigin Premium.
 *
 */
add_filter( 'siteorigin_premium_upgrade_teaser', '__return_false' );




/**
 * Remove SiteOrigin widgets.
 *
 */
function devclick_remove_widgets($widgets){
    unset($widgets['SiteOrigin_Panels_Widget_Animated_Image']);
    unset($widgets['SiteOrigin_Panels_Widget_Button']);
    unset($widgets['SiteOrigin_Panels_Widget_Call_To_Action']);
    unset($widgets['SiteOrigin_Panels_Widget_List']);
    unset($widgets['SiteOrigin_Panels_Widget_Price_Box']);
    unset($widgets['SiteOrigin_Panels_Widget_Testimonial']);
    unset($widgets['SiteOrigin_Panels_Widgets_EmbeddedVideo']);
    unset($widgets['SiteOrigin_Panels_Widgets_Video']);
    unset($widgets['SiteOrigin_Panels_Widgets_Image']);
    unset($widgets['SiteOrigin_Panels_Widgets_Gallery']);
    unset($widgets['SiteOrigin_Panels_Widgets_PostContent']);
    unset($widgets['SiteOrigin_Panels_Widgets_PostLoop']);

    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'devclick_remove_widgets');





/**
 * SiteOrigin defaults.
 *
 */
add_theme_support( 'siteorigin-panels', array( 
	'margin-bottom'        => 0,
	'tablet-layout'        => false,
	'tablet-width'         => 1024,
	'mobile-width'         => 992,
	'post-types'           => array( 'post', 'page', 'project', 'team'),
	'recommended-widgets'  => false,
	'full-width-container' => '.page-wrap-inner'
) );





/**
 * Theme widgets.
 *
 */
function devclick_theme_widgets($widgets) {
	$theme_widgets = array(
		'DC_CTA_Large',
		'DC_CTA_Small',
		'DC_Featured_Page',
		'DC_Feature_Project',
		'DC_Google_Map',
		'DC_Icon_Box',
		'DC_Projects_List',
		'DC_Recent_Posts',
		'DC_Section_Title',
		'DC_Team_Member',
		'DC_Content_Box',
		'DC_Icon_Text',
		'DC_Social_Icons'
	);
	foreach($theme_widgets as $theme_widget) {
		if( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array( 'devclick-widgets' );
			$widgets[$theme_widget]['icon'] = 'dashicons dashicons-arrow-up-alt';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'devclick_theme_widgets');





/**
 * Add a tab for the theme widgets in the page builder.
 *
 */
function devclick_theme_widgets_tab($tabs){
	$tabs[] = array(
		'title' => esc_html__( 'Devclick Widgets', 'terri' ),
		'filter' => array(
			'groups' => array( 'devclick-widgets' )
		)
	);
	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'devclick_theme_widgets_tab', 20);




/**
 * Define custom options for page builder rows
 *
 */
function devclick_define_custom_page_builder_row_options( $fields ) {

	$fields['overlay'] = array(
	    'name'        => esc_html__( 'Display Overlay?', 'terri' ),
	    'type'        => 'checkbox',
	    'group'       => 'design',
	    'description' => esc_html__( 'Adds an overlay over this row. Useful for displaying transparent colour over a background image', 'terri' ),
	    'priority'    => 14,
	);

	$fields['overlay_color'] = array(
	    'name'        => esc_html__( 'Overlay Colour', 'terri' ),
	    'type'        => 'color',
	    'default'	  => '#000000',
	    'group'       => 'design',
	    'priority'    => 15,
	);

    return $fields;
}
add_filter( 'siteorigin_panels_row_style_fields', 'devclick_define_custom_page_builder_row_options' );





/**
 * Output custom options for page builder rows
 *
 */
function devclick_output_custom_page_builder_row_options( $attributes, $args ) {

	if ( !empty( $args['overlay'] ) ) {
    	$attributes['data-overlay'] = 'true';
	}

	if ( !empty( $args['overlay_color'] ) ) {
    	$attributes['data-overlay-color'] = esc_attr( $args['overlay_color'] );		
	}

    return $attributes;
}
add_filter('siteorigin_panels_row_style_attributes', 'devclick_output_custom_page_builder_row_options', 10, 2);





/**
 * Define custom options for page builder widgets
 *
 */
function devclick_define_custom_page_builder_widget_options( $fields ) {

    $fields['hide_on_mobile'] = array(
        'name'          => esc_html__( 'Hide on Mobile?', 'terri' ),
        'type'          => 'checkbox',
        'group'         => 'layout',
        'label'         => esc_html__( 'Hide widget on mobile', 'terri' ),
        'priority'      => 16,
    );

    return $fields;
}
add_filter( 'siteorigin_panels_widget_style_fields', 'devclick_define_custom_page_builder_widget_options' );





/**
 * Output custom options for page builder widget
 *
 */
function devclick_output_custom_page_builder_widget_options( $attributes, $args ) {

    if ( ! empty( $args['hide_on_mobile'] ) ) {
        array_push( $attributes['class'], 'hide-on-mobile' );
    }

    return $attributes;
}
add_filter( 'siteorigin_panels_widget_style_attributes', 'devclick_output_custom_page_builder_widget_options', 10, 2 );