<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,
    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => false,

    'roles_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'admin' => 'r',
            'admin-analytics' => 'r',
            'languages' => 'c,r,u,d',
            'user-roles' => 'r,u',
            'roles' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'menu-links' => 'c,r,u,d',
            'menus' => 'c,r,u,d',
            'ads-manager' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'settings' => 'u',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'admin' => 'r',
            'admin-analytics' => 'r',
            'languages' => 'c,r,u,d',
            'roles' => 'r',
            'posts' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'menu-links' => 'c,r,u,d',
            'menus' => 'c,r,u,d',
            'ads-manager' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
        ],
        'customer_support'=>[
            'admin' => 'r',
            'posts'=>"r",
            'languages'=>"r",
        ],
        'editor' => [
            'admin' => 'r',
            'menu-links' => 'c,r,u,d',
            'menus' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'posts'=>"r",
            'languages'=>"r",
            'posts' => 'c,r,u,d',
        ],
        'user' => [
            'posts'=>"r",
            'languages'=>"r",
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
