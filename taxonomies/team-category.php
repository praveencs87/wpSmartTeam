<?php

/**
 * Registers the `team_category` taxonomy,
 * for use with 'teams'.
 */
function team_category_init() {
	register_taxonomy( 'team-category', array( 'teams' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Team categories', 'wpSmartTeam' ),
			'singular_name'              => _x( 'Team category', 'taxonomy general name', 'wpSmartTeam' ),
			'search_items'               => __( 'Search Team categories', 'wpSmartTeam' ),
			'popular_items'              => __( 'Popular Team categories', 'wpSmartTeam' ),
			'all_items'                  => __( 'All Team categories', 'wpSmartTeam' ),
			'parent_item'                => __( 'Parent Team category', 'wpSmartTeam' ),
			'parent_item_colon'          => __( 'Parent Team category:', 'wpSmartTeam' ),
			'edit_item'                  => __( 'Edit Team category', 'wpSmartTeam' ),
			'update_item'                => __( 'Update Team category', 'wpSmartTeam' ),
			'view_item'                  => __( 'View Team category', 'wpSmartTeam' ),
			'add_new_item'               => __( 'Add New Team category', 'wpSmartTeam' ),
			'new_item_name'              => __( 'New Team category', 'wpSmartTeam' ),
			'separate_items_with_commas' => __( 'Separate team categories with commas', 'wpSmartTeam' ),
			'add_or_remove_items'        => __( 'Add or remove team categories', 'wpSmartTeam' ),
			'choose_from_most_used'      => __( 'Choose from the most used team categories', 'wpSmartTeam' ),
			'not_found'                  => __( 'No team categories found.', 'wpSmartTeam' ),
			'no_terms'                   => __( 'No team categories', 'wpSmartTeam' ),
			'menu_name'                  => __( 'Team categories', 'wpSmartTeam' ),
			'items_list_navigation'      => __( 'Team categories list navigation', 'wpSmartTeam' ),
			'items_list'                 => __( 'Team categories list', 'wpSmartTeam' ),
			'most_used'                  => _x( 'Most Used', 'team-category', 'wpSmartTeam' ),
			'back_to_items'              => __( '&larr; Back to Team categories', 'wpSmartTeam' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'team-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'team_category_init' );

/**
 * Sets the post updated messages for the `team_category` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `team_category` taxonomy.
 */
function team_category_updated_messages( $messages ) {

	$messages['team-category'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Team category added.', 'wpSmartTeam' ),
		2 => __( 'Team category deleted.', 'wpSmartTeam' ),
		3 => __( 'Team category updated.', 'wpSmartTeam' ),
		4 => __( 'Team category not added.', 'wpSmartTeam' ),
		5 => __( 'Team category not updated.', 'wpSmartTeam' ),
		6 => __( 'Team categories deleted.', 'wpSmartTeam' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'team_category_updated_messages' );
