<?php

return [
    'role_structure' => [
        'huda' => [
            'admins' => 'c,r,u,d',
        ],
        'admin' => [
			'admins'=>'r'
		]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
