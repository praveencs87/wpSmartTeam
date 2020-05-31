<?php

/**
 * Registers the `team_designation` taxonomy,
 * for use with 'teams'.
 */
function team_designation_init() {
	register_taxonomy( 'team-designation', array( 'teams' ), array(
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
			'name'                       => __( 'Team designations', 'wpSmartTeam' ),
			'singular_name'              => _x( 'Team designation', 'taxonomy general name', 'wpSmartTeam' ),
			'search_items'               => __( 'Search Team designations', 'wpSmartTeam' ),
			'popular_items'              => __( 'Popular Team designations', 'wpSmartTeam' ),
			'all_items'                  => __( 'All Team designations', 'wpSmartTeam' ),
			'parent_item'                => __( 'Parent Team designation', 'wpSmartTeam' ),
			'parent_item_colon'          => __( 'Parent Team designation:', 'wpSmartTeam' ),
			'edit_item'                  => __( 'Edit Team designation', 'wpSmartTeam' ),
			'update_item'                => __( 'Update Team designation', 'wpSmartTeam' ),
			'view_item'                  => __( 'View Team designation', 'wpSmartTeam' ),
			'add_new_item'               => __( 'Add New Team designation', 'wpSmartTeam' ),
			'new_item_name'              => __( 'New Team designation', 'wpSmartTeam' ),
			'separate_items_with_commas' => __( 'Separate team designations with commas', 'wpSmartTeam' ),
			'add_or_remove_items'        => __( 'Add or remove team designations', 'wpSmartTeam' ),
			'choose_from_most_used'      => __( 'Choose from the most used team designations', 'wpSmartTeam' ),
			'not_found'                  => __( 'No team designations found.', 'wpSmartTeam' ),
			'no_terms'                   => __( 'No team designations', 'wpSmartTeam' ),
			'menu_name'                  => __( 'Team designations', 'wpSmartTeam' ),
			'items_list_navigation'      => __( 'Team designations list navigation', 'wpSmartTeam' ),
			'items_list'                 => __( 'Team designations list', 'wpSmartTeam' ),
			'most_used'                  => _x( 'Most Used', 'team-designation', 'wpSmartTeam' ),
			'back_to_items'              => __( '&larr; Back to Team designations', 'wpSmartTeam' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'team-designation',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'team_designation_init' );

/**
 * Sets the post updated messages for the `team_designation` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `team_designation` taxonomy.
 */
function team_designation_updated_messages( $messages ) {

	$messages['team-designation'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Team designation added.', 'wpSmartTeam' ),
		2 => __( 'Team designation deleted.', 'wpSmartTeam' ),
		3 => __( 'Team designation updated.', 'wpSmartTeam' ),
		4 => __( 'Team designation not added.', 'wpSmartTeam' ),
		5 => __( 'Team designation not updated.', 'wpSmartTeam' ),
		6 => __( 'Team designations deleted.', 'wpSmartTeam' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'team_designation_updated_messages' );
