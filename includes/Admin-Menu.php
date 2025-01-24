<?php

class Rap_Admin_Menu {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_menu' ) );
    }

    public function add_menu() {
        add_menu_page(
            'React Admin Panel',
            'React Admin Panel',
            'manage_options',
            'react-admin-panel',
            array( $this, 'menu_page' ),
            'dashicons-admin-generic',
            6
        );
    }

    public function menu_page() {
        echo '<div id="react-admin-setting-panel"></div>';
    }
}