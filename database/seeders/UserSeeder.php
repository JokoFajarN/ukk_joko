<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Joko',
            'namaLengkap' => 'Joko Fajar Nugroho',
            'email' => 'joko@gmail.com',
            'password' => Hash::make('joko'),
        ]);

        User::create([
            'name' => 'Joko2',
            'namaLengkap' => 'Joko2 Fajar Nugroho',
            'email' => 'joko2@gmail.com',
            'password' => Hash::make('joko2'),
        ]);
    }
}
