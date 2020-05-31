<?php

/**
 * Registers the `teams` post type.
 */
function teams_init() {
	register_post_type( 'teams', array(
		'labels'                => array(
			'name'                  => __( 'Teams', 'wpSmartTeam' ),
			'singular_name'         => __( 'Teams', 'wpSmartTeam' ),
			'all_items'             => __( 'All Teams', 'wpSmartTeam' ),
			'archives'              => __( 'Teams Archives', 'wpSmartTeam' ),
			'attributes'            => __( 'Teams Attributes', 'wpSmartTeam' ),
			'insert_into_item'      => __( 'Insert into teams', 'wpSmartTeam' ),
			'uploaded_to_this_item' => __( 'Uploaded to this teams', 'wpSmartTeam' ),
			'featured_image'        => _x( 'Featured Image', 'teams', 'wpSmartTeam' ),
			'set_featured_image'    => _x( 'Set featured image', 'teams', 'wpSmartTeam' ),
			'remove_featured_image' => _x( 'Remove featured image', 'teams', 'wpSmartTeam' ),
			'use_featured_image'    => _x( 'Use as featured image', 'teams', 'wpSmartTeam' ),
			'filter_items_list'     => __( 'Filter teams list', 'wpSmartTeam' ),
			'items_list_navigation' => __( 'Teams list navigation', 'wpSmartTeam' ),
			'items_list'            => __( 'Teams list', 'wpSmartTeam' ),
			'new_item'              => __( 'New Teams', 'wpSmartTeam' ),
			'add_new'               => __( 'Add New', 'wpSmartTeam' ),
			'add_new_item'          => __( 'Add New Teams', 'wpSmartTeam' ),
			'edit_item'             => __( 'Edit Teams', 'wpSmartTeam' ),
			'view_item'             => __( 'View Teams', 'wpSmartTeam' ),
			'view_items'            => __( 'View Teams', 'wpSmartTeam' ),
			'search_items'          => __( 'Search teams', 'wpSmartTeam' ),
			'not_found'             => __( 'No teams found', 'wpSmartTeam' ),
			'not_found_in_trash'    => __( 'No teams found in trash', 'wpSmartTeam' ),
			'parent_item_colon'     => __( 'Parent Teams:', 'wpSmartTeam' ),
			'menu_name'             => __( 'Teams', 'wpSmartTeam' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'teams',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'teams_init' );

/**
 * Sets the post updated messages for the `teams` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `teams` post type.
 */
function teams_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['teams'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Teams updated. <a target="_blank" href="%s">View teams</a>', 'wpSmartTeam' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wpSmartTeam' ),
		3  => __( 'Custom field deleted.', 'wpSmartTeam' ),
		4  => __( 'Teams updated.', 'wpSmartTeam' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Teams restored to revision from %s', 'wpSmartTeam' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Teams published. <a href="%s">View teams</a>', 'wpSmartTeam' ), esc_url( $permalink ) ),
		7  => __( 'Teams saved.', 'wpSmartTeam' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Teams submitted. <a target="_blank" href="%s">Preview teams</a>', 'wpSmartTeam' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Teams scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview teams</a>', 'wpSmartTeam' ),
		date_i18n( __( 'M j, Y @ G:i', 'wpSmartTeam' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Teams draft updated. <a target="_blank" href="%s">Preview teams</a>', 'wpSmartTeam' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'teams_updated_messages' );
