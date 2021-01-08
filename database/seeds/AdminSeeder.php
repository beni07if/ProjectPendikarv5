<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'foto' => 'admin.jpg',
            'password' => bcrypt('aaaaaaaa'),
        ]);
        // $user =
        //     [
        //         'name' => 'Admin',
        //         'email' => 'admin@gmail.com',
        //         'foto' => 'foto.jpg',
        //         'password' => bcrypt('12345678'),
        //     ]
        // foreach ($user as $key => $value) {
        //     Admin::create($value);
        // }
    }
}
