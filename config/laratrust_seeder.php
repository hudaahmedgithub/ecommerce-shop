<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
        ],
        'admin' => [
			'users'=>'r'
		]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
