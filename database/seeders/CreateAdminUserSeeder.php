<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::updateOrCreate(
            [ 'email' => 'admin@gmail.com' ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '1234567890',
                'address' => '123 Admin St',
                'bio' => 'This is the admin user.',
            ]
        );

        $role = Role::firstOrCreate(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}