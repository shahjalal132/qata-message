<?php

if ( !defined( 'ABSPATH' ) ) {
    die;
} // Cannot access directly.

if ( class_exists( 'CSF' ) ) {

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
                        'id'    => 'qsms_param',
                        'type'  => 'text',
                        'title' => 'Param',
                    ),

                ),
            ),

        ),
    ) );

}