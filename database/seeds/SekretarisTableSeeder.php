<?php

use Illuminate\Database\Seeder;

class SekretarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Mahasiswa::create([
            'name' => 'Beni',
            'email' => 'beni07if@gmail.com',
            'password' => bcrypt('12345678'),
            // 'role_id' => 1
        ]);
    }
}
