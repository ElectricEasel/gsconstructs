<?php

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'devclick_body_classes' ) ) {
	function devclick_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
	add_filter( 'body_class', 'devclick_body_classes' );
}





/**
 * Read more link.
 */
if ( ! function_exists( 'devclick_read_more_link' ) ) {
    function devclick_read_more_link() {
        return '<a class="more" href="' . get_permalink() . '">' . esc_html__( 'Read More', 'terri' ) . '</a>';
    }
    add_filter( 'the_content_more_link', 'devclick_read_more_link' );
}




/**
 * Project pagination
 *
 * http://callmenick.com/post/custom-wordpress-loop-with-pagination
 */
if ( ! function_exists( 'custom_pagination' ) ) {
	function custom_pagination($numpages = '', $pagerange = '', $paged='') {

		if (empty($pagerange)) {
			$pagerange = 2;
		}

		/**
		* This first part of our function is a fallback
		* for custom pagination inside a regular loop that
		* uses the global $paged and global $wp_query variables.
		* 
		* It's good because we can now override default pagination
		* in our theme, and use this function in default quries
		* and custom queries.
		*/
		global $paged;
		if (empty($paged)) {
			$paged = 1;
		}
		if ($numpages == '') {
			global $wp_query;
			$numpages = $wp_query->max_num_pages;
			if(!$numpages) {
			    $numpages = 1;
			}
		}

		/** 
		* We construct the pagination arguments to enter into our paginate_links
		* function. 
		*/
		$pagination_args = array(
			'base'            => get_pagenum_link(1) . '%_%',
			'format'          => 'page/%#%',
			'total'           => $numpages,
			'current'         => $paged,
			'show_all'        => False,
			'end_size'        => 1,
			'mid_size'        => $pagerange,
			'prev_next'       => False,
			'prev_text'       => esc_html__('&laquo;', 'terri'),
			'next_text'       => esc_html__('&raquo;', 'terri'),
			'type'            => 'plain',
			'add_args'        => false,
			'add_fragment'    => ''
		);

		$paginate_links = paginate_links($pagination_args);

		if ($paginate_links) {
			echo "<nav class='project-pagination'>";
				echo $paginate_links;
			echo "</nav>";
		}

	}
}