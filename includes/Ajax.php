<?php

class Ajax {
    public function __construct() {
        add_action( 'wp_ajax_react_form_submit', [$this, 'react_form_submit'] );
        add_action( 'wp_ajax_get_from_data', [$this, 'get_from_data'] );
    }

    function react_form_submit() {
        check_ajax_referer( 'react-admin-panel_nonce', 'nonce' );
        $title = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
        $choose_option = isset( $_POST['choose_option'] ) ? sanitize_text_field( $_POST['choose_option'] ) : '';
        $select_radio = isset( $_POST['select_radio'] ) ? sanitize_text_field( $_POST['select_radio'] ) : '';

        $select_checkbox = array();
        if ( isset( $_POST['select_checkbox']) && is_array( $_POST['select_checkbox'] ) )  {
            $select_checkbox = array_map( 'sanitize_text_field', $_POST['select_checkbox'] );
        }

        $data = array(
            'title' => $title,
            'choose_option' => $choose_option,
            'select_radio' => $select_radio,
            'select_checkbox' => $select_checkbox,
        );
        update_option( 'react_admin_panel', $data );

        wp_send_json_success(['message' => 'Data saved successfully']);
    }

    function get_from_data() {
        check_ajax_referer( 'react-admin-panel_nonce', 'nonce' );
        $data = get_option( 'react_admin_panel', array() );
        wp_send_json_success( $data );
    }

}
