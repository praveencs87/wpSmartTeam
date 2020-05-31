<?php

/**
 * Registers the `team_location` taxonomy,
 * for use with 'teams'.
 */
function team_location_init() {
	register_taxonomy( 'team-location', array( 'teams' ), array(
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
			'name'                       => __( 'Team locations', 'wpSmartTeam' ),
			'singular_name'              => _x( 'Team location', 'taxonomy general name', 'wpSmartTeam' ),
			'search_items'               => __( 'Search Team locations', 'wpSmartTeam' ),
			'popular_items'              => __( 'Popular Team locations', 'wpSmartTeam' ),
			'all_items'                  => __( 'All Team locations', 'wpSmartTeam' ),
			'parent_item'                => __( 'Parent Team location', 'wpSmartTeam' ),
			'parent_item_colon'          => __( 'Parent Team location:', 'wpSmartTeam' ),
			'edit_item'                  => __( 'Edit Team location', 'wpSmartTeam' ),
			'update_item'                => __( 'Update Team location', 'wpSmartTeam' ),
			'view_item'                  => __( 'View Team location', 'wpSmartTeam' ),
			'add_new_item'               => __( 'Add New Team location', 'wpSmartTeam' ),
			'new_item_name'              => __( 'New Team location', 'wpSmartTeam' ),
			'separate_items_with_commas' => __( 'Separate team locations with commas', 'wpSmartTeam' ),
			'add_or_remove_items'        => __( 'Add or remove team locations', 'wpSmartTeam' ),
			'choose_from_most_used'      => __( 'Choose from the most used team locations', 'wpSmartTeam' ),
			'not_found'                  => __( 'No team locations found.', 'wpSmartTeam' ),
			'no_terms'                   => __( 'No team locations', 'wpSmartTeam' ),
			'menu_name'                  => __( 'Team locations', 'wpSmartTeam' ),
			'items_list_navigation'      => __( 'Team locations list navigation', 'wpSmartTeam' ),
			'items_list'                 => __( 'Team locations list', 'wpSmartTeam' ),
			'most_used'                  => _x( 'Most Used', 'team-location', 'wpSmartTeam' ),
			'back_to_items'              => __( '&larr; Back to Team locations', 'wpSmartTeam' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'team-location',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'team_location_init' );

/**
 * Sets the post updated messages for the `team_location` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `team_location` taxonomy.
 */
function team_location_updated_messages( $messages ) {

	$messages['team-location'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Team location added.', 'wpSmartTeam' ),
		2 => __( 'Team location deleted.', 'wpSmartTeam' ),
		3 => __( 'Team location updated.', 'wpSmartTeam' ),
		4 => __( 'Team location not added.', 'wpSmartTeam' ),
		5 => __( 'Team location not updated.', 'wpSmartTeam' ),
		6 => __( 'Team locations deleted.', 'wpSmartTeam' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'team_location_updated_messages' );
