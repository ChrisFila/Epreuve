<?php


$container->loadFromExtension('security', [
    // ...

    'firewalls' => [
        'main' => [
            // ...
            'remember_me' => [
                'secret'   => '%kernel.secret%',
                'lifetime' => 604800, // 1 week in seconds
                'path'     => '/',
                // by default, the feature is enabled by checking a
                // checkbox in the login form (see below), uncomment
                // the following line to always enable it.
                //'always_remember_me' => true,
            ],
        ],
    ],
]);
