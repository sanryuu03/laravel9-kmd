<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'super admin',
            'guard_name' => 'web'

        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'

        ]);
        Role::create([
            'name' => 'anggota',
            'guard_name' => 'web'

        ]);

        Permission::create([
            'name' => 'kepengurusan perusahaan',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'gerai',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'panitia',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'pengelola gerai',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'bisnis developer',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'susunan panitian',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'admin',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'keuangan',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'pembayaran',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'slider',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'kategori unggulan',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'berita',
            'guard_name' => 'web'

        ]);
        Permission::create([
            'name' => 'akun',
            'guard_name' => 'web'

        ]);


        $superAdmin = User::create([
            'name' => 'san',
            'email' => 'apasajah3h3h3@gmail.com',
            'password' => bcrypt('12345678'),

        ]);

        $superAdmin->assignRole('super admin');

        $admin = User::create([
            'name' => 'admin role',
            'email' => 'hehehe@gmail.com',
            'password' => bcrypt('12345678'),

        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'dummy',
            'email' => 'muhammadhasan.taspusat@gmail.com',
            'password' => bcrypt('12345678'),

        ]);

        $user->assignRole('anggota');
    }
}
