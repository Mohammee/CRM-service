<?php


return [
    [
        'active' => 'admin.index',
        'title' => 'Dashboard',
        'route' => 'admin.index'
    ],
    [
        'active' => 'admin.contacts.*',
        'title' => 'Contacts Management',
        'route' => 'admin.contacts.index',
        'sub' => [
            ['active' => 'admin.contacts.index', 'title' => 'Contacts', 'route' => 'admin.contacts.index'],
            ['active' => 'admin.contacts.create', 'title' => 'Create Contacts', 'route' => 'admin.contacts.create'],
        ]
    ]
];
