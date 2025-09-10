<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // jangan lupa ganti
                'id_role' => '1',
                'id_bidang' => '1',
                'instansi' => 'BRIDA Jawa Timur',
                'jabatan' => 'Admin',
                'telephone' => '081234567890',
                'kepakaran' => 'Sistem Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Biasa',
                'username' => 'user1',
                'email' => 'user1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'id_role' => '2',
                'id_bidang' => '2',
                'instansi' => 'Instansi Lain',
                'jabatan' => 'Staf',
                'telephone' => '089876543210',
                'kepakaran' => 'Penelitian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
