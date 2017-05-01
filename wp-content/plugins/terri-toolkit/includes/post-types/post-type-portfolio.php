<?php 

function terri_portfolio() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'terri-toolkit' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'terri-toolkit' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'terri-toolkit' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'terri-toolkit' ),
		'add_new'            => _x( 'Add New', 'project', 'terri-toolkit' ),
		'add_new_item'       => __( 'Add New Project', 'terri-toolkit' ),
		'edit_item'          => __( 'Edit Project', 'terri-toolkit' ),
		'view_item'          => __( 'View Project', 'terri-toolkit' ),
		'all_items'          => __( 'All Projects', 'terri-toolkit' ),
		'search_items'       => __( 'Search Projects', 'terri-toolkit' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'terri-toolkit' ),
		'not_found'          => __( 'No projects found.', 'terri-toolkit' ),
		'not_found_in_trash' => __( 'No projects found in trash.', 'terri-toolkit' ),
	);

	$args = array (
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'project' ),
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'exclude_from_search' => true
	);
	register_post_type( 'project', $args );
}
add_action( 'init', 'terri_portfolio');





function project_categories() {
	$labels = array(
		'name'              => _x( 'Project Categories', 'Categories' ),
		'singular_name'     => _x( 'Project Category', 'Category' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-category' ),
	);
	register_taxonomy( 'project-category', array( 'project' ), $args );
}
add_action ( 'init', 'project_categories' );