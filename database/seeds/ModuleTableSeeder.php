<?php

use App\Models\Module\Module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name'        => 'Dashboard',
                'route_name'  => 'admin.dashboard',
                'position'    => 1,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Posts',
                'route_name'  => '',
                'position'    => 2,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Pages',
                'route_name'  => '',
                'position'    => 3,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Emails',
                'route_name'  => '',
                'position'    => 4,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Access',
                'route_name'  => '',
                'position'    => 5,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Users',
                'route_name'  => '',
                'position'    => 6,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
            [
                'name'        => 'Settings',
                'route_name'  => 'admin.settings',
                'position'    => 7,
                'icon'       => '<i class="icon-home4"></i>',
                'is_active' => 1
            ],
        ];

        Module::insert($modules);
    }
}
