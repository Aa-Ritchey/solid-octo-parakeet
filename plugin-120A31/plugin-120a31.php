<?php

/*
Plugin Name: Stylize the Admin UI
Description: Change the font and color of the admin bar (top) and admin menu (left).
Version: &beta;
Author: Aaron Ritchey
Author URI: http://aaronritchey.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Prevent direct access to this file.
defined( 'ABSPATH' ) or die();

// Are we in the admin section?
if (is_admin()) {

    add_action('admin_enqueue_scripts', 'x120a31_admin_enqueue_scripts');
	add_action('admin_enqueue_scripts', 'x120a31_google_fonts');

}

function x120a31_admin_enqueue_scripts() {

	wp_register_style( 'x120a31_custom_wp_admin_css', plugins_url( '/assets/custom.css', __FILE__ ) , false, '1.0.0' );
	wp_enqueue_style( 'x120a31_custom_wp_admin_css' );

}

// Borrowing from:
//   https://gist.github.com/jennimckinnon/
//   a65d307e9a3fcf8faa5e#file-functions-php
function x120a31_google_fonts() {

	$query_args = array(
		'family' => 'Aubrey'
	);

	wp_register_style( 'x120a31_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'x120a31_google_fonts' );

}
            

