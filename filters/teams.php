<?php


//Filter Single Team page
function wpsmartteam_load_single_team_template( $template ) {
    global $post;

    if ( 'teams' === $post->post_type ) {
        /*
         * This is a 'Teams' post
         * so load it
         * from our plugin directory.
         */
        return plugin_dir_path( __FILE__ ) . '../templates/single-team.php';
    }

    return $template;
}

add_filter( 'single_template', 'wpsmartteam_load_single_team_template' );




//Filter Team archieve page
function wpsmartteam_load_team_template( $template ) {
    global $post;

    if ( is_post_type_archive( 'teams' )) {
        /*
         * This is a 'Teams' post
         * so load it
         * from our plugin directory.
         */
        return plugin_dir_path( __FILE__ ) . '../templates/teams.php';
    }

    return $template;
}

add_filter( 'archive_template', 'wpsmartteam_load_team_template' );


//add css
function wpsmartteam_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'wpsmartteam-style', $plugin_url . '../assets/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'wpsmartteam_load_plugin_css' );



