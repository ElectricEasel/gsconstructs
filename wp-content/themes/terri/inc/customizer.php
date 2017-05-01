<?php
/**
 * Terri Theme Customizer.
 *
 * @package Terri
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function terri_customize_register( $wp_customize ) {





	// Theme Options Panel
	$wp_customize->add_panel( 'devclick_theme_panel', 
		array(
			'title'       	=> esc_html__( 'Terri Theme Options', 'terri' ),
			'description' 	=> esc_html__( 'All Theme Options', 'terri' ),
			'priority'    	=> 10,
		)
	);





		// Logo Section
		$wp_customize->add_section( 'devclick_logo_settings', array(
			'title'		=> esc_html__( 'Logo Settings', 'terri' ),
			'priority'	=> 10,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_logo', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_logo', array(
				'label'		=> esc_html__( 'Logo', 'terri' ),
				'section'	=> 'devclick_logo_settings',
				'settings'	=> 'devclick_logo'
			) ) );




		// Header Section
		$wp_customize->add_section( 'devclick_header_settings', array(
			'title'		=> esc_html__( 'Header Settings', 'terri' ),
			'priority'	=> 15,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_header_style', array(
		    	'default' 			=> '1',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_radios_selects',
			) );
			$wp_customize->add_control( 'devclick_header_style', array(
		    	'label' 	  => esc_html__( 'Header Style', 'terri' ),
		    	'section' 	  => 'devclick_header_settings',
		    	'settings' 	  => 'devclick_header_style',
		    	'type' 		  => 'select',
		    	'choices'     => array(
					'1'       => esc_html__( 'Default', 'terri' ),
					'2'       => esc_html__( 'Style Two', 'terri' ),
				),
			) );

			$wp_customize->add_setting( 'devclick_header_topbar', array(
		    	'default' 			=> 'hide',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_radios_selects',
			) );
			$wp_customize->add_control( 'devclick_header_topbar', array(
		    	'label' 	  => esc_html__( 'Show/Hide Topbar', 'terri' ),
		    	'section' 	  => 'devclick_header_settings',
		    	'settings' 	  => 'devclick_header_topbar',
		    	'type' 		  => 'radio',
		    	'choices'     => array(
					'show'    => esc_html__( 'Show', 'terri' ),
					'hide'    => esc_html__( 'Hide', 'terri' ),
				),
			) );

			$wp_customize->add_setting( 'devclick_topbar_background_colour', array( 
				'default'           => '#fafafa',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_topbar_background_colour', array(
				'label'		=> esc_html__( 'Topbar Background Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_topbar_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_topbar_text_colour', array( 
				'default'           => '#a4a4a4',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_topbar_text_colour', array(
				'label'		=> esc_html__( 'Topbar Text Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_topbar_text_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_topbar_icon_colour', array( 
				'default'           => '#FAB709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_topbar_icon_colour', array(
				'label'		=> esc_html__( 'Topbar Icon Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_topbar_icon_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_topbar_link_colour', array( 
				'default'           => '#a4a4a4',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_topbar_link_colour', array(
				'label'		=> esc_html__( 'Topbar Link Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_topbar_link_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_header_background_colour', array( 
				'default'           => '#FFFFFF',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_header_background_colour', array(
				'label'		=> esc_html__( 'Header Background Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_header_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_mobile_controls_colour', array( 
				'default'           => '#a4a4a4',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_mobile_controls_colour', array(
				'label'		=> esc_html__( 'Header Mobile Controls Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_mobile_controls_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_header_widgets_icon_colour', array( 
				'default'           => '#fab709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_header_widgets_icon_colour', array(
				'label'		=> esc_html__( 'Header Widgets Icon Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_header_widgets_icon_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_header_widgets_bold_text_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_header_widgets_bold_text_colour', array(
				'label'		=> esc_html__( 'Header Widgets Bold Text Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_header_widgets_bold_text_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_header_widgets_text_colour', array( 
				'default'           => '#a4a4a4',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_header_widgets_text_colour', array(
				'label'		=> esc_html__( 'Header Widgets Text Colour', 'terri' ),
				'section'	=> 'devclick_header_settings',
				'settings'	=> 'devclick_header_widgets_text_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_header_widgets_margin_top', array(
				'default'           => '48',
				'sanitize_callback' => 'devclick_sanitize_text'
			) );
			$wp_customize->add_control( 'devclick_header_widgets_margin_top', array(
				'label'		  => esc_html__( 'Header Widgets Margin Top', 'terri' ),
				'section'	  => 'devclick_header_settings',
				'description' => esc_html__( 'The amount of space at the top of the widget area in the header. Default is 48px', 'terri' ),
				'type'		  => 'text',
				'settings'	  => 'devclick_header_widgets_margin_top'
			) );





		// Navigation Section
		$wp_customize->add_section( 'devclick_navigation_settings', array(
			'title'		=> esc_html__( 'Navigation Settings', 'terri' ),
			'priority'	=> 20,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_navigation_background_colour', array( 
				'default'           => '#FFFFFF',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_navigation_background_colour', array(
				'label'		=> esc_html__( 'Navigation Background Colour', 'terri' ),
				'section'	=> 'devclick_navigation_settings',
				'settings'	=> 'devclick_navigation_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_navigation_link_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_navigation_link_colour', array(
				'label'		=> esc_html__( 'Navigation Link Colour', 'terri' ),
				'section'	=> 'devclick_navigation_settings',
				'settings'	=> 'devclick_navigation_link_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_navigation_active_link_colour', array( 
				'default'           => '#fab709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_navigation_active_link_colour', array(
				'label'		=> esc_html__( 'Navigation Active Link Colour', 'terri' ),
				'section'	=> 'devclick_navigation_settings',
				'settings'	=> 'devclick_navigation_active_link_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_mobile_navigation_background_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_mobile_navigation_background_colour', array(
				'label'		=> esc_html__( 'Mobile Navigation Background Colour', 'terri' ),
				'section'	=> 'devclick_navigation_settings',
				'settings'	=> 'devclick_mobile_navigation_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_mobile_navigation_link_colour', array( 
				'default'           => '#FFFFFF',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_mobile_navigation_link_colour', array(
				'label'		=> esc_html__( 'Mobile Navigation Link Colour', 'terri' ),
				'section'	=> 'devclick_navigation_settings',
				'settings'	=> 'devclick_mobile_navigation_link_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_mobile_navigation_active_link_colour', array( 
				'default'           => '#fab709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_mobile_navigation_active_link_colour', array(
				'label'		=> esc_html__( 'Mobile Navigation Active Link Colour', 'terri' ),
				'section'	=> 'devclick_navigation_settings',
				'settings'	=> 'devclick_mobile_navigation_active_link_colour'
			) ) );





		// Theme Colours Section
		$wp_customize->add_section( 'devclick_theme_colours_settings', array(
			'title'		=> esc_html__( 'Theme Colour Settings', 'terri' ),
			'priority'	=> 25,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_content_area_background_colour', array( 
				'default'           => '#FFFFFF',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_content_area_background_colour', array(
				'label'		=> esc_html__( 'Page Content Background Colour', 'terri' ),
				'section'	=> 'devclick_theme_colours_settings',
				'settings'	=> 'devclick_content_area_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_heading_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_heading_colour', array(
				'label'		=> esc_html__( 'Heading Colour', 'terri' ),
				'section'	=> 'devclick_theme_colours_settings',
				'settings'	=> 'devclick_heading_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_paragraph_colour', array( 
				'default'           => '#A4A4A4',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_paragraph_colour', array(
				'label'		=> esc_html__( 'Paragraph Colour', 'terri' ),
				'section'	=> 'devclick_theme_colours_settings',
				'settings'	=> 'devclick_paragraph_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_accent_colour', array( 
				'default'           => '#FAB709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_accent_colour', array(
				'label'		=> esc_html__( 'Accent Colour', 'terri' ),
				'section'	=> 'devclick_theme_colours_settings',
				'settings'	=> 'devclick_accent_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_overlay_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_overlay_colour', array(
				'label'		=> esc_html__( 'Theme Overlay Colour', 'terri' ),
				'section'	=> 'devclick_theme_colours_settings',
				'settings'	=> 'devclick_overlay_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_overlay_opacity', array(
		    	'default' 			=> '0.80',
		    	'sanitize_callback' => 'devclick_sanitize_radios_selects',
			) );
			$wp_customize->add_control( 'devclick_overlay_opacity', array(
		    	'label' 	  => esc_html__( 'Theme Overlay Opacity', 'terri' ),
		    	'description' => esc_html__( 'Select the opacity of the default theme overlay for sections and the footer.', 'terri' ),
		    	'section' 	  => 'devclick_theme_colours_settings',
		    	'settings' 	  => 'devclick_overlay_opacity',
		    	'type' 		  => 'select',
		    	'choices'     => array(
					'0.10'    => esc_html__( '0.10', 'terri' ),
					'0.20'    => esc_html__( '0.20', 'terri' ),
					'0.30'    => esc_html__( '0.30', 'terri' ),
					'0.40'    => esc_html__( '0.40', 'terri' ),
					'0.50'    => esc_html__( '0.50', 'terri' ),
					'0.60'    => esc_html__( '0.60', 'terri' ),
					'0.70'    => esc_html__( '0.70', 'terri' ),
					'0.80'    => esc_html__( '0.80', 'terri' ),
					'0.90'    => esc_html__( '0.90', 'terri' ),
				),
			) );





		// Page Layout Section
		$wp_customize->add_section( 'devclick_page_layout_settings', array(
			'title'		=> esc_html__( 'Page Layout Settings', 'terri' ),
			'priority'	=> 30,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_page_layout_boxed', array( 
				'default' => false,
				'sanitize_callback' => 'devclick_sanitize_checkbox'
			) );
			$wp_customize->add_control( 'devclick_page_layout_boxed', array(
				'label'		=> esc_html__( 'Page Layout Boxed', 'terri' ),
				'section'	=> 'devclick_page_layout_settings',
				'type'		=> 'checkbox'
			) );





		// Portfolio Section
		$wp_customize->add_section( 'devclick_portfolio_settings', array(
			'title'		=> esc_html__( 'Portfolio Settings', 'terri' ),
			'priority'	=> 35,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_project_category_link_text', array(
		    	'default' 			=> 'View Project',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_text',
			) );
			$wp_customize->add_control( 'devclick_project_category_link_text', array(
		    	'label' 			=> esc_html__( 'Project Category Link Text', 'terri' ),
		    	'section' 			=> 'devclick_portfolio_settings',
		    	'settings' 			=> 'devclick_project_category_link_text',
		    	'type' 				=> 'text',
			) );





		// Blog Section
		$wp_customize->add_section( 'devclick_blog_settings', array(
			'title'		=> esc_html__( 'Blog Settings', 'terri' ),
			'priority'	=> 40,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_blog_home_subtitle', array(
				'default'           => 'Blog Sub Title',
				'sanitize_callback' => 'devclick_sanitize_text'
			) );
			$wp_customize->add_control( 'devclick_blog_home_subtitle', array(
				'label'		=> esc_html__( 'Blog Home Sub Title', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'type'		=> 'text'
			) );

			$wp_customize->add_setting( 'devclick_blog_home_title', array( 
				'default'           => 'Blog Title',
				'sanitize_callback' => 'devclick_sanitize_text'
			) );
			$wp_customize->add_control( 'devclick_blog_home_title', array(
				'label'		=> esc_html__( 'Blog Home Title', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'type'		=> 'text'
			) );

			$wp_customize->add_setting( 'devclick_blog_home_subtitle_colour', array( 
				'default'           => '#FAB709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_blog_home_subtitle_colour', array(
				'label'		=> esc_html__( 'Blog Home Sub Title Colour', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'settings'	=> 'devclick_blog_home_subtitle_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_blog_home_title_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_blog_home_title_colour', array(
				'label'		=> esc_html__( 'Blog Home Title Colour', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'settings'	=> 'devclick_blog_home_title_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_blog_home_page_title_text_position', array(
				'default'           => 'left',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_blog_home_page_title_text_position', array(
				'label'		 => esc_html__( 'Blog Home Page Title Text Position', 'terri' ),
				'section'	 => 'devclick_blog_settings',
				'type'       => 'radio',
				'choices'    => array(
					'left'   => 'Left Aligned',
					'centre' => 'Centre Aligned',
					'right'  => 'Right Aligned',
				),
			) );

			$wp_customize->add_setting( 'devclick_blog_home_page_title_size', array(
				'default'           => 'small',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_blog_home_page_title_size', array(
				'label'		=> esc_html__( 'Blog Home Page Title Size', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'type'      => 'radio',
				'choices'   => array(
					'small' => 'Small',
					'large' => 'Large',
				),
			) );

			$wp_customize->add_setting( 'devclick_blog_home_background_colour', array( 
				'default'           => '#fafafa',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_blog_home_background_colour', array(
				'label'		=> esc_html__( 'Blog Home Page Title Background Colour', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'settings'	=> 'devclick_blog_home_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_blog_home_image', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_blog_home_image', array(
				'label'		=> esc_html__( 'Blog Home Page Title Background Image', 'terri' ),
				'section'	=> 'devclick_blog_settings',
				'settings'	=> 'devclick_blog_home_image'
			) ) );

			$wp_customize->add_setting( 'devclick_blog_home_page_title_image_overlay', array(
				'default'           => 'no',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_blog_home_page_title_image_overlay', array(
				'label'		  => esc_html__( 'Blog Home Page Title Image Overlay', 'terri' ),
				'section'	  => 'devclick_blog_settings',
				'description' => esc_html__( 'Select yes to use the theme defined overlay.', 'terri' ),
				'type'        => 'radio',
				'choices'     => array(
					'yes'     => 'Yes',
					'no'      => 'No',
				),
			) );

			$wp_customize->add_setting( 'devclick_blog_home_background_image_type', array(
				'default'           => 'large_image',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_blog_home_background_image_type', array(
				'label'		      => esc_html__( 'Blog Home Page Title Image Type', 'terri' ),
				'section'	      => 'devclick_blog_settings',
				'type'            => 'radio',
				'choices'         => array(
					'pattern'     => 'Pattern',
					'large_image' => 'Large Image',
				),
			) );





		// 404 Section
		$wp_customize->add_section( 'devclick_404_settings', array(
			'title'		=> esc_html__( '404 Settings', 'terri' ),
			'priority'	=> 45,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_404_subtitle', array(
				'default'           => 'Something has gone wrong',
				'sanitize_callback' =>'devclick_sanitize_text'
			) );
			$wp_customize->add_control( 'devclick_404_subtitle', array(
				'label'		=> esc_html__( '404 Subtitle', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'type'		=> 'text'
			) );

			$wp_customize->add_setting( 'devclick_404_title', array( 
				'default'           => 'Error 404',
				'sanitize_callback' => 'devclick_sanitize_text'
			) );
			$wp_customize->add_control( 'devclick_404_title', array(
				'label'		=> esc_html__( '404 Title', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'type'		=> 'text'
			) );

			$wp_customize->add_setting( 'devclick_404_subtitle_colour', array( 
				'default'           => '#FAB709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_404_subtitle_colour', array(
				'label'		=> esc_html__( '404 Subtitle Colour', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'settings'	=> 'devclick_404_subtitle_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_404_title_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_404_title_colour', array(
				'label'		=> esc_html__( '404 Title Colour', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'settings'	=> 'devclick_404_title_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_404_page_title_text_position', array(
				'default'           => 'left',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_404_page_title_text_position', array(
				'label'		 => esc_html__( '404 Page Title Text Position', 'terri' ),
				'section'	 => 'devclick_404_settings',
				'type'       => 'radio',
				'choices'    => array(
					'left'   => 'Left Aligned',
					'centre' => 'Centre Aligned',
					'right'  => 'Right Aligned',
				),
			) );

			$wp_customize->add_setting( 'devclick_404_page_title_size', array(
				'default'           => 'small',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_404_page_title_size', array(
				'label'		=> esc_html__( '404 Page Title Size', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'type'      => 'radio',
				'choices'   => array(
					'small' => 'Small',
					'large' => 'Large',
				),
			) );

			$wp_customize->add_setting( 'devclick_404_page_title_background_colour', array( 
				'default'           => '#fafafa',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_404_page_title_background_colour', array(
				'label'		=> esc_html__( '404 Page Title Background Colour', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'settings'	=> 'devclick_404_page_title_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_404_page_title_background_image', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_404_page_title_background_image', array(
				'label'		=> esc_html__( '404 Page Title Background Image', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'settings'	=> 'devclick_404_page_title_background_image'
			) ) );

			$wp_customize->add_setting( 'devclick_404_page_title_image_overlay', array(
				'default'           => 'no',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_404_page_title_image_overlay', array(
				'label'		  => esc_html__( '404 Page Title Image Overlay', 'terri' ),
				'section'	  => 'devclick_404_settings',
				'description' => esc_html__( 'Select yes to use the theme defined overlay.', 'terri' ),
				'type'        => 'radio',
				'choices'     => array(
					'yes'     => 'Yes',
					'no'      => 'No',
				),
			) );

			$wp_customize->add_setting( 'devclick_404_page_title_background_image_type', array(
				'default'           => 'large_image',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_404_page_title_background_image_type', array(
				'label'		      => esc_html__( '404 Page Title Image Type', 'terri' ),
				'section'	      => 'devclick_404_settings',
				'type'            => 'radio',
				'choices'         => array(
					'pattern'     => 'Pattern',
					'large_image' => 'Large Image',
				),
			) );

			$wp_customize->add_setting( 'devclick_404_page_image', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_404_page_image', array(
				'label'		=> esc_html__( '404 Page Image', 'terri' ),
				'section'	=> 'devclick_404_settings',
				'settings'	=> 'devclick_404_page_image'
			) ) );




		// Search Section
		$wp_customize->add_section( 'devclick_search_settings', array(
			'title'		=> esc_html__( 'Search Settings', 'terri' ),
			'priority'	=> 50,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_search_subtitle_colour', array( 
				'default'           => '#FAB709',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_search_subtitle_colour', array(
				'label'		=> esc_html__( 'Search Subtitle Colour', 'terri' ),
				'section'	=> 'devclick_search_settings',
				'settings'	=> 'devclick_search_subtitle_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_search_title_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_search_title_colour', array(
				'label'		=> esc_html__( 'Search Title Colour', 'terri' ),
				'section'	=> 'devclick_search_settings',
				'settings'	=> 'devclick_search_title_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_search_page_title_text_position', array(
				'default'           => 'left',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_search_page_title_text_position', array(
				'label'		 => esc_html__( 'Search Page Title Text Position', 'terri' ),
				'section'	 => 'devclick_search_settings',
				'type'       => 'radio',
				'choices'    => array(
					'left'   => 'Left Aligned',
					'centre' => 'Centre Aligned',
					'right'  => 'Right Aligned',
				),
			) );

			$wp_customize->add_setting( 'devclick_search_page_title_size', array(
				'default'           => 'left',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_search_page_title_size', array(
				'label'		=> esc_html__( 'Search Page Title Text Size', 'terri' ),
				'section'	=> 'devclick_search_settings',
				'type'      => 'radio',
				'choices'   => array(
					'small' => 'Small',
					'large' => 'Large',
				),
			) );

			$wp_customize->add_setting( 'devclick_search_page_title_size', array(
				'default'           => 'small',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_search_page_title_size', array(
				'label'		=> esc_html__( 'Search Page Title Size', 'terri' ),
				'section'	=> 'devclick_search_settings',
				'type'      => 'radio',
				'choices'   => array(
					'small' => 'Small',
					'large' => 'Large',
				),
			) );

			$wp_customize->add_setting( 'devclick_search_page_title_background_colour', array( 
				'default'           => '#fafafa',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_search_page_title_background_colour', array(
				'label'		=> esc_html__( 'Search Page Title Background Colour', 'terri' ),
				'section'	=> 'devclick_search_settings',
				'settings'	=> 'devclick_search_page_title_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_search_page_title_background_image', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_search_page_title_background_image', array(
				'label'		=> esc_html__( 'Search Page Title Background Image', 'terri' ),
				'section'	=> 'devclick_search_settings',
				'settings'	=> 'devclick_search_page_title_background_image'
			) ) );

			$wp_customize->add_setting( 'devclick_search_page_title_image_overlay', array(
				'default'           => 'no',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_search_page_title_image_overlay', array(
				'label'		  => esc_html__( 'Search Page Title Image Overlay', 'terri' ),
				'section'	  => 'devclick_search_settings',
				'description' => esc_html__( 'Select yes to use the theme defined overlay.', 'terri' ),
				'type'        => 'radio',
				'choices'     => array(
					'yes'     => 'Yes',
					'no'      => 'No',
				),
			) );

			$wp_customize->add_setting( 'devclick_search_page_title_background_image_type', array(
				'default'           => 'large_image',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_search_page_title_background_image_type', array(
				'label'		      => esc_html__( 'Search Page Title Image Type', 'terri' ),
				'section'	      => 'devclick_search_settings',
				'type'            => 'radio',
				'choices'         => array(
					'pattern'     => 'Pattern',
					'large_image' => 'Large Image',
				),
			) );





		// Archive Section
		$wp_customize->add_section( 'devclick_archive_settings', array(
			'title'		=> esc_html__( 'Archive Settings', 'terri' ),
			'priority'	=> 55,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_archive_title_colour', array( 
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_archive_title_colour', array(
				'label'		=> esc_html__( 'Archive Title Colour', 'terri' ),
				'section'	=> 'devclick_archive_settings',
				'settings'	=> 'devclick_archive_title_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_archive_page_title_text_position', array(
				'default'           => 'left',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_archive_page_title_text_position', array(
				'label'		 => esc_html__( 'Archive Page Title Text Position', 'terri' ),
				'section'	 => 'devclick_archive_settings',
				'type'       => 'radio',
				'choices'    => array(
					'left'   => 'Left Aligned',
					'centre' => 'Centre Aligned',
					'right'  => 'Right Aligned',
				),
			) );

			$wp_customize->add_setting( 'devclick_archive_page_title_size', array(
				'default'           => 'small',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_archive_page_title_size', array(
				'label'		=> esc_html__( 'Archive Page Title Size', 'terri' ),
				'section'	=> 'devclick_archive_settings',
				'type'      => 'radio',
				'choices'   => array(
					'small' => 'Small',
					'large' => 'Large',
				),
			) );

			$wp_customize->add_setting( 'devclick_archive_page_title_background_colour', array( 
				'default'           => '#fafafa',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_archive_page_title_background_colour', array(
				'label'		=> esc_html__( 'Archive Page Title Background Colour', 'terri' ),
				'section'	=> 'devclick_archive_settings',
				'settings'	=> 'devclick_archive_page_title_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_archive_page_title_background_image', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_archive_page_title_background_image', array(
				'label'		=> esc_html__( 'Archive Page Title Background Image', 'terri' ),
				'section'	=> 'devclick_archive_settings',
				'settings'	=> 'devclick_archive_page_title_background_image'
			) ) );

			$wp_customize->add_setting( 'devclick_archive_page_title_image_overlay', array(
				'default'           => 'no',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_archive_page_title_image_overlay', array(
				'label'		  => esc_html__( 'Archive Page Title Image Overlay', 'terri' ),
				'section'	  => 'devclick_archive_settings',
				'description' => esc_html__( 'Select yes to use the theme defined overlay.', 'terri' ),
				'type'        => 'radio',
				'choices'     => array(
					'yes'     => 'Yes',
					'no'      => 'No',
				),
			) );

			$wp_customize->add_setting( 'devclick_archive_page_title_background_image_type', array(
				'default'           => 'large_image',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_archive_page_title_background_image_type', array(
				'label'		      => esc_html__( 'Archive Page Title Image Type', 'terri' ),
				'section'	      => 'devclick_archive_settings',
				'type'            => 'radio',
				'choices'         => array(
					'pattern'     => 'Pattern',
					'large_image' => 'Large Image',
				),
			) );




		// Footer Sections
		$wp_customize->add_section( 'devclick_footer_settings', array(
			'title'		=> esc_html__( 'Footer Settings', 'terri' ),
			'priority'  => 60,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_footer_widgets', array(
		    	'default' 			=> '4',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_radios_selects',
			) );
			$wp_customize->add_control( 'devclick_footer_widgets', array(
		    	'label' 			=> esc_html__( 'Footer Widget Area', 'terri' ),
		    	'description' 		=> esc_html__( 'Select how many footer widget areas to display.', 'terri' ),
		    	'section' 			=> 'devclick_footer_settings',
		    	'settings' 			=> 'devclick_footer_widgets',
		    	'type' 				=> 'select',
		    	'choices'           => array(
					'1'             => esc_html__( 'One', 'terri' ),
					'2'             => esc_html__( 'Two', 'terri' ),
					'3'             => esc_html__( 'Three', 'terri' ),
					'4'             => esc_html__( 'Four', 'terri' ),
				),
			) );

			$wp_customize->add_setting( 'devclick_footer_widget_title_colour', array(
		    	'default' 			=> '#FFFFFF',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_footer_widget_title_colour', array(
				'label'		=> esc_html__( 'Footer Widget Title Colour', 'terri' ),
				'section'	=> 'devclick_footer_settings',
				'settings'	=> 'devclick_footer_widget_title_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_footer_text_colour', array(
		    	'default' 			=> '#b5bdc3',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_footer_text_colour', array(
				'label'		=> esc_html__( 'Footer Text Colour', 'terri' ),
				'section'	=> 'devclick_footer_settings',
				'settings'	=> 'devclick_footer_text_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_footer_link_hover_colour', array(
		    	'default' 			=> '#FAB709',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_footer_link_hover_colour', array(
				'label'		=> esc_html__( 'Footer Link Hover Colour', 'terri' ),
				'section'	=> 'devclick_footer_settings',
				'settings'	=> 'devclick_footer_link_hover_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_footer_background_colour', array(
		    	'default' 			=> '#000000',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'sanitize_hex_color',
			) );
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'devclick_footer_background_colour', array(
				'label'		  => esc_html__( 'Footer Background Colour', 'terri' ),
				'description' => esc_html__( 'Select a background colour for the footer.', 'terri' ),
				'section' 	  => 'devclick_footer_settings',
				'settings'	  => 'devclick_footer_background_colour'
			) ) );

			$wp_customize->add_setting( 'devclick_footer_background_pattern', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_footer_background_pattern', array(
				'label'		  => esc_html__( 'Footer Background Pattern', 'terri' ),
				'description' => esc_html__( 'Select a background pattern for the footer.', 'terri' ),
				'section'	  => 'devclick_footer_settings',
				'settings'	  => 'devclick_footer_background_pattern'
			) ) );

			$wp_customize->add_setting( 'devclick_footer_background_image', array(
				'sanitize_callback' => 'esc_url_raw'
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'devclick_footer_background_image', array(
				'label'		  => esc_html__( 'Footer Background Image', 'terri' ),
				'description' => esc_html__( 'Select a background image for the footer.', 'terri' ),
				'section'	  => 'devclick_footer_settings',
				'settings'	  => 'devclick_footer_background_image'
			) ) );

			$wp_customize->add_setting( 'devclick_footer_overlay', array(
				'default'           => 'no',
				'sanitize_callback' => 'devclick_sanitize_radios_selects'
			) );
			$wp_customize->add_control( 'devclick_footer_overlay', array(
				'label'		  => esc_html__( 'Footer Overlay', 'terri' ),
				'description' => esc_html__( 'Select yes to use the theme defined overlay.', 'terri' ),
				'section'	  => 'devclick_footer_settings',
				'type'        => 'radio',
				'choices'     => array(
					'yes'     => 'Yes',
					'no'      => 'No',
				),
			) );

			$wp_customize->add_setting( 'devclick_footer_bottom_left', array(
		    	'default' 			=> 'Copyright 2016 Terri By Devclick',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_text',
			) );
			$wp_customize->add_control( 'devclick_footer_bottom_left', array(
		    	'label' 			=> esc_html__( 'Bottom Footer Left Text', 'terri' ),
		    	'section' 			=> 'devclick_footer_settings',
		    	'settings' 			=> 'devclick_footer_bottom_left',
		    	'type' 				=> 'text',
			) );

			$wp_customize->add_setting( 'devclick_footer_bottom_right', array(
		    	'default' 			=> 'Website By Devclick',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_text',
			) );
			$wp_customize->add_control( 'devclick_footer_bottom_right', array(
		    	'label' 			=> esc_html__( 'Bottom Footer Right Text', 'terri' ),
		    	'section' 			=> 'devclick_footer_settings',
		    	'settings' 			=> 'devclick_footer_bottom_right',
		    	'type' 				=> 'text',
			) );





		// Custom CSS Section
		$wp_customize->add_section( 'devclick_custom_css_settings', array(
			'title'		=> esc_html__( 'Custom CSS', 'terri' ),
			'priority'	=> 65,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_custom_css', array(
				'sanitize_callback' == 'devclick_sanitize_text'
			) );
			$wp_customize->add_control( 'devclick_custom_css', array(
				'label'		=> esc_html__( 'Custom CSS', 'terri' ),
				'section'	=> 'devclick_custom_css_settings',
				'settings'	=> 'devclick_custom_css',
				'type'      => 'textarea',
			) );





		// Google Fonts Section
		$wp_customize->add_section( 'devclick_google_fonts_settings', array(
			'title'		=> esc_html__( 'Google Fonts Settings', 'terri' ),
			'priority'	=> 70,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_google_fonts', array(
		    	'default' 			=> 'Default',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_radios_selects',
			) );
			$wp_customize->add_control( 'devclick_google_fonts', array(
		    	'label' 	     => esc_html__( 'Google Font Select', 'terri' ),
		    	'description' 	 => esc_html__( 'We have combined a number of Google fonts that work well with this theme. Select a font pairing from the list.', 'terri' ),
		    	'section' 		 => 'devclick_google_fonts_settings',
		    	'settings' 		 => 'devclick_google_fonts',
		    	'type' 		     => 'select',
		    	'choices'        => array(
					'font_set_1' => esc_html__( 'Default', 'terri' ),
					'font_set_2' => esc_html__( 'Oswald / Roboto', 'terri' ),
					'font_set_3' => esc_html__( 'Hind / Merriweather', 'terri' ),
				),
			) );





		// Google Map API
		$wp_customize->add_section( 'devclick_google_map_settings', array(
			'title'		=> esc_html__( 'Google Map API Settings', 'terri' ),
			'priority'	=> 75,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_google_map_api', array(
		    	'default' 			=> '',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_text',
			) );
			$wp_customize->add_control( 'devclick_google_map_api', array(
		    	'label' 	  => esc_html__( 'Google Maps API Key', 'terri' ),
		    	'description' => sprintf( esc_html__( 'Create your API key on the %s and paste the key in the input field.', 'terri'  ), '<a href="'. esc_url( 'https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true' ) .'" target="_blank">Google api website</a>' ),
		    	'section' 	  => 'devclick_google_map_settings',
		    	'settings' 	  => 'devclick_google_map_api',
		    	'type' 		  => 'text',
			) );




		// ACF Settings
		$wp_customize->add_section( 'devclick_acf_settings', array(
			'title'		=> esc_html__( 'ACF Settings', 'terri' ),
			'priority'	=> 80,
			'panel'     => 'devclick_theme_panel',
		) );

			$wp_customize->add_setting( 'devclick_acf_panel', array(
		    	'default' 			=> 'no',
		    	'type'				=> 'theme_mod',
		    	'capability'		=> 'edit_theme_options',
		    	'sanitize_callback' => 'devclick_sanitize_radios_selects',
			) );
			$wp_customize->add_control( 'devclick_acf_panel', array(
				'label'		  => esc_html__( 'Show ACF admin panel?', 'terri' ),
				'description' => esc_html__( 'Check Yes to display the ACF admin panel. FOR ADVANCED USERS ONLY.', 'terri' ),
				'section'	  => 'devclick_acf_settings',
				'type'        => 'radio',
				'choices'     => array(
					'no'      => esc_html__( 'No', 'terri' ),
					'yes'     => esc_html__( 'Yes', 'terri' ),
				),
			) );

			

}
add_action( 'customize_register', 'terri_customize_register' );





/**
 * adds sanitization callback function for text fields
*/
if ( ! function_exists( 'devclick_sanitize_text' ) ) {
	function devclick_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
}





/**
 * adds sanitization callback function for checkboxes
*/
if ( ! function_exists( 'devclick_sanitize_checkbox' ) ) {
	function devclick_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	    	return 1;
	    } else {
	        return '';
	    }
	}
}





/**
 * adds sanitization callback function for radio buttons and select lists
*/
if ( ! function_exists( 'devclick_sanitize_radios_selects' ) ) {
	function devclick_sanitize_radios_selects( $input, $setting ) {
	    global $wp_customize;
	 
	    $control = $wp_customize->get_control( $setting->id );
	 
	    if ( array_key_exists( $input, $control->choices ) ) {
	        return $input;
	    } else {
	        return $setting->default;
	    }
	}
}