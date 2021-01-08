<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        // DB::table('user')->insert([
        //     'name' => 'user',
        //     'email' => 'user@gmail.com',
        //     // 'password' => Hash::make('password'),
        //     'password' => bcrypt('12345678'),
        // ]);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(MahasiswaSeeder::class);
    }
}
