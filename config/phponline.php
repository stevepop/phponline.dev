<?php

return [

    'twitter' => [

        'handle' => 'PhpOnlineDev',
    ],


    'email' => [

        'admin' => 'phponlinedev@gmail.com',
    ],

    'nav' => [

        'main' => [

            [
                'name' => 'Blog',
                'link' => '/blog',
                'title' => 'View our Blog',
                'pattern' => 'articles:index'
            ],

            [
                'name' => 'Tutorials',
                'link' => '/category/tutorials',
                'title' => 'View our Tutorials',
                'pattern' => 'categories:show'
            ],

            [
                'name' => 'Packages',
                'link' => '/packages',
                'title' => 'View our Packages',
                'pattern' => 'packages:index'
            ],

            [
                'name' => 'User Groups',
                'link' => '/user-groups',
                'title' => 'View our User Groups',
                'pattern' => 'user-groups:index'
            ]
        ],

        'footer' => []
    ]
];
