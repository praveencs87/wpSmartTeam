<?php
/**
 * Plugin Name:       WP SMART TEAM
 * Description:       Created for BellCoww
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Praveen C S
 * Author URI:        http://praveencs87.github.io/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

 /**
 * Registers the `teams` post type.
 */
function teams_init() {
    register_post_type( 'teams', array(
            'labels'                => array(
                    'name'                  => __( 'Teams', 'teams' ),
                    'singular_name'         => __( 'Teams', 'teams' ),
                    'all_items'             => __( 'All Teams', 'teams' ),
                    'archives'              => __( 'Teams Archives', 'teams' ),
                    'attributes'            => __( 'Teams Attributes', 'teams' ),
                    'insert_into_item'      => __( 'Insert into Teams', 'teams' ),
                    'uploaded_to_this_item' => __( 'Uploaded to this Teams', 'teams' ),
                    'featured_image'        => _x( 'Featured Image', 'teams', 'teams' ),
                    'set_featured_image'    => _x( 'Set featured image', 'teams', 'teams' ),
                    'remove_featured_image' => _x( 'Remove featured image', 'teams', 'teams' ),
                    'use_featured_image'    => _x( 'Use as featured image', 'teams', 'teams' ),
                    'filter_items_list'     => __( 'Filter Teams list', 'teams' ),
                    'items_list_navigation' => __( 'Teams list navigation', 'teams' ),
                    'items_list'            => __( 'Teams list', 'teams' ),
                    'new_item'              => __( 'New Teams', 'teams' ),
                    'add_new'               => __( 'Add New', 'teams' ),
                    'add_new_item'          => __( 'Add New Teams', 'teams' ),
                    'edit_item'             => __( 'Edit Teams', 'teams' ),
                    'view_item'             => __( 'View Teams', 'teams' ),
                    'view_items'            => __( 'View Teams', 'teams' ),
                    'search_items'          => __( 'Search Teams', 'teams' ),
                    'not_found'             => __( 'No Teams found', 'teams' ),
                    'not_found_in_trash'    => __( 'No Teams found in trash', 'teams' ),
                    'parent_item_colon'     => __( 'Parent Teams:', 'teams' ),
                    'menu_name'             => __( 'Teams', 'teams' ),
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
            'menu_icon'             => 'dashicons-user',
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
            1  => sprintf( __( 'Teams updated. <a target="_blank" href="%s">View Teams</a>', 'teams' ), esc_url( $permalink ) ),
            2  => __( 'Custom field updated.', 'teams' ),
            3  => __( 'Custom field deleted.', 'teams' ),
            4  => __( 'Teams updated.', 'teams' ),
            /* translators: %s: date and time of the revision */
            5  => isset( $_GET['revision'] ) ? sprintf( __( 'Teams restored to revision from %s', 'teams' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            /* translators: %s: post permalink */
            6  => sprintf( __( 'Teams published. <a href="%s">View Teams</a>', 'teams' ), esc_url( $permalink ) ),
            7  => __( 'Teams saved.', 'teams' ),
            /* translators: %s: post permalink */
            8  => sprintf( __( 'Teams submitted. <a target="_blank" href="%s">Preview Teams</a>', 'teams' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
            /* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
            9  => sprintf( __( 'Teams scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Teams</a>', 'teams' ),
            date_i18n( __( 'M j, Y @ G:i', 'teams' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
            /* translators: %s: post permalink */
            10 => sprintf( __( 'Teams draft updated. <a target="_blank" href="%s">Preview Teams</a>', 'teams' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
    );

    return $messages;
}
add_filter( 'post_updated_messages', 'teams_updated_messages' );