<?php

/**
 * @author   Panji Setya Nur Prawira
 * @package  Kaguya
 */

return [

    // Available settings
    'settings' => [
        'general' => [
            'title' => 'General Settings',

            'fields' => [
                [
                    'name'  => 'app_name',
                    'label' => 'Application Name',
                    'rules' => 'required|string',
                    'value' => 'Kaguya-sama',
                ],

                [
                    'name'  => 'app_email',
                    'label' => 'Application Email',
                    'rules' => 'required|email',
                    'value' => 'kaguya.sama@example.net',
                ],
            ],
        ],

        'profile' => [
            'title' => 'Profile Settings',

            'fields' => [
                [
                    'name'  => 'first_name',
                    'label' => 'First Name',
                    'rules' => 'required|string',
                    'value' => 'Panji Setya',
                ],

                [
                    'name'  => 'last_name',
                    'label' => 'Last Name',
                    'rules' => 'required|string',
                    'value' => 'Nur Prawira',
                ],
            ],
        ],

        'contact' => [
            'title' => 'Contact Settings',

            'fields' => [
                [
                    'name'  => 'contact_email',
                    'label' => 'Email',
                    'rules' => 'required|email',
                    'value' => null,
                ],

                [
                    'name'  => 'contact_phone',
                    'label' => 'Phone',
                    'rules' => 'required|string',
                    'value' => null,
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where settings will be accessible from.
    |
    */

    'path' => env('KAGUYA_PATH', 'settings'),

    /*
    |--------------------------------------------------------------------------
    | Settings Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to settings route, you can
    | change it to existing middleware.
    |
    */

    'middleware' => [
        'web',
        'auth',
    ],

];
