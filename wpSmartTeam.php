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


 //include post types
 require_once('post-types/teams.php');

 //include taxonomies
 require_once('taxonomies/team-category.php');
 require_once('taxonomies/team-designation.php');
 require_once('taxonomies/team-location.php');

 //include meta box
 require_once('meta-box/teams.php');