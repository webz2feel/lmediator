<?php

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $dev_perm = Permission::where('slug','create-tasks')->first();
        $manager_perm = Permission::where('slug','edit-tasks')->first();
        $developer = new Admin();
        $developer->first_name = 'Imran';
        $developer->last_name = 'Ali';
        $developer->email = 'imran@wtwm.com';
        $developer->password = bcrypt('secret');
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);
        $manager = new Admin();
        $manager->first_name = 'Manager';
        $manager->last_name = 'khan';
        $manager->email = 'manager@wtwm.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);
    }
}
