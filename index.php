<?php
/**
 * Plugin Name: One Click Coming Soon
 * Description: An awesome one click coming soon plugin.
 * Plugin URI: https://www.phpclicks.com/WordPress/plugins/one-click-coming-soon/
 * Author: Zubair Mushtaq
 * Author URI: https://www.facebook.com/zubairmushtaaq
 * Version: 0.1
 * License: GPL2
 *
 */
 
/**
 * Copyright (c) 2015 | rayhan095@gmail.com | All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

	// Adding WordPress plugin meta links
	add_filter( 'plugin_row_meta', 'occs_plugin_meta_links', 10, 2 );
	function occs_plugin_meta_links( $links, $file ) {
		$plugin = plugin_basename(__FILE__);
		// create link
		if ( $file == $plugin ) {
			return array_merge(
				$links,
				array( '<a target="_blank" href="https://www.phpclicks.com/">Read More</a>' )
			);
		}
		return $links;
	}

class One_Click_Coming_Soon {
    /**
     * Construct the plugin object
     */
    public function __construct() {
		
        // Initialize Settings
        require_once( dirname(__FILE__) . '/settings-class.php' );
        $One_Click_Coming_Soon_Settings = new One_Click_Coming_Soon_Setting();
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_settings_link' ) );
		add_action( 'plugins_loaded', array( &$this, 'load_occs_translation_files' ) );

    } // END public function __construct
    
	public function load_occs_translation_files() {
	  load_plugin_textdomain( 'one-click-coming-soon', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	
	/**
    * Add settings link on plugin page
    */
    function plugin_settings_link($links) {
	$url = get_admin_url() . 'options-general.php?page=one_click_coming_soon';
	$settings_link = '<a href="'.$url.'">' . __( 'Settings', 'one-click-coming-soon' ) . '</a>';
	array_unshift( $links, $settings_link );
	return $links;
	}
	 
    /**
     * Activate the plugin
     */
    public static function activate_me( $networkwide ) {
        // Do nothing    
    } // END public static function activate_me

    /**
     * Deactivate the plugin
     */        
    public static function deactivate_me() {
        // Do nothing
    } // END public static function deactivate_me
} // END class One_Click_Coming_Soon

// Installation and uninstallation hooks
register_activation_hook( __FILE__, array( 'One_Click_Coming_Soon', 'activate_me' ) );
register_deactivation_hook( __FILE__, array( 'One_Click_Coming_Soon', 'deactivate_me' ) );

// instantiate the plugin class
$One_Click_Coming_Soon_plugin = new One_Click_Coming_Soon();
