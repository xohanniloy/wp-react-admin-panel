<?php
class Rap_Enqueue {
    public function __construct() {
        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
    }

    public function enqueue_scripts( $screen ) {

        if ( 'toplevel_page_react-admin-panel' == $screen ) {
            $this->load_assets();
        }

    }

    public function load_assets() {
        $main_asset = require REACT_ADMIN_PANEL_PATH . 'assets/build/main.asset.php';
        wp_enqueue_script( 'react-admin-panel', REACT_ADMIN_PANEL_ASSETS . 'build/main.js', $main_asset['dependencies'], $main_asset['version'], ['in_footer' => true] );
        wp_localize_script( 'react-admin-panel', 'ReacSettings', [
            'wp_ajax' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'react-admin-panel_nonce' ),
        ] );

    }

}
