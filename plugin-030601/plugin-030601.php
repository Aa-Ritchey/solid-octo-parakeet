<?php

/*
Plugin Name: Add Link to Plugin Entry
Description: Add a link next to a plugin's "Deactivate" link.
Version: 1.0
Author: Aaron Ritchey
Author URI: http://aaronritchey.com
*/

// Prevent direct access to this file.
defined( 'ABSPATH' ) or die();



//////
// See the Codex:
//   https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
//



function x030601_add_action_links ( $links ) {

	//////
	// You can add text, though, text will need to be colored.
	//   Consider whether it's worth cluttering up this limited
	//   amount of real estate.
	$new_links_before = array(
		'BEFORE',
		'<a href="' . admin_url( 'options-general.php?page=x030601_plugin_option' ) . '">Click Me</a>',
	);
	
	//////
	// You can hide the "Deactivate" button by shifting the first element off $links.
	//   If you do this, let me know how many five-star reviews your plugin receives.
	##array_shift($links);
	
	$new_links_after = array(
		'AFTER',
	);
	
	//////
	// You can just merge two arrays.
	return array_merge( $new_links_before, $links, $new_links_after );
	
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'x030601_add_action_links' );





//////
// It's not necessary to understand this code.
//   You may already know this anyway.
//
add_action('admin_menu', 'x030601_admin_menu');
function x030601_admin_menu() {

	// A quick page under Settings.
	add_options_page(
		$page_title = 'The Oft-overlooked &lt;TITLE&gt;',
		$menu_title = 'Plugin #030601',
		$capability = 'manage_options',
		$menu_slug = 'x030601_plugin_option',
		$function = 'x030601_page_X'
	);

}

// A simple page for the menu links to point to.
function x030601_page_X() {
    print '<h1>Add Link to Plugin Entry</h1>';
    print '<p>This is a placeholder page. A link on the Plugins page points here.</p>';
}
