<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'Admin(Iris Fleur)',
            'email'=>'admin@gmail.com',
            'phone'=>'09786507670',
            'address'=>'Dawei',
            'role'=>'admin',
            'gender'=>'male',
            'password'=>Hash::make('admin3153'),
        ]);

    }
}
