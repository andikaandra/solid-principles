<?php

use Phalcon\Config;

return new Config(
    [
        'mode' => getenv('APP_MODE'), //DEVELOPMENT, PRODUCTION, DEMO

        'database' => [
            'adapter' => getenv('DB_ADAPTER'),
            'host' => getenv('DB_HOST'),
            'username' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'dbname' => getenv('DB_NAME'),
        ],   
        
        'url' => [
            'baseUrl' => getenv('BASE_URL'),
        ],
        
        'application' => [
            'libraryDir' => APP_PATH . "/lib/",
            'cacheDir' => APP_PATH . "/cache/",
        ],

        'mail' => [
            'fromName'      => getenv('MAIL_FROM_NAME'),
            'fromEmail'     => getenv('MAIL_FROM_EMAIL'),
            'smtp' => [
                'server'    => getenv('MAIL_SMTP_SERVER'),
                'port'      => getenv('MAIL_SMTP_PORT'),
                'security'  => getenv('MAIL_SMTP_SECURITY'),
                'username'  => getenv('MAIL_SMTP_USERNAME'),
                'password'  => getenv('MAIL_SMTP_PASSWORD'),
            ]
        ],

        'version' => '0.1',
    ]
);
