<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Distributors;
use App\Models\Skripsi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::create([
            'name' => 'user1',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789'),
            'point' => 10000,
        ]);

        Admin::create([
            'name' => 'admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);*/

        // Skripsi::create([
        //     'judul' => 'Implementasi Laravel',
        //     'nama' => 'Edison Rizal',
        //     'nim' => 6304,
        //     'angkatan' => 2022,
        //     'dosbing1' => 'Fajri Profesio Putra M.Cs',
        //     'dosbing2' => 'Elvi Rahmi M.Kom',

        // ]);

        Distributors::create([
            'nama_distributor' => 'Kenta',
            'kota' => 'Pekanbaru',
            'provinsi' => 'Riau',
            'kontak' => '082233445566',
            'email' => 'KentaDistrib@gmail.com',
        ]);
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
