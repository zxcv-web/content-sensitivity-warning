<?php
/*
Plugin Name: Content Sensitivity Warning
Plugin URI:  https://github.com/zxcv-web/content-sensitivity-warning
Description: A Wordpress plugin aimed at warning visitors of sensitive material contribute on github
Version:     0.9.0
Author:      Jack Dunstan and Luke Powell
Author URI:		http://zxcv.net.au
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:
Text Domain:
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function csw_plugin_menu() {
	add_options_page( 'Plugin Options', 'Content Sensitivity', 'manage_options', 'csw_plugin', 'csw_plugin_options' );
}

add_action( 'admin_menu', 'csw_plugin_menu' );

function csw_plugin_options() {
	if ( !current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page. Please ask an administrator for privilages ' ) );
	}?>

	<div class="wrap">
		<h1>Content Sensitivity Warning Options</h1>
		<?php $layout = get_option('theme_layout'); ?>
		<form method="post" action="options.php">
      <?php
        settings_fields("section");
        do_settings_sections("post_type_options");
        submit_button();
      ?>
    </form>
	</div>
<?php
}

function csw_choose_style_type() {
	?>
	<select name="csw_popup_style">
	  <option value="theme" <?php if ( get_option('csw_popup_style') == 'theme' ) echo 'selected="selected"'; ?>>Theme</option>
	  <option value="bootstrap" <?php if ( get_option('csw_popup_style') == 'bootstrap' ) echo 'selected="selected"'; ?>>Bootstrap</option>
	  <option value="none" <?php if ( get_option('csw_popup_style') == 'none' ) echo 'selected="selected"'; ?>>None</option>
	</select>
<?php
}
function csw_primary_text_function() {
	?>
	<textarea type="textarea" class="csw_primary_text" name="csw_primary_text" name="" cols="80" rows="8" <?php checked(1, get_option('csw_primary_text'), true); ?>><?php echo get_option('csw_primary_text'); ?></textarea><br>
	<?php
}
function csw_secondary_text_function() {
	?>
	<textarea type="textarea" class="csw_secondary_text" name="csw_secondary_text" name="" cols="80" rows="4" <?php checked(1, get_option('csw_secondary_text'), true); ?>><?php echo get_option('csw_secondary_text'); ?></textarea><br>

	<?php
}
function csw_button_text_function() {
	?>
	<textarea type="textarea" class="csw_button_text" name="csw_button_text" name="" cols="40" rows="1" <?php checked(1, get_option('csw_button_text'), true); ?>><?php echo get_option('csw_button_text'); ?></textarea><br>

	<?php
}

function csw_display_theme_panel_fields() {
	add_settings_section(
			"section",
			"All Settings",
			null,
			"post_type_options"
	);
	add_settings_field(
			"csw_popup_style",
			"Select popup style",
			"csw_choose_style_type",
			"post_type_options",
			"section"
	);
	add_settings_field(
			"csw_primary_text",
			"Enter Primary Text",
			"csw_primary_text_function",
			"post_type_options",
			"section"
	);
	add_settings_field(
			"csw_secondary_text",
			"Enter Secondary Text",
			"csw_secondary_text_function",
			"post_type_options",
			"section"
	);
	add_settings_field(
			"csw_button_text",
			"Enter Button Text",
			"csw_button_text_function",
			"post_type_options",
			"section"
	);
	register_setting("section", "csw_popup_style");
	register_setting("section", "csw_primary_text");
	register_setting("section", "csw_secondary_text");
	register_setting("section", "csw_button_text");
}

add_action("admin_init", "csw_display_theme_panel_fields");

function csw_scripts() {
    wp_enqueue_style( 'style-name', plugins_url(). "/content-sensitivity-warning/css/main.css" );
    wp_enqueue_script( 'script-name', plugins_url(). "/content-sensitivity-warning/js/content-sensitivity-warning.js", array(), '1.0.0', false );
		if ('theme' == get_option('popup_style')) {
			wp_enqueue_style( 'csw-theme', plugins_url(). "/content-sensitivity-warning/css/theme.css" );
		};
}

add_action( 'wp_enqueue_scripts', 'csw_scripts' );

function csw_set_new_cookie() {
		if(isset($_GET['csw'])) {
			setcookie('csw', yes, time() + 604800, '/');
		} else {}
}

add_action( 'init', 'csw_set_new_cookie' );

function hook_header() {
	if(!isset($_COOKIE['csw'])) {
		include 'output_body.php';
	} else {}
}
add_action('wp_head','hook_header');



/* */
