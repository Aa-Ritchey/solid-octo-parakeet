<?php

/*
Plugin Name: Paired Plugin B
Description: Cause its partner, <em>Paired Plugin A</em>, to display a warning when this plugin is not active.
Version: 1.0
Author: Aaron Ritchey
Author URI: http://aaronritchey.com
*/

// Prevent direct access to this file.
defined( 'ABSPATH' ) or die();


//////
// Explain that I won't do anything.
//
add_action( 'admin_init', 'a7f0f3_admin_init' );
function a7f0f3_admin_init() {

	if ( is_admin() ) {
		
		add_action( 'admin_notices', 'a7f0f3_warn_of_being_boring' );
		
	}
}

//////
// https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
function a7f0f3_warn_of_being_boring() {
    ?>
    <div class="notice notice-info">
        <p><?php print '<strong>Paired Plugin B</strong> does nothing.' ?></p>
    </div>
    <?php
}

