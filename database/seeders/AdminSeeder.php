<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        $roles = Role::get();

        $admin_role = $roles->filter(function ($role, $key) {
            return $role->name == "ADMIN";
        });

        $admin->roles()->attach($admin_role);
    }
}
