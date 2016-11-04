<?php
return [
    'settings' => [

    	// Slim genereal settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,

        // View settings (template engine Twig)
        'view' => [
            'template_path' => __DIR__ . '/../resources/views',
            'twig' => [
                'cache' => __DIR__ . '/cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        // Database
        'db' => [
            'driver' => 'mysql', // mysql or sqlite
            'host' => 'localhost', // To change port, just add it afterwards like localhost:8889
            'database' => 'Kebabstagram', // DB name or SQLite path
            'username' => 'wurth2u',
            'password' => 'root',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix' => '',
        ]
    ],
];
