<?php

/*
Plugin Name: Paired Plugin A
Description: Display a warning when its partner, <em>Paired Plugin B</em>, is not active.
Version: 1.0
Author: Aaron Ritchey
Author URI: http://aaronritchey.com
*/

// Prevent direct access to this file.
defined( 'ABSPATH' ) or die();


//////
// Warn the user if this plugin will not work.
//
add_action( 'admin_init', 'a7f0f2_admin_init' );
function a7f0f2_admin_init() {

	if ( is_admin() ) {
		
		// If partner plugin is missing, warn the back-end user.
		if ( ! a7f0f2_is_required_plugin_active() ) {
			add_action( 'admin_notices', 'a7f0f2_warn_of_missing_plugin' );
		}
		
	}
}

function a7f0f2_warn_of_missing_plugin() {
	// TIP: the "is-dismissible" class can be added to a notice, though
	//   additional dev work is also needed for WordPress to remember
	//   that the notice has been dismissed.
    ?>
    <div class="notice notice-warning">
        <p><?php print '<strong>Paired Plugin A</strong> wants <em>Paired Plugin B</em> to be activated.' ?></p>
    </div>
    <?php
}


function a7f0f2_is_required_plugin_active() {

	return is_plugin_active('plugin-A7F0F3/plugin-A7F0F3.php');
	
}
