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
		wp_die( __( 'You do not have sufficient permissions to access this page. PLease ask an administrator for privilages ' ) );
	}?>


	<div class="wrap">
	<h1>Popup Options</h1>
	<?php $layout = get_option('theme_layout'); ?>
	<form method="post" action="options.php">
 	        <?php
 	            settings_fields("section");
 	            do_settings_sections("post_type_options");
 	            submit_button();
 	        ?>
 	    </form>
	<h2>Current Settings</h2>

	<b>Style: </b><?php echo get_option('popup_style'); ?><br />
	<div id="csw-container" class="csw-container">
	  <div class="csw-wrapper">
	    <p class="csw-primary-text">
	      <?php echo get_option('csw_primary_text'); ?>
	    </p>
	    <p id="csw-secondary-text" class="csw-secondary-text">
	      <?php echo get_option('csw_secondary_text'); ?>
	    </p>
	    <button id="csw-warning-button" class="csw-warning-button">
	      <?php echo get_option('csw_button_text'); ?>
	    </button>
	  </div>
	</div>

</div>
<?php }

function choose_style_type()
{
	?>
<select name="popup_style">
  <option value="basic" <?php checked(1, get_option('popup_style'), true); ?>>Basic</option>
  <option value="bootstrap" <?php checked(2, get_option('popup_style'), true); ?>>Bootstrap</option>
  <option value="none" <?php checked(3, get_option('popup_style'), true); ?> >None</option>
</select>
<?php
}
function csw_primary_text_function()
{
	?>
	<textarea type="textarea" class="csw_primary_text" name="csw_primary_text" name="" cols="80" rows="8" <?php checked(1, get_option('csw_primary_text'), true); ?>><?php echo get_option('csw_primary_text'); ?></textarea><br>
	<?php
}
function csw_secondary_text_function()
{
	?>
	<textarea type="textarea" class="csw_secondary_text" name="csw_secondary_text" name="" cols="80" rows="4" <?php checked(1, get_option('csw_secondary_text'), true); ?>><?php echo get_option('csw_secondary_text'); ?></textarea><br>

	<?php
}
function csw_button_text_function()
{
	?>
	<textarea type="textarea" class="csw_button_text" name="csw_button_text" name="" cols="40" rows="1" <?php checked(1, get_option('csw_button_text'), true); ?>><?php echo get_option('csw_button_text'); ?></textarea><br>

	<?php
}


function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "post_type_options");

	add_settings_field("popup_style", "Select popup style", "choose_style_type", "post_type_options", "section");
	add_settings_field("csw_primary_text", "Enter Primary Text", "csw_primary_text_function", "post_type_options", "section");
	add_settings_field("csw_secondary_text", "Enter Secondary Text", "csw_secondary_text_function", "post_type_options", "section");
	add_settings_field("csw_button_text", "Enter Button Text", "csw_button_text_function", "post_type_options", "section");

	register_setting("section", "popup_style");
	register_setting("section", "csw_primary_text");
	register_setting("section", "csw_secondary_text");
	register_setting("section", "csw_button_text");
}

add_action("admin_init", "display_theme_panel_fields");

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', plugins_url(). "/cultural-sensitivity-warning/css/main.css" );
    wp_enqueue_script( 'script-name', plugins_url(). "/cultural-sensitivity-warning/js/cultural-sensitivity-warning.js", array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function hook_header() {
include 'output_body.php';
}
add_action('wp_head','hook_header');

function hook_footer() {
include 'output_footer.php';
}
add_action('wp_footer','hook_footer');
