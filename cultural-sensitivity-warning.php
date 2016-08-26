<?php
/*
Plugin Name: Cultural Sensitivity Warning
Plugin URI:  https://github.com/zxcv-web/cultural-sensitivity-warning
Description: A Wordpress plugin aimed at warning visitors of culturally sensitive material contribute on github
Version:     0.0.1
Author:      Jack Dunstan and Luke Powell
Author URI:		http://zxcv.net.au
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:
Text Domain:
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/** Step 2 (from text above). */
add_action( 'admin_menu', 'csw_plugin_menu' );

/** Step 1. */
function csw_plugin_menu() {
	add_options_page( 'Plugin Options', 'Cultural Sensitivity', 'manage_options', 'my-unique-identifier', 'csw_plugin_options' );
}

/** Step 3. */
function csw_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
