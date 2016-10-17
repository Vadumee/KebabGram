<?php
return [
    'settings' => [

    	// Slim genereal settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

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
            'database' => 'slim3', // DB name or SQLite path
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix' => '',
        ]
    ],
];