<?php

if ( !defined( 'ABSPATH' ) ) {
    die;
} // Cannot access directly.

if ( class_exists( 'CSF' ) ) {

    // Get WooCommerce order statuses
    $order_statuses = get_option( '_wc_order_statuses' ) ?? '';

    // Prefix
    $prefix = '_qata_message';

    // Create metabox
    CSF::createMetabox( $prefix, array(
        'title'        => 'Message',
        'post_type'    => 'qata_message',
        'show_restore' => true,
    ) );

    CSF::createSection( $prefix, array(
        'title'  => 'Message',
        'icon'   => '',
        'fields' => array(

            // Status field
            array(
                'id'          => 'qsms_order_status',
                'type'        => 'select',
                'title'       => 'Status',
                'placeholder' => 'Select an Status',
                'options'     => array(
                    'processing' => 'Processing',
                    'hold'       => 'On Hold',
                    'cancelled'  => 'Cancelled',
                ),
            ),

            // Template code field
            array(
                'id'          => 'qsms_template_code',
                'type'        => 'text',
                'title'       => 'Template Code',
                'placeholder' => 'Template Code',
            ),

            // Repeater field
            array(
                'id'     => 'qsms_params',
                'type'   => 'repeater',
                'title'  => 'Parameters',
                'fields' => array(
                    array(
                        'id'          => 'qsms_param_key',
                        'type'        => 'text',
                        'title'       => 'Parameter Key',
                        'placeholder' => 'Parameter Key',
                    ),
                    array(
                        'id'          => 'qsms_param_value',
                        'type'        => 'select',
                        'title'       => 'Parameter Value',
                        'placeholder' => 'Select an Value',
                        'options'     => array(
                            'processing' => 'Processing',
                            'hold'       => 'On Hold',
                            'cancelled'  => 'Cancelled',
                        ),
                    ),

                ),
            ),

        ),
    ) );

}

function put_api_response_data( $data ) {
    // Ensure directory exists to store response data
    $directory = QATA_MESSAGE_PLUGIN_PATH . '/api_response/';
    if ( !file_exists( $directory ) ) {
        mkdir( $directory, 0777, true );
    }

    // Construct file path for response data
    $fileName = $directory . 'response.log';

    // Get the current date and time
    $current_datetime = date( 'Y-m-d H:i:s' );

    // Append current date and time to the response data
    $data = $data . ' - ' . $current_datetime;

    // Append new response data to the existing file
    if ( file_put_contents( $fileName, $data . "\n\n", FILE_APPEND | LOCK_EX ) !== false ) {
        return "Data appended to file successfully.";
    } else {
        return "Failed to append data to file.";
    }
}