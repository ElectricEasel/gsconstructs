<?php

class TerriShortcodes {





    public function __construct() {
        add_action( 'init', array( $this, 'add_shortcodes' ) );
        add_filter( 'widget_text', 'do_shortcode' );
    }




    /*--------------------------------------------------------------------------------------
     * Add shortcode
     *-------------------------------------------------------------------------------------*/
    public function add_shortcodes() {
        $shortcodes = array(
            'collapsibles',
            'collapse',
            'fa',
            'table'
        );
        
        foreach ( $shortcodes as $shortcode ) {
            $function = 'terri_' . str_replace( '-', '_', $shortcode );
            add_shortcode( $shortcode, array( $this, $function ) );
        }
    }





    /*--------------------------------------------------------------------------------------
     * Collapse (Accordion) Shortcode
     * @author Filip Stefansson
     * @see https://goo.gl/wTWkA4
     *-------------------------------------------------------------------------------------*/
    function terri_collapsibles( $atts, $content = null ) {
        if( isset($GLOBALS['collapsibles_count']) ) {
            $GLOBALS['collapsibles_count']++;
        } else {
            $GLOBALS['collapsibles_count'] = 0;
        }

        $defaults = array();
        extract( shortcode_atts( $defaults, $atts ) );
        // Extract the tab titles for use in the tab widget.
        preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
        $tab_titles = array();
        
        if( isset( $matches[1] ) ){
            $tab_titles = $matches[1];
        }
        $output = '';
        
        if( count( $tab_titles ) ){
            $output .= '<div class="panel-group" id="accordion-' . $GLOBALS['collapsibles_count'] . '" data-panel="accordion-' . $GLOBALS['collapsibles_count'] . '">';
            $output .= do_shortcode( $content );
            $output .= '</div>';
        } else {
            $output .= do_shortcode( $content );
        }

        return $output;
    }
     
    function terri_collapse( $atts, $content = null ) {
        if( !isset($GLOBALS['current_collapse']) ){
            $GLOBALS['current_collapse'] = 0;
        } else {
            $GLOBALS['current_collapse']++;
        }

        extract( shortcode_atts( array(
            "title"  => '',
            "active" => '',
            "state" => false
        ), $atts ) );

        if ( $state == "active" ) {
            $state = 'in';
            $active = 'active';
        }

        return '<div class="panel"><div class="panel-heading"><h3 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '" ' . ( ! empty( $active ) ? 'aria-expanded="true"' : '' ) . '>' . $title . '</a></h3></div><div id="collapse_' . $GLOBALS['current_collapse'] . '" class="panel-collapse collapse ' . $state . '"><div class="panel-body">' . do_shortcode($content) . ' </div></div></div>';
    }





    /*--------------------------------------------------------------------------------------
     * Font Awesome Shortcode
     *-------------------------------------------------------------------------------------*/
    function terri_fa( $atts, $content = null ) {
        extract(shortcode_atts( array(
            'icon'   => 'fa-home',
            'href'   => '',
            'target' => '_self',
        ), $atts ) );

        if ( empty( $href ) ) {
            return '<span class="terri-icon"><i class="fa ' . strtolower( $icon ) . '"></i></span>';
        } else {
            return '<a class="terri-icon" href="' . $href . '" target="' . $target . '"><i class="fa ' . strtolower( $icon ) . '"></i></a>';
        }
    }





    /*--------------------------------------------------------------------------------------
     * Table Shortcode
     *-------------------------------------------------------------------------------------*/
    function terri_table( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'cols' => 'none',
            'data' => 'none'
        ), $atts ) );

        $cols  = explode(',',$cols);
        $data  = explode(',',$data);
        $total = count($cols);
        
        $output = '<table class="terri-table"><thead>';
        
        foreach( $cols as $col ) {
            $output .= '<td>'.$col.'</td>';
        }
       
        $output .= '</thead><tr>';
        $counter = 1;
       
        foreach( $data as $datum ) {
            $output .= '<td>'.$datum.'</td>';
            if($counter%$total==0) {
                $output .= '</tr>';
            }
            $counter++;
        }

        $output .= '</table>';
        return $output;
    }






}

new TerriShortcodes();