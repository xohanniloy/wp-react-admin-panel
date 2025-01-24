<?php
/*
 * Plugin Name:       React Admin Panel
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description: A WordPress plugin to integrate a React-based admin panel.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Wizadd
 * Author URI:        https://wizadd.com/
 * Text Domain:       react-admin-panel
 * Domain Path:       /languages
 */

// Exit if accessed directly

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class ReactAdminPanel {
    private static $instance;

    public static function get_instance() {

        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        $this->define_constants();
        $this->load_classes();
    }

    private function define_constants() {
        define( 'REACT_ADMIN_PANEL_VERSION', '1.0.0' );
        define( 'REACT_ADMIN_PANEL_FILE', __FILE__ );
        define( 'REACT_ADMIN_PANEL_PATH', plugin_dir_path( REACT_ADMIN_PANEL_FILE ) );
        define( 'REACT_ADMIN_PANEL_URL', plugin_dir_url( REACT_ADMIN_PANEL_FILE ) );
        define( 'REACT_ADMIN_PANEL_ASSETS', REACT_ADMIN_PANEL_URL . 'assets/' );
    }

    private function load_classes() {
        require_once REACT_ADMIN_PANEL_PATH . 'includes\Admin-Menu.php';
        require_once REACT_ADMIN_PANEL_PATH . 'includes\Enqueue.php';
        require_once REACT_ADMIN_PANEL_PATH . 'includes\Ajax.php';

        new Rap_Admin_Menu();
        new Rap_Enqueue();
        new Ajax();
    }

}

ReactAdminPanel::get_instance();