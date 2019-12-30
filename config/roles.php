<?php
return [
    'models' => [
        'permission'    => env('ROLES_DEFAULT_PERMISSION_MODEL', App\Models\Permission\Permission::class),
    ],
];
