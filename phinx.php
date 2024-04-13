<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'FlowManager ',
        'FlowManager ' => [
            'adapter' => 'mysql',
            'host' => '',
            'name' => '', // nome do Banco de dados, é preciso já existir um banco com esse nome
            'user' => '',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => '',
            'name' => '', // nome do Banco de dados, é preciso já existir um banco com esse nome
            'user' => '',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => '',
            'name' => '', // nome do Banco de dados, é preciso já existir um banco com esse nome
            'user' => '',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
