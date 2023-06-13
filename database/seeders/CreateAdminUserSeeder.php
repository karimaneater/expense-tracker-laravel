<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password'
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'password'
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $userRole = Role::create(['name' => 'user']);

        $permissionsAdmin = Permission::pluck('id','id')->all();

        $permissionsUser = Permission::whereIn('id',[1,2,5,6,7,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44])->get()->pluck('id','id');

        $adminRole->syncPermissions($permissionsAdmin);

        $userRole->syncPermissions($permissionsUser);

        $admin->assignRole([$adminRole->id]);

        $user->assignRole([$userRole->id]);
    }
}
