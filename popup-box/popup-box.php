<?php
/**
 * Plugin Name:       Popup Box
 * Plugin URI:        https://wordpress.org/plugins/popup-box/
 * Description:       Easily create Powered Popups.
 * Version:           2.2.6
 * Author:            Wow-Company
 * Author URI:        https://wow-estore.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       popup-box
 */

namespace popup_box;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'WP_Plugin' ) ) :

	/**
	 * Main WP_Plugin Class.
	 *
	 * @since 1.0
	 */
	final class WP_Plugin {

		private static $_instance;
		/**
		 * @var WP_Plugin_Admin
		 */
		private $admin;
		/**
		 * @var WP_Plugin_Public
		 */
		private $public;

		/**
		 * Wow Plugin information
		 *
		 * All information which need for correctly plugin working
		 *
		 * @return array
		 * @static
		 */
		private static function _plugin_info() {

			$info = array(
				'plugin' => array(
					'name'      => 'Popup Box', // Plugin name
					'menu'      => 'Popup Box', // Plugin name in menu
					'author'    => 'Wow-Company', // Author
					'prefix'    => 'popup_box', // Prefix for database
					'text'      => 'popup-box',    // Text domain for translate files
					'version'   => '2.2.6', // Current version of the plugin
					'file'      => __FILE__, // Main file of the plugin
					'slug'      => 'popup-box', // Name of the plugin folder
					'url'       => plugin_dir_url( __FILE__ ), // filesystem directory path for the plugin
					'dir'       => plugin_dir_path( __FILE__ ), // URL directory path for the plugin
					'shortcode' => 'Popup-Box',
				),
				'url'    => array(
					'author'  => 'https://wow-estore.com',
					'home'    => 'https://wordpress.org/plugins/popup-box/',
					'support' => 'https://wordpress.org/support/plugin/popup-box/',
				),
				'rating' => array(
					'website'  => 'WordPress.org',
					'url'      => 'https://wordpress.org/support/plugin/popup-box/reviews/#new-post',
					'wp_url'   => 'https://wordpress.org/support/plugin/popup-box/reviews/#new-post',
					'wp_home'  => 'https://wordpress.org/plugins/popup-box/',
					'wp_title' => 'Popup Box',
				),
			);

			return $info;

		}

		/**
		 * Main WP_Plugin Instance.
		 *
		 * Insures that only one instance of WP_Plugin exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @return object|WP_Plugin The one true WP_Plugin for Current plugin
		 *
		 * @uses      WP_Plugin::_includes() Include the required files.
		 * @uses      WP_Plugin::text_domain() load the language files.
		 * @since     1.0
		 * @static
		 * @staticvar array $_instance
		 */
		public static function instance() {

			if ( ! isset( self::$_instance ) && ! ( self::$_instance instanceof WP_Plugin ) ) {

				$info = self::_plugin_info();

				self::$_instance = new WP_Plugin;

				register_activation_hook( __FILE__, array( self::$_instance, 'plugin_activate' ) );
				add_action( 'plugins_loaded', array( self::$_instance, 'text_domain' ) );

				if ( get_option( 'wow_' . $info['plugin']['prefix'] . '_updater_2' ) === false ) {
					add_action( 'admin_init', array( self::$_instance, 'plugin_updater' ) );
				}

				self::$_instance->_includes();
				self::$_instance->admin  = new WP_Plugin_Admin( $info );
				self::$_instance->public = new WP_Plugin_Public( $info );
			}

			return self::$_instance;
		}

		/**
		 * Throw error on object clone.
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @return void
		 * @since  1.0
		 * @access protected
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', 'popup-box' ), '1.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @return void
		 * @since  1.0
		 * @access protected
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_attr__( 'Cheatin&#8217; huh?', 'popup-box' ), '1.0' );
		}


		/**
		 * Include required files.
		 *
		 * @access private
		 * @return void
		 * @since  1.0
		 */
		private function _includes() {
			include_once 'admin/class-admin.php';
			include_once 'public/class-public.php';
		}

		/**
		 * Activate the plugin.
		 * create the database
		 * create the folder in wp-upload
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function plugin_activate() {
			deactivate_plugins( 'popup-box-pro/popup-box-pro.php' );
			$info   = self::_plugin_info();
			$prefix = $info['plugin']['prefix'];
			global $wpdb;
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			// Create the database for plugin
			$table = $wpdb->prefix . $prefix;
			$charset_collate = $wpdb->get_charset_collate();
			$sql   = "CREATE TABLE " . $table . " (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				title VARCHAR(200) NOT NULL,
				param TEXT,
				script TEXT,
				style TEXT,
				status INT,
				UNIQUE KEY id (id)
			) $charset_collate;";
			dbDelta( $sql );
			update_option( 'wow_' . $info['plugin']['prefix'] . '_updater_2', '2.0' );
		}

		public function plugin_updater() {
			$info   = self::_plugin_info();
			$prefix = $info['plugin']['prefix'];
			global $wpdb;
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			// Create the database for plugin
			$table = $wpdb->prefix . $prefix;
			$sql   = "CREATE TABLE " . $table . " (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				title VARCHAR(200) NOT NULL,
				param TEXT,
				script TEXT,
				style TEXT,
				status INT,
				UNIQUE KEY id (id)
			) 
			DEFAULT CHARSET=utf8;";
			dbDelta( $sql );
			$result = $wpdb->get_results( "SELECT * FROM " . $table . " order by id asc" );
			if ( count( $result ) > 0 ) {
				foreach ( $result as $key => $val ) {
					$id = $val->id;
					$wpdb->update( $table, array( 'status' => 1 ), array( 'id' => $id ) );
				}
			}

			update_option( 'wow_' . $info['plugin']['prefix'] . '_updater_2', '2.0' );
		}

		/**
		 * Download the folder with languages.
		 *
		 * @access public
		 * @return void
		 * @since  1.0
		 */
		public function text_domain() {
			$languages_folder = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
			load_plugin_textdomain( 'popup-box', false, $languages_folder );
		}

	}

endif; // End if class_exists check.

/**
 * The main function for that returns WP_Plugin
 *
 * @since 1.0
 */
function WP_Plugin_run() {
	return WP_Plugin::instance();
}

// Get Running.
WP_Plugin_run();
