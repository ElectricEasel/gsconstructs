<?php
/**
 * @package Terri
 */

function devclick_custom_css() {





	$output = '';





	// Header
	$devclick_topbar_background_colour        = get_theme_mod( 'devclick_topbar_background_colour', '#fafafa' );
	$devclick_topbar_text_colour              = get_theme_mod( 'devclick_topbar_text_colour', '#a4a4a4' );
	$devclick_topbar_icon_colour              = get_theme_mod( 'devclick_topbar_icon_colour', '#FAB709' );
	$devclick_topbar_link_colour              = get_theme_mod( 'devclick_topbar_link_colour', '#a4a4a4' );
    $devclick_header_background_colour        = get_theme_mod( 'devclick_header_background_colour', '#FFFFFF' );
    $devclick_mobile_controls_colour          = get_theme_mod( 'devclick_mobile_controls_colour', '#a4a4a4' );
    $devclick_header_widgets_icon_colour      = get_theme_mod( 'devclick_header_widgets_icon_colour', '#fab709' );
    $devclick_header_widgets_bold_text_colour = get_theme_mod( 'devclick_header_widgets_bold_text_colour', '#000000' );
    $devclick_header_widgets_text_colour      = get_theme_mod( 'devclick_header_widgets_text_colour', '#a4a4a4' );
    $devclick_header_widgets_margin_top       = get_theme_mod( 'devclick_header_widgets_margin_top', '48' );

	$output .= '.topbar { background-color: ' . esc_attr( $devclick_topbar_background_colour ) . '; }';
	$output .= '.topbar { color: ' . esc_attr( $devclick_topbar_text_colour ) . '; }';
	$output .= '.topbar i, .topbar a:hover, .topbar a i:hover { color: ' . esc_attr( $devclick_topbar_icon_colour ) . '; }';
	$output .= '.topbar a, .topbar a i { color: ' . esc_attr( $devclick_topbar_link_colour ) . '; }';
    $output .= '.site-header, .header-search-form form input[type="search"] { background-color: ' . esc_attr( $devclick_header_background_colour ) . '; }';
    $output .= '.site-header .mobile-controls a, .site-header .mobile-controls a:visited, .header-search-form span.fa { color: ' . esc_attr( $devclick_mobile_controls_colour ) . '; }';
    $output .= '.header-style-two .devclick-icon-text i { color: ' . esc_attr( $devclick_header_widgets_icon_colour ) . '; }';
    $output .= '.header-style-two .devclick-icon-text span b { color: ' . esc_attr( $devclick_header_widgets_bold_text_colour ) . '; }';
    $output .= '.header-style-two .devclick-icon-text span { color: ' . esc_attr( $devclick_header_widgets_text_colour ) . '; }';
    $output .= '.header-style-two .devclick-icon-text { margin-top: ' . esc_attr( $devclick_header_widgets_margin_top ) . 'px; }';





	// Navigation
	$devclick_navigation_background_colour         = get_theme_mod( 'devclick_navigation_background_colour', '#FFFFFF' );
	$devclick_navigation_link_colour               = get_theme_mod( 'devclick_navigation_link_colour', '#000000' );
    $devclick_navigation_active_link_colour        = get_theme_mod( 'devclick_navigation_active_link_colour', '#FAB709' );
	$devclick_mobile_navigation_background_colour  = get_theme_mod( 'devclick_mobile_navigation_background_colour', '#000000' );
	$devclick_mobile_navigation_link_colour        = get_theme_mod( 'devclick_mobile_navigation_link_colour', '#FFFFFF' );
    $devclick_mobile_navigation_active_link_colour = get_theme_mod( 'devclick_mobile_navigation_active_link_colour', '#FAB709' );

	$output .= '.header-style-two .main-navigation { background-color: ' . esc_attr( $devclick_navigation_background_colour ) . '; }';
	$output .= '.main-navigation a { color: ' . esc_attr( $devclick_navigation_link_colour ) . '; }';
    $output .= '.main-navigation .current-menu-item a, .main-navigation a:hover { color: ' . esc_attr( $devclick_navigation_active_link_colour ) . '; }';
	$output .= '.mobile-navigation-container { background-color: ' . esc_attr( $devclick_mobile_navigation_background_colour ) . '; }';
	$output .= '.mobile-navigation li a { color: ' . esc_attr( $devclick_mobile_navigation_link_colour ) . '; }';
    $output .= '.mobile-navigation li.current-menu-item > a, .mobile-navigation a:hover { color: ' . esc_attr( $devclick_mobile_navigation_active_link_colour ) . '; }';




	// Theme Colours
	$devclick_content_area_background_colour = get_theme_mod( 'devclick_content_area_background_colour', '#FFFFFF' );
	$devclick_heading_colour                 = get_theme_mod( 'devclick_heading_colour', '#000000' );
	$devclick_paragraph_colour               = get_theme_mod( 'devclick_paragraph_colour', '#A4A4A4' );
	$devclick_accent_colour                  = get_theme_mod( 'devclick_accent_colour', '#FAB709' );
	$devclick_overlay_colour                 = get_theme_mod( 'devclick_overlay_colour', '#000000' );
    $devclick_overlay_opacity                = get_theme_mod( 'devclick_overlay_opacity', '0.80' );

	$output .= '.page-wrap-inner { background-color: ' . esc_attr( $devclick_content_area_background_colour ) . '; }';
	$output .= 'h1, h2, h3, h4, h5, h6, .recent-post h3 a, .featured-page h3 a, .post .post-title a, .page .post-title a, .comment-header span, .featured-page-link:hover, .recent-post-inner a:hover, .post-content a:hover, .page-content a:hover, .comments-area a:hover, .breadcrumbs span a:hover, .site-branding.font-logo a, .calendar_wrap a:hover { color: ' . esc_attr( $devclick_heading_colour ) . '; }';
	$output .= '.site-header .mobile-controls a:hover, .content-box span, .team-member span, .recent-post h3 a:hover, .featured-page h3 a:hover, .section-title span, .icon-box a:hover h4, .featured-project .featured-project-title a:hover, .slider-inner .subtitle, .banner-inner .subtitle, .request-quote .subtitle, .cta-large span, .post .post-title a:hover, .page .post-title a:hover, .sidebar .widget li a:hover, .sidebar .widget_recent_entries li, .sidebar .widget_recent_comments li, .sidebar .widget_archive li, .sidebar .widget_categories li, .sidebar .widget_meta li, .sidebar .widget_nav_menu li, .sidebar .widget_nav_menu li.current-menu-item a, .icon-box .icon-box-icon i, .featured-page-link, .featured-project a, .recent-post-inner a, .post-content a, .page-content a, .comments-area a, .error-404 h1, .breadcrumbs span a, .project-filter a:hover, .project-filter a.current, .search-results-list a:hover, .search-results-list li:before, .site-branding.font-logo a:hover, .calendar_wrap a, .terri-icon, .post-meta .post-date:hover, .panel-group .accordion-toggle:hover, .panel-group .accordion-toggle::before, .featured-project a:hover span { color: ' . esc_attr( $devclick_accent_colour ) . '; }';
	$output .= '.project-filter a:hover, .project-filter a.current { border-bottom-color: ' . esc_attr( $devclick_accent_colour ) . '; }';
	$output .= '.search-form .search-field:focus, .pagination .current.page-numbers, .pagination a.page-numbers:hover, input:focus, textarea:focus, .sticky .post-title { border-color: ' . esc_attr( $devclick_accent_colour ) . '; }';
	$output .= '.swiper-pagination-progress .swiper-pagination-progressbar, .recent-post .post-meta, .team-member .team-member-image .team-social-icons, .btn-colour, .main-navigation .menu .menu-cta a, .mobile-navigation .menu .menu-cta a, .comment-respond .form-submit input, .search-form .search-submit, .pagination .current.page-numbers, .pagination a.page-numbers:hover, .slider-inner-form .request-callback input[type="submit"], .banner-inner-form .request-callback input[type="submit"], .request-quote input[type="submit"], .main-navigation .menu-item-has-children .sub-menu li a:hover, .main-navigation .menu-item-has-children .sub-menu li.current-menu-item a, .devclick-social-icons a, button, input[type="button"], input[type="reset"], input[type="submit"], .widget_tag_cloud .tagcloud a, .panel-group .accordion-toggle[aria-expanded="true"], .panel-group .accordion-toggle[aria-expanded="true"]:hover { background: ' . esc_attr( $devclick_accent_colour ) . '; }';
	$output .= 'body, p, li, pre, .wp-caption-text, .comment-respond textarea, .comment-respond input, .comment-respond input:focus, .search-form .search-field, .sidebar .widget li a, .post .post-meta, .pagination a.page-numbers, .pagination span.page-numbers, .breadcrumbs span a:after, .project-filter a, .search-results-list a, input, select, textarea, .post-meta .post-date, .panel-group .accordion-toggle, .panel-group .panel .panel-heading + .panel-collapse > .list-group, .panel-group .panel .panel-heading + .panel-collapse > .panel-body { color: ' . esc_attr( $devclick_paragraph_colour ) . '; }';
	$output .= '.overlay:before, .mobile-navigation-container, .featured-project .featured-project-overlay, .main-navigation .menu-item-has-children .sub-menu li a { background: ' . esc_attr( $devclick_overlay_colour ) . '; }';
    $output .= '.overlay:before, .featured-project:hover .featured-project-inner .featured-project-overlay, .section-overlay { opacity: ' . esc_attr( $devclick_overlay_opacity) . ' ;}';





	// Page Layout
	$devclick_page_layout_boxed = get_theme_mod( 'devclick_page_layout_boxed', false );

	if ( true == $devclick_page_layout_boxed ) {
		$output .= '.page-wrap-inner { max-width: 1400px; overflow-x: hidden; margin: 0 auto; box-shadow: 0 0 10px rgba(0,0,0,0.15); }';
	}




	// Blog Page
	$devclick_blog_home_page_title_text_position = get_theme_mod( 'devclick_blog_home_page_title_text_position', 'left' );
	$devclick_blog_home_page_title_size          = get_theme_mod( 'devclick_blog_home_page_title_size', 'small' );

	if( is_home() && $devclick_blog_home_page_title_text_position != '' ) {
        switch ( $devclick_blog_home_page_title_text_position ) {
            case 'left':
            	$output .= '.page-header-inner {  text-align: left !important; }';
                break;
            case 'right':
                $output .= '.page-header-inner {  text-align: right !important; }';
                break;
            case 'centre':
               	$output .= '.page-header-inner {  text-align: center !important; }';
                break;
        }
    }

    if( is_home() && $devclick_blog_home_page_title_size != '' ) {
        switch ( $devclick_blog_home_page_title_size ) {
            case 'small':
            	$output .= '.page-header-size {  padding: 36px 0 !important; }';
                break;
            case 'large':
                $output .= '.page-header-size {  padding: 72px 0 !important; }';
                break;
        }
    }





	// 404 Page
	$devclick_404_page_title_text_position = get_theme_mod( 'devclick_404_page_title_text_position', 'left' );
	$devclick_404_page_title_size          = get_theme_mod( 'devclick_404_page_title_size', 'small' );

	if( is_404() && $devclick_404_page_title_text_position != '' ) {
        switch ( $devclick_404_page_title_text_position ) {
            case 'left':
            	$output .= '.page-header-inner {  text-align: left !important; }';
                break;
            case 'right':
                $output .= '.page-header-inner {  text-align: right !important; }';
                break;
            case 'centre':
               	$output .= '.page-header-inner {  text-align: center !important; }';
                break;
        }
    }

    if( is_404() && $devclick_404_page_title_size != '' ) {
        switch ( $devclick_404_page_title_size ) {
            case 'small':
            	$output .= '.page-header-size {  padding: 36px 0 !important; }';
                break;
            case 'large':
                $output .= '.page-header-size {  padding: 72px 0 !important; }';
                break;
        }
    }





	// Search Page
	$devclick_search_page_title_text_position = get_theme_mod( 'devclick_search_page_title_text_position', 'left' );
	$devclick_search_page_title_size          = get_theme_mod( 'devclick_search_page_title_size', 'small' );

	if( is_search() && $devclick_search_page_title_text_position != '' ) {
        switch ( $devclick_search_page_title_text_position ) {
            case 'left':
            	$output .= '.page-header-inner {  text-align: left !important; }';
                break;
            case 'right':
                $output .= '.page-header-inner {  text-align: right !important; }';
                break;
            case 'centre':
               	$output .= '.page-header-inner {  text-align: center !important; }';
                break;
        }
    }

    if( is_search() && $devclick_search_page_title_size != '' ) {
        switch ( $devclick_search_page_title_size ) {
            case 'small':
            	$output .= '.page-header-size {  padding: 36px 0 !important; }';
                break;
            case 'large':
                $output .= '.page-header-size {  padding: 72px 0 !important; }';
                break;
        }
    }





	// Archive Page
	$devclick_archive_page_title_text_position = get_theme_mod( 'devclick_archive_page_title_text_position', 'left' );
	$devclick_archive_page_title_size          = get_theme_mod( 'devclick_archive_page_title_size', 'small' );

	if( is_archive() && $devclick_archive_page_title_text_position != '' ) {
        switch ( $devclick_archive_page_title_text_position ) {
            case 'left':
            	$output .= '.page-header-inner {  text-align: left !important; }';
                break;
            case 'right':
                $output .= '.page-header-inner {  text-align: right !important; }';
                break;
            case 'centre':
               	$output .= '.page-header-inner {  text-align: center !important; }';
                break;
        }
    }

    if( is_archive() && $devclick_archive_page_title_size != '' ) {
        switch ( $devclick_archive_page_title_size ) {
            case 'small':
            	$output .= '.page-header-size {  padding: 36px 0 !important; }';
                break;
            case 'large':
                $output .= '.page-header-size {  padding: 72px 0 !important; }';
                break;
        }
    }





	// Footer
	$devclick_footer_widget_title_colour = get_theme_mod( 'devclick_footer_widget_title_colour', '#FFFFFF' );
	$devclick_footer_text_colour         = get_theme_mod( 'devclick_footer_text_colour', '#b5bdc3' );
	$devclick_footer_link_hover_colour   = get_theme_mod( 'devclick_footer_link_hover_colour', '#FAB709' );

	if ( $devclick_footer_widget_title_colour ) {
		$output .= '.site-footer .widget-title { color: ' . esc_attr( $devclick_footer_widget_title_colour ) . '; }';
	}

	if ( $devclick_footer_text_colour ) {
		$output .= '.site-footer, .site-footer p, .site-footer li, .site-footer a { color: ' . esc_attr( $devclick_footer_text_colour ) . '; }';
	}

	if ( $devclick_footer_link_hover_colour ) {
		$output .= '.site-footer a:hover { color: ' . esc_attr( $devclick_footer_link_hover_colour ) . '; }';
	}





    // Custom CSS
    $devclick_custom_css = get_theme_mod( 'devclick_custom_css' );

    if ( $devclick_custom_css ) {
        $output .= esc_attr( $devclick_custom_css );
    }




	
	// Google Fonts
	$devclick_google_fonts = get_theme_mod( 'devclick_google_fonts', 'Default' );

	if( $devclick_google_fonts != '' ) {
    	switch ( $devclick_google_fonts ) {
    		case 'font_set_2':
    			$output .= 'h1, h2, h3, h4, h5, h6, .btn-colour, .btn-border, .main-navigation ul li a, .mobile-navigation a, .comment-respond .form-submit input, .search-form .search-submit, input[type="submit"], .site-branding.font-logo { font-family: "Oswald", sans-serif; } body, button, input, select, textarea, h3.comment-reply-title a, .search-results-list a { font-family: "Roboto", sans-serif; }';
    			break;
    		case 'font_set_3':
    			$output .= 'h1, h2, h3, h4, h5, h6, .btn-colour, .btn-border, .main-navigation ul li a, .mobile-navigation a, .comment-respond .form-submit input, .search-form .search-submit, input[type="submit"], .site-branding.font-logo { font-family: "Hind", sans-serif; } body, button, input, select, textarea, h3.comment-reply-title a, .search-results-list a { font-family: "Merriweather", serif; }';
    			break;
    	}
    }





	// Output
	if ( $output ) {
		echo '<style>' . $output . '</style>';
	}





}
add_action( 'wp_head', 'devclick_custom_css' );