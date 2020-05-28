<?php

return [
    'php56' => [
        'name' => 'PHP 5.6',
        'socket' => 'unix:/run/php/php5.6-fpm.sock',
        'confd' => '/etc/php/5.6/fpm/conf.d'
    ],
    'php71' => [
        'name' => 'PHP 7.1',
        'socket' => 'unix:/run/php/php7.1-fpm.sock',
        'confd' => '/etc/php/7.1/fpm/conf.d'
    ],
    'php72' => [
        'name' => 'PHP 7.2',
        'socket' => 'unix:/run/php/php7.2-fpm.sock',
        'confd' => '/etc/php/7.2/fpm/conf.d'
    ],
    'php73' => [
        'name' => 'PHP 7.3',
        'socket' => 'unix:/run/php/php7.3-fpm.sock',
        'confd' => '/etc/php/7.3/fpm/conf.d'
    ]
];
