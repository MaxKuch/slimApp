<?php
    return [
        'settings' => [
            'displayErrorDetails' => true,
            'addContentLengthHeader' => false,
            'renderer' => [
                'template_path' => __DIR__ . '/../views/',
            ],
            'db' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'tw_test',
                'username' => 'root',
                'password' => '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]
        ]
    ];
        