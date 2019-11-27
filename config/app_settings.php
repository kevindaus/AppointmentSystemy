<?php

return [

    // All the sections for the settings page
    'sections' => [

        'sms' => [
            'title' => 'SMS API Gateway Settings',
            'descriptions' => 'API Settings for the SMS Gateway provider',
            'icon' => 'fa fa-envelope', // (optional)
            'inputs' => [
                [
                    'name' => 'YOUR_API_KEY',
                    'type' => 'text',
                    'label' => '',
                    'placeholder' => 'API Key from SEMAPHONE',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'required'
                ]
            ]
        ],
        'message'=>[
            'title' => 'Message Template',
            'descriptions' => 'Template of messages sent',
            'icon' => 'fa fa-cog', // (optional)
            'inputs' => [
                [
                    'name' => 'overdue_notification_message_template',
                    'type' => 'textarea',
                    'label' => 'Overdue Notification Message Template',
                    'placeholder' => 'Message to send on overdue payment',
                    'class' => 'form-control',
                    'style' => '',
                    'rules' => 'required',
                    'hint' => 'placeholder : [name] , [overdue_date] ,[product] . This items will be replaced with actual value',
                    'value' => 'Hi [name] , your payment for [product] is overdue. Overdue date : [overdue_date]'
                ]
            ]
        ]
    ],

    // Setting page url, will be used for get and post request
    'url' => 'settings',

    // Any middleware you want to run on above route
    'middleware' => [],

    // View settings
//    'setting_page_view' => 'app_settings::settings_page',
    'setting_page_view' => 'app.settings',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'card-header',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Save Settings',
    'submit_success_message' => 'Settings has been saved.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',

    // settings group
    'setting_group' => function() {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
