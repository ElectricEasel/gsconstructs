<?php

function terri_team() {
	$labels = array(
		'name'               => _x( 'Team Members', 'post type general name', 'terri-toolkit' ),
		'singular_name'      => _x( 'Team Member', 'post type singular name', 'terri-toolkit' ),
		'menu_name'          => _x( 'Team Members', 'admin menu', 'terri-toolkit' ),
		'name_admin_bar'     => _x( 'Team Member', 'add new on admin bar', 'terri-toolkit' ),
		'add_new'            => _x( 'Add New', 'team member', 'terri-toolkit' ),
		'add_new_item'       => __( 'Add New Team Member', 'terri-toolkit' ),
		'edit_item'          => __( 'Edit Team Member', 'terri-toolkit' ),
		'view_item'          => __( 'View Team Member', 'terri-toolkit' ),
		'all_items'          => __( 'All Team Members', 'terri-toolkit' ),
		'search_items'       => __( 'Search Team Members', 'terri-toolkit' ),
		'parent_item_colon'  => __( 'Parent Team Members:', 'terri-toolkit' ),
		'not_found'          => __( 'No team members found.', 'terri-toolkit' ),
		'not_found_in_trash' => __( 'No team members found in trash.', 'terri-toolkit' ),
	);

	$args = array (
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-users',
		'query_var'           => true,
		'rewrite'             => array( 'slug' => 'team' ),
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'exclude_from_search' => true
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'terri_team');