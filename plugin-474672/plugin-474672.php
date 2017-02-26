<?php

/*
Plugin Name: Add to Left Rail
Description: Add items to the left rail.
Version: 1.0
Author: Aaron Ritchey
Author URI: http://aaronritchey.com
*/

// Prevent direct access to this file.
defined( 'ABSPATH' ) or die();



add_action('admin_menu', 'x474672_admin_menu');
function x474672_admin_menu() {

	// A quick page under Settings.
	add_options_page(
		$page_title = 'The Oft-overlooked &lt;TITLE&gt;',
		$menu_title = 'On the Left #1',
		$capability = 'manage_options',
		$menu_slug = 'x474672_plugin_option',
		$function = 'x474672_page_X'
	);

	//////
	// Add to Dashboard.
	//
	// See other $parent_slugs to choose from.
	//   https://developer.wordpress.org/reference/functions/add_submenu_page/#comment-1404
	//
	add_submenu_page(
		$parent_slug = 'index.php',
		$title = 'The Oft-overlooked &lt;TITLE&gt;',
		$menu = 'On the Left #2',
		$capability = 1,
		$slug = 'x474672_dashboard_color',
		$callback = 'x474672_page_X'
	);
	
}



//////
// The optional parameter $priority can be used to roughly position
//   menu items within the left rail.
//
// For example, if you wanted to add a new menu item to the Gravity Forms
//   plugin, setting a lower priority will guarantee your page will be displayed
//   after all of the other Gravity Forms pages. Additionally, adding your
//   plugins to the bottom of another plugin is polite, as far as not
//   confusing other WordPress users about where the official plugin ends
//   and where your plugin picks up.
//
// The default $priority is 10.
//
// http://stackoverflow.com/a/25634892
//
add_action('admin_menu', 'x474672_admin_menu_low_priority', $priority=11);
function x474672_admin_menu_low_priority() {
	add_submenu_page(
		$parent_slug = 'plugins.php',
		$title = 'The Oft-overlooked &lt;TITLE&gt;',
		
		//////
		// Menu items can be colored.
		//
		// (Merging onto a single line to avoid whitespace issues between letters.)
		$menu = '<span style="color: #8080ff">R</span><span style="color: #80ff80">A</span><span style="color: #80ffff">I</span><span style="color: #ff8080">N</span><span style="color: #ff80ff">B</span><span style="color: #ffff80">O</span><span style="color: #ffffff">W</span>',

		$capability = 1,
		$slug = 'x474672_plugin_suboption',
		$callback = 'x474672_page_X'
	);
}

// A simple page for the menu links to point to.
function x474672_page_X() {
    print '<p>HTML for your page would go here.</p>';
    print '<p>This plugin adds three menu options to the left rail:</p>
    <ol>
    	<li>under Settings</li>
    	<li>under Dashboard</li>
    	<li>under Plugins</li>
    </ol>';
}
