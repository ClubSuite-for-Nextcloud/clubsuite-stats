<?php
return [
    'routes' => [
        ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
        ['name' => 'stats#members', 'url' => '/members', 'verb' => 'GET'],
        ['name' => 'stats#finances', 'url' => '/finances', 'verb' => 'GET'],
        ['name' => 'stats#meetings', 'url' => '/meetings', 'verb' => 'GET'],
        ['name' => 'stats#inventory', 'url' => '/inventory', 'verb' => 'GET'],
    ],
];
